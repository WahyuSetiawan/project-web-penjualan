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

$(document).ready(function() {
    var datatable_kategori = $('#table_kategori').DataTable({
        "bLengthChange": true,
        "searching": true
    });

    datatable_kategori.on('order.dt search.dt', function() {
        datatable_kategori.column(0, { search: 'applied', order: 'applied' }).nodes().each(function(cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw();
});

$(document).ready(function() {
    var datatable_supplier = $('#table-supplier').DataTable({
        "bLengthChange": true,
        "searching": true
    });

    datatable_supplier.on('order.dt search.dt', function() {
        datatable_supplier.column(0, { search: 'applied', order: 'applied' }).nodes().each(function(cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw();
});

$(document).ready(function() {
    var datatable_konsumen = $('#table-konsumen').DataTable({
        "bLengthChange": true,
        "searching": true
    });

    datatable_konsumen.on('order.dt search.dt', function() {
        datatable_konsumen.column(0, { search: 'applied', order: 'applied' }).nodes().each(function(cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw();
});