$(document).ready(function() {




    $('#originalp').on('input', function(){
        let value = $(this).val();
        
        value = value.replace(/[^0-9.]/g, '');
    
       
        if (parseFloat(value) <= 0 || isNaN(value)) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Please enter a positive number or greater then zero!',
            });
            value = ''; 
        }
    
        $(this).val(value);
    });
    
    $('#sellingp').on('input', function(){
        let value = $(this).val();
        
        value = value.replace(/[^0-9.]/g, '');
    
       
        if (parseFloat(value) <= 0 || isNaN(value)) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Please enter a positive number or greater then zero!',
            });
            value = ''; 
        }
    
        $(this).val(value);
    });
    

    $('#quantity').on('input', function() {
        let value = $(this).val();
        

        value = value.replace(/[^0-9.]/g, '');
    

        if (value !== '' && (parseFloat(value) < 0)) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Please enter a positive number!',
            });
            value = ''; 
        }
    
        $(this).val(value);
    });
    



    // Start supplier
    $('#suppliername').select2({
        ajax: {
            url: '/selectsupplier',
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
    });
    // End supplier



      // Start brand
    $('#brandname').select2({
        ajax: {
            url: '/selectbrand',
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
            unit : $('#unit').val()
        };


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
                axios.post('/product/', data)
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
                    text: 'Product was not save',
                });
            }
        });


        
    });
    

    $('#Btn-update').on('click',function(){
        var id = $('#id').data('id');
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
            unit : $('#unit').val()
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
        var id = $('#id').data('id');
   
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
