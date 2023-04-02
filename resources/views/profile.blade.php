@extends('layouts.layout')
@section('main')
    <div class="container">
        <div class="row">
            <div class="sub-menu col-3">
                <ul class="nav nav-tabs flex-column"  role="tablist">
                    <li class="nav-item" role="presentation">
                    <a href="#" id="profile" class="nav-link active" data-toggle="tab" data-target="#profile-tab" type="button" role="tab" aria-controls="profile" aria-selected="true">Профиль</a>
                    </li>
                    <li class="nav-item" role="presentation">
                    <a href="#" id="companies" class="nav-link" data-toggle="tab" data-target="#companies-tab" type="button" role="tab" aria-controls="companies" aria-selected="false">Компании</a>
                    </li>
                </ul>
            </div>
            <div class="tab-content col-9" id="myTabContent">
                <div class="tab-pane fade show active" id="profile-tab" role="tabpanel" aria-labelledby="profile-tab">Profile</div>
                <div class="tab-pane fade" id="companies-tab" role="tabpanel" aria-labelledby="companies-tab">Companies
                <button id="show_form" onclick="show_form()">Add company</button>
                    <form id="add_company" class="fade">
                        @csrf
                        <input type="text" name="name">
                        <input type="file" name="logo_file">
                        <input type="submit" value="Добавить">
                    </form>
                    <script>
                        function show_form() {
                            let form_add = document.getElementById('add_company');
                            form_add.classList.add('show');
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
                </div>
            </div>
        </div>
    </div>
@endsection
