
@extends('template')

@section("content")
<div class="au-card recent-report">

<div class="au-card-inner">
   <h3 class="title-5 m-b-35">Data Kategori Produk</h3>
   <div class="table-data__tool">
      <div class="table-data__tool-left"></div>
      <div class="table-data__tool-right">

         <a href="<?php echo site_url('admin/kategori_produk/tambah_produk') ?>">

            <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                <i class="zmdi zmdi-plus"></i>Tambah Kategori</button></a>
            </div>
        </div>
        <div class="table-responsive table-responsive-data2">
            <table id="example4" class="display" style="width:100%">
               <thead>
                  <tr>
                     <th>Nama Kategori</th>
                     <th>Act</th>

                 </tr>
             </thead>
             <tbody>
                <?php foreach ($kategori as $row): ?>
                  <tr>
                    <td><?php echo $row->nama_kategori ?></td>
                    <td>
                        <a href="<?php echo site_url('admin/kategori_produk/hapus/'.$row->id_kategori) ?>">hapus</a>
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
 $(document).ready(function() {
    $('#example4').DataTable();
} );
</script>
@endsection