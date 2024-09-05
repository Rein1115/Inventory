$(document).ready(function() {
    $('#brand').DataTable({

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
                    $('#supplier').DataTable().ajax.reload(); 
                   
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
                    $('#exampleModalLongTitle').text('Create Branch Name');
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
            url: 'brand',
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
            { data: 'brand_name' },
            { 
                data: null,
                render: function (data, type, row) {
                    return '<span class="badge badge-info">' + row.fname + ' ' + row.lname + '</span>';
                }
            },
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

    $('#brand').on('click', '.edit', function() {
        $('#brandName').val('');
        $('#exampleModalLongTitle').text('Update Branch Name');
        var id = $(this).data('id');
        $('#exampleModalCenter').modal('show');
        $('#saveandupdate').text('Update');
        $('#saveandupdate').addClass('btn btn-success');

        $('#hiddensaveup').val(id);
        axios.get('brand/' + id)
        .then(response => {
            var resp = response.data.response;
            console.log(resp);
            $('#brandName').val(resp.brand_name);
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

        var data = {
            brand_name: $('#brandName').val()
        };
        Swal.fire({
            title: 'Are you sure?',
            text: "Do you want to "+textm+" this brand name?",
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, '+textm+ ' it!',
            cancelButtonText: 'No, cancel!'
        }).then((result) => {
            if (result.isConfirmed) {
                axios.put('brand/' + Id, data)
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
                                $('#exampleModalCenter').modal('hide');
                                $('#brand').DataTable().ajax.reload();
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
                    text: 'Your brand name was not '+textm+' ',
                });
            }
        });
    });
    
    



});

