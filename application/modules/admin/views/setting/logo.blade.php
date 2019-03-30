<div class="card">
  <form action="{{base_url("admin/setting/logo")}}" method="POST" enctype="multipart/form-data" class="form-horizontal"
    id="form-logo">
    <div class="card-header">
      <strong>Logo Website</strong>
    </div>
    <div class="card-body">
      <div class="row">
        <img src="{{base_url((isset($setting['logo']))? $setting['logo']->value: "uploads/logo/logo.png")}}" class="rounded mx-auto img-logo-preview img-120 img-thumbnail">
        <input name="logo" type="file" style="display:none" />
      </div>
      <div class="row">
        <button type="button" class="btn btn-primary btn-sm upload-image">
          Upload
        </button>
      </div>
    </div>
    <div class="card-footer">
      <button type="submit" class="btn btn-primary btn-sm" name="set">
        <i class="fa fa-dot-circle-o"></i> Upload
      </button>
    </div>
  </form>
</div>