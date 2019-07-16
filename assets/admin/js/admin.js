$(document).ready(function() {
    var datatable_produk = $('#table_produk').DataTable({
        "bLengthChange": true,
        "searching": true
    });

    datatable_produk.on('order.dt search.dt', function() {
        datatable_produk.column(0, { search: 'applied', order: 'applied' }).nodes().each(function(cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw();
});