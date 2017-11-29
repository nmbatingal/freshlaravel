$(function () {

    /*** DATATABLE APPLICANTS ***/
    var table = $('#table-lineup').DataTable({
        responsive: true,
        mark: {
            element: 'span',
            className: 'bg-blue'
        },
        columnDefs: [{
            targets: 'no-sort',
            orderable: false,
        }],
        order: [[2, 'asc']],
    });

    /*** DATATABLE APPLICANTS ***/
    var table = $('#table-lineup-selection').DataTable({
        responsive: true,
        mark: {
            element: 'span',
            className: 'bg-blue'
        },
        columnDefs: [{
            targets: 'no-sort',
            orderable: false,
        }],
        order: [[2, 'asc']],
    });
});