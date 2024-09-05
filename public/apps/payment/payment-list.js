$(document).ready(function(){
    $('#payment').DataTable({
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
                    $('#payment').DataTable().ajax.reload(); 
                   
                } 
            },
            // {
            //     text    : '<i class="fa fa-fw fa-lg fa-plus-square text-info"></i>',
            //     className: 'btn px-2 py-1',
            //     attr    : {'data-toggle': 'tooltip', 'title': 'Create New'},
            //     action  : function(e,dt,node,config){
            //         window.location.href = '/order/create';
            //     } 
            // },
            {
                extend  : 'collection',
                text    : '<i class="fa fa-fw fa-lg fa-print text-info"></i>',
                className: 'btn px-2 py-1',
                attr    : {'data-toggle': 'tooltip', 'title': 'Export'},
                buttons: [
                    {extend: 'pdf', exportOptions: {columns: [1, 2, 3, 4, 5, 6]}},
                    {extend: 'excel', exportOptions: {columns: [1, 2, 3, 4, 5, 6]}},
                    {extend: 'print', exportOptions: {columns: [1, 2, 3, 4, 5, 6]}},
                    {extend: 'copy', exportOptions: {columns: [1, 2, 3, 4, 5, 6]}},
                    {extend: 'csv', exportOptions: {columns: [1, 2, 3, 4, 5, 6]}},
                ]
            },
        ],
        ajax: {
            url: 'payment',
            dataSrc: ''
        },
        lengthMenu: [10, 25, 50], 
        pageLength: 50, 
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
                    return '<span class="badge badge-primary"> ' +  row.address
                    + '</span>';
                }
            },
            { 
                data: null,
                render: function (data, type, row) {
                    return '<span class="badge badge-info">' + row.or + '</span>';
                }
            },

            {
                data: null,
                render: function (data, type, row) {
                    return '<span class="badge badge-info"> ' +  row.po_no
                    + '</span>';
                }
            },

            { data : 'payment_status'},
            {
                data: null,
                render: function (data, type, row) {
                    return '<span class="badge badge-primary">' +  row.fname + ' '+row.lname
                    + '</span>';
                }
            },
            { data : 'created_at'},
            {
                data: null,
                render: function (data, type, row) {
                    return '<a href="/payment/'+row.trans_no+'" class="btn btn-primary text-white edit" id="edit"     data-id="'+row.trans_no+'"><i class="icon-pencil pencil-icon"> </i></a>';
                        //    '<button  class="btn btn-danger text-white delete" data-id="'+row.trans_no+'"><i class="icon-trash trash-icon"> </i></button>';
                }
            }
        ],
        order: [[0, 'desc']],
        select: true
    });






});