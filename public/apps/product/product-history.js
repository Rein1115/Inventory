$(document).ready(function(){

        $('#history').DataTable({
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
                        $('#history').DataTable().ajax.reload(); 
                       
                    } 
                },
                {
                    extend  : 'collection',
                    text    : '<i class="fa fa-fw fa-lg fa-print text-info"></i>',
                    className: 'btn px-2 py-1',
                    attr    : {'data-toggle': 'tooltip', 'title': 'Export'},
                    buttons: [
                        {extend: 'pdf', exportOptions: {columns: [1, 2, 3, 4, 5, 6,7]}},
                        {extend: 'excel', exportOptions: {columns: [1, 2, 3, 4, 5, 6,7]}},
                        {extend: 'print', exportOptions: {columns: [1, 2, 3, 4, 5, 6,7]}},
                        {extend: 'copy', exportOptions: {columns: [1, 2, 3, 4, 5, 6,7]}},
                        {extend: 'csv', exportOptions: {columns: [1, 2, 3, 4, 5, 6,7]}},
                    ]
                },
            ],
            ajax: {
                url: '/producthistory',
                dataSrc: ''
            },
            lengthMenu: [10, 25, 50,100,500], 
            pageLength: 50, 
            columns: [
                {
                    data: null,
                    render: function(data, type, row, meta) {
                        return meta.row + 1;
                    }
                },
                {
                    data : 'product_name'
                 },
                 {
                    data : 'brand_name'
                 },
                 {
                    data : 'mg'
                 },
                 {
                    data : 'originalquan'
                 },
                 {
                    data : 'selling_price'
                 },
                 {
                    data: 'original_price'
                 }, 
                 {
                    data: null,
                    render: function (data, type, row) {
                        return row.quantity == '0' 
                        ? '<span class="text-warning">OUT OF STOCK(S)</span>' 
                        : '';
                    }
                }
            ],  
            order: [[0, 'desc']],
            select: true
        });

});