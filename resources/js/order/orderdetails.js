import axios from 'axios';
import $ from 'jquery';
import Swal from 'sweetalert2';

$('#quan').on('input', function () {

    var inputValue = parseFloat($('#quan').val());

    var price = parseFloat($('#pname').data('price'));

    /// price = "232" * 99;
    

    var total = inputValue * price;
    
   $('#total-amount').val(total);

});