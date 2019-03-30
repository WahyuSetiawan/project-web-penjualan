@extends('template')

@section('content')
<div class="au-card recent-report">

	<div class="au-card-inner">
		<h3 class="title-5 m-b-35">{{(isset($data)? "Ubah":"Tambah")}}Tambah Kategori Data Produk</h3>

		<form action="{{(isset($data))? site_url("admin/kategori_produk/put/".$data->id_kategori):site_url("admin/kategori_produk/simpan")}}"
		 method="post">
			<div class="form-group form-float">
				<div class="form-line">
					<label class="form-label">Nama Kategori Produk</label>
					<input type="text" class="form-control" name="nama_kategori" required value="{{(isset($data))?$data->nama_kategori: ""}}">
				</div>
			</div>

			<button class="btn btn-primary waves-effect" type="submit">SUBMIT</button>
		</form>
	</div>
</div>
@endsection
