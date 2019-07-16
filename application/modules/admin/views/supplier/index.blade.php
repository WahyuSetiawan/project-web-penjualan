@extends('template')

@section("content")
<div class="au-card recent-report">


    <div class="au-card-inner">
        <h3 class="title-5 m-b-35">Data Supplier</h3>

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
                    onclick="window.location.href = '{{ site_url('admin/supplier/add') }}'">
                    <i class="zmdi zmdi-plus"></i>Tambah Supplier</button>
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

        @include('message', ['flashdata' => $flashdata])

        <div class="table-responsive table-responsive-data2">
            <table id="table-supplier" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama supplier</th>
                        <th>Alamat</th>
                        <th>Telepon</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($supplier as $key => $row): ?>
                    <tr>
                        <td class="td-no"></td>
                        <td>
                            <?php echo $row->nama ?>
                        </td>
                        <td>
                            <?php echo $row->alamat ?>
                        </td>
                        <td>
                            <?php echo $row->telepon ?>
                        </td>

                        <td class="td-action">
                            <a href="<?php echo site_url('admin/supplier/edit/'.$row->id_supplier) ?>"
                                class="btn btn-info">Edit</a>
                            <a href="<?php echo site_url('admin/supplier/del/'.$row->id_supplier) ?>"
                                class="btn btn-danger">hapus</a>
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
    $(document).ready(function () {
        $('#example4').DataTable();
    });
</script>
@endsection