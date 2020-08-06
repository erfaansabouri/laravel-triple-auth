
@extends('layouts.master')
@section('title' , 'ویرایش اطلاعات درس')
@section('content')
    <section class="uk-section uk-section-default uk-margin-small-bottom">
        <div class="uk-container">
            <h1 class="uk-h1 uk-text-center">
                ویرایش اطلاعات درس
            </h1>


            <div class="uk-align-center  uk-child-width-1-1@m" uk-grid uk-scrollspy="cls: uk-animation-slide-bottom; target: .uk-card; delay: 300; repeat: true">

                <a href="{{ route('admin.courses.index') }}">
                    <button class="uk-box-shadow-medium chartasan-black-button uk-align-left">بازگشت <span class="fa fa-arrow-left"></span></button>
                </a>

                @include('partials.error')

                <div class="uk-card uk-card-secondary uk-card-body uk-width-1-1@m">
                    <form class="uk-form-horizontal uk-margin-large" method="post" action="{{ route('admin.courses.update' , $course->id) }}">
                        @csrf
                        @method('put')

                        <div class="uk-margin">
                            <label class="uk-form-label">عنوان درس</label>
                            <div class="uk-form-controls">
                                <input class="uk-input uk-form-width-large"  type="text" name="title" value="{{ $course->title }}">
                            </div>
                        </div>

                        <div class="uk-margin">
                            <label class="uk-form-label">کد درس در sess</label>
                            <div class="uk-form-controls">
                                <input class="uk-input uk-form-width-large"  type="tel" name="sess_id" value="{{ $course->sess_id }}">
                            </div>
                        </div>

                        <div class="uk-margin">
                            <label class="uk-form-label">تعداد واحد</label>
                            <div class="uk-form-controls">
                                <input class="uk-input uk-form-width-large"  type="tel" name="credit" value="{{ $course->credit }}">
                            </div>
                        </div>

                        <div class="uk-margin">
                            <label class="uk-form-label" >پیشنیاز ها</label>
                            <div class="uk-form-controls">
                                @foreach($prereqs as $prereq)
                                    @if($course->id != $prereq->id)
                                        <label><input class="uk-checkbox" name="prereqs[]" type="checkbox" value="{{ $prereq->id }}" @if($course->prereqs->find($prereq->id)) checked @endif> {{ $prereq->title }}</label>
                                        <br>
                                    @endif
                                @endforeach
                            </div>
                        </div>



                        <div class="uk-align-center uk-text-right">
                            <button class="chartasan-greeen-button" type="submit">ثبت اطلاعات و ویرایش درس <span class="fa fa-check-square-o"></span></button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </section>
@endsection
