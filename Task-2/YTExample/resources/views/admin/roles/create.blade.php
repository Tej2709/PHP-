@extends('admin.layouts.dashboard')

@section('content')
<h1>Create New Role</h1>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif


<form method="post" action="/roles">
    {{ csrf_field() }}

    <div class="form-group">
        <label for="role_name">Role Name</label>
        <input type="text" name="role_name" class="form-control" placeholder="Role Name..." value="{{ old('role_name') }}">
    </div>

    <div class="form-group">
        <label for="role_slug">Role Slug</label>
        <input type="text" name="role_slug" tag="role_slug" class="form-control" id="role_slug" placeholder="Role Slug..." value="{{ old('role_slug') }}" required>
    </div>

    <div class="form-group">
        <label for="role_permissions">Add Permission</label>
        <input type="text" data-role="tagsinput" name="roles_permissions" class="form-control" id="roles_permission" placeholder="Permissions..." value="{{ old('roles_permissions') }}">
    </div>

    <div class="form-group pt-2">
        <input class="btn btn-primary" type="submit" value="Submit">
    </div>

    <a class="nav-link float-right" href="/roles">
        <i class="fa-solid fa-circle-arrow-left"></i>
        <span>Back</span>
    </a>
</form>

@section('css_role_page')

<link rel="stylesheet" href="/css/bootstrap-tagsinput.css">
@endsection

@section('js_role_page')

<script src="/js/bootstrap-tagsinput.js"></script>
<script>
    $(document).ready(function() {
        $('#role_name').keyup(function(e) {
            var str = $('#role_name').val();
            str = str.replace(/\W+(?!$)/g, '-').toLowerCase(); //rplace stapces with dash
            $('#role_slug').val(str);
            $('#role_slug').attr('placeholder', str);
        });
    });
</script>


@endsection

@endsection