
@extends('layouts.master')
@section('title' , "پنل مدیریت")
@section('content')
    <section class="uk-section uk-section-secondary uk-margin-small-bottom">
        <div class="uk-container">
            <div class="uk-padding-small uk-child-width-1-3@m" uk-grid uk-scrollspy="cls: uk-animation-slide-bottom; target: .uk-card; delay: 50; repeat: true">
                <a href="{{ route('admin.advisors.index') }}">
                    <div>
                        <div class="chartasan-admin-dashboard-card chartasan-bg-semi-dark uk-card uk-card-default uk-card-body uk-border-pill uk-text-center">
                            <h3 class="uk-card-title">مدیریت اساتید مشاور <span class="fa fa-mortar-board"></span></h3>
                            <p class="chartasan-text-white">ایجاد ، حذف و ویرایش اساتید مشاور</p>
                        </div>
                    </div>
                </a>
                <a href="{{ route('admin.colleges.index') }}">
                    <div>
                        <div class="chartasan-admin-dashboard-card chartasan-bg-purple uk-card uk-card-default uk-card-body uk-border-pill uk-text-center">
                            <h3 class="uk-card-title">مدیریت دانشکده ها <span class="fa fa-bank"></span></h3>
                            <p class="chartasan-text-white">ایجاد ، حذف و ویرایش دانشکده ها</p>
                        </div>
                    </div>
                </a>
                <a href="{{ route('admin.fields.index') }}">
                    <div>
                        <div class="chartasan-admin-dashboard-card chartasan-bg-purple uk-card uk-card-default uk-card-body uk-border-pill uk-text-center">
                            <h3 class="uk-card-title">مدیریت رشته ها <span class="fa fa-vcard"></span></h3>
                            <p class="chartasan-text-white">ایجاد ، حذف و ویرایش رشته ها</p>
                        </div>
                    </div>
                </a>
                <a href="{{ route('admin.branches.index') }}">
                    <div>
                        <div class="chartasan-admin-dashboard-card chartasan-bg-purple uk-card uk-card-default uk-card-body uk-border-pill uk-text-center">
                            <h3 class="uk-card-title">مدیریت گرایش ها <span class="fa fa-sliders"></span></h3>
                            <p class="chartasan-text-white">ایجاد ، حذف و ویرایش گرایش ها</p>
                        </div>
                    </div>
                </a>
                <a href="{{ route('admin.charts.index') }}">
                    <div>
                        <div class="chartasan-admin-dashboard-card chartasan-bg-light-yellow uk-card uk-card-default uk-card-body uk-border-pill uk-text-center">
                            <h3 class="uk-card-title">مدیریت چارت ها <span class="fa fa-sitemap"></span></h3>
                            <p class="chartasan-text-white">ایجاد ، حذف و ویرایش چارت های درسی</p>
                        </div>
                    </div>
                </a>

                <a href="{{ route('admin.semesters.index') }}">
                    <div>
                        <div class="chartasan-admin-dashboard-card chartasan-bg-light-yellow uk-card uk-card-default uk-card-body uk-border-pill uk-text-center">
                            <h3 class="uk-card-title">مدیریت نیم سال ها <span class="fa fa-hourglass-3"></span></h3>
                            <p class="chartasan-text-white">ایجاد ، حذف و ویرایش نیم سال ها</p>
                        </div>
                    </div>
                </a>

                <a href="{{ route('admin.courses.index') }}">
                    <div>
                        <div class="chartasan-admin-dashboard-card chartasan-bg-light-yellow uk-card uk-card-default uk-card-body uk-border-pill uk-text-center">
                            <h3 class="uk-card-title">مدیریت دروس <span class="fa fa-book"></span></h3>
                            <p class="chartasan-text-white">ایجاد ، حذف و ویرایش دروس</p>
                        </div>
                    </div>
                </a>

                <a href="{{ route('admin.logout') }}">
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
