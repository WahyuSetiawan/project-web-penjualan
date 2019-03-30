@extends('template')

@section('content')
<div class="au-card recent-report">

    <div class="au-card-inner">
        <h3 class="title-5 m-b-35">Tambah Data Supplier {{(isset($supplier))?"Ubah":"Baru"}}</h3>

        <form action="<?php echo site_url('admin/supplier/') .((isset($supplier))?"put/". $supplier->id_supplier:"set"
            )?>" method="post">
            <input name="_method" type="hidden" value="{{(isset($supplier))?"PUT":"SET"}}">

            <div class="form-group form-float">
                <div class="form-line">
                    <label class="form-label">Nama</label>
                    <input placeholder="Alias..." type="text" class="form-control" name="nama" required value="{{(isset($supplier))?$supplier->nama:""}}">
                </div>
            </div>

            <div class="form-group form-float">
                <div class="form-line">
                    <label class="form-label">Alamat</label>
                    <input type="text" placeholder="Jalan contoh RT.00..." class="form-control" name="alamat" required value="{{(isset($supplier))? $supplier->alamat:""}}">
                </div>
            </div>

            <div class="form-group form-float">
                <div class="form-line">
                    <label class="form-label">Telepon</label>
                    <input type="text" class="form-control" placeholder="0844323...." name="telepon" required value="{{(isset($supplier))?$supplier->telepon:""}}">
                </div>
            </div>

            <button class="btn btn-primary waves-effect" type="submit">Simpan</button>
        </form>
    </div>
</div>
@endsection