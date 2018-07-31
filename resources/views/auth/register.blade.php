<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Halaman Daftar</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/font-awesome/4.5.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/ionicons/2.0.1/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/iCheck/square/blue.css') }}">
    <style>
    .login-logo, .register-logo {
        font-size: 28px;
    }
</style>
</head>
<body class="hold-transition register-page">
    <div class="register-box">
        <div class="register-logo">
            <a href="{{ route('login') }}"><b>FLASH SALE </b>GUNNERY</a>
        </div>
        @if(session('success_msg'))
        <div class="alert alert-success">
            {{ session('success_msg') }}
        </div>
        @endif
        <div class="register-box-body">
            <p class="login-box-msg">Mendaftar member baru</p>
            <form action="{{ route('daftar') }}" method="post">
                @csrf
                <div class="form-group has-feedback {{ $errors->has('nama_ktp') ? 'has-error' : '' }}">
                    <input name="nama_ktp" value="{{ old('nama_ktp') }}" type="text" class="form-control" placeholder="Nama dalam KTP">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if($errors->has('nama_ktp')) <span class="help-block">{{ $errors->first('nama_ktp') }}</span> @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('no_telp') ? 'has-error' : '' }}">
                    <input name="no_telp" value="{{ old('no_telp') }}" type="text" class="form-control" placeholder="No Telp">
                    <span class="glyphicon glyphicon-phone form-control-feedback"></span>
                    @if($errors->has('no_telp')) <span class="help-block">{{ $errors->first('no_telp') }}</span> @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
                    <input name="email" value="{{ old('email') }}" type="email" class="form-control" placeholder="Email">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @if($errors->has('email')) <span class="help-block">{{ $errors->first('email') }}</span> @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
                    <input name="password" value="{{ old('password') }}" type="password" class="form-control" placeholder="Password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    @if($errors->has('password')) <span class="help-block">{{ $errors->first('password') }}</span> @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                    <input name="password_confirmation" value="{{ old('password_confirmation') }}" type="password" class="form-control" placeholder="Ketik ulang password">
                    <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                    @if($errors->has('password_confirmation')) <span class="help-block">{{ $errors->first('password_confirmation') }}</span> @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('no_rek') ? 'has-error' : '' }}">
                    <input name="no_rek" value="{{ old('no_rek') }}" type="text" class="form-control" placeholder="No rekening">
                    <span class="glyphicon glyphicon-barcode form-control-feedback"></span>
                    @if($errors->has('no_rek')) <span class="help-block">{{ $errors->first('no_rek') }}</span> @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('atas_nama') ? 'has-error' : '' }}">
                    <input name="atas_nama" value="{{ old('atas_nama') }}" type="text" class="form-control" placeholder="Atas Nama">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if($errors->has('atas_nama')) <span class="help-block">{{ $errors->first('atas_nama') }}</span> @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('bank') ? 'has-error' : '' }}">
                    <select class="form-control" name="bank">
                        <option value="">Pilih Bank</option>
                        @foreach($bank as $b)
                        <option value="{{ $b->id }}" @if(old('bank')) selected="selected" @endif>{{ $b->nama_bank }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('bank')) <span class="help-block">{{ $errors->first('bank') }}</span> @endif
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <a class="btn btn-danger btn-flat" href="{{ route('login') }}" class="text-center">Sudah punya akun</a>
                    </div>

                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Daftar</button>
                    </div>

                </div>
            </form>
        </div>

    </div>

    <script src="{{ asset('plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('plugins/iCheck/icheck.min.js') }}"></script>
    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%'
            });
        });
    </script>
</body>
</html>
