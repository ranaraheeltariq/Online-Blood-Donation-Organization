$('#addRoleButton').click(function() {
    var guard = $("input[type='radio']:checked").val();
    var permission = $('select#addPermission').val();
    var name = $("#addName").val();
    // alert(name+" "+guard+" "+permission);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            // '_method': 'PUT'
        }
    });
    $.ajax({
        url: '/admin/roles',
        type: 'POST',
        dataType: 'json',
        data: {
            name:name,
            guard:guard,
            permission:permission,
        },
        success: function(result){
            swal({
                title: "Role Added!",
                text: result,
                icon: "success",
                buttons: {
                    confirm: {
                        text: "Done",
                        value: true,
                        visible: true,
                        className: "btn btn-success",
                        closeModal: true
                    }
                }
            });
            $('#addRoleModal').modal('hide');
            location.reload();
        },
        error: function (err) {
            if (err.status == 422) {
                $.each(err.responseJSON.errors, function (i, error) {
                    var el = $(document).find('[name="'+i+'"]');
                    el.closest('.form-group').removeClass('has-success').addClass('has-error');
                    el.after($('<label id="agree-error" class="error" for="agree">'+error[0]+'</label>'));
                });
            }
        }
    });

});
$(document).on('click','.editRole',function() {
    var role = $(this).attr('value');
    $('#editRoleButton').attr('value',role);
    $.ajax({
        url: '/admin/role/'+role,
        type: 'GET',
        dataType: 'json',
        data: {},
        success: function(result){
            $("#editName").val(result.role.name);
           $("#editGuard"+result.role.guard_name).attr('checked','checked');

            $.each(result.permissions, function (i, value) {
                $("select option").each(function(){
                    if ($(this).text() == value.name){
                      $(this).attr("selected","selected");
                    }
                  });
            });
        },
        error: function (err) {
            alert(err.responseJSON.errors);
        }
    });
});
$('#editRoleButton').click(function() {
    var role = $(this).attr('value');
    var guard = $("input[name='editguard']:checked").val();
    var permission = $('select#editPermission').val();
    var name = $("#editName").val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            // '_method': 'PUT'
        }
    });
    $.ajax({
        url: '/admin/role/'+role,
        type: 'PUT',
        dataType: 'json',
        data: {
            name:name,
            guard:guard,
            permission:permission,
        },
        success: function(result){
            swal({
                title: "Role Updateed!",
                text: result,
                icon: "success",
                buttons: {
                    confirm: {
                        text: "Done",
                        value: true,
                        visible: true,
                        className: "btn btn-success",
                        closeModal: true
                    }
                }
            });
            $('#editRoleModal').modal('hide');
            setTimeout(
                function() 
                {
                   location.reload();
                }, 1000); 
        },
        error: function (err) {
            if (err.status == 422) {
                $.each(err.responseJSON.errors, function (i, error) {
                    var el = $(document).find('[name="'+i+'"]');
                    el.closest('.form-group').removeClass('has-success').addClass('has-error');
                    el.after($('<label id="agree-error" class="error" for="agree">'+error[0]+'</label>'));
                });
            }
        }
    });
});
$(document).on('click','.deleteRole',function(e) {
    var role = $(this).attr('value');
    swal({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        buttons:{
            confirm: {
                text : 'Yes, delete it!',
                className : 'btn btn-success'
            },
            cancel: {
                visible: true,
                className: 'btn btn-danger'
            }
        }
    }).then((Delete) => {
        if (Delete) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    // '_method': 'PUT'
                }
            });
            $.ajax({
                url: '/admin/role/'+role,
                type: 'DELETE',
                dataType: 'json',
                data: {},
                success: function(result){
                swal({
                    title: 'Deleted!',
                    text: result,
                    type: 'success',
                    buttons : {
                        confirm: {
                            className : 'btn btn-success'
                        }
                    }
                });
                setTimeout(
                    function() 
                    {
                       location.reload();
                    }, 1000);
                },
                error: function (err) {
                    if (err.status == 422) {
                        $.each(err.responseJSON.errors, function (i, error) {
                            alert(error);
                        });
                    }
                }
            });
        } else {
            swal.close();
        }
    });
});
$('#addPermissionButton').click(function() {
    var guard = $("input[name='permissionguard']:checked").val();
    var name = $("#addPermissionName").val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            // '_method': 'PUT'
        }
    });
    $.ajax({
        url: '/admin/permission',
        type: 'POST',
        dataType: 'json',
        data: {
            name:name,
            guard:guard,
        },
        success: function(result){
            swal({
                title: "Permission Added!",
                text: result,
                icon: "success",
                buttons: {
                    confirm: {
                        text: "Done",
                        value: true,
                        visible: true,
                        className: "btn btn-success",
                        closeModal: true
                    }
                }
            });
            $('#addPermissionModal').modal('hide');
            location.reload();
        },
        error: function (err) {
            if (err.status == 422) {
                $.each(err.responseJSON.errors, function (i, error) {
                    var el = $(document).find('[name="'+i+'"]');
                    el.closest('.form-group').removeClass('has-success').addClass('has-error');
                    el.after($('<label id="agree-error" class="error" for="agree">'+error[0]+'</label>'));
                });
            }
        }
    });

});
$(document).on('click','.editPermission',function() {
    var permission = $(this).attr('value');
    $('#editPermissionButton').attr('value',permission);
    $.ajax({
        url: '/admin/permission/'+permission,
        type: 'GET',
        dataType: 'json',
        data: {},
        success: function(result){
            $("#editPermissionName").val(result.name);
           $("#editPermissionGuard"+result.guard_name).attr('checked','checked');
        },
        error: function (err) {
            alert(err.responseJSON.errors);
        }
    });
});
$('#editPermissionButton').click(function() {
    var permission = $(this).attr('value');
    var guard = $("input[name='editpermissionguard']:checked").val();
    var name = $("#editPermissionName").val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            // '_method': 'PUT'
        }
    });
    $.ajax({
        url: '/admin/permission/'+permission,
        type: 'PUT',
        dataType: 'json',
        data: {
            name:name,
            guard:guard,
        },
        success: function(result){
            swal({
                title: "Permission Updateed!",
                text: result,
                icon: "success",
                buttons: {
                    confirm: {
                        text: "Done",
                        value: true,
                        visible: true,
                        className: "btn btn-success",
                        closeModal: true
                    }
                }
            });
            $('#editPermissionModal').modal('hide');
            setTimeout(
                function() 
                {
                   location.reload();
                }, 1000); 
        },
        error: function (err) {
            if (err.status == 422) {
                $.each(err.responseJSON.errors, function (i, error) {
                    var el = $(document).find('[name="'+i+'"]');
                    el.closest('.form-group').removeClass('has-success').addClass('has-error');
                    el.after($('<label id="agree-error" class="error" for="agree">'+error[0]+'</label>'));
                });
            }
        }
    });
});
$(document).on('click','.deletePermission',function(e) {
    var permission = $(this).attr('value');
    swal({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        buttons:{
            confirm: {
                text : 'Yes, delete it!',
                className : 'btn btn-success'
            },
            cancel: {
                visible: true,
                className: 'btn btn-danger'
            }
        }
    }).then((Delete) => {
        if (Delete) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    // '_method': 'PUT'
                }
            });
            $.ajax({
                url: '/admin/permission/'+permission,
                type: 'DELETE',
                dataType: 'json',
                data: {},
                success: function(result){
                swal({
                    title: 'Deleted!',
                    text: result,
                    type: 'success',
                    buttons : {
                        confirm: {
                            className : 'btn btn-success'
                        }
                    }
                });
                setTimeout(
                    function() 
                    {
                       location.reload();
                    }, 1000);
                },
                error: function (err) {
                    if (err.status == 422) {
                        $.each(err.responseJSON.errors, function (i, error) {
                            alert(error);
                        });
                    }
                }
            });
        } else {
            swal.close();
        }
    });
});