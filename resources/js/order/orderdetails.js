import axios from 'axios';
import $ from 'jquery';
import Swal from 'sweetalert2';

$('#quan').on('input', function () {

    var inputValue = $('#quan').val();

    var floatValue = parseFloat(inputValue);

    if (inputValue != '') {
        var price = parseFloat($('#pname').data('price'));

        var total = floatValue * price;

        total = parseFloat(total).toFixed(2);


        $('#total-amount').val(total);
    }
    else {
        $('#total-amount').val('');

    }




});