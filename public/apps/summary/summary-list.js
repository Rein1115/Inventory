$(document).ready(function(){



    const monthColorMapping = {
        'January': '#ff9999', 
        'February': '#ff8080',
        'March': '#ff6666',
        'April': '#ff4d4d',
        'May': '#ff3333',
        'June': '#ff1a1a',
        'July': '#ff0000',
        'August': '#e60000', 
        'September': '#cc0000',
        'October': '#b30000', 
        'November': '#990000', 
        'December': ' #800000' 
    };


    $('#annualsales').DataTable({

        dom             : 'Bflrtip',
        processing      : true,
        // serverSide      : true,
        responsive      : true,
        async           : true,
        language        : {
            processing  : '<i class="fa fa-spinner fa-spin fa-3x fa-fw text-secondary"></i><br><span class="sr-only font-weight-bold text-secondary">Loading...</span> ',
            lengthMenu  : 'Display _MENU_ records',
            search      : 'Search ',
            emptyTable  : '<span class="text-secondary font-12px-bold">No available record to show</span>',
        },
        buttons: [
            {
                text    : '<i class="fa fa-fw fa-lg fa-refresh text-info"></i>',
                className: 'btn px-2 py-1',
                attr    : { 'data-toggle': 'tooltip', 'title': 'Reload' },
                action  : function(e,dt,node,config){ 
                    $('#supplier').DataTable().ajax.reload(); 
                   
                } 
            },
            {
                extend  : 'collection',
                text    : '<i class="fa fa-fw fa-lg fa-print text-info"></i>',
                className: 'btn px-2 py-1',
                attr    : {'data-toggle': 'tooltip', 'title': 'Export'},
                buttons: [
                    {extend: 'pdf', exportOptions: {columns: [1, 2, 3]}},
                    {extend: 'excel', exportOptions: {columns: [1, 2,3]}},
                    {extend: 'print', exportOptions: {columns: [1, 2, 3]}},
                    {extend: 'copy', exportOptions: {columns: [1, 2, 3]}},
                    {extend: 'csv', exportOptions: {columns: [1, 2, 3]}},
                ]
            },
        ],
        ajax: {
            url: 'anualsales',
            dataSrc: ''
        },
        lengthMenu: [12, 25, 500], // Pagination options
        pageLength: 12, // Default page length
        columns: [
            {
                data: null,
                render: function(data, type, row, meta) {
                    return meta.row + 1;
                }
            },
            { 
                data: null,
                render: function (data, type, row) {
                    return '<span class="badge badge-info">'+row.year+'</span>';
                }
            },
            {
                data: null,
                render: function (data, type, row) {
                   
                    return '<button  class="btn btn-primary view" id="view" data-year="'+row.year+'"><i class="icon-eye eye-icon"> </i></button>';
                }
            }
        ]
    });

    $('#annualsales').on('click','.view',function(){
        var year = $(this).data('year');


        $('#annualSummaryModal').modal('show'); 
        axios.get('/anualsales/'+year)
        .then(response=>{
            var data =response.data;

            console.log(data);

            var totalexpense = parseFloat(data.total_expenses);
            var sales = parseFloat(data.totalsales);
            var fprofit = parseFloat(data.finalnetprofit);
            
            // Set color for total expenses
            if (totalexpense < 0) {
                $('#summaryTotalExpenses').addClass('text-danger').removeClass('text-warning');
            } else {
                $('#summaryTotalExpenses').addClass('text-warning').removeClass('text-danger');
            }
            
            // Set color for total sales
            if (sales < 0) {
                $('#summaryTotalSales').addClass('text-danger').removeClass('text-success');
            } else {
                $('#summaryTotalSales').addClass('text-success').removeClass('text-danger');
            }

            if (fprofit < 0) {
                $('#summaryFinalNetProfit').addClass('text-danger').removeClass('text-secondary');
            } else {
                $('#summaryFinalNetProfit').addClass('text-secondary').removeClass('text-danger');
            }
            
            
            // Set text values
            $('#summaryTotalExpenses').text( '₱' + ' '+ formatNumber(data.total_expenses));
            $('#summaryTotalSales').text('₱' + ' '+ formatNumber(data.totalsales));
            $('#summaryFinalNetProfit').text('₱' + ' '+ formatNumber(data.finalnetprofit));
            $('#annualSummaryModalTitle').text(data.Year);
            
        }).catch(error => {
            Swal.fire({
                title: 'Warning!',
                text: error,
                icon: 'warning',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Close'
            });
        });

    });

})


