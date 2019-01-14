@extends('admin/template')

@section("content")
<div class="au-card recent-report">


<div class="au-card-inner">
	<h3 class="title-5 m-b-35">Tambah Data Produk</h3>
	<?php echo form_open_multipart('admin/produk/ubah_simpan/'.$produk[0]->id_produk, ['id'=>'form_validation'] ,['method'=>'post'])?>
	
	<div class="form-group form-float">
		<div class="form-line">
			<label class="form-label">Nama Produk</label>
			<input type="text" class="form-control" name="nama" required value="<?php echo $produk[0]->nama_produk ?>">
		</div>
	</div>

	<div class="form-group form-float">
		<div class="form-line">
			<label class="form-label">Kategori Produk</label>
			<select name="kategori" class="form-control show-tick" required>
				<option value="">-- Pilih Kategori --</option>
				<?php foreach ($kategori as $row) {?>
					<option value="<?=($row->id_kategori)?>"><?=($row->nama_kategori)?></option>
				<?php } ?>
			</select>
		</div>
	</div>

	<div class="form-group form-float">
		<div class="form-line">
			<label class="form-label">Harga : Rp.</label>
			<input type="number" min="1" max="1000000000" class="form-control" name="harga" required value="<?php echo $produk[0]->harga_produk ?>">
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
			<textarea name="deskripsi" cols="30" rows="5" class="form-control no-resize" required>
				<?php echo $produk[0]->deskripsi_produk ?>
			</textarea>
		</div>
	</div>

	<div class="form-group form-float">
		<label>Gambar Utama</label>
		<input type="file"  name="pic" />
	</div>

	<button class="btn btn-primary waves-effect" value="ubah" name="ubah" type="submit">SUBMIT</button>
	<?php form_close() ?>
</div>
</div>

@endsection 