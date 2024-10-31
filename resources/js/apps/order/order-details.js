var    select1 = [];
var totalamount = 0;
$(document).ready(function(){


  
    // if($('#payment_status').val() === 'Paid'){

    //     $('#Btn-update').addClass('d-none');
    //     console.log($('#payment_status').val());
    // }
  

    var table ;
    var data = $('#dataval').data('data');

    var items = [];
    var count = 1;

    var prodall = $('#products').data('products');



  


    if (data.length > 0) {
        data.forEach(dat => {
            var array = {
                index: count++,
                product_id: dat.product_id,
                prod_name: dat.product_name,
                quantity: dat.quantity,
                brand_name:dat.brand_name,
                unit: dat.unit,
                total_amount: parseFloat(dat.total_amount)
            };
            items.push(array);
        });
    }


    $('#prodname').select2({
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

        // console.log(datas);
  

        $('#prodname').html(`<option value="${datas.id}"> ${datas.text}</option>`);
        $('#expirationdate').val(datas.expiration_date);
        $('#availablequan').val(datas.quantity);
        $('#sellprice').val(datas.selling_price);
        $('#unit').val(datas.unit);
        $('#brandname').val(datas.brand_name);

    });


    // Initialize DataTable
     table = $('#orders').DataTable({
        data: items,
        lengthMenu: [10, 25, 50],
        pageLength: 10,
        columns: [
            {
                data: null,
                render: function(data, type, row, meta) {
                    return row.index ;
                }
            },
            { data: 'prod_name' },
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
                    return '<span class="badge badge-primary">' + '₱'+formatNumber(parseFloat(data)) + '</span>';
                }
            },
            {
                data: null,
                render: function(data, type, row) {
                    return '<button class="btn btn-primary text-white edit " data-prod ="'+row.product_id+'" id="edit" data-id="' + row.index + '"><i class="icon-eye eye-icon"></i></button> ' +
                           '<button class="btn btn-danger text-white delete" id="delete" data-prod ="'+row.product_id+'" data-id="' + row.index + '"><i class="icon-trash trash-icon"></i></button>';
                }
            }
        ]
    });



    table.on('click','#btnAdd',function(){
        $('#prodname').prop('disabled', false);
        $('#prodname').val(null);
        $('#btnaddup').removeClass('d-none');
        // $('#exampleModalCenter').find('select').val(null);
        $('#exampleModalCenter').modal('show');
        $('#btnaddup').addClass('btn btn-primary');
        $('#btnaddup').addClass('btn btn-primary');
        $('#btnaddup').text('Save');
        $('#exampleModalCenter').find('input').val('');
       
    });

    $('#btnaddup').on('click', function() { 
    
        const productId = parseInt($('#prodname').val(), 10);
        
        const found = items.find((item) => item.product_id === productId);
    
        if ($('#Btn-save').text() === 'Save') {
    
            if ($(this).text() === 'Save') {

                if (found) {
                    // alert('Product already exists.');

                    Swal.fire({
                        title: 'Error!',
                        text: "Product already exists.",
                        icon: 'info', 
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Close'
                    });
                }
                else {


                    if ($('#prodname').val() && $('#unit').val() && $('#brandname').val() && $('#expirationdate').val() && $('#availablequan').val() && $('#sellprice').val() && $('#quantity').val() && parseFloat($('#totalpri').val())){

                
                    
                        var array = {
                            index: count++,
                            product_id: productId,
                            prod_name: $('#prodname option:selected').text(),
                            brand_name : $('#brandname').val(), 
                            unit : $('#unit').val(),
                            quantity: $('#quantity').val(),
                            total_amount: parseFloat($('#totalpri').val()) 
                        };
            
                        items.push(array);
                        table.row.add(array).draw(false);
                       
                        totalamounts(items);


                     
                    } else {
                        Swal.fire({
                            title: 'Error!',
                            text: "All fields are required. Please fill in all the fields.",
                            icon: 'warning', 
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'Close'
                        });
                        
                    }
                  
                }
            } else {
              




                if ($('#prodname').val() && $('#unit').val() && $('#brandname').val() && $('#expirationdate').val() && $('#availablequan').val() && $('#sellprice').val() && $('#quantity').val() && parseFloat($('#totalpri').val()) ) {
                    if (found) {
                    
                        found.prod_name = $('#prodname option:selected').text();
                        found.quantity = $('#quantity').val();
                        found.total_amount = parseFloat($('#totalpri').val());
            
                        let rowIndex = items.findIndex((item) => item.product_id === productId);
                        if (rowIndex !== -1) {
                            table.row(rowIndex).data(found).draw(false);
                        }
                        totalamounts(items);
                      
                    } else {
                        // alert('Product not found for update.');
                  

                        Swal.fire({
                            title: 'Error!',
                            text: "Product not found for update.",
                            icon: 'error', 
                            showCancelButton: false, // Remove cancel button
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'Close'
                        });
                        
                    }
                    
                } else {
                    
                    // alert('All fields are required. Please fill in all the fields.');
             

                    
                    Swal.fire({
                        title: 'Error!',
                        text: "All fields are required. Please fill in all the fields.",
                        icon: 'error', 
                        showCancelButton: false, // Remove cancel button
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Close'
                    });
                }
            }
        }
        else{
            if (found) {
                // alert('Product already exists.');

                Swal.fire({
                    title: 'Error!',
                    text: "Product already exists.",
                    icon: 'error', 
                    showCancelButton: false, // Remove cancel button
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Close'
                });
                
            } else {
                var array = {
                    index: count++,
                    product_id: productId,
                    prod_name: $('#prodname option:selected').text(), 
                    brand_name : $('#brandname').val(), 
                    unit : $('#unit').val(),
                    quantity: $('#quantity').val(),
                    total_amount: parseFloat($('#totalpri').val())
                };
                items.push(array);
                table.row.add(array).draw(false);
   
            }
        }
        
        
        
     // Hide modal and reset fields
     $('#exampleModalCenter').modal('hide');
     $('#expirationdate').val(null);
     $('#availablequan').val(null);
     $('#sellprice').val(null);
     $('#unit').val(null);
     $('#brandname').val(null);
     $('#quantity').val(null);
     $('#prodname').val(null);
    
    });
    


    // delete Complete
    let deletedItems = [];

    table.on('click', '.delete', function() {
        var id = $(this).data('id');

        const itemIndex = items.findIndex(({ index }) => index === id);
    
        if (itemIndex !== -1) {
           
            const deletedItem = items[itemIndex];
            deletedItems.push(deletedItem);
            items.splice(itemIndex, 1);
            table.row($(this).closest('tr')).remove().draw(false);


            totalamounts(items)
       
        } else {
            Swal.fire({
                title: 'Warning!',
                text: 'Item not found',
                icon: 'warning',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Close'
            });
        }
    });


    table.on('click', '.edit', function() {
        
        $('#prodname').prop('disabled', true);
        if($('#Btn-save').text() === 'Save'){
            // alert('SAVE NI');
            $('#btnaddup').removeClass('d-none');
            $('#btnaddup').text('Update');
        }
        else{
            // alert('UPDATE NI');
            $('#btnaddup').addClass('d-none');
        }

        var id = $(this).data('id');
        var ids = $(this).data('prod');
        // Clear all input fields
        $('#expirationdate').val(null);
        $('#availablequan').val(null);
        $('#sellprice').val(null);
        $('#unit').val(null);
        $('#brandname').val(null);
        $('#quantity').val(null);
      

        $('#exampleModalCenter').modal('show');
        const i = items.find(item => item.index === id);

        parseFloat($('#totalpri').val(i.total_amount))
        $('#prodname').html(`<option value="${i.product_id}">${i.prod_name}</option>`);
        $('#quantity').val(i.quantity);
        const p = prodall.find(item=> item.id === ids);
        $('#expirationdate').val(p.expiration_date);
        $('#availablequan').val(p.quantity);
        $('#sellprice').val(p.selling_price);
        $('#unit').val(p.unit);
        $('#brandname').val(p.brand_name);

   
    });
    
    $('#quantity').on('input', function() {
        var quan = parseFloat($(this).val()); 
        var putquan = parseFloat($('#availablequan').val());

        if($(this).val()==0){
  
            Swal.fire({
                title: 'Warning!',
                text: "You can only input positive numbers greater than zero..",
                icon: 'warning',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Close'
            });
            $(this).val('');
            return;
        }

        if (isNaN(quan) || isNaN(putquan)){
      
            return;
        }

        if (quan > putquan) {
            // alert('Quantity exceeds available stock');
            Swal.fire({
                title: 'Error!',
                text: "Quantity exceeds available stock.",
                icon: 'warning', 
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Okay'
            });
            

            

            
            $(this).val('');
            $('#totalpri').val(''); 
        }

        var sellingp = parseFloat($('#sellprice').val()); 
        if (isNaN(sellingp)) {
            $('#totalpri').val('');
            return;
        }
        var totalamount = sellingp * quan;
        $('#totalpri').val(totalamount);
    });




    $('#Btn-save').on('click',function(){



        var data = {
            po_no : $('#po_no').val(),
             terms: $('#terms').val(),
            address :$('#address').val(),
            delivered_date : $('#delivered_date').val(),
            deliveredto : $('#deliveredto').val(),
            fullname :$('#fullname').val(),
            contact_num :$('#contact_num').val(),
            deliveredby:$('#deliveredby').val(),
            or :$('#or').val(),
            cr:$('#cr').val(),
            collected_by:$('#collected_by').val(),
            email : $('#email').val(),
            lines : items
        };

        Swal.fire({
            title: 'Are you sure?',
            text: "Do you want to save this order(s)?",
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, save it!',
            cancelButtonText: 'No, cancel!'
        }).then((result) => {
            if (result.isConfirmed) {
                axios.post('/order/', data)
                    .then(response => {
                        var resp = response.data;
               
                        if (resp.success === true) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success!',
                                text: resp.message
                            }).then(() => {
                                window.location.href = '/order';
                                // location.reload();
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
                            text: error,
                        });
                    });
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire({
                    icon: 'info',
                    title: 'Cancelled',
                    text: 'Order was not save',
                });
            }
        });


    });
    $('#Btn-update').on('click',function(){
   
            var transNo = $('#products').data('transno');
                var datas = {
                    po_no : $('#po_no').val(),
                     terms: $('#terms').val(),
                    address :$('#address').val(),
                    delivered_date : $('#delivered_date').val(),
                    deliveredto : $('#deliveredto').val(),
                    fullname :$('#fullname').val(),
                    contact_num :$('#contact_num').val(),
                    deliveredby:$('#deliveredby').val(),
                    or :$('#or').val(),
                    cr:$('#cr').val(),
                    collected_by:$('#collected_by').val(),
                    email : $('#email').val()
                    // lines : items,
                    // deleted : deletedItems
                };
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "Do you want to update this order(s)?",
                        icon: 'info',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, update it!',
                        cancelButtonText: 'No, cancel!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            axios.put('/order/' + transNo,datas)
                                .then(response => {
                                    var resp = response.data;
                           
                                    if (resp.success === true) {
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Success!',
                                            text: resp.message
                                        }).then(() => {
                                            // window.location.href = '/order';
                                            location.reload();
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
                                text: 'Order was not update',
                            });
                        }
                    });
    
    });


    $('#Btn-delete').on('click', function() {
        var id = $('#products').data('transno');
   

        var data ={
            order : items
        };
        Swal.fire({
            title: 'Are you sure?',
            text: "Do you want to delete this order?",
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
                                window.location.href = '/order';

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


   

    if(!data){
        table.$('#delete').removeClass('d-none');
        $('#btnAdd').removeClass('d-none');
    }
    else{
        table.$('#delete').addClass('d-none');
        $('#btnAdd').addClass('d-none');
    }




    $('#Btn-back').on('click',function(){
        window.location.href = '/order';
    })


    totalamounts(items)



    $('#supportorderandpayment').text('Total amount');
    $('#remainbalance_parent').addClass('d-none');





});




