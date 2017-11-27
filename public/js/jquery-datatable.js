$(function () {

    /*** DATATABLE APPLICANTS ***/
    var table = $('#table-applicant').DataTable({
        responsive: true,
        mark: {
            element: 'span',
            className: 'bg-blue'
        },
        columnDefs: [{
            targets: 'no-sort',
            orderable: false,
        }],
        columnDefs: [{
            targets: 0,
            searchable: false,
            orderable: false,
            className: 'text-center',
            render: function (data, type, full, meta){
                return '<input type="checkbox" name="id[]" value="' + $('<div/>').text(data).html() + '">';
            }
        },
        {
            targets: 'no-sort',
            orderable: false,
        }],
        order: [[1, 'asc']],
        select: {
            style:    'multi',
            selector: 'td:first-child'
        },
    });


    /*$('#table-applicant tbody').on( 'click', 'tr', function () {
        $(this).toggleClass('selected');
    });*/

    // Handle click on checkbox to set state of "Select all" control
    $('#table-applicant tbody').on('change', 'input[type="checkbox"]', function(){
        $(this).closest('tr').toggleClass('selected');
    });
 
    $('#submitlist').click( function () {
        var table = $('#table-applicant').DataTable();
        var ids   = table.rows('.selected').data();
        $('#table-lineup > tbody').find('tr').remove();

        if (ids.length > 0) {

            ids.each( function(i) {
                var markup = '<tr>' +
                                '<td>'+ i[1] +'</td>' +
                                '<td>'+ i[2] +'</td>' +
                                '<td>'+ i[5] +'</td>' +
                                '<td class="text-center">' +
                                    '<a href="" class="btn btn-remove-app btn-danger btn-sm"><i class="fa fa-remove"></i></a>' +
                                '</td>' +
                            '</tr>';
                $("#table-lineup tbody").append(markup);
            });

            $('#largeModal').modal('show');
        } else {
            swal({
                title   : 'Warning',
                text    : 'Please select atleast one applicant!',
                type    :  'warning',
                allowOutsideClick: false,
            });
        }

        //console.log(ids);
    } );

    /* DELETE BUTTON */
    $('.btn-app-delete').click( function( event, jqXHR, settings ) {
        event.preventDefault();
        var button = $(this);
        var row    = button.closest('tr');

        swal({
            title: 'Are you sure?',
            text: 'You will not be able to undo this action!',
            type:  "warning",
            showCancelButton: true,
            allowOutsideClick: false,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, remove it!",
        }).then(function (){
            $.ajax({
                url: button.attr('href'),
                type: 'GET',
                success: function (data) {
                    if (data) {
                        swal("Done!", "Applicant successfully removed!", "success");
                        
                        row.hide('slow', function() { 
                            row.remove();
                        });

                    } else {
                        swal("Error!", "Failed to remove selected data", "error");
                    }
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    swal("Error!", "Please try again", "error");
                }
            });
        }, function (dismiss) {
            if (dismiss == 'cancel') {
                table.row().removeClass('')
            }
        });
    });

    /*** REMOVE ITEM ***/
    $('.btn-remove-app').click( function( event, jqXHR, settings ) {
        // event.preventDefault();
        // console.log("THIS");
    });

    /***  ***/

    /*** DATATABLE LINEUP OF APPLICANTS ***/
    /*var table = $('#table-lineup').DataTable({
        paging      : false,
        ordering    : false,
        info        : false,
        select      : false
    });*/
});