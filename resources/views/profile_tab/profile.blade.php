<div class="tab-pane fade" id="profile-tab" role="tabpanel" aria-labelledby="profile-tab">
    <h1>Profile</h1>
    <div class="container">
        <div class="row">
            <div class="col-4">
                <img class="profile_tab avatar" src="{{\Illuminate\Support\Facades\Storage::url(\Illuminate\Support\Facades\Auth::user()->avatar)}}" alt="avatar">
            </div>
        </div>
        <div class="row info">
            <div class="container">
                <div class="row">
                    Имя: {{\Illuminate\Support\Facades\Auth::user()->name}}
                </div>
                <div class="row">
                    Email: {{\Illuminate\Support\Facades\Auth::user()->email}}
                </div>
            </div>
        </div>
    </div>
</div>
