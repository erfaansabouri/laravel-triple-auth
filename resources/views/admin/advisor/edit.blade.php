
@extends('layouts.master')
@section('title' , 'ویرایش اطلاعات استاد مشاور')
@section('content')
    <section class="uk-section uk-section-default uk-margin-small-bottom">
        <div class="uk-container">
            <h1 class="uk-h1 uk-text-center">
                ویرایش اطلاعات استاد مشاور
            </h1>






            <div class="uk-align-center  uk-child-width-1-1@m" uk-grid uk-scrollspy="cls: uk-animation-slide-bottom; target: .uk-card; delay: 300; repeat: true">

                <a href="{{ route('admin.advisors.index') }}">
                    <button class="uk-box-shadow-medium chartasan-black-button uk-align-left">بازگشت <span class="fa fa-arrow-left"></span></button>
                </a>

                @include('partials.error')

                <div class="uk-card uk-card-secondary uk-card-body uk-width-1-1@m">
                    <form class="uk-form-horizontal uk-margin-large" method="post" action="{{ route('admin.advisors.update' , $advisor->id) }}">
                        @csrf
                        @method('put')
                        <div class="uk-margin">
                            <label class="uk-form-label" for="form-horizontal-text">نام</label>
                            <div class="uk-form-controls">
                                <input class="uk-input uk-form-width-large" id="form-horizontal-text" type="text" name="fname" value="{{ $advisor->fname }}">
                            </div>
                        </div>

                        <div class="uk-margin">
                            <label class="uk-form-label" for="form-horizontal-text" >نام خانوادگی</label>
                            <div class="uk-form-controls" >
                                <input class="uk-input uk-form-width-large" type="text" name="lname" value="{{ $advisor->lname }}">
                            </div>
                        </div>

                        <div class="uk-margin">
                            <label class="uk-form-label" >انتخاب گرایش</label>
                            <div class="uk-form-controls">
                                <select class="uk-select uk-form-width-large" name="branch_id">
                                    @foreach($branches as $branch)
                                        <option value="{{ $branch->id }}" @if($branch->id == $advisor->branch->id) selected @endif>{{ $branch->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="uk-margin">
                            <label class="uk-form-label" for="form-horizontal-text" >ایمیل</label>
                            <div class="uk-form-controls" >
                                <input class="uk-input uk-form-width-large" type="email" name="email" value="{{ $advisor->email }}">
                            </div>
                        </div>

                        <div class="uk-margin">
                            <label class="uk-form-label" for="form-horizontal-text" >رمز عبور</label>
                            <div class="uk-form-controls" >
                                <input class="uk-input uk-form-width-large" type="password" name="password">
                            </div>
                            <p class="uk-text-small uk-text-danger">با تغییر رمز ، ایجاد رمز اولیه برای کاربر فعال خواهد شد!</p>
                        </div>

                        <div class="uk-align-center uk-text-right">
                            <button class="chartasan-greeen-button" type="submit">ثبت اطلاعات و ویرایش استاد مشاور <span class="fa fa-check-square-o"></span></button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </section>
@endsection
