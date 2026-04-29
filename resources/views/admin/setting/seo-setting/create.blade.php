@extends('admin.layouts.master')
@section('title', 'Seo Settings')

@section('content')
<section class="section">
    <div class="section-header">
      <div class="section-header-back">
        <a href="{{ route('admin.seo-setting.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
      </div>
      <h1>Seo Setting</h1>

    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Create Seo Setting</h4>
            </div>
            <div class="card-body">
                <form action="{{route('admin.seo-setting.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    @include('admin.setting.seo-setting.form')
                    
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
