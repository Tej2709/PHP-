@extends('admin.layouts.dashboard')

@section('content')

<h1>Update the Role</h1>

@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>
            {{ $error }}
        </li>
        @endforeach
    </ul>
</div>
@endif


<form method="post" action="/roles/{{$role->id}}" enctype="multipart/form-data">
    @csrf
    @method('PATCH')

    <div class="form-group">
        <label for="role_name">Role name</label>
        <input type="text" name="role_name" class="form-control" placeholder="Role name" id="role_name" value="{{$role->name}}" required>
    </div>

    <div class="form-group">
        <label for="role_slug">Role Slug</label>
        <input type="text" name="role_slug" tag="role_slug" class="form-control" id="role_slug" placeholder="Role slug" value="{{$role->slug}}" required>
    </div>
    
    <div class="form-group">
        <label for="role_permission">Add Permission</label>
        <input type="text" data-role="tagsinput" name="roles_permissions" class="form-control" id="roles_permissions" value="@foreach($role->permissions as $permission) {{$permission->name. ","}} @endforeach">
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" value="Submit">
    </div>
    <a class="nav-link float-right" href="/roles">
        <i class="fa-solid fa-circle-arrow-left"></i>
        <span>Back</span>
    </a>
</form>

@section('css_role_page')
    <link rel="stylesheet" href="/css/admin/bootstrap-tagsinput.css">
@endsection

@section('js_role_page')
    <script src="/js/admin/bootstrap-tagsinput.js"></script>

    <script>
        $(document).ready(function(){
            $('#role_name').keyup(function(e){
                var str = $('#role_name').val();
                str = str.replace(/\W+(?!$)/g, '-').toLowerCase();//rplace stapces with dash
                $('#role_slug').val(str);
                $('#role_slug').attr('placeholder', str);
            });
        });
        
    </script>

@endsection
@endsection