@extends('layouts.master')
@section('title' , 'تعریف دانشجوی جدید')
@section('content')
    <section class="uk-section uk-section-default uk-margin-small-bottom">
        <div class="uk-container">
            <h1 class="uk-h1 uk-text-center">
                تعریف دانشجوی جدید
            </h1>
            @include('partials.error')

            <div class="uk-align-center  uk-child-width-1-1@m" uk-grid uk-scrollspy="cls: uk-animation-slide-bottom; target: .uk-card; delay: 300; repeat: true">

                <a href="{{ route('advisor.students.index') }}">
                    <button class="uk-box-shadow-medium chartasan-black-button uk-align-left">بازگشت <span class="fa fa-arrow-left"></span></button>
                </a>

                <div class="uk-card uk-card-secondary uk-card-body uk-width-1-1@m">
                    <form class="uk-form-horizontal uk-margin-large" method="post" action="{{ route('advisor.students.store') }}">
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
                            <label class="uk-form-label" for="form-horizontal-text" >ایمیل</label>
                            <div class="uk-form-controls" >
                                <input class="uk-input uk-form-width-large" type="email" name="email">
                            </div>
                        </div>

                        <div class="uk-margin">
                            <label class="uk-form-label" for="form-horizontal-text" >شماره دانشجویی</label>
                            <div class="uk-form-controls">
                                <input class="uk-input uk-form-width-large" type="tel" name="student_code">
                            </div>
                        </div>

                        <div class="uk-margin">
                            <label class="uk-form-label" for="form-horizontal-text" >سال ورودی</label>
                            <div class="uk-form-controls">
                                <input class="uk-input uk-form-width-large" type="tel" name="entry_year">
                            </div>
                        </div>

                        <div class="uk-margin">
                            <label class="uk-form-label" >انتخاب گرایش</label>
                            <div class="uk-form-controls">
                                <select class="uk-select uk-form-width-large" name="branch_id">
                                    <option value="{{ Auth::guard('advisor')->user()->branch->id }}"> {{ Auth::guard('advisor')->user()->branch->name }}</option>
                                </select>
                            </div>
                        </div>


                        <div class="uk-margin">
                            <label class="uk-form-label" for="form-horizontal-text" >رمز عبور</label>
                            <div class="uk-form-controls" >
                                <input class="uk-input uk-form-width-large" type="password" name="password">
                            </div>
                        </div>

                        <div class="uk-align-center uk-text-right">
                            <button class="chartasan-greeen-button" type="submit">ثبت اطلاعات و ایجاد دانشجوی جدید <span class="fa fa-check-square-o"></span></button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </section>
@endsection
