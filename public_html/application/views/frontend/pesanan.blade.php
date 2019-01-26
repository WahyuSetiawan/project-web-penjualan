@extends('frontend/template', $head) 
@section('content')
<section id="testimonials" class="testimonial  bg-gray">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">

				<h3>Detail Pesanan</h3>

				<hr>
				<table id="example" class="display" style="width:100%">
					<thead>
						<tr>
							<th>ID</th>
							<th>Pesanan</th>
							<th>Tanggal Pesan</th>
							<th>Nama Penerima</th>
							<th>alamat Penerima</th>
							<th>Total Bayar</th>
							<th>Kurir Pengiriman</th>
							<th>Total Ongkir</th>
							<th> Status Konfirmasi Pesanan </th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($pesanan as $r): ?>
						<tr>
							<td>#IDPESANAN00P {{$r->id_pesanan }} </td>
							<td> {{$r->status_pesanan }} </td>
							<td> {{ $r->tanggal_pesan }} </td>
							<td> {{ $r->nama_penerima }} </td>
							<td> {{ $r->alamat.', '.$r->provinsi_penerima.', '.$r->kota_penerima.'<br>'. $r->kode_pos }} </td>
							<td>Rp. {{number_format($r->total_bayar) }} </td>
							<td> {{ $r->kurir }} -
								<?php 
										if ($r->resi_pengiriman!=null) {
											echo $r->resi_pengiriman;
										}else{
											echo "Resi Belum Di Proses";
										}
										?>
							</td>
							<td>Rp. {{ number_format($r->jumlah_ongkir)}} </td>
							<td>
								<?php 
										switch ($r->status_pesanan) {
											case 'Dikonfirmasi':
											echo "<button type='button' class='btn btn-info btn-block btn-sm'>Sudah Dikonfirmasi Admin</button>";
											break;
											
											default:
											?>

								<?php echo form_open_multipart('akun/konfirmasi/'.$r->id_pesanan, ['id'=>'form_validation'] ,['method'=>'post'])?>
								<input type="file" name="pic" class="form-control" required="" value="BUkti Transfer">
								<button type='submit' class='btn btn-danger btn-block btn-sm'>Konfirmasi Pesanan</button>
								<?php form_close() ?>



								<?php 
											break;
										}
										?>
								<a href="<?php echo site_url('akun/invoice/'.$r->id_pesanan) ?>" target="_blank"><button type="button" class="btn btn-success btn-block btn-sm"
									 style="margin-top: 5px;">Detail Pesan</button></a>
							</td>

						</tr>
						<?php endforeach ?>
					</tbody>
				</table>
				<hr>
				<b>*<small>Untuk Pembatalan Pesanan, Silahkan Melakukan Menghubungi CS Kami</small></b>
			</div>

		</div>
	</div>
</section>
@endsection