@extends('template')

@section("content")
<div class="au-card recent-report">

    <div class="au-card-inner">
        <h3 class="title-5 m-b-35">Data Kategori Produk</h3>

        {{-- option to filter data on data table --}}
        <div class="table-data__tool m-b-35">
            <div class="table-data__tool-left">
                <div class="rs-select2--light rs-select2--md">
                    <select class="js-select2" name="property">
                        <option selected="selected">Semua kondisi</option>
                        <option value="">Tersedia</option>
                        <option value="">Tidak tersedia</option>
                    </select>
                    <div class="dropDownSelect2"></div>
                </div>
                <button class="au-btn-filter">
                    <i class="zmdi zmdi-filter-list"></i>filters</button>
            </div>
            <div class="table-data__tool-right">
                <button class="au-btn au-btn-icon au-btn--green au-btn--small"
                    onclick="window.location.href = '<?php echo site_url('admin/kategori_produk/tambah_produk') ?>'">
                    <i class="zmdi zmdi-plus"></i>Tambah Produk</button>
                <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                    <select class="js-select2" name="type">
                        <option selected="selected">Export</option>
                        <option value="">Option 1</option>
                        <option value="">Option 2</option>
                    </select>
                    <div class="dropDownSelect2"></div>
                </div>
            </div>
        </div>

        <div class="table-responsive table-responsive-data2">
            <table id="table_kategori" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($kategori as $row): ?>
                    <tr>
                        <td class="td-no"></td>
                        <td>
                            <?php echo $row->nama_kategori ?>
                        </td>
                        <td class="td-action">
                            <a class="btn btn-info btn-sm"
                                href="<?php echo site_url('admin/kategori_produk/edit/'.$row->id_kategori) ?>">Edit</a>
                            <a class="btn btn-danger btn-sm"
                                href="<?php echo site_url('admin/kategori_produk/hapus/'.$row->id_kategori) ?>">hapus</a>
                        </td>
                    </tr>
                    <?php endforeach ?>

                </tbody>
            </table>
        </div>
        <!-- END DATA TABLE -->
    </div>
</div>

@endsection

@section('js')
<script type="text/javascript">
</script>
@endsection