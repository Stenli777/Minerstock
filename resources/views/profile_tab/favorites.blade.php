<div class="tab-pane fade" id="favorites-tab" role="tabpanel" aria-labelledby="profile-tab">
    <h1>Избранное</h1>
    <div class="container">
        <div class="row">
            @foreach(\Illuminate\Support\Facades\Auth::user()->favorites()->get() as $asic)
                <div class="col-sm-3 asic_card">
                    @include('blocks.product')
                </div>
            @endforeach
        </div>
    </div>
    <script>
        $('.toggle_favorite').on('click', (e) => {
                $(e.target).parent().parent().hide();
        })
    </script>
</div>
