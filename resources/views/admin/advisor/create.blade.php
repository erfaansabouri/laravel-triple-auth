@extends('layouts.master')
@section('title' , 'مدیریت اساتید مشاور')
@section('content')
    <section class="uk-section uk-section-default uk-margin-small-bottom">
        <div class="uk-container">
            <h1 class="uk-h1 uk-text-center">
                تعریف استاد مشاور جدید
            </h1>

            <div class="uk-align-center  uk-child-width-1-1@m" uk-grid uk-scrollspy="cls: uk-animation-slide-bottom; target: .uk-card; delay: 300; repeat: true">

                <a href="{{ route('admin.advisors.index') }}">
                    <button class="uk-box-shadow-medium chartasan-black-button uk-align-left">بازگشت <span class="fa fa-arrow-left"></span></button>
                </a>

                <div class="uk-card uk-card-secondary uk-card-body uk-width-1-1@m">
                    <form class="uk-form-horizontal uk-margin-large" method="post" action="{{ route('admin.advisors.store') }}">
                        @csrf
                        <div class="uk-margin">
                            <label class="uk-form-label" for="form-horizontal-text">نام</label>
                            <div class="uk-form-controls">
                                <input class="uk-input uk-form-width-large" id="form-horizontal-text" type="text" name="fname">
                            </div>
                        </div>

                        <div class="uk-margin">
                            <label class="uk-form-label" for="form-horizontal-text" >نام خانوادگی</label>
                            <div class="uk-form-controls" >
                                <input class="uk-input uk-form-width-large" type="text" name="lname">
                            </div>
                        </div>

                        <div class="uk-margin">
                            <label class="uk-form-label" >انتخاب گرایش</label>
                            <div class="uk-form-controls">
                                <select class="uk-select uk-form-width-large" name="branch_id">
                                    @foreach($branches as $branch)
                                        <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="uk-margin">
                            <label class="uk-form-label" for="form-horizontal-text" >ایمیل</label>
                            <div class="uk-form-controls" >
                                <input class="uk-input uk-form-width-large" type="email" name="email">
                            </div>
                        </div>

                        <div class="uk-margin">
                            <label class="uk-form-label" for="form-horizontal-text" >رمز عبور</label>
                            <div class="uk-form-controls" >
                                <input class="uk-input uk-form-width-large" type="password" name="password">
                            </div>
                        </div>

                        <div class="uk-align-center uk-text-right">
                            <button class="chartasan-greeen-button" type="submit">ثبت اطلاعات و ایجاد استاد مشاور جدید <span class="fa fa-check-square-o"></span></button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </section>
@endsection
