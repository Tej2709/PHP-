@extends('admin.layouts.dashboard')

@section('content')
<div class="row py-lg-2">
    <div class="col-md-6">
        <h2>This is Category List</h2>
    </div>
    <div class="col-md-6">
        <a href="/category/create" class="btn btn-info btn-md float-md-right" role="button" aria-pressed="true">Create New Category</a>
    </div>
    <br>
    <!-- DataTables Example -->
    <div class="card mb-3"style="width:100% !important;">

        <div class="card-body" >
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Category Name</th>
                            <th>Active</th>
                            <th>Tools</th>
                        </tr>
                    </thead>
                
                    <tbody>
                    @foreach($category as $key => $value)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $value->cname }}</td>
                            <td>{{ $value->active }}</td>
                            <td>
                            <a href="/category/{{ $value['id'] }}/edit"><i class="fa fa-edit"></i></a>
                            <a href="#" data-toggle="modal" data-target="#deleteModal" data-categoryid="{{$value['id']}}"><i class="fas fa-trash-alt"></i></a>
                        </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- delete Modal-->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are you shure you want to delete this?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "delete" If you realy want to delete this Category.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <form method="POST" action="">
                        @method('DELETE')
                        @csrf
                        {{-- <input type="hidden" id="role_id" name="role_id" value=""> --}}
                        <a class="btn btn-primary" onclick="$(this).closest('form').submit();">Delete</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @section('js_category_page')

    <script>
        $('#deleteModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var category_id = button.data('categoryid')

            var modal = $(this)
            // modal.find('.modal-footer #role_id').val(role_id)
            modal.find('form').attr('action', '/category/' + category_id);
        });
    </script>

    @endsection
</div>
    @endsection
    