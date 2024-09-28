$(document).ready(function(){

    $('#btnfree').on('click',function(){
        $('#modalfreebies').modal('show');
    })
    var freebiestable;
    if($('#products').data('transno') != ''){
        $('#btnfree').removeClass('d-none');
        freebiestable = $('#freebiestable').DataTable({
            // dom             : 'Bflrtip',
            processing      : true,
            responsive      : true,
            async           : true,
            language        : {
                processing  : '<i class="fa fa-spinner fa-spin fa-3x fa-fw text-secondary"></i><br><span class="sr-only font-weight-bold text-secondary">Loading...</span> ',
                lengthMenu  : 'Display _MENU_ records',
                search      : 'Search ',
                emptyTable  : '<span class="text-secondary font-12px-bold">No available record to show</span>',
            },
            // data : item,
            ajax: {
                url: '/freebies/'+$('#products').data('transno'),
                dataSrc: ''
            },
            lengthMenu: [10, 25, 50],
            pageLength: 10,
            columns: [
                {
                    data: null,
                    render: function(data, type, row, meta) {
                        return meta.row + 1; // Row index starting from 1
                    }
                },
                { data: 'product_name' },
                { data: 'brand_name' },
                { data: 'unit' },
                {
                    data: 'quantity',
                    render: function(data, type, row) {
                        return '<span class="badge badge-primary">' + data + '</span>';
                    }
                },
                {
                    data: 'total_amount',
                    render: function(data, type, row) {
                        return '<span class="badge badge-primary">'  +'₱ 0.00' + '</span>';
                    }
                },
                { data: 'created_by' },
                {
                    data: 'btn',
                }
            ],
       
        });
    }


    $('#freebies-quantity').on('input', function() {
        const quantity = Number($(this).val());
        const availableQuantity = Number($('#freebies-availablequan').val());
    
        if (quantity <= 0 || quantity > availableQuantity) {
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: 'Enter a positive number and less than or equal to the available quantity.'
            });
    
            $(this).val('');
            return;
        }
    });

    $('#freebies-prodname').select2({
        ajax: {
            url: '/Productslist',
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    search: params.term // Send the search term to the server
                };
            },
            processResults: function (data) {
                return {
                    results: data // The response should be in the format expected by Select2
                };
            },
            cache: true
        },
        placeholder: 'Select a product',
        minimumInputLength: 0 // Minimum length of input before making a request
    }).on('select2:select',function(e){
          
        var datas = e.params.data;


        $('#freebies-prodname').html(`<option value="${datas.id}"> ${datas.text}</option>`);
        $('#freebies-expirationdate').val(datas.expiration_date);
        $('#freebies-availablequan').val(datas.quantity);
        $('#freebies-sellprice').val(datas.selling_price);
        $('#freebies-unit').val(datas.unit);
        $('#freebies-brandname').val(datas.brand_name);

    });

    // delete 
    freebiestable.on('click','.freedelete',function(){
     
        var id = $(this).data('freeid');    
        var freequantity = $(this).data('freequantity');


        var data = {
            quantity:freequantity
        };
        Swal.fire({
            title: 'Are you sure?',
            text: "Do you want to delete this freebies?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!'
        }).then((result) => {
            if (result.isConfirmed) {
                axios.delete('/freebies/'+id,{data})
                    .then(response => {
                    
                        var resp = response.data;
                
                        if (resp.success === true) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success!',
                                text: resp.message
                            }).then(() => {
                                $('#freebiestable').DataTable().ajax.reload();
                                $('#freebies-quantity').val('');
                                $('#freebies-prodname').empty();
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
                    text: 'Freebies was not deleted',
                });
            }
        });
    }); 
    





    $('#freebiessave').on('click',function(){

        var data = { 
            "trans_No" : $('#products').data('transno'),
            "product_id" : $('#freebies-prodname').val(),
            "quantity" : $('#freebies-quantity').val() 
        };

        var quantity = parseFloat($('#freebies-quantity').val());
        var availableQuantity = parseFloat($('#freebies-availablequan').val());

        if (isNaN(quantity) || quantity <= 0) {
            Swal.fire({
                title: 'Warning!',
                text: "You can only input positive numbers greater than zero.",
                icon: 'warning',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Close'
            });
            $('#freebies-quantity').val('');
            return;
        }

        if (quantity > availableQuantity) {
            Swal.fire({
                title: 'Error!',
                text: "Quantity exceeds the available amount.",
                icon: 'error',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Close'
            });
            return;
        }
        Swal.fire({
            title: 'Are you sure?',
            text: "Do you want to save this freebies?",
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, save it!',
            cancelButtonText: 'No, cancel!'
        }).then((result) => {
            if (result.isConfirmed) {
                axios.post('/freebies/',data)
                    .then(response => {
                        var resp = response.data;
                 
                        if (resp.success === true) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success!',
                                text: resp.message
                            }).then(() => {
                                $('#freebiestable').DataTable().ajax.reload();
                                $('#freebies-quantity').val('');
                                $('#freebies-prodname').empty();
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
                            }).then(()=>{
                                $('#freebiestable').DataTable().ajax.reload();
                                $('#freebies-quantity').val('');
                                $('#freebies-prodname').empty();
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


