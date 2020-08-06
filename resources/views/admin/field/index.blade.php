@extends('layouts.master')
@section('title' , 'مدیریت رشته ها')
@section('content')
    <section class="uk-section uk-section-default uk-margin-small-bottom" uk-scrollspy="cls: uk-animation-slide-left; target: .uk-card; delay: 300; repeat: false">
        <div class="uk-container">
            <h1 class="uk-h1 uk-text-center">
                مدیریت رشته ها
            </h1>


            @if(session('status'))
                <div class="uk-card uk-card-secondary uk-card-body" >
                    <h5 class="uk-h5 uk-text-center uk-text-success">
                        {{ session('status') }}
                    </h5>
                </div>
            @endif


            <div class="uk-align-center uk-padding-small uk-child-width-1-1@m" uk-grid uk-scrollspy="cls: uk-animation-slide-bottom; target: .uk-card; delay: 300; repeat: true">
                <a href="{{ route('admin.fields.create') }}">
                    <button class="uk-box-shadow-medium chartasan-greeen-button">تعریف رشته جدید <span class="fa fa-plus"></span></button>
                </a>
                <a href="{{ route('admin.dashboard') }}">
                    <button class="uk-box-shadow-medium chartasan-black-button uk-align-left">بازگشت <span class="fa fa-arrow-left"></span></button>
                </a>

                <div class="uk-overflow-auto uk-box-shadow-xlarge">
                    <table class="charasan-admin-table-font-size-small uk-table uk-table-hover uk-table-divider uk-text-center chartasan-admin-text-black">
                        <caption>لیست رشته ها</caption>
                        <thead>
                        <tr>
                            <th class="uk-text-center">ردیف</th>
                            <th class="uk-text-center">نام رشته</th>
                            <th class="uk-text-center">نام دانشکده</th>
                            <th class="uk-text-center">تعداد گرایش ها</th>
                            <th class="uk-text-center">امکانات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($fields as $field)
                        <tr>
                            <td>{{ $field->id }}</td>
                            <td>{{ $field->name }}</td>
                            <td>{{ $field->college->name }}</td>
                            <td uk-tooltip="@foreach($field->branches as $branch) {{ $branch->name }} -  @endforeach">{{ count($field->branches) }}</td>
                            <td><a href="{{ route('admin.fields.edit' , $field->id) }}">ویرایش</a></td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="uk-align-center uk-text-center">
                {{ $fields->links('pagination.default') }}
            </div>
        </div>
    </section>
@endsection
