@extends('template')

@section('css')
<link href="{{ base_url("assets/admin/css/slimselect.min.css") }}" rel="stylesheet" />
@endsection

@section("content")
<?php
$url_form = base_url("admin/produk/simpan");

if (isset($produk)) {
	$url_form = base_url('admin/produk/ubah/'.$produk->id_produk); 
}

$image_utama_url =  (isset($produk->gambar_utama) && $produk->gambar_utama != " ") ?	base_url($produk->gambar_utama) : base_url();
?>

<div class="col-lg-16">
	<div class="card">
		<div class="card-header">
			<strong>Tambah Produk</strong>
			<small>Form</small>
		</div>
		<div class="card-body card-block">
			<form action="{{$url_form}}" id="form_validation" method="POST" enctype="multipart/form-data">

				<div class="container">
					<div class="row">
						<div class="col">
							<div class="form-group">
								<div class="form-line">
									<label class="form-label">Nama Produk</label>
									<input type="text" class="form-control" name="nama" required
										value="{{(isset($produk->nama_produk))? $produk->nama_produk: ""}}">
								</div>
							</div>

							<div class="form-group form-float">
								<div class="form-line">
									<label class="form-label">Harga : <small>(dalam rupiah/Rp.)</small></label>
									<input type="number" min="1" max="1000000000" class="form-control"
										name="harga" required value="{{(isset($produk->harga_produk))? $produk->harga_produk: "
											"}}">
								</div>
							</div>
						</div>
						<div class="col-4" style="text-align: center">
							<div class="form-group">
								<label for="exampleFormControlFile1">Upload Foto Produk</label>
								<img src="{{$image_utama_url}}"
									class="img img-loader-utama img-thumbnail image-item-big" />
								<input type="file" class="form-control-file" name="gambar_utama">
							</div>
						</div>
					</div>

					<div class="row m-b-35">
						<div class="col-3">
							<div class="from-group from-float">
								<div>
									<label>Kategori Model</label>
									<div>
										<?php foreach ($kategori as $key => $value) { ?>
										<input type="checkbox" name="kategori[{{$value->id_kategori}}]"
											{{isset($produk->kategori[$value->id_kategori])? "checked":""}}>
										{{{$value->nama_kategori}}}
										<br>
										<?php } ?>
									</div>
								</div>
							</div>
						</div>
						<div class="col">

							<div class="form-group form-float">
								<div class="form-line">
									<label class="form-label">Deskripsi Produk</label>
									<textarea name="deskripsi" cols="30" rows="5"
										class="form-control no-resize"
										required>{{(isset($produk->deskripsi_produk))? $produk->deskripsi_produk: ""}}</textarea>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col m-b-35">
							<div class="row">
								<div class="col m-b-25">
									Gambar detail Barang
								</div>
							</div>
							@if (isset($produk->gambar_lain))
							@foreach ($produk->gambar_lain as $key => $value)
							<input type="hidden" name="pic_last_tmp[{{$value->id_gambar_produk}}]"
								value="{{$value->path}}" />
							@endforeach
							@endif
							
							<div class="row container-image-tambahan">
								@if (isset($produk->gambar_lain))
								@foreach ($produk->gambar_lain as $key => $value)
								<div class="col-3">
									<div class="container-image">
										<img src="{{base_url($value->path)}}"
											class="img img-loader img-thumbnail image-item-big action-open-image"
											data-idgambar="{{$value->id_gambar_produk}}" />

										<div class="delete">
											<button type="button" class="btn btn-danger img-remove"
												data-idgambar="{{$value->id_gambar_produk}}"><i
													class="glyphicon glyphicon-remove-sign"></i></button>
										</div>
									</div>
									<div style="display: none">
										<input type="file" class="form-control"
											name="gambar_tambahan[{{$value->id_gambar_produk}}]"
											data-idgambar="{{$value->id_gambar_produk}}">
										<input type="hidden" name="pic_last[{{$value->id_gambar_produk}}]"
											value="{{$value->path}}" />
									</div>
								</div>
								@endforeach
								@endif
							</div>
						</div>


						{{-- <table class="table table-striped" style="border: none !important;">
							<thead>
								<tr>
									<td>Tambah Gambar Pendukung</td>
									<td>Image</td>
								</tr>
							</thead>


							<tbody id="TextBoxContainer">
								@if (isset($produk->gambar_lain)) @foreach ($produk->gambar_lain as $key =>
								$value)
								<tr>
									<td>
										<input type="file" class="form-control"
											name="gambar_tambahan[{{$value->id_gambar_produk}}]"
						data-idgambar="{{$value->id_gambar_produk}}">
						<input type="hidden" name="pic_last[{{$value->id_gambar_produk}}]"
							value="{{$value->path}}" />
						</td>
						<td>
							<img src="{{base_url($value->path)}}" alt="your" class="img img-loader"
								data-idgambar="{{$value->id_gambar_produk}}"
								style="-o-object-fit: none; object-fit: cover;$produk\ width:200px;height:200px;" />
						</td>
						<td>
							<button type="button" class="btn btn-danger img-remove"
								data-idgambar="{{$value->id_gambar_produk}}"><i
									class="glyphicon glyphicon-remove-sign"></i></button>
						</td>
						</tr>
						@endforeach @endif
						</tbody>

						<tbody>
							<tr>
								<th colspan="5">
									<button id="btnAdd" type="button"
										class="btn btn-primary btn-sm btn-add-image" data-toggle="tooltip"
										data-original-title="Add more controls"><i
											class="glyphicon glyphicon-plus-sign"></i>&nbsp; Tambah
										Foto&nbsp;</button>
								</th>
							</tr>
						</tbody>
						</table> --}}
					</div>
				</div>


				<?php
