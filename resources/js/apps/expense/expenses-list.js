$(document).ready(function(){

    var selectedYear = $('#yearInput').val();
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


    function fetchData(selectedYear){

        if ($.fn.DataTable.isDataTable('#expenses')) {
            $('#expenses').DataTable().destroy();
        }
        $('#expenses').DataTable({
            dom: 'Bflrtip',
            processing: true,
            responsive: true,
            language: {
                processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw text-secondary"></i><br><span class="sr-only font-weight-bold text-secondary">Loading...</span>',
                lengthMenu: 'Display _MENU_ records',
                search: 'Search ',
                emptyTable: '<span class="text-secondary font-12px-bold">No available record to show</span>',
            },
            buttons: [
                {
                    text: '<i class="fa fa-fw fa-lg fa-refresh text-info"></i>',
                    className: 'btn px-2 py-1',
                    attr: { 'data-toggle': 'tooltip', 'title': 'Reload' },
                    action: function(e, dt, node, config) { 
                        $('#expenses').DataTable().ajax.reload(); 
                    } 
                },
                {
                    text: '<i class="fa fa-fw fa-lg fa-plus-square text-info"></i>',
                    className: 'btn px-2 py-1',
                    attr: {'data-toggle': 'tooltip', 'title': 'Create New'},
                    action: function(e, dt, node, config) {
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
                        $('#expensedate').attr('readonly', false);
                    } 
                },
                {
                    extend: 'collection',
                    text: '<i class="fa fa-fw fa-lg fa-print text-info"></i>',
                    className: 'btn px-2 py-1',
                    attr: {'data-toggle': 'tooltip', 'title': 'Export'},
                    buttons: [
                        { extend: 'pdf', exportOptions: { columns: [1, 2, 3] } },
                        { extend: 'excel', exportOptions: { columns: [1, 2, 3] } },
                        { extend: 'print', exportOptions: { columns: [1, 2, 3] } },
                        { extend: 'copy', exportOptions: { columns: [1, 2, 3] } },
                        { extend: 'csv', exportOptions: { columns: [1, 2, 3] } }
                    ]
                },
            ],
            ajax: {
                url: 'expenses',
                data: {
                    year: selectedYear
                },
                dataSrc: ''
            },
            lengthMenu: [12, 25, 500],
            pageLength: 12,
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
                        return '<span class="badge" style="background-color: ' + color + '; color: white;">' + row.monthname + '</span>';
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
                        return '<button  class="btn btn-primary edit" id="edit" data-month="'+row.month+'" data-year="'+row.year+'"><i class="icon-eye eye-icon"> </i></button>';
                    }
                }
            ]
        });
    }


        fetchData(selectedYear);

        $('#searchButton').on('click', function() {
            selectedYear = $('#yearInput').val();
            fetchData(selectedYear);
       });
       


    $('#expenses').on('click','.edit',function(){
        var id = $(this).data('month');
        var year = $(this).data('year');
        $('#expensesmodal').modal('show');
        var totalall = 0;
       $('#hiddensaveup').val(id);

       $('#expensedate').attr('readonly', true);
   
        axios.get(`/expenses/${id}`, {
            params: {
                year: year 
            }
        })
        .then(response=>{
            var data =response.data;
            var items = [];
            $('#expensestitle').text(data.month +' '+ data.year);
            var expenses  = data.data.expenses;
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
            { data: null, render: function (data, type, row) {
                return `
                <div class="btn-group" role="group">
                    <button class="btn btn-primary individualedit" data-indiid="${row.id}">
                      <i class="icon-pencil pencil-icon"></i>
                    </button> &nbsp;
                    <button class="btn btn-danger individualdelete" data-indiid="${row.id}">
                      <i class="icon-trash trash-icon"></i>
                    </button>
                </div>
            `;

             }}
        ]
    });


    table.on('click','.individualedit',function(){
    
        var id = $(this).data('indiid');
        $('#hiddensaveup').val(id);
        $('#expensesmodal').modal('hide');
        $('#exampleModalCenter').modal('show');
        $('#saveandupdate').text('Update');
        $('#saveandupdate').addClass('btn btn-success');
        $('#exampleModalLongTitle').text('Update Expense(s)');

        axios.get('/individualexpenses/'+id)
        .then(response => {

            var data  = response.data;
            
            $('#category').val(data[0].category);
            $('#amount').val(data[0].amount);
            $('#expensedate').val(data[0].expenses_date);

        }).catch(error => {
            Swal.fire({
                title: 'Error!',
                text: error,
                icon: 'error',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Close'
            });
        });


    });





    $('#saveandupdate').on('click', function() {
        var id = $('#hiddensaveup').val();
        var txt =''; 
        if(id == '0'){
            txt='save';
        }
        else{
            txt = 'update';
        }
    
        var data = {
            category: $('#category').val(),
            amount: $('#amount').val(),
            expenses_date: $('#expensedate').val()
        };


        if (!$('#category').val() || !$('#amount').val() || !$('#expensedate').val()) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Please fill in all required fields.',
            });
            return;
        }

        Swal.fire({
            title: 'Are you sure?',
            text: "Do you want to "+txt+" this expense(s)?",
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, save it!',
            cancelButtonText: 'No, cancel!'
        }).then((result) => {
            if (result.isConfirmed) {
                axios.put('/expenses/' + id, data)
                    .then(response => {
                        var resp = response.data;
    
                        if (resp.success === true) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success!',
                                text: resp.message
                            }).then(() => {
                                // window.location.href = '/order';
                                // $('#expensesmodal').modal('show');
                                if(id == '0'){
                                    $('#exampleModalCenter').modal('hide');
                                    $('#exampleModalCenter input').val('');
                                    $('#expenses').DataTable().ajax.reload();

                                    table.clear();

                                    // Add new data
                                    table.rows.add(items); // Replace 'items' with your data source
                            
                                    // Redraw the table
                                    table.draw();
                                }else{
                                    $('#exampleModalCenter').modal('hide');
                                    $('#exampleModalCenter input').val('');
                                   $('#expenses').DataTable().ajax.reload();
                                
                                }


                            });
                        } 
                    })
                    .catch(error => {
                        // Handle any errors from the request
                        let errorMessage = 'An unexpected error occurred.';
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: errorMessage,
                        });
                    });
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire({
                    icon: 'info',
                    title: 'Cancelled',
                    text: `expense(s) was not ${txt}d.`,
                });
            }
        });
    });
    
    table.on('click','.individualdelete',function(){
        var id = $(this).data('indiid');

        Swal.fire({
            title: 'Are you sure?',
            text: "Do you want to delete this expense(s)?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!'
        }).then((result) => {
            if (result.isConfirmed) {
                axios.delete('expenses/'+id)
                    .then(response => {
                        var resp = response.data;
                   
                        if (resp.success === true) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success!',
                                text: resp.message
                            }).then(() => {
                                $('#expensesmodal').modal('hide');
                                $('#expenses').DataTable().ajax.reload();
                            });
                        } else {
                       
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: resp.message
                            });
                        }
                    })
                    .catch(error => {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong! Please try again.',
                        });
                    });
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire({
                    icon: 'info',
                    title: 'Cancelled',
                    text: ' Expense was not deleted!',
                });
            }
        });
    
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





