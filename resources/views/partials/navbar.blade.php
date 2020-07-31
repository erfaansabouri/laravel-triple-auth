<nav class="uk-navbar-container uk-margin" uk-navbar>
    <div class="uk-navbar-center">
        <div class="uk-navbar-center-left">
            <div>
                <ul class="uk-navbar-nav">
                    <li><a href="{{ route('student.login') }}">دانشجویان</a></li>
                </ul>
            </div>
        </div>
        <a class="uk-navbar-item uk-logo" href="{{ route('landing-page') }}">{{ config('chartasan.site-name') }}</a>
        <div class="uk-navbar-center-right">
            <div>
                <ul class="uk-navbar-nav">
                    <li><a href="{{ route('advisor.login') }}">اساتید مشاور</a></li>
                </ul>
            </div>
        </div>

    </div>
</nav>