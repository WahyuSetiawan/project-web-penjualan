@extends('template')
@section("content")
<div class="au-card recent-report">

	<div class="au-card-inner">
		<h3 class="title-5 m-b-35">@if (isset($produk)) Ubah Data Produk @else Tambah Data Produk @endif
		</h3>

		<form action="<?php	if (isset($produk)) {echo base_url('admin/produk/ubah/'.$produk->id_produk); } else { echo
		 base_url("
		 admin/produk/simpan"); } ?>" id="form_validation" method="POST" enctype="multipart/form-data">

			<div class="form-group form-float">
				<div class="form-line">
					<label class="form-label">Nama Produk</label>
					<input type="text" class="form-control" name="nama" required
						value="{{(isset($produk->nama_produk))? $produk->nama_produk: ""}}">
				</div>
			</div>

			@if (isset($produk))
			@foreach ($produk->kategori as $item)
			<input type="hidden" name="last_kategori[{{$item->id_kategori}}]" value="{{$item->id_detail_kategori}}" />
			@endforeach
			@endif

			<div>
				<div>
					<label>Kategori Model</label>
					<div>
						<?php foreach ($kategori as $key => $value) { ?>
						<input type="checkbox" name="kategori[{{$value->id_kategori}}]"
							{{isset($produk->kategori[$value->id_kategori])? "checked":""}}> {{{$value->nama_kategori}}}
						<br>
						<?php } ?>
					</div>
				</div>
			</div>

			<div class="form-group form-float">
				<div class="form-line">
					<label class="form-label">Harga : Rp.</label>
					<input type="number" min="1" max="1000000000" class="form-control" name="harga" required value="{{(isset($produk->harga_produk))? $produk->harga_produk: "
					 "}}">
				</div>
			</div>

			<div class="form-group form-float">
				<label class="form-label">stok</label>
				<select class="form-control" name="stok" required>
					<option>Tersedia</option>
					<option>Kosong</option>
				</select>
			</div>
			<div class="form-group form-float">
				<div class="form-line">
					<label class="form-label">Deskripsi Produk</label>
					<textarea name="deskripsi" cols="30" rows="5" class="form-control no-resize"
						required>{{(isset($produk->deskripsi_produk))? $produk->deskripsi_produk: ""}}</textarea>
				</div>
			</div>


			<table class="table table-striped" style="border: none !important;">
				<thead>
					<tr>
						<td>Tambah Gambar Utama</td>
						<td>Image</td>
					</tr>
				</thead>
				<tbody id="TextBoxContainer1">
					<td><input type='file' class="form-control" name="gambar_utama"></td>
					<td>
						<img src="<?Php
							if (isset($produk->gambar_utama) && $produk->gambar_utama != " ") {
								echo base_url($produk->gambar_utama);
							} else {
								echo base_url();
							}	
							?>" class="img img-loader-utama"
							style="-o-object-fit: none; object-fit: cover;$produk\ width:200px;height:200px;" />
					</td>
				</tbody>
				<thead>
					<tr>
						<td>Tambah Gambar Pendukung</td>
						<td>Image</td>
					</tr>
				</thead>

				@if (isset($produk->gambar_lain)) @foreach ($produk->gambar_lain as $key => $value)
				<input type="hidden" name="pic_last_tmp[{{$value->id_gambar_produk}}]" value="{{$value->path}}" />
				@endforeach @endif

				<tbody id="TextBoxContainer">
					@if (isset($produk->gambar_lain)) @foreach ($produk->gambar_lain as $key => $value)
					<tr>
						<td>
							<input type="file" class="form-control" name="gambar_tambahan[{{$value->id_gambar_produk}}]"
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
							<button id="btnAdd" type="button" class="btn btn-primary btn-sm btn-add-image"
								data-toggle="tooltip" data-original-title="Add more controls"><i
									class="glyphicon glyphicon-plus-sign"></i>&nbsp; Tambah Foto&nbsp;</button>
						</th>
					</tr>
				</tbody>
			</table>

			<button class="btn btn-primary waves-effect" type="submit">SUBMIT</button>
		</form>
	</div>
</div>
<table style="display: none">
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
</table>
@endsection

@section('js')
<script type="text/javascript">
	var template_image = $('#template_image');
	var container = $('#TextBoxContainer');

	var index_gambar_terbaru = 0;


	$(document).on("click", ".img-remove",
		function () {
			var index = $(this).data("idgambar");
			$(this).parent().parent().remove();
		});

	$(document).on('click', '.btn-add-image',
		function () {
			if (container.find("tr").length < 4) {

				while (true) {
					if ($("input[name='gambar_tambahan[" + index_gambar_terbaru + "]'").length == 0) {
						break;
					} else {
						index_gambar_terbaru++;
					}
				}

				var template_clone = template_image.clone();

				$(template_clone).find("input[name='gambar_tambahan[]']")
					.attr('name', "gambar_tambahan[" + index_gambar_terbaru + "]")
					.attr("data-idgambar", index_gambar_terbaru);

				$(template_clone).find('.img-loader')
					.attr("data-idgambar", index_gambar_terbaru);

				$(template_clone).find('.btn .img-remove')
					.attr('data-idgambar', index_gambar_terbaru);

				container.append(template_clone.html());

				index_gambar_terbaru++;
			} else {
				alert("Gambar tambahan hanya 4 gambar saja");
			}
		});

	$(document).on("change", "input[name*='gambar_tambahan['], input[name='gambar_utama']",
		function () {
			var name = $(this).attr("name");
			var index = $(this).data("idgambar");

			if (this.files && this.files[0]) {
				var reader = new FileReader();

				reader.onload = function (e) {
					if (name == "gambar_utama") {
						$(".img-loader-utama").attr('src', e.target.result);
					} else {
						$(".img-loader[data-idgambar='" + index + "']").attr('src', e.target.result);
					}
				}

				reader.readAsDataURL(this.files[0]);
			}
		});



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