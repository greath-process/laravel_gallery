{{-- Кнопка появления формы и сама форма передут в компонент --}}
<small class="d-block text-start mt-3">
    <a href="javascript:" onclick="document.getElementById('form').style.display='block'; this.style.display='none'">Добавить</a>
</small>

<div id="form" class="col-md-7 col-lg-8" style="display: none">
    <form class="needs-validation" method="post" enctype="multipart/form-data" action="{{ route('pictures.store') }}">
        @csrf
        <div class="row g-3">
            <div class="col-sm-6">
                <label for="firstName" class="form-label">Название</label>
                <input type="text" class="form-control" id="firstName" placeholder="" value="" required="" name="name">
                <div class="invalid-feedback">
                    Название обязательно
                </div>
            </div>

            <div class="col-12">
                <label for="address" class="form-label">Описание</label>
                <input type="text" class="form-control" id="address" name="anons">
                <div class="invalid-feedback">
                    Описание необязательно, можно
                </div>
            </div>

            <div class="col-12">
                <label for="address2" class="form-label">Файл <span class="text-muted">(картинка)</span></label>
                <input type="file" accept="image/*" class="form-control" id="address2" required="" name="image">
            </div>

        </div>
        <hr class="my-4">
        <button class="w-100 btn btn-primary btn-lg" type="submit">Добавить</button>
    </form>
</div>
