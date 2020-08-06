
@extends('layouts.master')
@section('title' , 'ویرایش اطلاعات نیمسال')
@section('content')
    <section class="uk-section uk-section-default uk-margin-small-bottom">
        <div class="uk-container">
            <h1 class="uk-h1 uk-text-center">
                ویرایش اطلاعات نیمسال
            </h1>


            <div class="uk-align-center  uk-child-width-1-1@m" uk-grid uk-scrollspy="cls: uk-animation-slide-bottom; target: .uk-card; delay: 300; repeat: true">

                <a href="{{ route('admin.semesters.index') }}">
                    <button class="uk-box-shadow-medium chartasan-black-button uk-align-left">بازگشت <span class="fa fa-arrow-left"></span></button>
                </a>

                @include('partials.error')

                <div class="uk-card uk-card-secondary uk-card-body uk-width-1-1@m">
                    <form class="uk-form-horizontal uk-margin-large" method="post" action="{{ route('admin.semesters.update' , $semester->id) }}">
                        @csrf
                        @method('put')
                        <div class="uk-margin">
                            <label class="uk-form-label" >انتخاب نیمسال</label>
                            <div class="uk-form-controls">
                                <select class="uk-select uk-form-width-large" name="priority">
                                    @for($i=1;$i<9;$i++)
                                        <option value="{{ $i }}" @if($semester->priority == $i) selected @endif>نیمسال {{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="uk-margin">
                            <label class="uk-form-label" >انتخاب چارت مربوطه</label>
                            <div class="uk-form-controls">
                                <select class="uk-select" name="chart_id">
                                    @foreach($charts as $chart)
                                        <option value="{{ $chart->id }}" @if($semester->chart->id == $chart->id) selected @endif>{{ $chart->title }} - {{ $chart->branch->name }} - {{ $chart->branch->field->name }} - {{ $chart->branch->field->college->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="uk-margin">
                            <label class="uk-form-label" >دروس نیمسال</label>
                            <div class="uk-form-controls">
                                @foreach($courses as $course)
                                    <label><input class="uk-checkbox" name="courses[]" type="checkbox" value="{{ $course->id }}" @if($semester->courses->find($course->id)) checked @endif> {{ $course->title }}</label>
                                    <br>
                                @endforeach
                            </div>
                        </div>


                        <div class="uk-align-center uk-text-right">
                            <button class="chartasan-greeen-button" type="submit">ثبت اطلاعات و ویرایش نیمسال <span class="fa fa-check-square-o"></span></button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </section>
@endsection
