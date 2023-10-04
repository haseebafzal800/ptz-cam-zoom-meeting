@extends('layouts.admin.default')
@section('content')
@include('includes.admin.breadcrumb')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Users Management</h2>
                </div>
                <div class="pull-right d-none">
                    <a class="btn btn-success" href="{{ route('users.create') }}"> Create New User</a>
                </div>
            </div>
        </div>


        @if ($message = Session::get('success'))
        <div class="alert alert-success">
        <p>{{ $message }}</p>
        </div>
        @endif


        <table class="table table-bordered">
        <tr>
        <th>No</th>
        <th>Name</th>
        <th>Email</th>
        <th>Roles</th>
        <th width="280px">Action</th>
        </tr>
        @foreach ($data as $key => $user)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
            @if(!empty($user->getRoleNames()))
                @foreach($user->getRoleNames() as $v)
                <label class="badge badge-success">{{ $v }}</label>
                @endforeach
            @endif
            </td>
            <td>
            <!-- <a class="btn btn-xs btn-info" href="{{ route('users.show',$user->id) }}"><i class="fas fa-eye"></i></a> -->
            <a class="btn btn-xs btn-primary" href="{{ route('users.edit',$user->id) }}"><i class="fas fa-pencil-alt"></i></a>
                {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                <button type="submit" class="btn btn-xs btn-danger"><i class="fas fa-trash"></i></button>
                {!! Form::close() !!}
            </td>
        </tr>
        @endforeach
        </table>


        {!! $data->render() !!}
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @include('includes.admin.footer')
  @include('includes.admin.scripts')
  @stop