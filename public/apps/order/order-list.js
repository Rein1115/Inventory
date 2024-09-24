$(document).ready(function(){
    $('#order').DataTable({
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
                    $('#order').DataTable().ajax.reload(); 
                   
                } 
            },
            {
                text    : '<i class="fa fa-fw fa-lg fa-plus-square text-info"></i>',
                className: 'btn px-2 py-1',
                attr    : {'data-toggle': 'tooltip', 'title': 'Create New'},
                action  : function(e,dt,node,config){
                    window.location.href = '/order/create';
                } 
            },
            {
                extend  : 'collection',
                text    : '<i class="fa fa-fw fa-lg fa-print text-info"></i>',
                className: 'btn px-2 py-1',
                attr    : {'data-toggle': 'tooltip', 'title': 'Export'},
                buttons: [
                    {extend: 'pdf', exportOptions: {columns: [1, 2, 3, 4, 5, 6]}},
                    {extend: 'excel', exportOptions: {columns: [1, 2, 3, 4, 5, 6]}},
                    {extend: 'print', exportOptions: {columns: [1, 2, 3, 4, 5, 6]}},
                    {extend: 'copy', exportOptions: {columns: [1, 2, 3, 4, 5, 6]}},
                    {extend: 'csv', exportOptions: {columns: [1, 2, 3, 4, 5, 6]}},
                ]
            },
        ],
        ajax: {
            url: 'order',
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
            { 
                data: null,
                render: function (data, type, row) {
                    return '<span class="badge badge-primary">' + row.or + '</span>';
                }
            },
            {
                data : 'address'
             },
            //  {
            //     data: 'terms'
            //  },
             {
                data: null,
                render: function (data, type, row) {
                    return '<span class="badge badge-primary"> ' +  row.terms
                    + '</span>';
                }
            },

            { data : 'deliveredto'},
            {data:'created_at'},
            {
                data: null,
                render: function (data, type, row) {
                    return '<span class="badge badge-primary">'+data.created_by+'</span>';
                }
            },
            {
                data: null,
                render: function (data, type, row) {
                    return '<span class="badge badge-primary">' + (data.updated_by === undefined ? "0" : data.updated_by) + '</span>';
                }
            },            
            {
                render: function (data, type, row) {
                    return '<a href="/order/'+row.trans_no+'" class="btn btn-primary text-white edit" id="edit"     data-id="'+row.trans_no+'"><i class="icon-pencil pencil-icon"> </i></a>' + ' ' +
                           '<button  class="btn btn-danger text-white delete" data-id="'+row.trans_no+'"><i class="icon-trash trash-icon"> </i></button>';
          
                }
            }


            
        ],
        // order: [[0, 'desc']],
        // select: true
    });



    $('#order').on('click', '.delete', function() {
        var id = $(this).data('id');
        var arrayob = [];
     
        var info = $('#alldas').data('datas');
   


     
        info.forEach(item => { 
            if(item.trans_no === id){
                let result = {
                    quantity : item.quantity,
                    product_id : item.product_id
                }
                arrayob.push(result);
            }
        }); 

  

        var data ={
            order : arrayob
        };
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
                axios.delete('/order/'+id, {data})
                    .then(response => {
                        var resp = response.data;
                
                        if (resp.success === true) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success!',
                                text: resp.message
                            }).then(() => {
                                $('#order').DataTable().ajax.reload();

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





});


