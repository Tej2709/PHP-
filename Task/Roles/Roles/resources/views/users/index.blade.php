@extends('layouts.app')


@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-12 margin-tb">
      <div class="pull-left">
        <h2>Users Management</h2>
      </div>
      <br>
      <div class="pull-left">
        @can('user-create')
        <a class="btn btn-success" href="{{ route('users.create') }}"> Create New User</a>
        @endcan
      </div>
    </div>
  </div>
  <br>

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
      @if(auth()->user()->name=="Super Admin")
      <th>Roles</th>
      @endif

      @can('user-edit')
      <th width="180px">Action</th>
      @endcan


    </tr>

    @foreach ($data as $key => $user)
    <tr>
      <td>{{ ++$i }}</td>
      <td>{{ $user->name }}</td>
      <td>{{ $user->email }}</td>

      @if(auth()->user()->name=="Super Admin")
      <td>
        @if(!empty($user->getRoleNames()))
        @foreach($user->getRoleNames() as $v)
        <label class="">{{ $v }}</label>
        @endforeach
        @endif
      </td>
      @endif

      @can('user-edit')
      <td>
        
        <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
        @endcan

        <!--ROLE DEFINE ON ACTION BUTTON -->

        {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
        @can('user-delete')
        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        @endcan
        {!! Form::close() !!}
      </td>
    </tr>
    @endforeach
  </table>
</div>

{!! $data->render() !!}


@endsection