@extends('template')


@section('content')
<div class="col-lg-12">

  <div class="row">
    <div class="col-6">
      @include('setting.logo')
    </div>

    <div class="col-6">
      @include('setting.setting')
    </div>
  </div>

  </form>
</div>

@endsection

@section('js')

<script>
  var form_logo = $('#form-logo');

  $(document).on("click", "#form-logo .upload-image", function (params) {
    $("#form-logo input[name='logo']").click();
  })


  $(document).on("change", "#form-logo input[name='logo']", function () {
    if (this.files && this.files[0]) {
      var reader = new FileReader();

      var form = $(this);

      reader.onload = function(e) {
        $("#form-logo .img-logo-preview").attr('src', e.target.result);
      };

      reader.readAsDataURL(this.files[0]);
    }
  });
</script>
@endsection