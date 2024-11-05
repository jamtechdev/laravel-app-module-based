@extends('panel.layout.panel-app')
@section('title', 'Permission List')
@section('page1', 'User Management')
@section('page2', 'Permissions')
<style>
    #preloader {
    background-color: rgba(255, 255, 255, 0.8);
    display: flex;
    justify-content: center;
    align-items: center;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 9999;
}

#preloader img {
    width: 50px; /* Adjust the size of the loading spinner */
    height: 50px;
}
</style>
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <h5 class="pb-0 card-no-border card-header d-flex align-items-center justify-content-between">Permissions 
                    <a href="javascript:void(0)" class="au-btn--green m-b-9 sync-permissions">Sync Permissions</a></h5>
                <div class="card-body">
                    <div class="table-responsive">
                       
                        <table class="table" id="permission-table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Display Name</th>
                                    <th>Description</th>
                                    <th>Created At</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<!-- jquery-->
<script src="{{asset('assets/js/vendors/jquery/jquery.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var category_table = $('#permission-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('permissions.index') }}",
                beforeSend: function() {
                    $('#preloader').show(); 
                },
                complete: function() {
                    $('#preloader').hide(); 
                }
            },
            columns: [{
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'display_name',
                    name: 'display_name'
                },
                {
                    data: 'description',
                    name: 'description'
                },
                {
                    data: 'created_at',
                    name: 'created_at'
                }
            ]
        });

        $(document).on('click', '.sync-permissions', function () {
          
            $.ajax({
                url: "{{ route('permissions.sync') }}",
                type: 'POST',
                data: {
                    _method: 'POST',
                    _token: '{{ csrf_token() }}',
                },
                success: function (response) {
                    if (response.status) {
                        category_table.ajax.reload(null, false);
                        toastr.success(response.message);
                    }
                },
                error: function (xhr) {
                    toastr.error("An error occurred while updating the status.");
                }
            });
        });
    });
</script>