function formatNumber(number) {

    let parts = number.toFixed(2).split('.'); 

    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ',');

   
    return parts.join('.');
}


function totalamounts(items){
  
    var totalamounts = 0;
    items.forEach(item => {
        totalamounts += item.total_amount;
    })

    let formattedTotal = formatNumber(totalamounts); 
    $('#totalAmount').text( '₱' +' ' + formattedTotal);
}
