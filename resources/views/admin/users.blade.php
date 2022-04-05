@extends('layouts.admin')

@section('content')
    <h2>Пользователи</h2>

    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Имя</th>
                <th scope="col">Email</th>
                <th scope="col">Зарегистрирован</th>
                <th scope="col">Права</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at }}</td>
                <td>
                    <form action="{{route('users_update')}}" method="post" id="form{{ $user->id }}">
                        @if($user->id != 1) @csrf  @endif
                        <input type="hidden" name="id" value="{{ $user->id }}">
                        <input type="checkbox" name="is_admin" value="1" class="btn-check" id="btn-check-outlined-{{ $user->id }}" {{ $user->is_admin ? 'checked' : '' }} onchange="document.forms['form{{ $user->id }}'].submit();" autocomplete="off">
                        <label class="btn btn-outline-primary" for="btn-check-outlined-{{ $user->id }}">{{ $user->is_admin ? 'Администратор' : 'Пользователь' }}</label>
                    </form>
                </td>
                <td>
                    <form action="{{route('users_delete')}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-outline-danger" name="id" value="{{ $user->id }}" type="submit">Удалить</button>
                    </form>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>



{{--

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
                        <button class="btn btn-primary" type="submit">Удалить</button>
                </form>
            </div>
            <span class="d-block" data-editable="anons-{{ $picture->id }}">{{ $picture->anons }}</span>
        </div>
    </div>
    @endforeach
--}}

@include('admin.inc.picture_scripts')
@endsection
