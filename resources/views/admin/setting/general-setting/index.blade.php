@extends('admin.layouts.master')
@section('title', 'General Settings')

@section('content')
<section class="section">
    <div class="section-header">
      <div class="section-header-back">
        <a href="{{route('admin.settings.index')}}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
      </div>
      <h1>General Setting</h1>

    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Update Setting</h4>
            </div>
            <div class="card-body">
                <form action="{{route('admin.general-setting.update',1)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    @if (!empty($setting->logo))
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Logo Preview</label>
                            <div class="col-sm-12 col-md-7">
                                <a title="Preview Logo" href="{{asset($setting->logo)}}" target="_blank">
                                    <img style="width:200px" src="{{asset($setting->logo)}}" alt="Logo">
                                </a>
                            </div>
                        </div>
                    @endif

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Logo</label>
                        <div class="col-sm-12 col-md-7">
                            <div class="custom-file">
                                <input type="file" name="logo" class="custom-file-input" id="logoFile">
                                <label class="custom-file-label" for="logoFile">Choose file</label>
                            </div>
                        </div>
                    </div>

                    @if (!empty($setting->footer_logo))
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Footer Logo Preview</label>
                            <div class="col-sm-12 col-md-7">
                                <a title="Preview Footer Logo" href="{{asset($setting->footer_logo)}}" target="_blank">
                                    <img style="width:200px" src="{{asset($setting->footer_logo)}}" alt="Footer Logo">
                                </a>
                            </div>
                        </div>
                    @endif

                    <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Footer Logo</label>
                    <div class="col-sm-12 col-md-7">
                        <div class="custom-file">
                            <input type="file" name="footer_logo" class="custom-file-input" id="footerLogoFile">
                            <label class="custom-file-label" for="footerLogoFile">Choose file</label>
                        </div>
                    </div>
                    </div>

                    @if (!empty($setting->favicon))
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Fevicon Preview</label>
                            <div class="col-sm-12 col-md-7">
                                <a title="Preview Favicon" href="{{asset($setting->favicon)}}" target="_blank">
                                    <img style="width:200px" src="{{asset($setting->favicon)}}" alt="Favicon">
                                </a>
                            </div>
                        </div>
                    @endif

                    <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Favicon</label>
                    <div class="col-sm-12 col-md-7">
                        <div class="custom-file">
                            <input type="file" name="favicon" class="custom-file-input" id="faviconFile">
                            <label class="custom-file-label" for="faviconFile">Choose file</label>
                        </div>
                    </div>
                    </div>

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                      <div class="col-sm-12 col-md-7">
                        <button class="btn btn-primary">Update</button>
                      </div>
                    </div>
                </form>



            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
