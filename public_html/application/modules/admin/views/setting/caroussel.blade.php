<form method="POST" action="{{base_url("admin/setting/carousell")}}" enctype="multipart/form-data" id="form-carousell">
    <div class="card">
        <div class="card-header">
            <strong>Setting</strong> Carousell
        </div>
        <div class="card-body">
            <div class="row">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="default-tab">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">

                                    @foreach ($carousell as $item)
                                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-carousell-{{$item->id_carousell}}"
                                        role="tab" aria-controls="nav-carousell-{{$item->id_carousell}}" aria-selected="true">{{$item->title}}
                                        <i class="fa tab_carousell_close fa-close"></i></a>
                                    @endforeach

                                    <a class="nav-item nav-link nav-add-contact" data-toggle="tab" href="#nav-contact"
                                        role="tab" aria-controls="nav-contact" aria-selected="false"><i class="fa fa-plus">
                                        </i>
                                    </a>
                                </div>
                            </nav>
                            <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                                @foreach ($carousell as $item)
                                <div class="tab-pane fade show active" id="nav-carousell-{{$item->id_carousell}}" role="tabpanel"
                                    aria-labelledby="nav-home-tab">
                                    <div class="row">
                                        <div class="col col-md-4">
                                            <img class="img-preview" src="{{base_url($item->img)}}" data-index="{{$item->id_carousell}}">
                                        </div>
                                        <div class="col col-md-1">
                                        </div>
                                        <div class="col col-md-5 col-md-offset-1">
                                            <div class="row">
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="text-input" class=" form-control-label">Background</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <input type="file" name="file[{{$item->id_carousell}}]"
                                                            placeholder="Title" class="form-control img-carousell"
                                                            data-index="1">
                                                        <small class="form-text text-muted">Title carousell</small>
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="text-input" class=" form-control-label">Title</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <input type="text" name="title[{{$item->id_carousell}}]"
                                                            placeholder="Title" class="form-control" value="{{$item->title}}">
                                                        <small class="form-text text-muted">Title carousell</small>
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="text-input" class=" form-control-label">Sub Title</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <input type="text" name="sub_title[{{$item->id_carousell}}]"
                                                            placeholder="Title" class="form-control" value={{$item->sub_title}}>
                                                        <small class="form-text text-muted">Sub Title</small>
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="text-input" class=" form-control-label">Content</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <textarea name="content[{{$item->id_carousell}}]" class="form-control">{{$item->content}}</textarea>
                                                        <small class="form-text text-muted">Title carousell</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach



                                {{--

                                end section new carousell

                                --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-success btn-sm" value="set">
                Update Carousell
            </button>
        </div>
    </div>
</form>

<div id="template-tab-carousell" style="display: none">
<a class="nav-item nav-link" data-toggle="tab" href="" role="tab" aria-controls=""
    aria-selected="false"><i class="fa fa-plus">
    </i></a>
</div>

<div id="template_tab_carousell_content" style="display: none">
    <div class="tab-pane fade show" role="tabpanel" aria-labelledby="nav-home-tab">
        <div class="row">
            <div class="col col-md-4">
                <img class="img-preview-new" src="{{base_url('uploads/dummy/dummy.jpg')}}" data-index="1">
            </div>
            <div class="col col-md-1">
            </div>
            <div class="col col-md-5 col-md-offset-1">
                <div class="row">
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Background</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="file" name="file_new[]" placeholder="Title" class="form-control img-carousell"
                                data-index="1">
                            <small class="form-text text-muted">Title carousell</small>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Title</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" name="title_new[]" placeholder="Title" class="form-control">
                            <small class="form-text text-muted">Title carousell</small>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Sub Title</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" name="sub_title_new[]" placeholder="Title" class="form-control">
                            <small class="form-text text-muted">Sub Title</small>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Content</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <textarea name="content_new[]" class="form-control">Content</textarea>
                            <small class="form-text text-muted">Title carousell</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>