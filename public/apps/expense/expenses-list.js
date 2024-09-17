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

    $('#expenses').DataTable({

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
                text    : '<i class="fa fa-fw fa-lg fa-plus-square text-info"></i>',
                className: 'btn px-2 py-1',
                attr    : {'data-toggle': 'tooltip', 'title': 'Create New'},
                action  : function(e,dt,node,config){
                    $('#exampleModalCenter').find('input').val('');
                    $('#exampleModalCenter').find('select').each(function() {
                        this.selectedIndex = 0; 
                    });
                    $('#exampleModalLongTitle').text('');
                    $('#saveandupdate').removeClass('btn btn-success');

                    $('#category').val('');
                    $('#amount').val('');
                    $('#expensedate').val('');

                    $('#exampleModalCenter').modal('show');
                    $('#saveandupdate').text('Save');
                    $('#saveandupdate').addClass('btn btn-primary');
                    $('#hiddensaveup').val('0');
                    $('#exampleModalLongTitle').text('Create Expenses');
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
            url: 'expenses',
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
                    const color = monthColorMapping[row.monthname] || 'defaultcolor';
                    return '<span class="badge" style="background-color: ' + color +"!important" + '; color: white;">' + row.monthname + '</span>';
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
                   
                    return '<button  class="btn btn-primary edit" id="edit" data-month="'+row.month+'"><i class="icon-eye eye-icon"> </i></button>';
                }
            }
        ]
    });

    $('#expenses').on('click','.edit',function(){
        var id = $(this).data('month');
        $('#expensesmodal').modal('show');
        var totalall = 0;

        axios.get('/expenses/'+id)
        .then(response=>{
            var data =response.data;
        
            $('#expensestitle').text(data.month +' '+ data.year);


            var expenses  = data.data.expenses;
            var items = [];

            
            expenses.forEach(item => {
       
                


                 var arr = {
                    category : item.category,
                    expenses_date : item.expenses_date,
                    created_by : item.created_by,
                    id : item.id,
                    amount : item.amount
                }

                totalall +=  parseFloat(item.amount);

             

          


                items.push(arr)

            });
            $('#totalAmount').text('₱'+' '+formatNumber(totalall));
            table.clear().rows.add(items).draw();
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



    var table = $('#expenseslists').DataTable({
        lengthMenu: [12, 25, 500],
        pageLength: 12,
        columns: [
            { data: null, render: function(data, type, row, meta) { return meta.row + 1; }},
            { data: null, render: function (data, type, row) { return row.category; }},
            { data: null, render: function (data, type, row) { return '<span class="badge badge-info">'+row.amount+'</span>'; }},
            { data: 'created_by' },
            { data: 'expenses_date' },
            { data: null, render: function (data, type, row) { return '<button class="btn btn-primary edit" data-month="'+row.id+'"><i class="icon-eye eye-icon"> </i></button>'; }}
        ]
    });





    $('#saveandupdate').on('click',function(){
        var data = {
            category : $('#category').val(),
            amount : $('#amount').val() ,
            expenses_date : $('#expensedate').val() 
        };
    


        axios.put('')

        
    });

    $('#amount').on('input',function(){
        if($(this).val() <= 0 ){
            Swal.fire({
                title: 'Warning!',
                text: "You can only input positive numbers greater than zero..",
                icon: 'warning',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Close'
            });
            $(this).val(''); 
            return ;
        }
    });
    

})


