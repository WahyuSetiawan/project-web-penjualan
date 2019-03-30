@extends('template')

@section('content')
<div class="au-card recent-report">

    <div class="au-card-inner">
        <h3 class="title-5 m-b-35">Tambah Data Pembelian {{(isset($pembelian))?"Ubah":"Baru"}}</h3>

        <form action="<?php echo site_url('admin/pembelian/') .((isset($pembelian))?"put/". $pembelian->id_pembelian:"set"
            )?>" method="post">
            <input name="_method" type="hidden" value="{{(isset($pembelian))?"PUT":"SET"}}">

            <div class="form-group form-float">
                <div class="form-line">
                    <label class="form-label">Supplier</label>
                    <select class="form-control" name="supplier">
                        @foreach ($supplier as $item)
                        <option value="{{$item->id_supplier}}"
                            {{(isset($pembelian))? ($pembelian->id_supplier == $item->id_supplier) ? "Selected" : "" :""}}>{{
                            $item->id_supplier." - ". $item->nama}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group form-float">
                <div class="form-line">
                    <label class="form-label">Alamat</label>
                    <select class="form-control" name="produk">
                        @foreach ($produk as $item)
                        <option value="{{$item->id_produk}}"
                            {{(isset($pembelian))? ($pembelian->id_produk == $item->id_produk) ? "Selected" : "" :""}}>{{
                            $item->id_produk." - ". $item->nama_produk}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group form-float">
                <div class="form-line">
                    <label class="form-label">Jumlah</label>
                    <input type="text" class="form-control" name="jumlah" placeholder="0" required value="{{(isset($pembelian))?$pembelian->jumlah:""}}">
                </div>
            </div>

               <div class="form-group form-float">
                <div class="form-line">
                    <label class="form-label">Nominal</label>
                    <input type="text" class="form-control" name="nominal" placeholder="0" required value="{{(isset($pembelian))?$pembelian->nominal:""}}">
                </div>
            </div>

            <button class="btn btn-primary waves-effect" type="submit">Simpan</button>
        </form>
    </div>
</div>
@endsection