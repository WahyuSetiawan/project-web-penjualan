@extends('admin/template')


@section('content')
<div class="col-lg-12">
  <div class="card">
    <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">

      <div class="card-header">
        <strong>Setting</strong> Website
      </div>
      <div class="card-body card-block">
        <div class="row form-group">
          <div class="col col-md-3">
            <label for="text-input" class=" form-control-label">Nama Website</label>
          </div>
          <div class="col-12 col-md-9">
            <input type="text" id="nama_website" name="setting[nama_website]" placeholder="Nama Website" class="form-control"
              value="{{(isset($setting['nama_website']))? $setting['nama_website']: ""}}">
            <small class="form-text text-muted">Nama Website</small>
          </div>
        </div>

        <div class="row form-group">
          <div class="col col-md-3">
            <label for="text-input" class=" form-control-label">Facebook</label>
          </div>
          <div class="col-12 col-md-9">
            <input type="text" id="facebook" name="setting[facebook]" placeholder="Facebook" class="form-control" value="{{(isset($setting['facebook']))? $setting['facebook']: ""}}">
            <small class="form-text text-muted">Facebook</small>
          </div>
        </div>


        <div class="row form-group">
          <div class="col col-md-3">
            <label for="text-input" class=" form-control-label">Instagram</label>
          </div>
          <div class="col-12 col-md-9">
            <input type="text" id="instagram" name="setting[instagram]" placeholder="Instagram" class="form-control"
              value="{{(isset($setting['instagram']))? $setting['instagram']: ""}}">
            <small class="form-text text-muted">Instagram</small>
          </div>
        </div>


        <div class="row form-group">
          <div class="col col-md-3">
            <label for="text-input" class=" form-control-label">No Telepon</label>
          </div>
          <div class="col-12 col-md-9">
            <input type="text" id="no_telepon" name="setting[no_telepon]" placeholder="No Telepon" class="form-control"
              value="{{(isset($setting['no_telepon']))? $setting['no_telepon']: ""}}">
            <small class="form-text text-muted">No Telepon</small>
          </div>
        </div>

        <div class="row form-group">
          <div class="col col-md-3">
            <label for="text-input" class=" form-control-label">Alamat</label>
          </div>
          <div class="col-12 col-md-9">
            <input type="text" id="alamat" name="setting[alamat]" placeholder="Alamat" class="form-control" 
            value="{{(isset($setting['alamat']))? $setting['alamat']: ""}}">
            <small class="form-text text-muted">Nama Website</small>
          </div>
        </div>

      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-primary btn-sm" name="set">
          <i class="fa fa-dot-circle-o"></i> Submit
        </button>
        <button type="reset" class="btn btn-danger btn-sm">
          <i class="fa fa-ban"></i> Reset
        </button>
      </div>
  </div>

</form>
</div>

@endsection

@section('js')
<script type="text/javascript">
  $(document).ready(function () {
    $('#setting-table').DataTable();
  });
  @endsection