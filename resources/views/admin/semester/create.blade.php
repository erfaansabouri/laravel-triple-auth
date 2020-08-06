@extends('layouts.master')
@section('title' , 'تعریف نیمسال جدید')
@section('content')
    <section class="uk-section uk-section-default uk-margin-small-bottom">
        <div class="uk-container">
            <h1 class="uk-h1 uk-text-center">
                تعریف نیمسال جدید
            </h1>

            <div class="uk-align-center  uk-child-width-1-1@m" uk-grid uk-scrollspy="cls: uk-animation-slide-bottom; target: .uk-card; delay: 300; repeat: true">

                <a href="{{ route('admin.semesters.index') }}">
                    <button class="uk-box-shadow-medium chartasan-black-button uk-align-left">بازگشت <span class="fa fa-arrow-left"></span></button>
                </a>

                <div class="uk-card uk-card-secondary uk-card-body uk-width-1-1@m">
                    <form class="uk-form-horizontal uk-margin-large" method="post" action="{{ route('admin.semesters.store') }}">
                        @csrf

                        <div class="uk-margin">
                            <label class="uk-form-label" >انتخاب نیمسال</label>
                            <div class="uk-form-controls">
                                <select class="uk-select uk-form-width-large" name="priority">
                                    <option value="1">نیمسال اول</option>
                                    <option value="2">نیمسال دوم</option>
                                    <option value="3">نیمسال سوم</option>
                                    <option value="4">نیمسال چهارم</option>
                                    <option value="5">نیمسال پنجم</option>
                                    <option value="6">نیمسال ششم</option>
                                    <option value="7">نیمسال هفتم</option>
                                    <option value="8">نیمسال هشتم</option>
                                </select>
                            </div>
                        </div>

                        <div class="uk-margin">
                            <label class="uk-form-label" >انتخاب چارت مربوطه</label>
                            <div class="uk-form-controls">
                                <select class="uk-select" name="chart_id">
                                    @foreach($charts as $chart)
                                        <option value="{{ $chart->id }}">{{ $chart->title }} - {{ $chart->branch->name }} - {{ $chart->branch->field->name }} - {{ $chart->branch->field->college->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>










                        <div class="uk-align-center uk-text-right">
                            <button class="chartasan-greeen-button" type="submit">ثبت اطلاعات و ایجاد نیمسال جدید <span class="fa fa-check-square-o"></span></button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </section>
@endsection
