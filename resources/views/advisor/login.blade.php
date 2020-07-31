{{--
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin Login</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.login.submit') }}">
                        @csrf


                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif


                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
--}}


@extends('layouts.master')
@section('title' , "ورود استاد مشاور")
@section('content')
    <section class="uk-section uk-section-secondary uk-margin-small-bottom">
        <div class="uk-container">
            <div class="uk-grid  uk-flex-middle">
                <div class="uk-width-1-2@s uk-align-center">

                    <div class="uk-text-center uk-margin">
                        <h2 class="chartasan-text-white uk-h2">ورود اساتید مشاور</h2>
                    </div>
                    <div class="uk-card chartasan-bg-dark">
                        <div class="uk-card-body uk-border-circle">
                            <div class="uk-text-center uk-margin">
                                <h6 class="uk-text-danger uk-h6">
                                    @if (session('error'))
                                        <div class="alert alert-danger">
                                            {{ session('error') }}
                                        </div>
                                    @endif
                                </h6>
                            </div>
                            <form class="toggle-class" action="{{ route('advisor.login.submit') }}" method="post" style="direction: ltr">
                                @csrf
                                <div class="uk-margin-small">
                                    <div class="uk-inline uk-width-1-1">
                                        <span class="uk-form-icon uk-form-icon-flip" data-uk-icon="icon: user"></span>
                                        <input class="uk-input uk-border-rounded" required placeholder="نام کاربری" type="text" name="email" value="{{ old('email') }}">
                                    </div>
                                </div>
                                <div class="uk-margin-small">
                                    <div class="uk-inline uk-width-1-1">
                                        <span class="uk-form-icon uk-form-icon-flip" data-uk-icon="icon: lock"></span>
                                        <input class="uk-input uk-border-rounded" required placeholder="رمز عبور" type="password" name="password">
                                    </div>
                                </div>
                                captcha
                                <div class="">
                                    <button type="submit" class="uk-button uk-button-primary uk-border-rounded uk-width-1-1">ورود</button>
                                </div>
                            </form>
                        </div>
                        <div class="uk-card-footer">
                            <a href="{{ route('landing-page') }}" class="uk-button uk-button-text uk-text-center uk-align-center">بازگشت به صفحه اصلی <span uk-icon="icon: reply"></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
