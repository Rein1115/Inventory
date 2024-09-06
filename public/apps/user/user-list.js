$(document).ready(function() {

    
    $('#gender').select2();
    $('#role').select2();
    $('#user').DataTable({

        dom             : 'Bflrtip',
        processing      : true,
        // serverSide      : true,
        responsive      : true,
        async           : true,
        language        : {
            processing  : '<i class="fa fa-spinner fa-spin fa-3x fa-fw text-secondary"></i><br><span class="sr-only font-weight-bold text-secondary">Loading...</span> ',
            lengthMenu  : 'Display _MENU_ records',
            search      : 'Search ',
            emptyTable  : '<span class="text-secondary font-12px-bold">No available record to show</span>',
        },
        buttons: [
            {
                text    : '<i class="fa fa-fw fa-lg fa-refresh text-info"></i>',
                className: 'btn px-2 py-1',
                attr    : { 'data-toggle': 'tooltip', 'title': 'Reload' },
                action  : function(e,dt,node,config){ 
                    $('#user').DataTable().ajax.reload(); 
                   
                } 
            },
            {
                text    : '<i class="fa fa-fw fa-lg fa-plus-square text-info"></i>',
                className: 'btn px-2 py-1',
                attr    : {'data-toggle': 'tooltip', 'title': 'Create New'},
                action  : function(e,dt,node,config){
                    $('#exampleModalCenter').find('input').val('');
                    $('#exampleModalCenter').find('select').each(function() {
                        this.selectedIndex = 0; 
                    });
                    $('#exampleModalLongTitle').text('');
                    $('#saveandupdate').removeClass('btn btn-success');
                    $('#brandName').val('');
                    $('#exampleModalCenter').modal('show');
                    $('#saveandupdate').text('Save');
                    $('#saveandupdate').addClass('btn btn-primary');
                    $('#hiddensaveup').val('0');
                    $('#exampleModalLongTitle').text('Create User');
                } 
            },
            {
                extend  : 'collection',
                text    : '<i class="fa fa-fw fa-lg fa-print text-info"></i>',
                className: 'btn px-2 py-1',
                attr    : {'data-toggle': 'tooltip', 'title': 'Export'},
                buttons: [
                    {extend: 'pdf', exportOptions: {columns: [1, 2, 3]}},
                    {extend: 'excel', exportOptions: {columns: [1, 2,3]}},
                    {extend: 'print', exportOptions: {columns: [1, 2, 3]}},
                    {extend: 'copy', exportOptions: {columns: [1, 2, 3]}},
                    {extend: 'csv', exportOptions: {columns: [1, 2, 3]}},
                ]
            },
        ],
        ajax: {
            url: 'user',
            dataSrc: ''
        },
        lengthMenu: [10, 25, 500], // Pagination options
        pageLength: 500, // Default page length
        columns: [
            {
                data: null,
                render: function(data, type, row, meta) {
                    return meta.row + 1;
                }
            },
            { 
                data: null,
                render: function (data, type, row) {
                    return '<span class="badge badge-info">' + row.fullname + '</span>';
                }
            },
            { 
                data: 'gender'
            },
            { 
                data: null,
                render: function (data, type, row) {
                    return '<span class="badge badge-info">' + row.role + '</span>';
                }
            },
            { 
                data: null,
                render: function (data, type, row) {
                    return '<span class="badge badge-info">' + row.email + '</span>';
                }
            },
            {data: 'created_by'},
            {data: 'created_at'},
            {
                data: null,
                render: function (data, type, row) {
                    var showUrl = '/brand/' + row.id;
                    return '<button  class="btn btn-primary edit" id="edit" data-id="'+row.id+'"><i class="icon-pencil pencil-icon"> </i></button>' + ' ' +
                           '<button  class="btn btn-danger delete" data-id="'+row.id+'"><i class="icon-trash trash-icon"> </i></button>';
                }
            }
        ]
    });

    $('#user').on('click', '.edit', function() {
        $('#brandName').val('');
        $('#exampleModalLongTitle').text('Update Branch Name');
        var id = $(this).data('id');
        $('#exampleModalCenter').modal('show');
        $('#saveandupdate').text('Update');
        $('#saveandupdate').addClass('btn btn-success');

        $('#hiddensaveup').val(id);

       
        axios.get('/user/' + id)
        .then(response => {
            var resp = response.data;

         

            console.log(resp);

            $('#fname').val(resp.fname);
            $('#lname').val(resp.lname);

            $('#gender').html(`
                <option value="Male" ${resp.gender === 'Male' ? 'selected' : ''}>Male</option>
                <option value="Female" ${resp.gender === 'Female' ? 'selected' : ''}>Female</option>
            `);

            $('#role').html(`
                <option value="Admin" ${resp.role === 'Admin' ? 'selected' : ''}>Admin</option>
                <option value="User" ${resp.role === 'User' ? 'selected' : ''}>User</option>
            `);
            

            $('#status').html(`
                <option value="Inactive" ${resp.gender === 'Inactive' ? 'selected' : ''}>Inactive</option>
                <option value="Active" ${resp.gender === 'Active' ? 'selected' : ''}>Active</option>
            `);

            $('#email').val(resp.email);
            
        });
    });

    $('#brand').on('click', '.delete', function() {
        var id = $(this).data('id');
        
        Swal.fire({
            title: 'Are you sure?',
            text: "Do you want to delete this brand name?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!'
        }).then((result) => {
            if (result.isConfirmed) {
                axios.delete('brand/'+id)
                    .then(response => {
                        var resp = response.data;
                        console.log(resp);
                        if (resp.success === true) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success!',
                                text: resp.message
                            }).then(() => {
                                $('#brandName').val('');
                                $('#brand').DataTable().ajax.reload();

                            });
                        } else {
                       
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: resp.message
                            });
                        }
                    })
                    .catch(error => {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong! Please try again.',
                        });
                    });
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire({
                    icon: 'info',
                    title: 'Cancelled',
                    text: ' Brand name was not deleted!',
                });
            }
        });

    });
    


    $('#saveandupdate').on('click',function() {
        var Id =  $('#hiddensaveup').val();
        var textm = '';
        if(Id === '0'){
            textm = 'save';
        }else{
            textm = 'update';
        }
        const userData = {
            fname: $('#fname').val(),
            lname: $('#lname').val(),
            gender: $('#gender').val(),
            role: $('#role').val(),
            status: $('#status').val(),
            email: $('#email').val(),
            password: $('#password').val(),
            password_confirmation: $('#password_confirmation').val(),
        };


        Swal.fire({
            title: 'Are you sure?',
            text: "Do you want to "+textm+" this user?",
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, '+textm+ ' it!',
            cancelButtonText: 'No, cancel!'
        }).then((result) => {
            if (result.isConfirmed) {
                axios.put('user/' + Id, userData)
                    .then(response => {
                        var resp = response.data;
                        console.log(resp);
                        if (resp.success === true) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success!',
                                text: resp.response
                            }).then(() => {
                                $('#exampleModalCenter').modal('hide');
                                $('#user').DataTable().ajax.reload();
                            });
                        } else {
                            var errorMessage = 'Error!';
                            if (resp.response && typeof resp.response === 'object') {
                                var errors = [];
                                for (var key in resp.response) {
                                    if (resp.response[key] instanceof Array) {
                                        errors = errors.concat(resp.response[key]);
                                    }
                                }
                                errorMessage = errors.join(' ');
                            } else {
                                errorMessage = resp.message || 'An error occurred.';
                            }
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: errorMessage
                            });
                        }
                    })
                    .catch(error => {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong! Please try again.',
                        });
                    });
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire({
                    icon: 'info',
                    title: 'Cancelled',
                    text: 'User was not '+textm+' ',
                });
            }
        });
    });
    
    



});

