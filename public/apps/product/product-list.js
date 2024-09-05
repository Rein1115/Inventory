$(document).ready(function(){
    $('#product').DataTable({
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
                    $('#product').DataTable().ajax.reload(); 
                   
                } 
            },
            {
                text    : '<i class="fa fa-fw fa-lg fa-plus-square text-info"></i>',
                className: 'btn px-2 py-1',
                attr    : {'data-toggle': 'tooltip', 'title': 'Create New'},
                action  : function(e,dt,node,config){
                    window.location.href = '/product/create';
                } 
            },
            {
                extend  : 'collection',
                text    : '<i class="fa fa-fw fa-lg fa-print text-info"></i>',
                className: 'btn px-2 py-1',
                attr    : {'data-toggle': 'tooltip', 'title': 'Export'},
                buttons: [
                    {extend: 'pdf', exportOptions: {columns: [1, 2, 3, 4, 5, 6,7,8,9]}},
                    {extend: 'excel', exportOptions: {columns: [1, 2, 3, 4, 5, 6,7,8,9]}},
                    {extend: 'print', exportOptions: {columns: [1, 2, 3, 4, 5, 6,7,8,9]}},
                    {extend: 'copy', exportOptions: {columns: [1, 2, 3, 4, 5, 6,7,8,9]}},
                    {extend: 'csv', exportOptions: {columns: [1, 2, 3, 4, 5, 6,7,8,9]}},
                ]
            },
        ],
        ajax: {
            url: '/product',
            dataSrc: ''
        },
        lengthMenu: [10, 25, 50], 
        pageLength: 50, 
        columns: [
            {
                data: null,
                render: function(data, type, row, meta) {
                    return meta.row + 1;
                }
            },
            {  data:'product_name' },
            {  data:'brand_name' },
            { 
                data: null,
                render: function (data, type, row) {
                    return '<span class="badge badge-warning">' + row.quantity + '</span>';
                }
            },
            { data: 'mg'},
            { 
                data: null,
                render: function (data, type, row) {
                    return '<span class="badge badge-info text-white">' +row.expiration_date +'</span>';
                }
            },
            {
                data: null,
                render: function (data, type, row) {
                    // Use a ternary operator to choose the class based on row.status
                    var badgeClass = row.status === "Pending" ? "badge-danger" : "badge-success";
                    
                    // Return the HTML with the chosen class
                    return '<span class="badge ' + badgeClass + '">' + row.status + '</span>';
                }
            },
            { 
                data: null,
                render: function (data, type, row) {
                    return '<span class="badge badge-info">' +row.ufname + ' ' + row.ulname +'</span>';
                }
            },
            {data:'created_at'},
            {
                data: null,
                render: function (data, type, row) {
                    return '<a href="/product/'+row.id+'" class="btn btn-primary text-white edit" id="edit"     data-id="'+row.id+'"><i class="icon-pencil pencil-icon"> </i></a>' + ' ' +
                           '<button  class="btn btn-danger text-white delete" data-id="'+row.id+'"><i class="icon-trash trash-icon"> </i></button>' + ' '+ '<button  class="btn btn-secondary text-white view" data-id="'+row.id+'"><i class="icon-eye eye-icon"> </i></button>';
                }
            }
        ],
        order: [[0, 'desc']],
        select: true
    });

    $('#supplier').on('click','.edit',function(){
        $('#exampleModalLongTitle').text('Update Supplier');
        $('#exampleModalCenter').find('input').val('');
        $('#saveandupdate').text('Update');
        $('#saveandupdate').addClass('btn btn-success');
        $('#exampleModalCenter').modal('show');
        var id = $(this).data('id');

        $('#hiddensaveup').val(id);
        axios.get('supplier/'+id)
        .then(response=>{
            var resp = response.data.response;

            $('#fname').val(resp.fname);
            $('#lname').val(resp.lname);
            $('#gender').val(resp.gender);
            $('#company').val(resp.company);
            $('#contactno').val(resp.contact_no);
            $('#address').val(resp.address);
        });
    });

    $('#saveandupdate').on('click',function(){
       var id = $('#hiddensaveup').val();
       if(id === '0'){
        textm = 'save';
        }else{
        textm = 'update';
     }
       var data = {
        fname : $('#fname').val(),
        lname : $('#lname').val(),
        company :  $('#company').val(),
        gender : $('#gender').val(),
        contact_no : $('#contactno').val(),
        address : $('#address').val()
       };
            Swal.fire({
                title: 'Are you sure?',
                text: "Do you want to "+textm+" this supplier?",
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, '+textm+' it!',
                cancelButtonText: 'No, cancel!'
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.put('supplier/' + id, data)
                        .then(response => {
                            var resp = response.data;
                   
                            if (resp.success === true) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success!',
                                    text: resp.message
                                }).then(() => {
                                    $('#exampleModalCenter').find('input').val('');
                                    $('#exampleModalCenter').modal('hide');
                                    $('#supplier').DataTable().ajax.reload();
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
                        text: 'supplier was not '+textm+'',
                    });
                }
            });
    });

    $('#product').on('click', '.delete', function() {
        var id = $(this).data('id');
        Swal.fire({
            title: 'Are you sure?',
            text: "Do you want to delete this product?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!'
        }).then((result) => {
            if (result.isConfirmed) {
                axios.delete('/product/'+id)
                    .then(response => {

                        console.log(response);
                        var resp = response.data;
                
                        if (resp.success === true) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success!',
                                text: resp.message
                            }).then(() => {
                                $('#product').DataTable().ajax.reload();

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
                    text: 'Product was not deleted',
                });
            }
        });
    });


    $('#product').on('click', '.view', function() {
        var id = $(this).data('id');
        $('#exampleModalCenter').find('input').val('');
        $('#exampleModalCenter').modal('show');
        $.ajax({
            url: '/product',
            type: 'GET',
            success: function(response) {
                response.forEach(item => {
                    // console.log(item.id);
                    if(id === item.id){
                        console.log(item.ulname + ' ' + item.brand_name);

                        $('#prodname').val(item.product_name);
                        $('#suppliername').val(item.supplier_name);
                        $('#brandname').val(item.brand_name);
                        $('#mg').val(item.mg);
                        $('#origprice').val( '₱'+ ' ' + item.original_price);
                        $('#sellprice').val('₱'+' ' + item.selling_price);
                        $('#quantity').val(item.quantity);
                        $('#status').val(item.status); expirationDate
                        $('#expirationDate').val(item.expiration_date);
                        $('#createdby').val(item.ufname + ' ' + item.ulname);
                    }
                });
            },
            error: function(xhr, status, error) {
                console.error('There was an error!', error);
            }
        });
    });









});

