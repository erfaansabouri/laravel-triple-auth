@extends('layouts.master')
@section('title' , 'مدیریت درس ها')
@section('content')
    <section class="uk-section uk-section-default uk-margin-small-bottom" uk-scrollspy="cls: uk-animation-slide-left; target: .uk-card; delay: 300; repeat: false">
        <div class="uk-container">
            <h1 class="uk-h1 uk-text-center">
                مدیریت درس ها
            </h1>


            @if(session('status'))
                <div class="uk-card uk-card-secondary uk-card-body" >
                    <h5 class="uk-h5 uk-text-center uk-text-success">
                        {{ session('status') }}
                    </h5>
                </div>
            @endif


            <div class="uk-align-center uk-padding-small uk-child-width-1-1@m" uk-grid uk-scrollspy="cls: uk-animation-slide-bottom; target: .uk-card; delay: 300; repeat: true">
                <a href="{{ route('admin.courses.create') }}">
                    <button class="uk-box-shadow-medium chartasan-greeen-button">تعریف درس جدید <span class="fa fa-plus"></span></button>
                </a>
                <a href="{{ route('admin.dashboard') }}">
                    <button class="uk-box-shadow-medium chartasan-black-button uk-align-left">بازگشت <span class="fa fa-arrow-left"></span></button>
                </a>

                <div class="uk-overflow-auto uk-box-shadow-xlarge">
                    <table class="charasan-admin-table-font-size-small uk-table uk-table-hover uk-table-divider uk-text-center chartasan-admin-text-black">
                        <caption>لیست درس ها</caption>
                        <thead>
                        <tr>
                            <th class="uk-text-center">ردیف</th>
                            <th class="uk-text-center">عنوان درس</th>
                            <th class="uk-text-center">تعداد واحد</th>
                            <th class="uk-text-center">کد درس در sess</th>
                            <th class="uk-text-center">پیشنیازها</th>
                            <th class="uk-text-center">تعداد چارت های شامل</th>
                            <th class="uk-text-center">امکانات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($courses as $course)
                        <tr>
                            <td>{{ $course->id }}</td>
                            <td>{{ $course->title }}</td>
                            <td>{{ $course->credit }}</td>
                            <td>{{ $course->sess_id }}</td>
                            <td>
                                @foreach($course->prereqs as $prereq)
                                    <button class="uk-button uk-button-small">
                                        {{ $prereq->title }}
                                    </button>
                                @endforeach
                            </td>
                            <td uk-tooltip="@foreach($course->semesters as $semester) {{ $semester->chart->title }} -  @endforeach">{{ count($course->semesters) }}</td>
                            <td><a href="{{ route('admin.courses.edit' , $course->id) }}">ویرایش</a></td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="uk-align-center uk-text-center">
{{--
                {{ $branches->links('pagination.default') }}
--}}
            </div>
        </div>
    </section>
@endsection
