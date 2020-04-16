@extends('layouts.admin')
@section('title','User Permissions')

@section('content')

            {{-- ROW STARTED --}}
            <div class="row">
                {{-- TABLE SECTION STARTED --}}
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">@yield('title')</h4>
                                <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addPermissionModal">
                                    <i class="fa fa-plus"></i>
                                    Add @yield('title')
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            {{-- START Modal --}}
                            <div class="modal fade" id="addPermissionModal" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header no-bd">
                                            <h5 class="modal-title">
                                                <span class="fw-bold">
                                                New @yield('title')</span>
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p class="small">Create a new Permission using this form, make sure you fill them all</p>
                                            <form>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group form-group-default">
                                                            <label>Permission Name</label>
                                                            <input id="addPermissionName" name="name" type="text" class="form-control" placeholder="fill name">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group form-group-default">
                                                            <label>Guard Name</label>
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" id="addPermissionGuardadmin" name="permissionguard" value="admin" class="custom-control-input">
                                                                <label class="custom-control-label" for="addPermissionGuardadmin">Admin</label>
                                                            </div>
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" id="addPermissionGuardweb" name="permissionguard" value="web" class="custom-control-input">
                                                                <label class="custom-control-label" for="addPermissionGuardweb">Web</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer no-bd">
                                            <button type="button" id="addPermissionButton" class="btn btn-primary">Add</button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- END Modal --}}
                            {{-- START TABLE CONTENT --}}
                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover" >
                                    <thead>
                                        <tr>
                                            <th style="width: 10%">Id</th>
                                            <th style="width: 20%">Permission Name</th>
                                            <th style="width: 10%">User Guard</th>
                                            <th style="width: 10%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($permissions as $permission)
                                        <tr>
                                            <td>{{$permission->id}}</td>
                                            <td>{{$permission->name}}</td>
                                            <td>{{$permission->guard_name}}</td>
                                            <td>
                                                <div class="form-button-action">
                                                    <button type="button" id="editPermission" value="{{$permission->id}}" data-toggle="modal" data-target="#editPermissionModal" title="" class="btn btn-link btn-primary btn-lg editPermission" data-original-title="Edit Permission">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <button type="button" id="deletePermission" value="{{$permission->id}}" data-toggle="tooltip" title="" class="btn btn-link btn-danger deletePermission" data-original-title="Remove">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
        
                                    </tbody>
                                </table>
                            </div>
                            {{-- END TABLE CONTENT --}}
                             {{-- START EDIT MODEL --}}
                             <div class="modal fade" id="editPermissionModal" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header no-bd">
                                            <h5 class="modal-title">
                                                <span class="fw-bold">
                                                Update @yield('title')</span>
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p class="small">Update a Permission using this form, make sure you fill them all</p>
                                            <form>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group form-group-default">
                                                            <label>Permission Name</label>
                                                            <input id="editPermissionName" name="name" type="text" class="form-control" placeholder="fill name">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group form-group-default">
                                                            <label>Guard Name</label>
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" id="editPermissionGuardadmin" name="editpermissionguard" value="admin" class="custom-control-input">
                                                                <label class="custom-control-label" for="editPermissionGuardadmin">Admin</label>
                                                            </div>
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" id="editPermissionGuardweb" name="editpermissionguard" value="web" class="custom-control-input">
                                                                <label class="custom-control-label" for="editPermissionGuardweb">Web</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer no-bd">
                                            <button type="button" id="editPermissionButton" class="btn btn-primary">Update</button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- END EDIT MODEL --}}
                        </div>
                    </div>
                </div>
                {{-- TABLE SECTION END --}}
            </div>
            {{-- ROW CLOSED  --}}
@endsection
@section('js')
@parent
<script >
    $(document).ready(function() {
        // Add Row
        $('#add-row').DataTable({
            "pageLength": 10,
        });
    });
</script>
@endsection