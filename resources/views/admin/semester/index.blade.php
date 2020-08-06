@extends('layouts.master')
@section('title' , 'مدیریت نیمسال ها')
@section('content')
    <section class="uk-section uk-section-default uk-margin-small-bottom" uk-scrollspy="cls: uk-animation-slide-left; target: .uk-card; delay: 300; repeat: false">
        <div class="uk-container">
            <h1 class="uk-h1 uk-text-center">
                مدیریت نیمسال ها
            </h1>


            @if(session('status'))
                <div class="uk-card uk-card-secondary uk-card-body" >
                    <h5 class="uk-h5 uk-text-center uk-text-success">
                        {{ session('status') }}
                    </h5>
                </div>
            @endif


            <div class="uk-align-center uk-padding-small uk-child-width-1-1@m" uk-grid uk-scrollspy="cls: uk-animation-slide-bottom; target: .uk-card; delay: 300; repeat: true">
                <a href="{{ route('admin.semesters.create') }}">
                    <button class="uk-box-shadow-medium chartasan-greeen-button">تعریف نیمسال جدید <span class="fa fa-plus"></span></button>
                </a>
                <a href="{{ route('admin.dashboard') }}">
                    <button class="uk-box-shadow-medium chartasan-black-button uk-align-left">بازگشت <span class="fa fa-arrow-left"></span></button>
                </a>


                    {{--@foreach($branches as $branch) @endforeach--}}
                <div class="uk-overflow-auto uk-margin-small">
                    @foreach($charts as $chart)


                            <table class="charasan-admin-table-font-size-small uk-table uk-table-hover uk-table-divider uk-text-center chartasan-admin-text-black uk-box-shadow-large">
                                <caption>لیست نیمسال های مربوط به چارت {{ $chart->title }} ({{ $chart->branch->name }})</caption>
                                <thead>
                                <tr>
                                    <th class="uk-text-center">ردیف</th>
                                    <th class="uk-text-center">اولویت نیمسال</th>
                                    <th class="uk-text-center">تعداد واحد های تعریف شده</th>
                                    <th class="uk-text-center">چارت مربوطه</th>
                                    <th class="uk-text-center">امکانات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($chart->semesters as $semester)
                                    <tr>
                                        <td>{{ $semester->id }}</td>
                                        <td>نیم سال {{ $semester->priority }}</td>
                                        <td>{{ $semester->credit }}</td>
                                        <td>{{ $semester->chart->branch->field->college->name }} - {{ $semester->chart->branch->field->name }} - {{ $semester->chart->branch->name }} - {{ $semester->chart->title }}</td>
                                        <td>
                                            <a href="{{ route('admin.semesters.edit' , $semester->id) }}">
                                                <button class="uk-button uk-button-primary uk-button-small uk-width">ویرایش</button>
                                            </a>
                                            <form action="{{ route('admin.semesters.destroy' , $semester->id) }}" method="post">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="uk-button uk-button-danger uk-button-small uk-width">حذف</button>
                                            </form></td>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>


                    @endforeach
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
