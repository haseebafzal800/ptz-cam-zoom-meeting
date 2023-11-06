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
use DataTables;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

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
        if ($request->ajax()) {
            if(Auth::user()->hasRole('Admin')){
                $data = User::orderBy('id','DESC')->with('roles')->get();
            }elseif(Auth::user()->hasRole('Client')){
                $data = User::orderBy('id','DESC')->with('roles')->where('client_id', Auth::user()->client_id)->get();
            }
            // echo "<pre>"; print_r($data); die;
            return Datatables::of($data)->addIndexColumn()
                ->addColumn('roles', function ($row) {
                    $roles='';
                    $mroles = $row->getRoleNames();
                    if(!empty($mroles)){
                        foreach($mroles as $v){
                            $roles .='<label class="badge badge-success">'.$v.'</label>';
                        }
                    }
                    return $roles ;
                })
                ->addColumn('action', function($row){
                    // $url = "/notification/delete/".$row->id;
                    // $btn = '<a href="javascript:void(0)" onclick="DeleteMe(this, '."'".$url."'".')" class="btn btn-danger btn-xs btn-delete"><i class="fa fa-trash"></i></a>';
                    // $btn .= ' <a href="'.@url("/meeting/$row->meeting_id/participent".$row->id).'" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>';
                    $btn='';
                    if (Gate::allows('approve-user')){
                        $btn .=' <a class="btn btn-xs btn-info" href="'.route('users.show',$row->id).'"><i class="fas fa-eye"></i></a>';
                        if($row->client_id > 0 && $row->is_approved=='on'){
                        $btn .=' <a class="btn btn-xs btn-primary" href="'.route('users.unapprove',$row->id).'"><i class="fas fa-check"></i></a>';
                        }elseif($row->client_id == '' && $row->is_approved=='ban'){
                        $btn .= ' <a class="btn btn-xs btn-danger" href="'.route('users.unapprove',$row->id).'"><i class="fas fa-ban"></i></a>';
                        }else{
                            $btn .= ' <a class="btn btn-xs btn-primary" href="'.route('users.approved',$row->id).'"><i class="fas fa-check"></i></a>';
                        $btn .= ' <a class="btn btn-xs btn-danger" href="'.route('users.unapprove',$row->id).'"><i class="fas fa-ban"></i></a>';
                        }
                    }
                    $btn .= ' <a class="btn btn-xs btn-primary" href="'.route('users.edit',$row->id).'"><i class="fas fa-pencil-alt"></i></a>';
                    $url = url("/users/destroy/".$row->id);
                    $btn .= ' <a href="javascript:void(0)" onclick="DeleteMe(this, '."'".$url."'".')" class="btn btn-danger btn-xs btn-delete"><i class="fa fa-trash"></i></a>';
                       
                    return $btn;
                })
                ->addColumn('rownum', function ($row) {
                    return '';
                })
                ->rawColumns(['rownum','roles', 'action'])
                ->make(true);
        }
        $data['pageTitle'] = 'Users';
        $data['userListActive'] = 'active';
        $data['userOpening'] = 'menu-is-opening';  
        $data['userOpend'] = 'menu-open';
        return view('admin.users.index', $data);
    }
    // public function index(Request $request)
    // {
    //     if(Auth::user()->hasRole('Admin')){
    //         $data = User::orderBy('id','DESC')->paginate(10);
    //     }elseif(Auth::user()->hasRole('Client')){
    //         $data = User::orderBy('id','DESC')->where('client_id', Auth::user()->client_id)->paginate(10);
    //     }
        
    //     $userListActive = 'active';
    //     $userOpening = 'menu-is-opening';
    //     $userOpend = 'menu-open';
    //     return view('admin.users.index',compact('data', 'userListActive', 'userOpening', 'userOpend'))
    //         ->with('i', ($request->input('page', 1) - 1) * 5);
    // }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        $userCreateActive = 'active';
        $pageTitle = 'Add User';
        $userOpening = 'menu-is-opening';
        $userOpend = 'menu-open';
        return view('admin.users.create',compact('roles', 'pageTitle', 'userCreateActive', 'userOpening', 'userOpend'));
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
        $pageTitle = 'View User';
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
        $pageTitle = 'Edit User';
        $userRole = $user->roles->pluck('name','name')->all();
        $userListActive = 'active';
        $userOpening = 'menu-is-opening';
        $userOpend = 'menu-open';
    
        return view('admin.users.edit',compact('user', 'pageTitle', 'roles','userRole', 'userListActive', 'userOpening', 'userOpend'));
    }
    public function change_password()
    {
        $user = User::find(Auth::user()->id);
        $pageTitle = 'Change Password';
        $profileActive = 'active';
        $profileOpening = 'menu-is-opening';
        $profileOpend = 'menu-open';
    
        return view('admin.users.change-password',compact('user', 'pageTitle', 'profileActive', 'profileOpening', 'profileOpend'));
    }
    public function update_password(Request $request){
        $validator = Validator::make($request->all(), [
            'old-password' => 'required',
            'password' => 'required|string|min:8|same:confirm-password',
        ]);
        
        if ($validator->fails()) {
            return redirect('change-password')
            ->withErrors($validator)
            ->withInput();
        }
        $user = User::find($request->id);
        if (Hash::check($request->input('old-password'), $user->password)) {
            // Update the user's password with the new password
            $user->password = Hash::make($request->input('password'));
            $user->save();

            // Redirect to a success page or return a response
            return redirect()->back()->with('success', 'Password changed successfully');
        } else {
            // If the current password is incorrect, show an error message
            return redirect()->back()->withErrors(['current_password' => 'The current password is incorrect'])->withInput();
        }

    }
    // private function passwordMatchesOld($oldPassword)
    // {
    //     $user = Auth::user(); // Get the currently authenticated user
    //     return password_verify($oldPassword, $user->password);
    // }
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
    // public function destroy($id)
    // {
    //     User::find($id)->delete();
    //     return redirect()->route('users.index')
    //                     ->with('success','User deleted successfully');
    // }
    public function destroy($id)
    {
        if(User::find($id)->delete()){
            return 'ok';
        }else{
            return 'notok';
        }
    }
}