
@extends('layouts.master')
@section('title' , "تغییر رمز عبور")
@section('content')
    <section class="uk-section uk-section-secondary uk-margin-small-bottom">
        <div class="uk-container">
            <div class="uk-grid  uk-flex-middle">
                <div class="uk-width-1-2@s uk-align-center">

                    <div class="uk-text-center uk-margin">
                        <h2 class="uk-text-danger uk-h2">تغییر رمز عبور</h2>
                    </div>
                    <div class="uk-card chartasan-bg-dark">
                        <div class="uk-card-body uk-border-circle">
                            <div class="uk-text-center uk-margin">
                                <h6 class="uk-text-danger uk-h6">
                                    {{ Auth::guard('advisor')->user()->fname }} عزیز به منظور حفظ امنیت اطلاعات شما ، لازم است در اولین ورود خود به سامانه رمز عبور خود را تغییر دهید.
                                </h6>
                            </div>
                            <form class="toggle-class" action="{{ route('advisor.replace.password') }}" method="post" style="direction: ltr">
                                @csrf
                                <div class="uk-margin-small">
                                    <div class="uk-inline uk-width-1-1">
                                        <span class="uk-form-icon uk-form-icon-flip" data-uk-icon="icon: lock"></span>
                                        <input class="uk-input uk-border-rounded" required placeholder="رمز عبور جدید" type="password" name="password">
                                    </div>
                                </div>
                                <div class="">
                                    <button type="submit" class="uk-button uk-button-primary uk-border-rounded uk-width-1-1">تغییر رمز و ورود به سامانه</button>
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
