
@extends('layouts.master')
@section('title' , 'ویرایش اطلاعات چارت')
@section('content')
    <section class="uk-section uk-section-default uk-margin-small-bottom">
        <div class="uk-container">
            <h1 class="uk-h1 uk-text-center">
                ویرایش اطلاعات چارت
            </h1>


            <div class="uk-align-center  uk-child-width-1-1@m" uk-grid uk-scrollspy="cls: uk-animation-slide-bottom; target: .uk-card; delay: 300; repeat: true">

                <a href="{{ route('admin.charts.index') }}">
                    <button class="uk-box-shadow-medium chartasan-black-button uk-align-left">بازگشت <span class="fa fa-arrow-left"></span></button>
                </a>

                @include('partials.error')

                <div class="uk-card uk-card-secondary uk-card-body uk-width-1-1@m">
                    <form class="uk-form-horizontal uk-margin-large" method="post" action="{{ route('admin.charts.update' , $chart->id) }}">
                        @csrf
                        @method('put')
                        <div class="uk-margin">
                            <label class="uk-form-label">عنوان چارت</label>
                            <div class="uk-form-controls">
                                <input class="uk-input uk-form-width-large"  type="text" name="title"  value="{{ $chart->title }}">
                            </div>
                        </div>

                        <div class="uk-margin">
                            <label class="uk-form-label">نام طراح چارت</label>
                            <div class="uk-form-controls">
                                <input class="uk-input uk-form-width-large"  type="text" name="designer" value="{{ $chart->designer }}">
                            </div>
                        </div>

                        <div class="uk-margin">
                            <label class="uk-form-label" >انتخاب مشخصات گرایش ، رشته و دانشکده چارت</label>
                            <div class="uk-form-controls">
                                <select class="uk-select uk-form-width-large" name="branch_id">
                                    @foreach($branches as $branch)
                                        <option value="{{ $branch->id }}" @if($branch->id == $chart->branch->id) selected @endif>{{ $branch->name }} - {{ $branch->field->name }} - {{ $branch->field->college->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="uk-align-center uk-text-right">
                            <button class="chartasan-greeen-button" type="submit">ثبت اطلاعات و ویرایش چارت <span class="fa fa-check-square-o"></span></button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </section>
@endsection
