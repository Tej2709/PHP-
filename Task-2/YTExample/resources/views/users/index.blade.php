@extends('admin.layouts.dashboard')

@section('content')

<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-modal/2.2.6/js/bootstrap-modalmanager.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"></script>
</head>
<div class="row py-lg-2">
    <div class="col-md-6">
        <h2> This is user list </h2>
    </div>
    <div class="col-md-6">
        <a href="users/create" class="btn btn-primary btn-ig float-md-right" role="button" aria-pressed="true">Create New User</a>
    </div>
</div>

<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-table"></i>
        User's List
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Permission</th>
                        <th>Tools</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Permission</th>
                        <th>Tools</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{$user['id']}}</td>
                        <td>{{$user['name']}}</td>
                        <td>{{$user['email']}} </td>
                        <td>

                            @foreach ($user->roles as $role)
                            <span class="badge badge-secondary">
                                {{ $role['name'] }}
                            </span>
                            @endforeach

                        </td>
                        <td>

                            @if($user->permissions->isNotEmpty())
                            @foreach ($user->permissions as $permission)
                            <span class="badge badge-secondary">
                                {{$permission->name}}
                            </span>
                            @endforeach

                            @endif
                        </td>
                        <td>
                            <a href="/users/{{$user['id']}}"><i class="fa fa-eye"></i></a>
                            <a href="/users/{{$user['id'] }}/edit"><i class="fa fa-edit"></i></a>
                            <a href="#" data-toggle="modal" data-target="#deleteModal" data-userid="{{$user['id']}}"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!--delete Models -->
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete this? </h5>
                        <button class="close" type="button" data-dimiss="modal">Cancel</button>
                        <form method="post" action="">
                            @method('DELETE')
                            @csrf
                            <!-- <input type="hidden" id="user_id" name="user_id" value=""> -->
                            <a class="btn btn-primary" onclick="$(this).closest('form').submit();">Delete</a>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="card-footer small text-muted">Updated </div>
</div>

@section('js_user_page')

<script src="/js/admin/demo/chart-area-demo.js"></script>
<script src="/vendor/chart.js/Chart.min.js"></script>
<script>
    $('#deleteModal').on('shown.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var user_id = button.data('userid')

        var modal = $(this)
        modal.find('.modal-footer #user_id').val(user_id)
        modal.find('form').attr('action', '/users/' + user_id);
    })
</script>

@endsection

@endsection