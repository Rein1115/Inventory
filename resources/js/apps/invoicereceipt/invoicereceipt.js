$(document).ready(function(){

    var product = $('#productlist').data('data');
    $('#invoice-print').on('click',function(){
        formatNumber(parseFloat($('#printtotalamounts').text()));
        // $('#parentprintheaders').removeClass('d-none');
        $('#printor').text($('#or').text() || $('#or').val());
        $('#printpo').text($('#po').text() || $('#po_no').val() ); 
        $('#printdeliveredto').text($('#deiveredto').text() || $('#deliveredto').val());
        $('#printaddress').text($('#address').text()||$('#address').val());
        $('#printdatedelivered').text($('#delivereddate').text() ||$('#delivered_date').val() );
        $('#printterms').text($('#terms').text()||$('#terms').val());
        $('#printstatus').text($('#stat').text() || $('#payment_status').val() ) ;
        $('#printexactamount').text($('#totalamounts').text() || $('#totalall').data('totalall'));
        $('#printremainingbalance').text($('#balance').text());
        print();
    })

});