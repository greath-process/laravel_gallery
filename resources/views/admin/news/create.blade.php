@extends('layouts.admin')

@section('content')

    @if($errors->any())
        <div class="alert alert-danger"
        @foreach($errors->all() as $error)
            <span>{{error}}</span>
        @endforeach
        </div>
    @endif
<form>
    @csrf
    <div class="form-group">
        <label for="exampleInputEmail1">Заголовок</label>
        <input type="text" class="form-control" id="exampleInputEmail1" name="title" value="{{ old('title') }}" placeholder="Enter email">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">слаг</label>
        <input type="text" class="form-control" id="exampleInputPassword1" name="slug" value="{{ old('slug') }}" placeholder="slug">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword12">текст</label>
        <textarea type="text" class="form-control" id="exampleInputPassword12" placeholder="текст" name="text">{{ old('text') }}</textarea>
    </div>
    <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>


</form>
@endsection
