@extends('layouts.admin')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css" rel="stylesheet">

<div class="my-3 p-3 bg-body rounded shadow-sm">
    <h6 class="border-bottom pb-2 mb-0">Картины</h6>
    @foreach($pictures as $picture)
    <div class="d-flex text-muted pt-3">
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox"  {{ $picture->active ? 'checked' : '' }} data-editable="active-{{ $picture->id }}" value="1">
            <br>
            <label style="margin-left: -38px;" data-editable="sort-{{ $picture->id }}">{{ $picture->sort }}</label>
        </div>
        <a data-fancybox="gallery" href="{{ $picture->image }}">
            <img src="{{ $picture->image }}" class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="64" height="64">
        </a>
        <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
            <div class="d-flex justify-content-between">
                <strong class="text-gray-dark" data-editable="name-{{ $picture->id }}">{{ $picture->name }}</strong>
                <form action="{{route('pictures.destroy', ['picture' => $picture->id])}}" method="post">
                    @csrf
                    @method('DELETE')
                        <button class="btn btn-danger" type="submit">Удалить</button>
                </form>
            </div>
            <span class="d-block" data-editable="anons-{{ $picture->id }}">{{ $picture->anons }}</span>
        </div>
    </div>
    @endforeach
    <x-pictures_form></x-pictures_form>
</div>

@include('admin.inc.picture_scripts')
@endsection
