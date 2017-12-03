@if ($errors->has('type'))
    <span class="">
        <strong>{{ $errors->first('type') }}</strong>
    </span>
@endif

@if ($errors->has('order'))
    <span class="">
        <strong>{{ $errors->first('order') }}</strong>
    </span>
@endif

@if ($errors->has('heading'))
    <span class="">
        <strong>{{ $errors->first('heading') }}</strong>
    </span>
@endif

@if ($errors->has('content'))
    <span class="">
        <strong>{{ $errors->first('content') }}</strong>
    </span>
@endif