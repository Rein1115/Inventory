$(document).ready(function(){
   

    var payments = $('#payments').data('payment');
    var array =[];
    console.log(payments);
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
                btn : item.btn,
                index : count++
            };
            transNo = item.order_transno;
            items.push(array);
        })
    }   






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
                data: 'btn',
            }
        ]
    });



    table.on('click','.del',function(){
        var id = $(this).data('id');

        var data = {
            trans_No : $('#payments').data('trans')
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
                axios.post(base_url('modificationpaymenthistory/')+id,data)
                    .then(response => {
                        var resp = response.data;
                
                        if (resp.success === true) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success!',
                                text: resp.response
                            }).then(() => {
                                window.location.href = "/paymenthistory";
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


                axios.get(base_url('paymentemail/')+id)
                .then(response => {
                    var resp = response.data;
                    swal.close();
                    if(resp.success == true){
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: resp.message
                        }).then(() => {
                            window.location.href = "/paymenthistory/"+ $('#payments').data('trans');
                        });
                    }else{
                        Swal.fire({
                            icon: 'error',
                            title: 'error!',
                            text: resp.message
                        }).then(() => {
                            window.location.href = "/paymenthistory/"+ $('#payments').data('trans');
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