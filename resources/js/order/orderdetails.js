import axios from 'axios';
import $ from 'jquery';
import Swal from 'sweetalert2';

$('#quan').on('input', function () {

    var initialQuantity = parseInt($('#quan').data('quan'));
    var inputValue = $('#quan').val();

    var intValue = parseInt(inputValue);


    if (inputValue != '') {

        if (initialQuantity >= intValue) {

            var price = parseFloat($('#pname').data('price'));
            var total = intValue * price;
            total = parseFloat(total).toFixed(2);


            $('#total-amount').val(total);
        }


        else {
            Swal.fire({
                title: "Warning!",
                text: "Product quantity is not enough",
                icon: "warning",
                showCancelButton: false,
                confirmButtonText: "Okay"
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#quan').val('');
                    $('#total-amount').val('');
                }
            });
        }
    }
    else {
        $('#total-amount').val('');

    }



});