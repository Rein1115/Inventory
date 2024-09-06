$('#btn-update').on('click', function() {
    var data = {    
        email: $('#email').val(),
        fname: $('#fname').val(),
        lname: $('#lname').val(),
        password: $('#password').val(),
        password_confirmation: $('#password_confirmation').val(), // Make sure to call .val() to get the value
        current_password: $('#c-pass').val()
    };


    Swal.fire({
        title: 'Are you sure?',
        text: "Do you want to update your profile?",
        icon: 'info',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, save it!',
        cancelButtonText: 'No, cancel!'
    }).then((result) => {
        if (result.isConfirmed) {
            axios.put('/profile/0',data)
                .then(response => {
                    var resp = response.data;
           
                    if (resp.success === true) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: resp.response
                        }).then(() => {
                            window.location.href = '/profile/0';
                        });
                    } else{
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: resp.response
                        })

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
                text: 'Profile was not update',
            });
        }
    });



    
});
