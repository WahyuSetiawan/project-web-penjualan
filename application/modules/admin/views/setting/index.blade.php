@extends('template')


@section('content')
<div class="col-lg-12">

  <div class="row">
    <div class="col-12">
      @include('setting.caroussel')
    </div>
  </div>

  <div class="row">
    <div class="col-6">
      @include('setting.logo')
    </div>

    <div class="col-6">
      @include('setting.setting')
    </div>
  </div>
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

      reader.onload = function (e) {
        $("#form-logo .img-logo-preview").attr('src', e.target.result);
      };

      reader.readAsDataURL(this.files[0]);
    }
  });

  $(document).on('change', "#form-carousell input.img-carousell[type='file']", function () {
    if (this.files && this.files[0]) {
      var reader = new FileReader();
      var index = $(this).data("index");

      reader.onload = function (e) {
        $("#form-carousell img.img-preview[data-index='" + index + "']").attr("src", e.target.result);
        $("#form-carousell img.img-preview-new[data-index='" + index + "']").attr("src", e.target.result);
      }
      reader.readAsDataURL(this.files[0]);
    }
  });

  var index_new = 0;

  $(document).on('click', "#form-carousell .nav-add-contact", function () {
    var current = $(this);

    var id_template = "nav-tab-new-" + index_new;

    var template_tab = $("#template-tab-carousell");
    var template_carousell_clone = template_tab.clone();

    template_carousell_clone.find(".nav-item").attr("href", "#" + id_template);
    template_carousell_clone.find(".nav-item").attr("aria-controls", id_template);
    template_carousell_clone.find(".nav-item").html("New Carousell" +
      ' <i class="fa tab_carousell_close fa-close"></i>');

    var template_content_tab = $("#template_tab_carousell_content");
    var template_content_tab_clone = template_content_tab.clone();

    template_content_tab_clone.find(".tab-pane").attr("id", id_template);


    $(".nav-item").removeClass("active");
    $(".tab-pane").removeClass("active");

    template_carousell_clone.find(".nav-item").addClass("active");
    template_content_tab_clone.find(".tab-pane").addClass("active");

    $("#nav-tab").append(template_carousell_clone.html());
    $("#nav-tab").append(current.clone());
    $("#nav-tabContent").append(template_content_tab_clone.html());

    current.remove();

    index_new++;
  });

  $(document).on("click", ".tab_carousell_close", function () {
    var current = $(this);
    var tab = current.parent().attr("aria-controls");
    current.parent().remove();
    $("#" + tab).remove();
  });

  $(document).on("change", "#form-carousell input[name='title_new[]']", function () {
    var current = $(this);

    $("a.nav-item[aria-controls='" + current.parents(".tab-pane").attr("id") + "']").html(current.val() +
      ' <i class="fa tab_carousell_close fa-close"></i>');
  });
</script>
@endsection