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
                let url = '/admin/pictures/'+info.split('-')[1]+'/?'; // {{--route('pictures.index')--}}

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
