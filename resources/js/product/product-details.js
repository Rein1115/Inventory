import axios from 'axios';
import $ from 'jquery';
import Swal from 'sweetalert2';
import 'datatables.net-bs4';

$('#InsertProd').on('submit', function (e) {
    e.preventDefault();

    var formData = new FormData(this);

    axios.post('/Inventory', formData)
        .then(function (r) {
            if (r.data.status === true) {

                Swal.fire({
                    title: "Success!",
                    text: r.data.message,
                    icon: "success",
                    showCancelButton: false,
                    confirmButtonText: "Okay"
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.reload();
                    }
                });
            } else if (r.data.status === false) {
                Swal.fire({
                    title: "Error!",
                    text: r.data.message,
                    icon: "error",
                    showCancelButton: false,
                    confirmButtonText: "Okay"
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.reload();
                    }
                });
            }
        })
        .catch(function (error) {
            console.error('Error:', error);
        });
});


// Assuming you have a form with product data and a submit button

$('#UpdateProd').on('submit', function (e) {
    e.preventDefault();

    const form = document.getElementById('UpdateProd');
    const productId = document.getElementById('data').value;  // Replace with your actual product ID field

    // Use form directly to create FormData
    // let formData = new FormData(form);

    let formData = new FormData(form);

    // Append key-value pairs to the FormData object

    let jsonObject = {};
    formData.forEach((value, key) => {
        jsonObject[key] = value;
    });


    axios.put(`/Inventory/${productId}`, jsonObject)
        .then(response => {

            // Handle success, show SweetAlert notification
            Swal.fire({
                icon: 'success',
                title: 'Product Updated',
                text: response.data.message,
            });
        })
        .catch(error => {
            // Handle error, show SweetAlert error notification
            Swal.fire({
                icon: 'error',
                title: 'Update Failed',
                text: 'An error occurred while updating the product.',
            });
        });
});

// UpdateProd