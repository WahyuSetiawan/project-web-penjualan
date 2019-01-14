@extends('admin/template')

@section('content')
<div class="au-card-inner">
	<h3 class="title-5 m-b-35">Tambah Setting</h3>

	<form action="<?php echo site_url('admin/kategori_produk/simpan') ?>" method="post">
		<div class="form-group form-float">
			<div class="form-line">
				<label class="form-label">Nama Kategori Produk</label>
				<input type="text" class="form-control" name="nama_kategori" required>
			</div>
		</div>

		<button class="btn btn-primary waves-effect" type="submit">SUBMIT</button>
	</form>
</div>
@endsection