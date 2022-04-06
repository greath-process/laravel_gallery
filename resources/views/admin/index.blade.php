@extends('layouts.admin')
@section('content')
<h1>Настройки сайта</h1>
<div class="col-md-7 col-lg-8">
    <form class="needs-validation" action="{{route('admin_update')}}" enctype="multipart/form-data" method="post">
        @csrf
        <div class="row g-3">
            <div class="col-sm-6">
                <label for="firstName" class="form-label">Заголовок сайта</label>
                <input type="text" class="form-control" id="firstName" name="title" value="{{$main->title}}">
                <div class="invalid-feedback">
                    Valid first name is required.
                </div>
            </div>

            <div class="col-sm-6">
                <label for="lastName" class="form-label">SEO заголовок</label>
                <input type="text" class="form-control" id="lastName" name="seo_title" value="{{$main->seo_title}}">
                <div class="invalid-feedback">
                    Valid last name is required.
                </div>
            </div>

            <div class="col-12">
                <label for="username" class="form-label">Аватарка</label>
                <div class="input-group has-validation">
                    <img id="output" src="{{$main->image}}" class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="40" height="40">
                    <input type="file" name="image" class="form-control" id="username" onchange="loadFile(event)" accept="image/*">
                    <div class="invalid-feedback">
                        Your username is required.
                    </div>
                </div>
            </div>

            <div class="col-12">
                <label for="email" class="form-label">Описание</label>
                <input type="text" class="form-control" id="email" name="description" value="{{$main->description}}">
                <div class="invalid-feedback">
                    Please enter a valid email address for shipping updates.
                </div>
            </div>

            <div class="col-12">
                <label for="address" class="form-label">SEO описание</label>
                <input type="text" class="form-control" id="address" name="seo_description" value="{{$main->seo_description}}">
                <div class="invalid-feedback">
                    Please enter your shipping address.
                </div>
            </div>

            <div class="col-12">
                <label for="address2" class="form-label">Футер</label>
                <input type="text" class="form-control" id="address2" name="footer" value="{{$main->footer}}">
            </div>

        </div>
        <hr class="my-4">
        <button class="w-100 btn btn-primary btn-lg" type="submit">Сохранить изменения</button>
    </form>

    <hr class="my-4">
    @include('components.icons')

</div>

<script>
var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
};
</script>
@endsection
