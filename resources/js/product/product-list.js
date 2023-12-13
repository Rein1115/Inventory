import axios from 'axios';
import $ from 'jquery';
import Swal from 'sweetalert2';
import 'datatables.net-bs4';
   
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

