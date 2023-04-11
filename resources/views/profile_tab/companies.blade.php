<div class="tab-pane fade" id="companies-tab" role="tabpanel" aria-labelledby="companies-tab">
    <h1>Ваши компании</h1>
    <button id="show_form" class="btn button btn-outline-success" onclick="show_form()">Добавить компанию</button>
    <form id="add_company" class="fade form-group">
        @csrf
        <input type="text" name="name">
        <input type="file" name="logo_file">
        <input type="submit" value="Добавить">
    </form>
    <script>
        function show_form() {
            let form_add = document.getElementById('add_company');
            form_add.classList.toggle('show');
        }
        let form_add_company = document.getElementById('add_company');
        form_add_company.addEventListener('submit', (e) => {
            e.preventDefault();
            let f = e.target.closest('#add_company');
            let form_data = new FormData(f);
            fetch('/company', {
                method: 'post',
                body: form_data
            }).then((json) => json.json().then(data => console.log(data)));
        });
    </script>

    <table class="table" id="companies">
        <tr>
            <th>logo</th>
            <th>name</th>
            <th>actions</th>
        </tr>
        @foreach($user->companies as $company)
            <tr>
                <td><img width="100" src="{{Storage::url($company->logo)}}" /></td>
                <td>{{$company->name}}</td>
                <td>
                    <a href="#" data-company_id="{{$company->id}}" data-company_name="{{$company->name}}" class="button btn btn-success js-handle-click">Цены</a>
                </td>
            </tr>
        @endforeach
    </table>
    <script>
        $('.js-handle-click').click((e) => {
            e.preventDefault();
            $('#prices_modal').modal('show');
            $('.modal-title').text(`Цены для компании "${e.target.dataset.company_name}"`)
        });
    </script>
    <div id="prices_modal" class="modal fade" tabindex="-1">
        <div class="modal-dialog  modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-group">
                        <div style="position: absolute; top: 0px; left: 0px; width: 100%; height: 30px; background-color: white">
                                <input type="text" class="form-control" id="asic_filter" placeholder="Поиск">
                        </div>
                        <table style="margin-top: 30px;" class="table">
                            @foreach(\App\Models\Asic::all() as $asic)
                                <tr>
                                    <td class="name">{{$asic->producer->name}} {{$asic->name}} {{$asic->humanHashrate()}}</td>
                                    <td><input type="text" name="price_rub" placeholder="0.00"></td>
                                    <td><input type="text" name="price_usd" placeholder="0.00"></td>
                                    <td><input type="checkbox" name="was_in_use" placeholder="0.00"></td>
                                </tr>
                            @endforeach
                        </table>
                        <script>
                            $('#asic_filter').on('input', (e) => {
                                console.log()
                                console.log($(e).parents('form').children('tr'))
                                $(e).parents('form').children('tr').each((tr) => {
                                    if (tr.child('.name').text().search(e.target.value)) {
                                        tr.show();
                                    }
                                });
                            })
                        </script>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</div>
