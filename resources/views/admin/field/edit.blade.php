
@extends('layouts.master')
@section('title' , 'ویرایش اطلاعات رشته')
@section('content')
    <section class="uk-section uk-section-default uk-margin-small-bottom">
        <div class="uk-container">
            <h1 class="uk-h1 uk-text-center">
                ویرایش اطلاعات رشته
            </h1>


            <div class="uk-align-center  uk-child-width-1-1@m" uk-grid uk-scrollspy="cls: uk-animation-slide-bottom; target: .uk-card; delay: 300; repeat: true">

                <a href="{{ route('admin.fields.index') }}">
                    <button class="uk-box-shadow-medium chartasan-black-button uk-align-left">بازگشت <span class="fa fa-arrow-left"></span></button>
                </a>

                @include('partials.error')

                <div class="uk-card uk-card-secondary uk-card-body uk-width-1-1@m">
                    <form class="uk-form-horizontal uk-margin-large" method="post" action="{{ route('admin.fields.update' , $field->id) }}">
                        @csrf
                        @method('put')
                        <div class="uk-margin">
                            <label class="uk-form-label">نام رشته</label>
                            <div class="uk-form-controls">
                                <input class="uk-input uk-form-width-large"  type="text" name="name" value="{{ $field->name }}">
                            </div>
                        </div>

                        <div class="uk-margin">
                            <label class="uk-form-label" >انتخاب دانشکده</label>
                            <div class="uk-form-controls">
                                <select class="uk-select uk-form-width-large" name="college_id">
                                    @foreach($colleges as $college)
                                        <option value="{{ $college->id }}" @if($college->id == $field->college->id) selected @endif>{{ $college->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>



                        <div class="uk-align-center uk-text-right">
                            <button class="chartasan-greeen-button" type="submit">ثبت اطلاعات و ویرایش رشته <span class="fa fa-check-square-o"></span></button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </section>
@endsection
