@extends('admin/template')

@section("content")
<div class="au-card recent-report">


    <div class="au-card-inner">
        <h3 class="title-5 m-b-35">Data Supplier</h3>
        <div class="table-data__tool">
            <div class="table-data__tool-left"></div>
            <div class="table-data__tool-right">
                <a href="<?php echo site_url('admin/supplier/add') ?>">
                    <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                        <i class="zmdi zmdi-plus"></i>Tambah Supplier
                    </button>
                </a>

            </div>
        </div>

        @include('admin.message', ['flashdata' => $flashdata])

        <div class="table-responsive table-responsive-data2">
            <table id="example4" class="display" style="width:100%">
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
                        <td>
                            <?php echo $key + 1 ?>
                        </td>
                        <td>
                            <?php echo $row->nama ?>
                        </td>
                        <td>
                            <?php echo $row->alamat ?>
                        </td>
                        <td>
                            <?php echo $row->telepon ?>
                        </td>

                        <td>
                            <a href="<?php echo site_url('admin/supplier/edit/'.$row->id_supplier) ?>" class="btn btn-info">Edit</a>
                            <a href="<?php echo site_url('admin/supplier/del/'.$row->id_supplier) ?>" class="btn btn-danger">hapus</a>
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