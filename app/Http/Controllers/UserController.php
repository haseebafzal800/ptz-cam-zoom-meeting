<?php
    
namespace App\Http\Controllers;
    
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AppSettingsModel;
use App\Models\User;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index','store']]);
         $this->middleware('permission:user-create', ['only' => ['create','store']]);
         $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:user-delete', ['only' => ['destroy']]);
         $this->middleware('permission:approve-user', ['only' => ['show']]);
    }
    /**
     * Display a listing of the rpermissionsesource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(Auth::user()->hasRole('Admin')){
            $data = User::orderBy('id','DESC')->paginate(5);
        }elseif(Auth::user()->hasRole('Client')){
            $data = User::orderBy('id','DESC')->where('client_id', Auth::user()->client_id)->paginate(5);
        }
        
        $userListActive = 'active';
        $userOpening = 'menu-is-opening';
        $userOpend = 'menu-open';
        return view('admin.users.index',compact('data', 'userListActive', 'userOpening', 'userOpend'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        $userCreateActive = 'active';
        $userOpening = 'menu-is-opening';
        $userOpend = 'menu-open';
        return view('admin.users.create',compact('roles', 'userCreateActive', 'userOpening', 'userOpend'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::user()->hasRole('Client')){
            $request->request->add(['roles' => ['Client']]);
        }
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);
        // var_dump($request->all()); die;
        $input = $request->all();
        if(Auth::user()->hasRole('Client')){
            $input['client_id'] = Auth::user()->client_id;
        }else{
            $settings = AppSettingsModel::create();
            $input['client_id'] = $settings->id;
        }
        
        $input['password'] = Hash::make($input['password']);
        $input['is_approved'] = 'on';
        
        // var_dump($input); die;

        $user = User::create($input);
        if(Auth::user()->hasRole('Client')){
            $roles = ['Producer'];
            $user->assignRole($roles);
        }else{
            $user->assignRole($request->input('roles'));
        }
        
    
        return redirect()->route('users.index')->with('success','User created successfully');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $pageTitle = 'User View';
        $userListActive = 'active';
        $userOpening = 'menu-is-opening';
        $userOpend = 'menu-open';
        return view('admin.users.show',compact('user', 'pageTitle', 'userListActive', 'userOpening', 'userOpend'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
        $userListActive = 'active';
        $userOpening = 'menu-is-opening';
        $userOpend = 'menu-open';
    
        return view('admin.users.edit',compact('user','roles','userRole', 'userListActive', 'userOpening', 'userOpend'));
    }

    public function approved($id)
    {

        $settings = AppSettingsModel::create();
        $user = User::find($id);
        $user->client_id = $settings->id;
        $user->is_approved = 'on';
        $user->save();
        
        $roles = ['client'];
        $user->assignRole($roles);
        return redirect()->route('users.index')->with('success','User created successfully');
    }

    public function unapprove($id)
    {
        $user = User::find($id);
        $user->is_approved = 'ban';
        $user->save();
        
        return redirect()->route('users.index')->with('success','User updated successfully');
    }
    
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(Auth::user()->hasRole('Client')){
            $request->request->add(['roles' => ['Client']]);
        }
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);
    
        $input = $request->all();
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));    
        }
    
        $user = User::find($id);
        $user->update($input);
        if(Auth::user()->hasRole('Admin')){
            DB::table('model_has_roles')->where('model_id',$id)->delete();
            $user->assignRole($request->input('roles'));
        }
        return redirect()->route('users.index')
                        ->with('success','User updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')
                        ->with('success','User deleted successfully');
    }
}