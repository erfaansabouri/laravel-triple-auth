@extends('layouts.master')
@section('title' , 'مدیریت دانشجویان')
@section('content')
    <section class="uk-section uk-section-default uk-margin-small-bottom" uk-scrollspy="cls: uk-animation-slide-left; target: .uk-card; delay: 300; repeat: false">
        <div class="uk-container">
            <h1 class="uk-h1 uk-text-center">
                مدیریت دانشجویان
            </h1>


            @if(session('status'))
                <div class="uk-card uk-card-secondary uk-card-body " >
                    <h5 class="uk-h5 uk-text-center uk-text-success">
                        {{ session('status') }}
                    </h5>
                </div>
            @endif

            @include('partials.error')


            <div class="uk-align-center uk-padding-small uk-child-width-1-1@m" uk-grid uk-scrollspy="cls: uk-animation-slide-bottom; target: .uk-card; delay: 300; repeat: true">
                <a href="{{ route('advisor.students.create') }}">
                    <button class="uk-box-shadow-medium chartasan-greeen-button">تعریف دانشجوی جدید <span class="fa fa-plus"></span></button>
                </a>
                <a href="{{ route('advisor.dashboard') }}">
                    <button class="uk-box-shadow-medium chartasan-black-button uk-align-left">بازگشت <span class="fa fa-arrow-left"></span></button>
                </a>

                <div class="uk-overflow-auto uk-box-shadow-xlarge">
                    <table class="charasan-admin-table-font-size-small uk-table uk-table-hover uk-table-divider uk-text-center chartasan-admin-text-black">
                        <caption>لیست دانشجویان</caption>
                        <thead>
                        <tr>
                            <th class="uk-text-center">شماره دانشجویی</th>
                            <th class="uk-text-center">نام</th>
                            <th class="uk-text-center">نام خانوادگی</th>
                            <th class="uk-text-center">گرایش</th>
                            <th class="uk-text-center">امکانات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($students as $student)
                            <tr>
                                <td>{{ $student->student_code }}</td>
                                <td>{{ $student->fname }}</td>
                                <td>{{ $student->lname }}</td>
                                <td>{{ $student->branch->name }}</td>
                                <td><a href="{{ route('advisor.students.edit' , $student->id) }}">ویرایش</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="uk-align-center uk-text-center">

            </div>
        </div>
    </section>
@endsection
