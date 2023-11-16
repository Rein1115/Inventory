import axios from 'axios';
import $ from 'jquery';
import Swal from 'sweetalert2';
import 'datatables.net-bs4';



$(document).ready(function(){
    $('.deleteOrderForm').on('submit', function(e){
        e.preventDefault();
        var formData = new FormData(this);
        var id = $(this).find('.quan').data('quan');

        Swal.fire({
            title: "You want to delete this order?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                axios.post('/updateQuan/' + id, formData)
                .then(function(r){
                    Swal.fire({
                        title: "Deleted!",
                        text: r.data.message,
                        icon: "success"
                    }).then(() => {
                        location.reload();
                    });
                })
                .catch(function(error){
                    Swal.fire({
                        title: "Error!",
                        text: error,
                        icon: "error"
                    });
                });
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire({
                    title: "Cancelled",
                    text: "This order is safe :)",
                    icon: "error"
                }).then(()=>{
                    location.reload();
                })
            }
        });
    });
});

$('.updatePayment').on('submit',function(e){
    e.preventDefault();

    var formData = new FormData(this);
    var id = $('#paymentpara').data('pay');

    Swal.fire({
        title: "This Order is Already Paid?",
        text: "Do you want this to be marked as paid?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, mark it as paid!"
    }).then((result) => {
        if (result.isConfirmed) {
            axios.post('/paymentUpdate/'+id, formData)
            .then(function(r){
                Swal.fire({
                    title: "Paid!",
                    text: r.data.message,
                    icon: "success"
                }).then(() => {
                    location.reload();
                });
            })
            .catch(function(error){
                Swal.fire({
                    title: "Error!",
                    text: error,
                    icon: "error"
                });
            });
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            Swal.fire({
                title: "Cancelled",
                text: "Cancelled payment paid :)",
                icon: "error"
            }).then(()=>{
                location.reload();
            })
        }
    });
   });
    



   $('#printorders').on('click',function(){
        print();
   });  