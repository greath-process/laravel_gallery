<div class="my-3 p-3 bg-body rounded shadow-sm">
    <h6 class="border-bottom pb-2 mb-0">Соц.иконки (<a href="https://fontawesome.com/v4/icons/" target="_blank">Примеры</a>)</h6>
    @foreach($icons as $icon)
        <div class="d-flex text-muted pt-3">
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" {{ $icon->active ? 'checked' : '' }} data-editable="active-{{ $icon->id }}" value="1">
            </div>
            <i class="fa {{ $icon->image }}" aria-hidden="true"></i>

            <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                <div class="d-flex justify-content-between">
                    <strong class="text-gray-dark" data-editable="title-{{ $icon->id }}">{{ $icon->title }}</strong>
                    <a href="{{ route('icons') }}?action=destroy&id={{ $icon->id }}">Удалить</a>
                </div>
                <span class="d-block" data-editable="link-{{ $icon->id }}">{{ $icon->link }}</span>
            </div>
        </div>
    @endforeach

    <small class="d-block text-start mt-3">
        <a href="#" onclick="document.getElementById('form').style.display='block'; this.style.display='none'">Добавить иконку</a>
    </small>

    <div id="form" class="col-md-7 col-lg-8" style="display: none">
        <form class="needs-validation" action="{{ route('icons') }}">
            @csrf
            <div class="row g-3">
                <div class="col-sm-6">
                    <label for="firstName" class="form-label">Название</label>
                    <input type="text" class="form-control" id="firstName" placeholder="" value="" required="" name="title">
                </div>

                <div class="col-12">
                    <label for="address" class="form-label">Ссылка</label>
                    <input type="text" class="form-control" id="address" name="link">
                </div>

                <div class="col-12">
                    <label for="address2" class="form-label">Класс иконки <span class="text-muted">(<a href="http://joxi.ru/l2Z7VRyulyOPaA">указан внутри иконок</a>)</span></label>
                    <input type="text" class="form-control" id="address2" required="" name="image">
                </div>

            </div>
            <hr class="my-4">
            <button class="w-100 btn btn-primary btn-lg" type="submit">Добавить</button>
        </form>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios@0.12.0/dist/axios.min.js"></script>
<script>
    window.addEventListener('DOMContentLoaded', (event) => {
        document.querySelectorAll("[data-editable]").forEach(el => {
            el.addEventListener('click',function (e) {
                el.setAttribute('contenteditable', 'true');
                if(el.getAttribute('type') == 'checkbox') el.blur();
                else el.focus();
            });
            el.addEventListener('blur',function (e) {
                el.removeAttribute('contenteditable');
                let info = el.getAttribute("data-editable");
                let url = '/admin/icons/?';

                url += 'name='+ info.split('-')[0]+'&';
                url += 'id='+ info.split('-')[1]+'&';
                if(el.value){
                    let value = el.checked == true ? 1 : 0;
                    url += 'value=' + value + '&';
                } else {
                    url += 'value=' + el.innerHTML+'&';
                }
                url += 'action=update';

                axios.get(encodeURI(url)).then(response => {}).catch(e => {
                    this.errors.push(e)
                });
            });
        });
    });
</script>
