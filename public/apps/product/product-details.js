$(document).ready(function() {
    var id ;



    // Start supplier
    $.ajax({
        url: '/selectsupplier',
        dataType: 'json',
        success: function(data) {
         
            var defaultOption = {
                id: '',
                text: 'Select a supplier'
            };

            // Initialize Select2 with the default option and fetched data
            $('#suppliername').select2({
                data: [defaultOption].concat(data.map(function(item) {
                    return {
                        id: item.fname + ' ' + item.lname,
                        text: item.fname + ' ' + item.lname
                    };
                })),
                placeholder: 'Select a supplier',
                minimumInputLength: 0 // Allow search immediately
            });
        },
        error: function() {
            alert('Failed to load data');
        }
    });
    // End supplier



      // Start brand
      $.ajax({
        url: '/selectbrand',
        dataType: 'json',
        success: function(data) {
         
            var defaultOption = {
                id: '',
                text: 'Select supplier'
            };

            // Initialize Select2 with the default option and fetched data
            $('#brandname').select2({
                data: [defaultOption].concat(data.map(function(item) {
                    return {
                        id: item.brand_name,
                        text: item.brand_name
                    };
                })),
                placeholder: 'Select brand',
                minimumInputLength: 0 // Allow search immediately
            });
        },
        error: function() {
            alert('Failed to load data');
        }
    });
    // End branch


    $('#Btn-save').on('click',function(){
        var data = {
            product_name : $('#product_name').val(),
            supplier_name : $('#suppliername').val(),
            expiration_date : $('#expiration_date').val(),
            original_price : $('#originalp').val(),
            selling_price  : $('#sellingp').val(),
            status : $('#status').val(),
            brand_name : $('#brandname').val(),
            quantity :  $('#quantity').val(),
            originalquan : $('#quantity').val(),
            mg : $('#mg').val()
        };

        // axios.post('/product',data)
        // .then(response => {
        //     console.log(response);
        // });

        Swal.fire({
            title: 'Are you sure?',
            text: "Do you want to save this product?",
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, save it!',
            cancelButtonText: 'No, cancel!'
        }).then((result) => {
            if (result.isConfirmed) {
                axios.post('/product', data)
                    .then(response => {

                        console.log(response);
                        var resp = response.data;
               
                        if (resp.success === true) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success!',
                                text: resp.message
                            }).then(() => {
                                window.location.href = '/product';
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
                    text: 'Product was not save',
                });
            }
        });


        
    });
    

    $('#Btn-update').on('click',function(){
        var id = $('#id').data('id');
        alert(id);
        var data = {
            product_name : $('#product_name').val(),
            supplier_name : $('#suppliername').val(),
            expiration_date : $('#expiration_date').val(),
            original_price : $('#originalp').val(),
            selling_price  : $('#sellingp').val(),
            status : $('#status').val(),
            brand_name : $('#brandname').val(),
            quantity :  $('#quantity').val(),
            originalquan : $('#quantity').val(),
            mg : $('#mg').val()
        };


        Swal.fire({
            title: 'Are you sure?',
            text: "Do you want to update this product?",
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, update it!',
            cancelButtonText: 'No, cancel!'
        }).then((result) => {
            if (result.isConfirmed) {
                axios.put('/product/' + id, data)
                    .then(response => {
                        var resp = response.data;
               
                        if (resp.success === true) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success!',
                                text: resp.message
                            }).then(() => {
                                window.location.href = '/product';
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
                    text: 'Product was not updated',
                });
            }
        });


        
    });


    $('#Btn-delete').on('click', function() {
        var id = $(this).data('id');
        alert(id);
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
                                window.location.href = "/product";
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



    $('#status').select2();





    
    $('#Btn-back').on('click',function(){
        window.location.href = '/product';
    })
    


});
