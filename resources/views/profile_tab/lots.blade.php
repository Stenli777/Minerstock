<div class="tab-pane fade" id="lots-tab" role="tabpanel" aria-labelledby="lots-tab">
    <h1>Ваши предложения</h1>
    <div class="container">
        <div class="row">
            <button class="button btn btn-success">Добавить предложение</button>
        </div>
        <div class="row">
            @foreach($user->lots as $lot)
                <div class="col-sm-4">
                    @include('blocks.product')
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
                                    $('#prices_modal table tr').hide();
                                    $('#prices_modal table tr .name').each((_, tr) => {
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
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

