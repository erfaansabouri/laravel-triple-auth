
@extends('layouts.master')
@section('title' , "پنل استاد مشاور")
@section('content')
    <section class="uk-section uk-section-secondary uk-margin-small-bottom">
        <div class="uk-container">
            <div class="uk-padding-small uk-child-width-1-2@m" uk-grid uk-scrollspy="cls: uk-animation-slide-bottom; target: .uk-card; delay: 300; repeat: true">
                <a href="{{ route('advisor.students.index') }}">
                    <div>
                        <div class="chartasan-admin-dashboard-card chartasan-bg-semi-dark uk-card uk-card-default uk-card-body uk-border-pill uk-text-center">
                            <h3 class="uk-card-title">مدیریت دانشجویان <span class="fa fa-mortar-board"></span></h3>
                            <p class="chartasan-text-white">ایجاد ، حذف و ویرایش دانشجویان</p>
                        </div>
                    </div>
                </a>

                <a href="{{ route('advisor.logout') }}">
                    <div class="uk-animation-toggle" tabindex="0">
                        <div class="uk-animation-shake chartasan-admin-dashboard-card chartasan-bg-light-red uk-card uk-card-default uk-card-body uk-border-pill uk-text-center">
                            <h3 class="uk-card-title">خروج <span class="fa fa-power-off"></span></h3>
                            <p class="chartasan-text-white">خروج از حساب کاربری</p>
                        </div>
                    </div>
                </a>

            </div>
        </div>
    </section>
@endsection
