@extends('stisla.layouts.app')

@section('title')
  {{ $fullTitle }}
@endsection

@section('content')
  <div class="section-header">
    <h1>{{ $title }}</h1>
    @include('stisla.includes.breadcrumbs.breadcrumb', [
        'breadcrumbs' => $breadcrumbs,
    ])
  </div>


  <div class="section-body">
    <h2 class="section-title">{{ $fullTitle }}</h2>
    <p class="section-lead">{{ __('Menampilkan halaman ' . $fullTitle) }}.</p>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4><i class="{{ $moduleIcon }}"></i> {{ $fullTitle }}</h4>
            <div class="card-header-action">
              @include('stisla.includes.forms.buttons.btn-view', ['link' => $routeIndex])
            </div>
          </div>
          <div class="card-body">
            <form action="{{ $action }}" method="POST" enctype="multipart/form-data" id="formAction">

              @isset($d)
                @method('PUT')
              @endisset

              @csrf
              <div class="row">
                <div class="col-md-6">
                  @include('stisla.includes.forms.inputs.input', ['required' => true, 'name' => 'text', 'label' => 'Text'])
                </div>
                <div class="col-md-6">
                  @include('stisla.includes.forms.inputs.input', ['required' => true, 'name' => 'number', 'type' => 'number', 'label' => 'Number'])
                </div>
                <div class="col-md-6">
                  @include('stisla.includes.forms.inputs.input-currency', [
                      'required' => true,
                      'name' => 'currency',
                      'label' => 'Currency',
                      'id' => 'currency',
                      'currency_type' => 'default',
                  ])
                </div>
                <div class="col-md-6">
                  @include('stisla.includes.forms.inputs.input-currency', [
                      'required' => true,
                      'name' => 'currency_idr',
                      'label' => 'Currency IDR',
                      'id' => 'currency_idr',
                      'currency_type' => 'rupiah',
                      'iconText' => 'IDR',
                  ])
                </div>
                <div class="col-md-6">
                  @include('stisla.includes.forms.selects.select', [
                      'id' => 'select',
                      'name' => 'select',
                      'options' => $selectOptions,
                      'label' => 'Select',
                      'required' => true,
                  ])
                </div>
                <div class="col-md-6">
                  @include('stisla.includes.forms.selects.select2', [
                      'id' => 'select2',
                      'name' => 'select2',
                      'options' => $selectOptions,
                      'label' => 'Select2',
                      'required' => true,
                  ])
                </div>
                <div class="col-md-6">
                  @include('stisla.includes.forms.selects.select2', [
                      'id' => 'select2_multiple',
                      'name' => 'select2_multiple',
                      'options' => $selectOptions,
                      'label' => 'Select2 Multiple',
                      'required' => true,
                      'multiple' => true,
                  ])
                </div>
                <div class="col-md-6">
                  @include('stisla.includes.forms.inputs.input-tags', ['required' => true, 'name' => 'tags', 'label' => 'Tags'])
                </div>
                <div class="col-md-6">
                  @include('stisla.includes.forms.inputs.input-radio-toggle', [
                      'required' => true,
                      'id' => 'radio',
                      'label' => 'Radio',
                      'options' => $radioOptions,
                  ])
                </div>

                <div class="col-md-6">
                  @include('stisla.includes.forms.inputs.input-checkbox-custom', [
                      'required' => true,
                      'id' => 'checkbox',
                      'label' => 'Checkbox',
                      'options' => $checkboxOptions,
                  ])
                </div>
                <div class="col-md-6">
                  @include('stisla.includes.forms.inputs.input-checkbox', [
                      'required' => true,
                      'id' => 'checkbox2',
                      'label' => 'Checkbox 2',
                      'options' => $checkboxOptions,
                  ])
                </div>
                <div class="col-md-6">
                  @include('stisla.includes.forms.inputs.input', ['required' => isset($d) ? false : true, 'name' => 'file', 'type' => 'file', 'label' => 'File'])
                </div>
                <div class="col-md-6">
                  @include('stisla.includes.forms.inputs.input', ['required' => true, 'name' => 'date', 'type' => 'date', 'label' => 'Date'])
                </div>
                <div class="col-md-6">
                  @include('stisla.includes.forms.inputs.input', ['required' => true, 'name' => 'time', 'type' => 'time', 'label' => 'Time'])
                </div>
                <div class="col-md-6">
                  @include('stisla.includes.forms.inputs.input-colorpicker', ['required' => true, 'name' => 'color', 'label' => 'Color'])
                </div>

                <div class="col-md-12">
                  @include('stisla.includes.forms.editors.textarea', ['required' => true, 'id' => 'textarea', 'label' => 'Textarea'])
                </div>
                <div class="col-md-12">
                  @include('stisla.includes.forms.editors.summernote', [
                      'required' => true,
                      'name' => 'summernote_simple',
                      'label' => 'Summernote Simple',
                      'simple' => true,
                      'id' => 'summernote_simple',
                  ])
                </div>
                <div class="col-md-12">
                  @include('stisla.includes.forms.editors.summernote', [
                      'required' => true,
                      'name' => 'summernote',
                      'label' => 'Summernote',
                      'id' => 'summernote',
                  ])
                </div>
                <div class="col-md-12" id="formAreaButton">
                  <br>
                  @include('stisla.includes.forms.buttons.btn-save')
                  @include('stisla.includes.forms.buttons.btn-reset')
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

    </div>
  </div>
@endsection

@push('css')
@endpush

@push('js')
@endpush

@push('scripts')
  @include('stisla.includes.scripts.disable-form')
@endpush
