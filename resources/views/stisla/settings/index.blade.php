@extends('stisla.layouts.app')

@section('title')
  {{ $title = __('Settings') }}
@endsection

@section('content')

@section('content')
  @include('stisla.includes.breadcrumbs.breadcrumb-table')

  <div class="section-body">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4><i class="fa fa-cogs"></i> {{ $title }} Umum</h4>

          </div>
          <div class="card-body">
            <form action="{{ route('settings.update') }}" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="type" value="umum">
              @method('put')
              @csrf
              <div class="row clearfix">
                <div class="col-sm-6">
                  @include('stisla.includes.forms.inputs.input', ['id'=>'application_name', 'label'=>__('Application
                  Name'),
                  'value'=>$_app_name, 'required'=>true])
                </div>
                <div class="col-sm-6">
                  @include('stisla.includes.forms.inputs.input', ['id'=>'company_name', 'label'=>__('Company Name'),
                  'value'=>$_company_name, 'required'=>true])
                </div>
                <div class="col-sm-6">
                  @include('stisla.includes.forms.inputs.input', ['id'=>'since', 'label'=>__('Since'),
                  'value'=>$_since, 'type'=>'number', 'min'=>2000, 'required'=>true])
                </div>
                <div class="col-sm-6">
                  @include('stisla.includes.forms.inputs.input', ['id'=>'application_version', 'label'=>__('Version'),
                  'value'=>$_application_version, 'required'=>true])
                </div>

                <div class="col-md-12">
                  @include('stisla.includes.forms.buttons.btn-save')
                  @include('stisla.includes.forms.buttons.btn-reset')
                </div>
              </div>
            </form>
          </div>
        </div>

        <div class="card">
          <div class="card-header">
            <h4><i class="fa fa-eye"></i> {{ __('Pengaturan Tampilan') }}</h4>

          </div>
          <div class="card-body">
            <form action="{{ route('settings.update') }}" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="type" value="tampilan">
              @method('put')
              @csrf
              <div class="row clearfix">
                <div class="col-sm-6">
                  {{-- {{ dd($activeSkin->value) }} --}}
                  @include('stisla.includes.forms.selects.select', ['id'=>'stisla_skin', 'label'=>__('Skin'),
                  'selected'=>$_stisla_skin, 'options'=>$skins, 'required'=>true])
                </div>
                <div class="col-sm-6">
                  @include('stisla.includes.forms.selects.select', ['id'=>'stisla_login_template', 'label'=>__('Tampilan
                  Halaman Masuk'), 'selected'=>$_stisla_login_template,
                  'options'=>['default'=>'default', 'tampilan 2'=>'tampilan 2'], 'required'=>true])
                </div>
                <div class="col-sm-6">
                  @include('stisla.includes.forms.selects.select', ['id'=>'stisla_sidebar_mini', 'label'=>__('Sidebar
                  Mini'),
                  'selected'=>$_stisla_sidebar_mini,
                  'options'=>['0'=>'Tidak', '1'=>'Ya'],
                  'required'=>true])
                </div>
                <div class="col-sm-6">
                  @include('stisla.includes.forms.inputs.input', ['id'=>'favicon', 'label'=>__('Favicon'),
                  'required'=>false, 'accept'=>'image/x-icon', 'type'=>'file'])
                </div>
                <div class="col-md-12">
                  @include('stisla.includes.forms.buttons.btn-save')
                  @include('stisla.includes.forms.buttons.btn-reset')
                </div>
              </div>
            </form>
          </div>
        </div>

        <div class="card">
          <div class="card-header">
            <h4><i class="fa fa-envelope"></i> {{ __('Pengaturan Email') }}</h4>

          </div>
          <div class="card-body">
            <form action="{{ route('settings.update') }}" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="type" value="email">
              @method('put')
              @csrf
              <div class="row clearfix">
                <div class="col-sm-12">
                  @include('stisla.includes.forms.selects.select', ['id'=>'mail_provider',
                  'options'=>['mailtrap'=>'mailtrap',
                  'mailgun'=>'mailgun', 'smtp'=>'smtp biasa',], 'label'=>__('Pilih Provider'), 'required'=>true,
                  'selected'=>$_mail_provider =
                  old('mail_provider')??$_mail_provider])
                </div>
                <div class="col-sm-6">
                  @include('stisla.includes.forms.inputs.input-email', ['id'=>'mail_from_address', 'label'=>__('From
                  Address'),
                  'required'=>true,
                  'value'=>old('mail_from_address')??$_mail_from_address])
                </div>
                <div class="col-sm-6">
                  @include('stisla.includes.forms.inputs.input-name', ['id'=>'mail_from_name', 'label'=>__('From Name'),
                  'required'=>true,
                  'value'=>old('mail_from_name')??$_mail_from_name])
                </div>
              </div>

              <div class="row d-none" id="mailtrap_area">
                <div class="col-sm-6">
                  @include('stisla.includes.forms.inputs.input', ['id'=>'mail_mailtrap_host', 'label'=>__('SMTP Host'),
                  'required'=>true,
                  'value'=>old('mail_mailtrap_host')??$_mail_mailtrap_host])
                </div>
                <div class="col-sm-6">
                  @include('stisla.includes.forms.inputs.input', ['id'=>'mail_mailtrap_port', 'label'=>__('SMTP Port'),
                  'required'=>true,
                  'value'=>old('mail_mailtrap_port')??$_mail_mailtrap_port])
                </div>
                <div class="col-sm-6">
                  @include('stisla.includes.forms.inputs.input', ['id'=>'mail_mailtrap_username', 'label'=>__('SMTP
                  Username'),
                  'required'=>true,
                  'value'=>old('mail_mailtrap_username')??$_mail_mailtrap_username])
                </div>
                <div class="col-sm-6">
                  @include('stisla.includes.forms.inputs.input', ['id'=>'mail_mailtrap_password', 'label'=>__('SMTP
                  Password'),
                  'required'=>true,
                  'value'=>old('mail_mailtrap_password')??$_mail_mailtrap_password])
                </div>
                <div class="col-sm-6">
                  @include('stisla.includes.forms.inputs.input', ['id'=>'mail_mailtrap_encryption', 'label'=>__('SMTP
                  Encryption'),
                  'required'=>true,
                  'value'=>old('mail_mailtrap_encryption')??$_mail_mailtrap_encryption])
                </div>
              </div>

              <div class="row d-none" id="smtp_area">
                <div class="col-sm-6">
                  @include('stisla.includes.forms.inputs.input', ['id'=>'mail_host', 'label'=>__('SMTP Host'),
                  'required'=>true,
                  'value'=>old('mail_host')??$_mail_host])
                </div>
                <div class="col-sm-6">
                  @include('stisla.includes.forms.inputs.input', ['id'=>'mail_port', 'label'=>__('SMTP Port'),
                  'required'=>true,
                  'value'=>old('mail_port')??$_mail_port])
                </div>
                <div class="col-sm-6">
                  @include('stisla.includes.forms.inputs.input', ['id'=>'mail_username', 'label'=>__('SMTP Username'),
                  'required'=>true,
                  'value'=>old('mail_username')??$_mail_username])
                </div>
                <div class="col-sm-6">
                  @include('stisla.includes.forms.inputs.input', ['id'=>'mail_password', 'label'=>__('SMTP Password'),
                  'required'=>true,
                  'value'=>old('mail_password')??$_mail_password])
                </div>
                <div class="col-sm-6">
                  @include('stisla.includes.forms.inputs.input', ['id'=>'mail_encryption', 'label'=>__('SMTP Encryption'),
                  'required'=>true,
                  'value'=>old('mail_encryption')??$_mail_encryption])
                </div>
              </div>

              <div class="row d-none" id="mailgun_area">
                <div class="col-sm-6">
                  @include('stisla.includes.forms.inputs.input', ['id'=>'mail_mailgun_domain', 'label'=>__('Domain'),
                  'required'=>true,
                  'value'=>old('mail_mailgun_domain')??$_mail_mailgun_domain])
                </div>
                <div class="col-sm-6">
                  @include('stisla.includes.forms.inputs.input', ['id'=>'mail_mailgun_api_key', 'label'=>__('Api Key /
                  Secret'),
                  'required'=>true,
                  'value'=>old('mail_mailgun_api_key')??$_mail_mailgun_api_key])
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  @include('stisla.includes.forms.buttons.btn-save')
                  @include('stisla.includes.forms.buttons.btn-reset')
                </div>
              </div>
            </form>
          </div>
        </div>

        <div class="card">
          <div class="card-header">
            <h4><i class="fa fa-cogs"></i> {{ __('Pengaturan Lainnya') }}</h4>

          </div>
          <div class="card-body">
            <form action="{{ route('settings.update') }}" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="type" value="lainnya">
              @method('put')
              @csrf
              <div class="row clearfix">
                <div class="col-sm-6">
                  @include('stisla.includes.forms.selects.select', ['id'=>'is_login_must_verified',
                  'label'=>__('Akun Masuk Verifikasi Email Terlebih Dahulu'),
                  'selected'=>$_is_login_must_verified, 'options'=>['0'=>'Tidak', '1'=>'Ya'], 'required'=>true])
                </div>

                <div class="col-sm-6">
                  @include('stisla.includes.forms.selects.select', ['id'=>'is_active_register_page',
                  'label'=>__('Aktifkan Halaman Daftar (Registrasi)'),
                  'selected'=>$_is_active_register_page, 'options'=>['0'=>'Tidak', '1'=>'Ya'], 'required'=>true])
                </div>

                <div class="col-sm-6">
                  @include('stisla.includes.forms.selects.select', ['id'=>'is_forgot_password_send_to_email',
                  'label'=>__('Lupa Password Kirim Ke Email'),
                  'selected'=>$_is_forgot_password_send_to_email, 'options'=>['0'=>'Tidak', '1'=>'Ya'], 'required'=>true])
                </div>
                <div class="col-md-12">
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

@push('scripts')
  <input type="hidden" id="mailTrapProviderHaha" value="{{ $_mail_provider }}">
  <script>
    $(function() {
      $('#mail_provider').on('change', function() {
        $('#smtp_area').addClass('d-none');
        $('#mailtrap_area').addClass('d-none');
        $('#mailgun_area').addClass('d-none');
        $('#' + $(this).val() + '_area').removeClass('d-none');
      });
      $('#' + document.getElementById('mailTrapProviderHaha').value + '_area').removeClass('d-none');
    });
  </script>
@endpush
