$(document).ready(function() {
    var datatable_produk = $('#table_produk').DataTable({
        "bLengthChange": true,
        "searching": true
    });

    datatable_produk.on('order.dt search.dt', function() {
        datatable_produk.column(0, {
            search: 'applied',
            order: 'applied'
        }).nodes().each(function(cell, i) {
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
        datatable_kategori.column(0, {
            search: 'applied',
            order: 'applied'
        }).nodes().each(function(cell, i) {
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
        datatable_supplier.column(0, {
            search: 'applied',
            order: 'applied'
        }).nodes().each(function(cell, i) {
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
        datatable_konsumen.column(0, {
            search: 'applied',
            order: 'applied'
        }).nodes().each(function(cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw();
});

$(document).ready(function() {
    var template_image = $('#template_image');
    var container = $('#TextBoxContainer');

    var image_tambahan = $('.container-image-tambahan');

    var index_gambar_terbaru = 1;

    $(document).on('click', '.action-open-image', function() {
        var id_gambar = $(this).data("idgambar");

        $("input[name='gambar_tambahan[" + id_gambar + "]']").click();
    });

    function addImageTambahan() {
        var template_clone = template_image.clone();

        $(template_clone).find("input[name='gambar_tambahan[]']")
            .attr('name', "gambar_tambahan[" + (0 - index_gambar_terbaru) + "]")
            .attr("data-idgambar", (0 - index_gambar_terbaru));

        $(template_clone).find('.img-loader')
            .attr("data-idgambar", (0 - index_gambar_terbaru));

        $(template_clone).find('.btn .img-remove')
            .attr('data-idgambar', (0 - index_gambar_terbaru));

        image_tambahan.append(
            template_clone.html()
        );

        index_gambar_terbaru++;
    }

    $(document).on("click", ".img-remove",
        function() {
            var index = $(this).data("idgambar");
            $(this).parent().parent().remove();
        });

    $(document).on('click', '.btn-add-image',
        function() {
            if (container.find("tr").length < 4) {

                while (true) {
                    if ($("input[name='gambar_tambahan[" + index_gambar_terbaru + "]'").length == 0) {
                        break;
                    } else {
                        index_gambar_terbaru++;
                    }
                }

                var template_clone = template_image.clone();

                $(template_clone).find("input[name='gambar_tambahan[]']")
                    .attr('name', "gambar_tambahan[" + index_gambar_terbaru + "]")
                    .attr("data-idgambar", index_gambar_terbaru);

                $(template_clone).find('.img-loader')
                    .attr("data-idgambar", index_gambar_terbaru);

                $(template_clone).find('.btn .img-remove')
                    .attr('data-idgambar', index_gambar_terbaru);

                container.append(template_clone.html());

                index_gambar_terbaru++;
            } else {
                alert("Gambar tambahan hanya 4 gambar saja");
            }
        });

    $(document).on("change", "input[name*='gambar_tambahan['], input[name='gambar_utama']",
        function() {
            var name = $(this).attr("name");
            var index = $(this).data("idgambar");

            if (index < 0) {
                addImageTambahan();
            }

            if (this.files && this.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    if (name == "gambar_utama") {
                        $(".img-loader-utama").attr('src', e.target.result);
                    } else {
                        $(".img-loader[data-idgambar='" + index + "']").attr('src', e.target.result);
                    }
                }

                reader.readAsDataURL(this.files[0]);
            }
        });

    addImageTambahan();
});