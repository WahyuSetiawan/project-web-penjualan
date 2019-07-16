@extends('template')
@section('content')
<div class="au-card recent-report">

  <div class="au-card-inner">
    <div class="row">
      <div class="col-md-12">
        <!-- DATA TABLE -->
        <h3 class="title-5 m-b-35">Data Produk</h3>

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
              onclick="window.location.href = '{{ site_url('admin/produk/add') }}'">
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

        {{-- data table  --}}
        <div class="table-responsive table-responsive-data2">
          <table id="table_produk" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Kategori</th>
                <th>Harga Produk</th>
                <th>Stok Produk</th>
                <th style="text-align: center">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($produk as $row): ?>
              <tr>
                <td></td>
                <td> {{$row->nama_produk }} </td>
                <td> {{$row->nama_kategori }} </td>
                <td>Rp. {{ number_format($row->harga_produk,2,',','.')  }} </td>
                <td>
                <div class="<?= ($row->stok_produk == "Tersedia")? "status--process" : "status--denied"  ?>">  
                  {{$row->stok_produk }} 
                </div>
                </td>
                
                <td class="td-action" style=" width: 140px">
                  <a href="{{ site_url('admin/produk/edit/'.$row->id_produk)}}">
                    <button class="btn btn-info btn-sm">Edit</button>
                  </a>
                  <a href="{{ site_url('admin/produk/hapus/'.$row->id_produk)}}"
                    onclick="return confirm('Anda Yakin Ingin Menghapus ?')">
                    <button class="btn btn-danger btn-sm">Hapus</button>
                  </a>
                </td>
              </tr>
              <?php endforeach ?>

            </tbody>
          </table>
        </div>
        <!-- END DATA TABLE -->
      </div>

    </div>
  </div>
</div>
@endsection

@section('js')
<script type="text/javascript">

</script>
@endsection