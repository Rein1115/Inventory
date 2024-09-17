$(document).ready(function(){

    var product = $('#productlist').data('data');


    console.log(product);



    $('#invoice-print').on('click',function(){
        formatNumber(parseFloat($('#printtotalamounts').text()));
        // $('#parentprintheaders').removeClass('d-none');
        $('#printor').text($('#or').text());
        $('#printpo').text($('#po').text());
        $('#printdeliveredto').text($('#deiveredto').text());
        $('#printaddress').text($('#address').text());
        $('#printdatedelivered').text($('#delivereddate').text());
        $('#printterms').text($('#terms').text());
        $('#printstatus').text($('#stat').text());
        $('#printexactamount').text($('#totalamounts').text());
        $('#printremainingbalance').text($('#balance').text());

        print();
    })

});