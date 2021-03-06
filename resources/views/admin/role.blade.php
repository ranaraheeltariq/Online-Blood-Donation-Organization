@extends('layouts.admin')
@section('title','User Role')

@section('content')
            {{-- ROW STARTED --}}
            <div class="row">
                {{-- TABLE SECTION STARTED --}}
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">@yield('title')</h4>
                                <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRoleModal">
                                    <i class="fa fa-plus"></i>
                                    Add @yield('title')
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            {{-- START Modal --}}
                            <div class="modal fade" id="addRoleModal" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
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
                                            <p class="small">Create a new Role using this form, make sure you fill them all</p>
                                            <form>
                                                <div class="row">

                                                    <div class="col-sm-12">
                                                        <div class="form-group form-group-default">
                                                            <label>Role Name</label>
                                                            <input id="addName" name="name" type="text" class="form-control" placeholder="fill name">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="form-group form-group-default">
                                                            <label>Guard Name</label>
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" id="addGuard" name="guard" value="admin" class="custom-control-input" checked>
                                                                <label class="custom-control-label" for="addGuard">Admin</label>
                                                            </div>
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" id="addGuard2" name="guard" value="web" class="custom-control-input">
                                                                <label class="custom-control-label" for="addGuard2">Web</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="form-group form-group-default">
                                                            <label>Permissions</label>
                                                            <div class="select2-input select2-warning">
                                                                <select id="addPermission" name="permission[]" class="form-control" multiple="multiple" style="width: 100%">
                                                                    <option value="">&nbsp;</option>
                                                                    @foreach ($permissions as $permission)
                                                                    <option>{{$permission->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer no-bd">
                                            <button type="button" id="addRoleButton" class="btn btn-primary">Add</button>
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
                                            <th style="width: 20%">Role Name</th>
                                            <th style="width: 10%">User Guard</th>
                                            <th>Permissions</th>
                                            <th style="width: 10%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($roles as $role)
                                        <tr>
                                            <td>{{$role->id}}</td>
                                            <td>{{$role->name}}</td>
                                            <td>{{$role->guard_name}}</td>
                                            <td>
                                            @foreach ($role->permissions as $permission)
                                            {{$permission->name}},
                                            @endforeach
                                            </td>
                                            <td>
                                                <div class="form-button-action">
                                                    <button type="button" id="editRole" value="{{$role->id}}" data-target="#editRoleModal" data-toggle="modal" title="" class="btn btn-link btn-primary btn-lg editRole" data-original-title="Edit Role">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <button type="button" id="deleteRole" value="{{$role->id}}" data-toggle="tooltip" title="" class="btn btn-link btn-danger deleteRole" data-original-title="Remove">
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
                            <div class="modal fade" id="editRoleModal" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header no-bd">
                                            <h5 class="modal-title">
                                                <span class="fw-bold">
                                                Edit @yield('title')</span>
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p class="small">Update Role using this form, make sure you fill them all</p>
                                            <form>
                                                <div class="row">

                                                    <div class="col-sm-12">
                                                        <div class="form-group form-group-default">
                                                            <label>Role Name</label>
                                                            <input id="editName" name="name" type="text" class="form-control" placeholder="fill name">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="form-group form-group-default">
                                                            <label>Guard Name</label>
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" id="editGuardadmin" name="editguard" value="admin" class="custom-control-input">
                                                                <label class="custom-control-label" for="editGuardadmin">Admin</label>
                                                            </div>
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" id="editGuardweb" name="editguard" value="web" class="custom-control-input">
                                                                <label class="custom-control-label" for="editGuardweb">Web</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="form-group form-group-default">
                                                            <label>Permissions</label>
                                                            <div class="select2-input select2-warning">
                                                                <select id="editPermission" name="permission[]" class="form-control" multiple="multiple" style="width: 100%">
                                                                    <option value="">&nbsp;</option>
                                                                    @foreach ($permissions as $permission)
                                                                    <option value="{{$permission->name}}">{{$permission->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer no-bd">
                                            <button type="button" id="editRoleButton" class="btn btn-primary">Update</button>
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
        //SELECT 2
        $('#addPermission').select2({
            theme: "bootstrap"
        });
        $('#editPermission').select2({
            theme: "bootstrap"
        });

        // Add Row
        $('#add-row').DataTable({
            "pageLength": 10,
        });

    });
</script>
@endsection