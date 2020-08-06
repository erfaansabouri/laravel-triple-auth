@extends('layouts.master')
@section('title' , 'تعریف درس جدید')
@section('content')
    <section class="uk-section uk-section-default uk-margin-small-bottom">
        <div class="uk-container">
            <h1 class="uk-h1 uk-text-center">
                تعریف درس جدید
            </h1>

            <div class="uk-align-center  uk-child-width-1-1@m" uk-grid uk-scrollspy="cls: uk-animation-slide-bottom; target: .uk-card; delay: 300; repeat: true">

                <a href="{{ route('admin.courses.index') }}">
                    <button class="uk-box-shadow-medium chartasan-black-button uk-align-left">بازگشت <span class="fa fa-arrow-left"></span></button>
                </a>

                <div class="uk-card uk-card-secondary uk-card-body uk-width-1-1@m">
                    <form class="uk-form-horizontal uk-margin-large" method="post" action="{{ route('admin.courses.store') }}">
                        @csrf


                        <div class="uk-margin">
                            <label class="uk-form-label">عنوان درس</label>
                            <div class="uk-form-controls">
                                <input class="uk-input uk-form-width-large"  type="text" name="title">
                            </div>
                        </div>

                        <div class="uk-margin">
                            <label class="uk-form-label">کد درس در sess</label>
                            <div class="uk-form-controls">
                                <input class="uk-input uk-form-width-large"  type="tel" name="sess_id">
                            </div>
                        </div>

                        <div class="uk-margin">
                            <label class="uk-form-label">تعداد واحد</label>
                            <div class="uk-form-controls">
                                <input class="uk-input uk-form-width-large"  type="tel" name="credit">
                            </div>
                        </div>


                        <div class="uk-align-center uk-text-right">
                            <button class="chartasan-greeen-button" type="submit">ثبت اطلاعات و ایجاد درس جدید <span class="fa fa-check-square-o"></span></button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </section>
@endsection
