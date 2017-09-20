@extends('auth.auth')

@section('htmlheader_title')
    Log in
@endsection

@section('content')
<body class="login-page">

    <div class="login-box">
        <div class="login-logo">
            <a href="{{ url('/home') }}"><b>e</b>ZdravstveniKarton</a>
        </div><!-- /.login-logo -->

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Greška!</strong> Desio se problem prilikom Vašeg unosa.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="login-box-body">
    <p class="login-box-msg">Prijavite se tako što ćete unijeti podatke u navedena polja.</p>
    <form action="{{ url('/auth/login') }}" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group has-feedback">
            <input type="email" class="form-control" placeholder="Email" name="email"/>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Lozinka" name="password"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
            <div class="col-xs-8">
                <div class="checkbox icheck">
                    <label>
                        <input type="checkbox" name="remember"> Zapamti me
                    </label>
                </div>
            </div><!-- /.col -->
            <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Prijavi se</button>
            </div><!-- /.col -->
        </div>
    </form>

    <div class="social-auth-links text-center">
        <p>- ILI -</p>
        <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Prijavi se pomoću Facebook-a</a>
        <a href="#" class="btn btn-block btn-social btn-google-plus btn-flat"><i class="fa fa-google-plus"></i> Prijavi se pomoću Google+</a>
    </div><!-- /.social-auth-links -->

    <a href="{{ url('/password/email') }}">Zaboravio/la sam lozinku</a><br>
    <a href="{{ url('/auth/register') }}" class="text-center">Nemate korisnički nalog? Registrujte se ovdje!</a>

</div><!-- /.login-box-body -->

</div><!-- /.login-box -->

    @include('auth.scripts')

    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>
</body>

@endsection
