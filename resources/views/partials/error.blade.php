@if ($errors->any())
    <div class="uk-card uk-card-secondary uk-card-body " >
        @foreach ($errors->all() as $error)
            <h5 class="uk-h5 uk-text-center uk-text-danger">{{ $error }}</h5>
        @endforeach
    </div>
@endif