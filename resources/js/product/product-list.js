import axios from 'axios';
import $ from 'jquery';
import Swal from 'sweetalert2';
import 'datatables.net-bs4';



// test only
$('#formtest').on('submit', function (e) {
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
            }else if(r.data.status === false){
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
   

$(document).on('click', '.delete-btn', function () {
    var id = $(this).data('id');
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
    }).then((result) => {
        if (result.isConfirmed) {
            axios.delete('/Inventory/' + id)
                .then(function (response) {
                    console.log(response);
                    Swal.fire({
                        title: "Deleted!",
                        text: "Your file has been deleted.",
                        icon: "success"
                    }).then(function () {
                        location.reload();
                    });
                })
                .catch(function (error) {
                    console.error('Error deleting data:', error);
                });
        }
    });
});




