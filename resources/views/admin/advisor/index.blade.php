@extends('layouts.master')
@section('title' , 'مدیریت اساتید مشاور')
@section('content')
    <section class="uk-section uk-section-default uk-margin-small-bottom" uk-scrollspy="cls: uk-animation-slide-left; target: .uk-card; delay: 300; repeat: false">
        <div class="uk-container">
            <h1 class="uk-h1 uk-text-center">
                مدیریت اساتید مشاور
            </h1>


            @if(session('status'))
                <div class="uk-card uk-card-secondary uk-card-body " >
                    <h5 class="uk-h5 uk-text-center uk-text-success">
                        {{ session('status') }}
                    </h5>
                </div>
            @endif


            <div class="uk-align-center uk-padding-small uk-child-width-1-1@m" uk-grid uk-scrollspy="cls: uk-animation-slide-bottom; target: .uk-card; delay: 300; repeat: true">
                <a href="{{ route('admin.advisors.create') }}">
                    <button class="uk-box-shadow-medium chartasan-greeen-button">تعریف استاد مشاور جدید <span class="fa fa-plus"></span></button>
                </a>
                <a href="{{ route('admin.dashboard') }}">
                    <button class="uk-box-shadow-medium chartasan-black-button uk-align-left">بازگشت <span class="fa fa-arrow-left"></span></button>
                </a>

                <div class="uk-overflow-auto uk-box-shadow-xlarge">
                    <table class="charasan-admin-table-font-size-small uk-table uk-table-hover uk-table-divider uk-text-center chartasan-admin-text-black">
                        <caption>لیست اساتید مشاور</caption>
                        <thead>
                        <tr>
                            <th class="uk-text-center">ردیف</th>
                            <th class="uk-text-center">نام</th>
                            <th class="uk-text-center">نام خانوادگی</th>
                            <th class="uk-text-center">ایمیل</th>
                            <th class="uk-text-center">گرایش</th>
                            <th class="uk-text-center">تعداد دانشجویان</th>
                            <th class="uk-text-center">امکانات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($advisors as $advisor)
                        <tr>
                            <td>{{ $advisor->id }}</td>
                            <td>{{ $advisor->fname }}</td>
                            <td>{{ $advisor->lname }}</td>
                            <td>{{ $advisor->email }}</td>
                            <td>{{ $advisor->branch->name }}</td>
                            <td>{{ count($advisor->students) }}</td>
                            <td><a href="{{ route('admin.advisors.edit' , $advisor->id) }}">ویرایش</a></td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="uk-align-center uk-text-center">
                {{ $advisors->links('pagination.default') }}
            </div>
        </div>
    </section>
@endsection
