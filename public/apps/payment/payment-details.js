$(document).ready(function(){
   

    var payments = $('#payments').data('payment');
    var items = [];
 
    var transNo ;
    var table;
    var count = 0;

    if(payments != ''){
        
        payments.forEach(item => {
            array = {
                id : item.id,
                payment :  formatNumber(parseFloat(item.payment)),
                total_amount :  parseFloat(item.payment),
                payment_mode : item.payment_mode,
                number : item.number,
                created_by: item.fname + ' ' + item.lname,
                pay_date : item.pay_date,
                updated_by : item.updated_by,
                index : count++
            };

            transNo = item.order_transno;
            items.push(array);
        })
    }   


     // Function to show or hide number input based on payment method and set required attribute
     function toggleNumberInput() {
        const paymentMethod = $('#paymentmethod').val();
        if (paymentMethod === 'Cash') {
           
            $('#hidenum').hide(); 
            
        } else {
            $('.num').removeClass('d-none')
            $('#hidenum').show();  // Show number input for other payment methods
        }
    }
    
    // Function to validate the form
    function validateForm() {
        const paymentMethod = $('#paymentmethod').val();
        const payValue = $('#pay').val().trim();
        const serialNumber = $('#serialnumber').val().trim();
        const payDate = $('#pay_date').val().trim();
        
        // Check if payment method is not 'Cash'
        if (paymentMethod !== 'Cash') {
            // Validate the number input if the payment method is not 'Cash'
            if (!payValue) {
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Serial number is required.",
                });
                return false;
            }
            
            // Validate the serial number input
            if (!serialNumber) {
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Serial number is required.",
                });
                return false;
            }
        }
        
        // All validations passed
        return true;
    }
    
    toggleNumberInput();


    $('#paymentmethod').change(function() {
        toggleNumberInput();
    });







  
    table = $('#payment').DataTable({
        data: items,
        lengthMenu: [10, 25, 50],
        pageLength: 10,
        columns: [
            {
                data: null,
                render: function(data, type, row, meta) {
                    return meta.row + 1 ;
                }
            },
            {
                data: 'payment',
                render: function(data, type, row) {
                    // var parse = formatNumber(parseFloat(data));
                  
                    return '<span class="badge badge-primary">' + '₱'+data + '</span>';
                }
            },
            {
                data: 'payment_mode',
                render: function(data, type, row) {
                    return '<span class="badge badge-info">' + data + '</span>';
                }
            },
            {
                data: 'number',
                render: function(data, type, row) {
                    return '<span class="badge badge-info">' + data + '</span>';
                }
            },
            {
                data: 'pay_date',
             
            },
            {
                data: 'created_by',
                render: function(data, type, row) {
                    return '<span class="badge badge-primary">' +data+  '</span>';
                }
            },
            {
                data: 'updated_by',
                render: function(data, type, row) {
                    return '<span class="badge badge-primary">' +data+  '</span>';
                }
            },
            {
                data: null,
                render: function(data, type, row) {
                    return '<button class="btn btn-danger text-white delete" id="delete" data-id="' + row.id + '"><i class="icon-trash trash-icon"></i></button>';

                }
            }
        ]
    });

    table.on('click','#btnAdd',function(){
        $('#exampleModalCenter').modal('show');
    })

    if($('#stat').text() == 'Paid'){
        $('#btnAdd').hide();
    }

 
    var datatotal = $('#totalamounts').data('data');
   
    $('#totalamounts').text( '₱' + formatNumber(parseFloat(datatotal)));
    totalamounts(items);

    $('#paymentmethod').select2();

    var overalltotal =0;
    items.forEach(item => {
        overalltotal += item.total_amount
    });
    var t =  parseFloat($('#totalamounts').data('data') - overalltotal);
  
    $('#balance').text('₱' + formatNumber(parseFloat(t)));


    $('#btnaddup').on('click',function(){

        const payValue = parseFloat($('#pay').val());

        if (payValue <= 0) {
          
            Swal.fire({
                icon: "info",
                title: "Oops...",
                text: "Input must be greater than 0.",
              });
            return;
        } 
        else if (!validateForm()){
            return;
        }

        var alltotal = parseFloat($('#pay').val()) + overalltotal;
             var data = {
                order_transno : $('#payments').data('trans'),
                payment : $('#pay').val(),
                payment_mode : $('#paymentmethod').val(),
                total_all : alltotal,
                number : $('#serialnumber').val(),
                pay_date : $('#pay_date').val()
            } 

            Swal.fire({
                title: 'Are you sure?',
                text: "Do you want to save this payment?",
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, save it!',
                cancelButtonText: 'No, cancel!'
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.post('/payment/',data)
                        .then(response => {
                            var resp = response.data;
                   
                            if (resp.success === true) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success!',
                                    text: resp.message
                                }).then(() => {
                                    
                                    var appendarr = {
                                            id : null,
                                            payment :  formatNumber(parseFloat( $('#pay').val())),
                                            total_amount :  parseFloat(alltotal),
                                            payment_mode : $('#paymentmethod').val(),
                                            number : $('#serialnumber').val(),
                                            pay_date : $('#pay_date').val(),
                                            created_by: null,
                                            index : count++
                                    }
                                    items.push(appendarr);
                             

                                    if(empty(data.order_transno)){
                                       return window.location.href = '/payment';
                                    }
                                    window.location.href = '/payment/' + data.order_transno;
                                    table.clear();
                                    table.rows.add(items);
                                    table.draw();
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
                                    errorMessage = resp.response || 'An error occurred.';
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





    table.on('click','.delete',function(){
        var id = $(this).data('id');
        var orderitem;
        const foundIndex = items.findIndex((item) => item.id === id);

        if (foundIndex !== -1) {
            const deletedItem = items[foundIndex]; 
            items.splice(foundIndex, 1); 
        
            orderitem = deletedItem.id; 
        
        } else {
        }
        var totalall=0;
        items.forEach(item => {
            totalall += item.total_amount;
        });
        var trans = {
            trans_No :transNo,
            exact_amount : parseFloat($('#totalamounts').data('data')),
            total_amount : parseFloat(totalall)
        }
        Swal.fire({
            title: 'Are you sure?',
            text: "Do you want to delete this payment?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!'
        }).then((result) => {
            if (result.isConfirmed) {
                axios.post('/destroymodification/'+id,trans)
                    .then(response => {

                       
                        var resp = response.data;
                
                        if (resp.success === true) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success!',
                                text: resp.response
                            }).then(() => {
                                window.location.href = "/payment/"+ $('#payments').data('trans');
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: resp.response
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
                    text: 'Payment was not deleted',
            });
            }
        });

    })



    // mail invoice sent 
    $('#mail-sent').on('click',function(){
        var id = $('#payments').data('trans');

      

        Swal.fire({
            title: 'Are you sure?',
            text: "Do you want to send this invoice by email?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, mail it!',
            cancelButtonText: 'No, cancel!'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: 'Loading...',
                    text: 'Please wait',
                    icon: 'info',
                    allowOutsideClick: false,
                    showConfirmButton: false,
                    willOpen: () => {
                        Swal.showLoading();
                    }
                });


                axios.get('/paymentemail/' + id)
                .then(response => {
                    var resp = response.data;
                    swal.close();
                    if(resp.success == true){
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: resp.message
                        }).then(() => {
                            window.location.href = "/payment/"+ $('#payments').data('trans');
                        });
                    }else{
                        Swal.fire({
                            icon: 'error',
                            title: 'error!',
                            text: resp.message
                        }).then(() => {
                            window.location.href = "/payment/"+ $('#payments').data('trans');
                        });
                    }
        
                }).catch(error => {
                    Swal.fire({
                        icon: 'error',
                        title: 'Opppss!!!!',
                        text: error
                    }).then(() => {
                        window.location.href = "/payment/"+ $('#payments').data('trans');
                    });
                })
            }
        });

    }); 



});