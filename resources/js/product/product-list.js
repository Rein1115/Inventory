import axios from 'axios';
import $ from 'jquery';
import Swal from 'sweetalert2';



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








