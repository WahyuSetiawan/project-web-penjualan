@extends('admin/template') 
@section("content")
<div class="au-card recent-report">

  <div class="au-card-inner">
    <h3 class="title-5 m-b-35">Data Pesanan</h3>
    <div class="table-data__tool">
    </div>
    <div class="table-responsive table-responsive-data2">

      <table id="example4" class="display" style="width:100%">
        <thead>
          <tr>
            <th>-</th>

            <th>ID</th>
            <th>Pesanan</th>
            <th>Tanggal Pesan</th>
            <th>Total Bayar</th>
            <th>Bukti transfer</th>

            <th>Resi Pengiriman</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($pesanan as $r): ?>
          <tr>
            <td>
              <a href="{{ site_url('admin/pesanan/edit/'.$r->id_pesanan)}}"> <i class="fa fa-edit"></i></a>
              <a href="{{ site_url('admin/pesanan/hapus/'.$r->id_pesanan)}}"> <i class="fa fa-trash" return="onclick('anda Yakin ??')"></i></a>
            </td>
            <td>#P {{ $r->id_pesanan }} </td>
            <td> {{ $r->status_pesanan }} </td>
            <td> {{ $r->tanggal_pesan }} </td>
            <td>Rp. {{ number_format($r->total_bayar) }} </td>
            <td>
              <?php if ($r->status_pesanan == 'Konfirmasi' || $r->status_pesanan=='Dikonfirmasi') { ?>
              <a href="{{base_url('/'.$r->bukti_transfer)}}" target="_blank">Bukti Transfer</a>
              <?php }else{ ?>
              <span>Belum Ada resi</span>
              <?php } ?>

            </td>

            <td>
              <form action="{{site_url('admin/pesanan/proses/'.$r->id_pesanan)}}" method="POST" id="form_validation">   
                <input type="text" name="resi" class="form-control" required="" placeholder="Resi Pengiriman" value="{{ $r->resi_pengiriman }}">
                <button type='submit' class='btn btn-danger btn-sm'>Proses Pesanan</button>
              </form>
              <a href="{{ site_url('admin/pesanan/invoice/'.$r->id_pesanan) }}" target="_blank"><button type="button"
                  class="btn btn-success btn-block btn-sm" style="margin-top: 5px;">Detail Pesan</button></a>
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