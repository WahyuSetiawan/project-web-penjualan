@extends('admin/template') 
@section('content')
<div class="au-card recent-report">

	<div class="au-card-inner">
		<h3 class="title-5 m-b-35">Data Pesanan</h3>
		<div class="table-data__tool">
		</div>
		<div class="table-responsive table-responsive-data2">
			<div id="items">
				<p>Pesanan</p>

				<table id="example4" class="display" style="width:100%">
					<tr>
						<th>Nama Produk</th>
						<th>Harga Produk</th>
						<th>Jumlah Pesan</th>
						<th>Catatan Produk</th>
						<th></th>
					</tr>
					<?php foreach ($detail_pesan as $r) {?>
					<tr>
						<form>
							<td> <input type="text" name="" value="<?php echo $r->nama_produk ?>" class="form-control"> </td>
							<td> <input type="text" name="" value="<?php echo $r->harga_produk ?>" class="form-control"> </td>
							<td> <input type="text" name="" value="<?php echo $r->qty ?>" class="form-control"> </td>
							<td> <input type="text" name="" value="<?php echo $r->catatan_produk ?>" class="form-control"> </td>
							<td>
								<a href="<?php echo site_url('admin/pesanan/edit/' . $r->id_pesanan) ?>"> <i class="fa fa-edit"></i></a>
								<a href="<?php echo site_url('admin/pesanan/hapus/' . $r->id_pesanan) ?>"> <i class="fa fa-trash"></i></a></td>
						</form>
					</tr>
					<?php }?>
				</table>

				<button id="btnAdd" type="button" class="btn btn-primary tambah_button btn-sm" data-toggle="tooltip" data-original-title="Add more controls"><i class="glyphicon glyphicon-plus-sign"></i>&nbsp; Tambah Pesanan&nbsp;</button>

				<div class="tambah_baru" style="display: none">
					<form method="post" action="{{ site_url("admin/pesanan/ubah/" . $pesanan->id_pesanan) }}">
						<div class="form-group">
							<label for="exampleInputEmail1">Nama Produk</label>
							<select class="form-control" name="id_produk">
								<?php foreach ($produk as $row): ?>
								<option value="{{ $row->id_produk }}"> {{ $row->nama_produk }} </option>
								<?php endforeach?>
							</select>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">qty</label>
							<input type="number" class="form-control" id="exampleInputPassword1" placeholder="qty" name="qty">
						</div>
						<button type="submit" class="btn btn-primary">Simpan Pesanan</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
 
@section('js')
<script>
	$(".tambah_button").click(function () {
		$(".tambah_baru").toggle();
	});

</script>
<script type="text/javascript">
	$(document).ready(function () {
		$('#example4').DataTable();
	});

</script>
@endsection