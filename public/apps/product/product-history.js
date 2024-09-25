$(document).ready(function(){
    var id;
        $('#history').DataTable({
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
                        $('#history').DataTable().ajax.reload(); 
                       
                    } 
                },
                {
                    extend  : 'collection',
                    text    : '<i class="fa fa-fw fa-lg fa-print text-info"></i>',
                    className: 'btn px-2 py-1',
                    attr    : {'data-toggle': 'tooltip', 'title': 'Export'},
                    buttons: [
                        {extend: 'pdf', exportOptions: {columns: [1, 2, 3, 4, 5, 6,7]}},
                        {extend: 'excel', exportOptions: {columns: [1, 2, 3, 4, 5, 6,7]}},
                        {extend: 'print', exportOptions: {columns: [1, 2, 3, 4, 5, 6,7]}},
                        {extend: 'copy', exportOptions: {columns: [1, 2, 3, 4, 5, 6,7]}},
                        {extend: 'csv', exportOptions: {columns: [1, 2, 3, 4, 5, 6,7]}},
                    ]
                },
            ],
            ajax: {
                url: '/producthistory',
                dataSrc: ''
            },
            lengthMenu: [10, 25, 50,100,500], 
            pageLength: 50, 
            columns: [
                {
                    data: null,
                    render: function(data, type, row, meta) {
                        return meta.row + 1;
                    }
                },
                {
                    data : 'product_name'
                 },
                 {
                    data : 'brand_name'
                 },
                 {
                    data : 'mg'
                 },
                 {
                    data: function (row) {
                        return '₱' + row.selling_price;
                    }
                 },
                 {
                    data: function (row) {
                        return '₱' + row.original_price;
                    }
                 },
                 {
                    data: 'total_orders_quantity'
                 }, 
                 {
                    data: 'total_freebies_quantity'
                 },
                 {
                    data: null,
                    render: function (data, type, row) {
                        return '<span class="badge badge-primary text-white">'+data.total_quantity+'</span>' ;
                    }
                 },
                 {
                    data: 'created_by'
                 }, 
                 {
                    data: null,
                    render: function (data, type, row) {
                        return '<span class="text-warning">OUT OF STOCK(S)</span>' ;
                    }
                  },
                  {
                    data: null,
                    render: function (data, type, row) {
                        return '<button  class="btn btn-primary text-white edit" data-id="'+row.product_id+'"><i class="icon-pencil pencil-icon"> </i></button>';
                    }
                }
            ],  
            // order: [[0, 'desc']],
            select: true
        });


        $('#history').on('click','.edit',function(){

            $('#exampleModalCenter').modal('show');

            id =$(this).data('id');



        });


        $('#btn-submit').on('click',function(){


            Swal.fire({
                title: 'Are you sure?',
                text: "Do you want to add quantity of this product?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, add it!',
                cancelButtonText: 'No, cancel!'
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.put('/producthistory/' + id,{quantity : $('#quantity').val()})
                        .then(response => {
    
                           
                            var resp = response.data;
                     
                            if (resp.success ==true) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success!',
                                    text: resp.message
                                }).then(() => {
                                    window.location.href = "/producthistory";
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
                                title: 'Error',
                                text: error,
                            });
                        });
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    Swal.fire({
                        icon: 'info',
                        title: 'Cancelled',
                         text: 'Canceled to add quantity'
                    });
                }
            });


           

        })

});