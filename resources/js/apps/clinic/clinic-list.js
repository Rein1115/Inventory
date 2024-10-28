$(document).ready(function(){
    $('#clinic').DataTable({
        dom: 'Bfrtip',
        buttons: [
            
            {
                text: 'Export',
                extend: 'collection',
                buttons: [
                    'csv',
                    'excel',
                    'pdf',
                    'print',
                    'copy',
                ]
            },
            {
                text: 'Create Clinic',
                action: function (e, dt, node, config) {
                    $('#exampleModalCenter').find('input').val('');
                    $('#exampleModalCenter').find('select').each(function() {this.selectedIndex = 0;});
                    $('#exampleModalLongTitle').text('');
                    $('#saveandupdate').removeClass('btn btn-success');
                    $('#exampleModalCenter').modal('show');
                    $('#saveandupdate').text('Save');
                    $('#saveandupdate').addClass('btn btn-primary');
                    $('#hiddensaveup').val('0');
                    $('#exampleModalLongTitle').text('Create Clinic');
                }
            }
        ],
        ajax: {
            url: 'clinic',
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
                    return '<span class="badge badge-info">' + row.clientfname + ' ' + row.clientlname + '</span>';
                }},
            { 
                data: null,
                render: function (data, type, row) {
                    return '<span class="badge badge-info">' + row.clientclinic + '</span>';
                }
            },
            {data: 'clientcontact'},
            { 
                data: null,
                render: function (data, type, row) {
                    return '<span class="badge badge-info">' + row.clientaddress +' '+ row.clientzip+'</span>';
                }
            },
            
            {data:'clientcreatedat'},
            { 
                data: null,
                render: function (data, type, row) {
                    return '<span class="badge badge-info">' +row.fname+ ' ' + row.lname+'</span>';
                }
            },
            {
                data: null,
                render: function (data, type, row) {
                    return '<button  class="btn btn-primary edit" id="edit" data-id="'+row.id+'"><i class="icon-pencil pencil-icon"> </i></button>' + ' ' +
                           '<button  class="btn btn-danger delete" data-id="'+row.id+'"><i class="icon-trash eye-trash"> </i></button>';
                }
            }
        ]
    });

    $('#clinic').on('click','.edit',function(){
        $('#exampleModalLongTitle').text('Update Clinic');
        $('#exampleModalCenter').find('input').val('');
        $('#saveandupdate').text('Update');
        $('#saveandupdate').addClass('btn btn-success');
        $('#exampleModalCenter').modal('show');
        var id = $(this).data('id');

        $('#hiddensaveup').val(id);
        axios.get('clinic/'+id)
        .then(response=>{
            var resp = response.data.response;
            $('#fname').val(resp.fname);
            $('#lname').val(resp.lname);
            $('#contactno').val(resp.contact_no);
            $('#address').val(resp.address);
            $('#zipcode').val(resp.zipcode);
            $('#clinicname').val(resp.clinic_name);
        });
    });



    $('#saveandupdate').on('click',function(){
        var id = $('#hiddensaveup').val();
        if(id === '0'){
         textm = 'save';
         }else{
         textm = 'update';
      }
        var data = {
            fname: $('#fname').val(),
           lname : $('#lname').val(),
           contact_no :$('#contactno').val(),
           address:  $('#address').val(),
            zipcode: $('#zipcode').val(),
            clinic_name : $('#clinicname').val()
         };
             Swal.fire({
                 title: 'Are you sure?',
                 text: "Do you want to "+textm+" this clinic?",
                 icon: 'info',
                 showCancelButton: true,
                 confirmButtonColor: '#3085d6',
                 cancelButtonColor: '#d33',
                 confirmButtonText: 'Yes, '+textm+' it!',
                 cancelButtonText: 'No, cancel!'
             }).then((result) => {
                 if (result.isConfirmed) {
                     axios.put('clinic/' + id, data)
                         .then(response => {
                             var resp = response.data;
                    
                             if (resp.success === true) {
                                 Swal.fire({
                                     icon: 'success',
                                     title: 'Success!',
                                     text: resp.message
                                 }).then(() => {
                                     $('#exampleModalCenter').find('input').val('');
                                     $('#exampleModalCenter').modal('hide');
                                     $('#clinic').DataTable().ajax.reload();
                                 });
                             } else {
                                 var errorMessage = 'Error!';
                                 if (resp.response && typeof resp.response === 'object') {
                                     var errors = [];
                                     for (var key in resp.response) {
                                         if (resp.response[key] instanceof Array) {
                                             errors = errors.concat(resp.response[key]);
                                         }
                                     }
                                     errorMessage = errors.join(' ');
                                 } else {
                                     errorMessage = resp.message || 'An error occurred.';
                                 }
                                 Swal.fire({
                                     icon: 'error',
                                     title: 'Error!',
                                     text: errorMessage
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
                         text: 'Clinic was not '+textm+'',
                     });
                 }
             });
    });

    $('#clinic').on('click', '.delete', function() {
        var id = $(this).data('id');
        
        Swal.fire({
            title: 'Are you sure?',
            text: "Do you want to delete this clinic?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!'
        }).then((result) => {
            if (result.isConfirmed) {
                axios.delete('clinic/'+id)
                    .then(response => {
                        var resp = response.data;
                        
                        console.log(response);
                        if (resp.success === true) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Deleted!',
                                text: resp.response
                            }).then(() => {
                                $('#clinic').DataTable().ajax.reload();

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
                    text: ' Clinic was not deleted',
                });
            }
        });

    });



 



});