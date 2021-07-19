@extends('stisla.layouts.app')

@section('title')
  {{ $title = __('Settings') }}
@endsection

@section('content')

@section('content')
  <div class="section-header">
    <h1>{{ $title }}</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active">
        <a href="{{ route('dashboard.index') }}">{{ __('Dashboard') }}</a>
      </div>
      <div class="breadcrumb-item">{{ $title }}</div>
    </div>
  </div>

  <div class="section-body">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4><i class="fa fa-cogs"></i> {{ $title }}</h4>

          </div>
          <div class="card-body">
            <form action="{{ route('settings.update') }}" method="POST">
              @method('put')
              @csrf
              <div class="row clearfix">
                <div class="col-sm-6">
                  @include('includes.form.input', ['id'=>'application_name', 'label'=>__('Application Name'),
                  'value'=>$_application_name->value, 'required'=>true])
                </div>
                <div class="col-sm-6">
                  @include('includes.form.input', ['id'=>'company_name', 'label'=>__('Company Name'),
                  'value'=>$_company_name->value, 'required'=>true])
                </div>
                <div class="col-sm-6">
                  @include('includes.form.input', ['id'=>'since', 'label'=>__('Since'),
                  'value'=>$_since->value, 'type'=>'number', 'min'=>2000, 'required'=>true])
                </div>
                <div class="col-sm-6">
                  @include('includes.form.input', ['id'=>'application_version', 'label'=>__('Version'),
                  'value'=>$_application_version->value, 'required'=>true])
                </div>
                <div class="col-sm-6">
                  {{-- {{ dd($activeSkin->value) }} --}}
                  @include('includes.form.select', ['id'=>'stisla_skin', 'label'=>__('Skin'),
                  'selected'=>$activeSkin->value, 'options'=>$skins, 'required'=>true])
                </div>
                <div class="col-md-12">
                  @include('includes.form.buttons.save-btn')
                  @include('includes.form.buttons.reset-btn')
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

    </div>
  </div>

@endsection