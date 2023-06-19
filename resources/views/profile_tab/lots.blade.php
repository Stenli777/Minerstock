<div class="tab-pane fade" id="lots-tab" role="tabpanel" aria-labelledby="lots-tab">
    <h1>Ваши предложения</h1>
    <div class="container">
        <div class="row">
            <button class="button btn btn-success"  data-toggle="modal" data-target="#lots_modal">Добавить предложение</button>
        </div>
        <div class="row">
            @foreach($user->lots as $lot)
                <div class="col-sm-4">
                    @include('blocks.lot', ['asic' => $lot->asic])
                </div>
            @endforeach
        </div>
        <div id="lots_modal" class="modal fade" tabindex="-1">
            <div class="modal-dialog  modal-lg modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Добавление предложения</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="lots_form" class="form-group">
                            @csrf
                            <div style="position: relative; top: 10px; left: 0px; width: 100%; height: 30px; background-color: white">
                                <input type="text" class="form-control" id="lots_asic_filter" placeholder="Поиск">
                            </div>
                            <table style="margin-top: 30px;" class="table">
                                <tr>
                                    <th class="name">Название</th>
                                    <th>Цена в рублях</th>
                                    <th>Цена в долларах</th>
                                    <th>Б/У?</th>
                                </tr>
                                @foreach(\App\Models\Asic::all() as $asic)
                                    <tr>
                                        <td class="name">{{$asic->producer->name}} {{$asic->name}} {{$asic->humanHashrate()}}</td>
                                        <td><input class="lot_param form-controll" data-id="{{$asic->id}}" data-type="price_rub" type="text" placeholder="0.00"></td>
                                        <td><input class="lot_param form-controll" data-id="{{$asic->id}}" data-type="price_usd" type="text" placeholder="0.00"></td>
                                        <td><input class="lot_param form-controll" data-id="{{$asic->id}}" data-type="was_in_use" type="checkbox"></td>
                                    </tr>
                                @endforeach
                            </table>
                            <script>
                                $('#lots_asic_filter').on('input', (e) => {
                                    $('#lots_modal table tr .name').each((_, tr) => {
                                        $(tr).parent().hide();
                                        if ($(tr).text().toLowerCase().includes(e.target.value.toLowerCase())) {
                                            $(tr).parent().show();
                                        }
                                    });
                                })
                            </script>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="lots_update btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('.lots_update').click((e) => {
        let f = $('#lots_form');
        let inputs = f.find('.lot_param');
        let lots = [];
        for (let input of inputs) {
            lots[input.dataset.id] = lots[input.dataset.id] ?? {id: input.dataset.id};
            if (input.type == 'checkbox') {
                lots[input.dataset.id][input.dataset.type] = input.checked;
            } else {
                lots[input.dataset.id][input.dataset.type] = input.value;
            }
        }
        lots = lots.filter((lot, i) => {
            return lot.price_rub || lot.price_usd;
        });

        fetch('/lots', {
            method: 'post',
            body: JSON.stringify({
                lots: lots,
            }),
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}",
                'Content-Type': 'application/json;charset=utf-8'
            },
        }).then((e) => {
            $('#lots_modal').modal('hide');
        });
    });
</script>