/*

				<div class="form-group form-float">
					<select id="kategori" multiple class="form-control">
						<?php foreach ($kategori as $key => $value) { ?>
				<option value="{{ $value->id_kategori}}">{{ $value->nama_kategori }}</option>
				<?php } ?>
				</select>
		</div>
		*/
		?>
		@if (isset($produk))
		@foreach ($produk->kategori as $item)
		<input type="hidden" name="last_kategori[{{$item->id_kategori}}]" value="{{$item->id_detail_kategori}}" />
		@endforeach
		@endif

		{{-- <div class="form-group form-float">
					<label class="form-label">Stok</label>
					<select class="form-control" name="stok" required>
						<option>Tersedia</option>
						<option>Kosong</option>
					</select>
				</div> --}}


		<button class="btn btn-primary waves-effect" type="submit">SUBMIT</button>
	</div>
	</form>

</div>

{{-- <table style="display: none">
	<tbody id="template_image">
		<tr>
			<td>
				<input type="file" class="form-control" name="gambar_tambahan[]" required>
			</td>
			<td>
				<img data-idgambar="" src="{{base_url('/assets/assets_public/image/180x180px.png')}}"
class="img img-loader" alt="your image"
style="-o-object-fit: none; object-fit: cover;$produk\ width:200px;height:200px;" />
</td>
<td>
	<button type="button" class="btn btn-danger img-remove" data-idgambar=""><i
			class="glyphicon glyphicon-remove-sign"></i></button>
</td>
</tr>
</tbody>
</table> --}}

<div id="template_image" style="display: none">
	<div class="col-3">
		<div class="container-image">
			<img src="{{base_url('images/wallpaper/wallpaper_material_red.png')}}"
				class="img img-loader img-thumbnail image-item-big action-open-image" data-idgambar="" />

			<div class="delete" style="display: none">
				<button type="button" class="btn btn-danger img-remove"
					data-idgambar="{{$value->id_gambar_produk}}"><i
						class="glyphicon glyphicon-remove-sign"></i></button>
			</div>
		</div>
		<div style="display: none">
			<input type="file" class="form-control" name="gambar_tambahan[]" data-idgambar="">
		</div>
	</div>
</div>

@endsection

@section('js')
<script src="{{ base_url("assets/admin/js/slimselect.min.js")}}" type="text/javascript"></script>

<script type="text/javascript">
	// $(function (a) {
	// 	var iCnt = 1;

	// 	// $("#btnAdd").bind("click", function () {
	// 	// 	if (iCnt < 4) {
	// 	// 		iCnt = iCnt + 1;
	// 	// 		var div = $("<tr />");
	// 	// 		div.html(GetDynamicTextBox(iCnt));
	// 	// 		$("#TextBoxContainer").append(div);
	// 	// 	} else {
	// 	// 		console.log('stop ah');
	// 	// 	}
	// 	// });

	// 	$("body").on("click", ".remove", function () {
	// 		$(this).closest("tr").remove();
	// 		iCnt = iCnt - 1;
	// 	});
	// });


	// function GetDynamicTextBox(iCnt) {
	// 	console.log(iCnt);
	// 	return '<td><input type="file" id="pic_' + iCnt + '" onchange="readURL' + iCnt +
	// 		'(this);" class="form-control" name="userFile[]"  required> </td>' +
	// 		'<td><img id="blah' + iCnt +
	// 		'" src="<?php echo base_url() ?>/assets/assets_public/image/180x180px.png" alt="your image" style="-o-object-fit: none; object-fit: cover; width:200px;height:200px;" /></td>' +
	// 		'<td><button type="button" class="btn btn-danger remove"><i class="glyphicon glyphicon-remove-sign"></i></button></td>';
	// }
</script>
@endsection