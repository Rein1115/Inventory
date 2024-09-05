$(document).ready(function(){
   

    var payments = $('#payments').data('payment');
    var items = [];
    console.log(payments);
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

    // console.log(items);

    console.log(transNo);
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
                    console.log(data);
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


                    // return '<button class="btn btn-primary text-white edit id="edit" data-id="' + row.id + '"><i class="icon-pencil pencil-icon"></i></button> '

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

        if($('#pay').val() == 0){
            alert('Input greater than 0.');
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
                                    // console.log(items);
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
            console.log('Item removed');
        } else {
            console.log('Item not found');
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


    

});