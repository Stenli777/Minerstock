@extends('layouts.layout')
@section('main')
    <div class="container">
        <div class="row">
            <div class="sub-menu col-3">
                <ul class="nav nav-tabs flex-column"  role="tablist">
                    <li class="nav-item" role="presentation">
                    <a href="#profile" id="profile" class="nav-link" data-toggle="tab" data-target="#profile-tab" type="button" role="tab" aria-controls="profile" aria-selected="false">Профиль</a>
                    </li>
{{--                    <li class="nav-item" role="presentation">--}}
{{--                    <a href="#companies" id="companies" class="nav-link" data-toggle="tab" data-target="#companies-tab" type="button" role="tab" aria-controls="companies" aria-selected="false">Компании</a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item" role="presentation">--}}
{{--                        <a href="#offices" id="offices" class="nav-link" data-toggle="tab" data-target="#offices-tab" type="button" role="tab" aria-controls="offices" aria-selected="false">Офисы</a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item" role="presentation">--}}
{{--                        <a href="#dpc" id="dpc" class="nav-link" data-toggle="tab" data-target="#dpc-tab" type="button" role="tab" aria-controls="dpc" aria-selected="false">Майнинг-отели</a>--}}
{{--                    </li>--}}
                    <li class="nav-item" role="presentation">
                        <a href="#lots" id="dpc" class="nav-link" data-toggle="tab" data-target="#lots-tab" type="button" role="tab" aria-controls="dpc" aria-selected="false">Объявления</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a href="#favorites" id="favorites" class="nav-link" data-toggle="tab" data-target="#favorites-tab" type="button" role="tab" aria-controls="favorites" aria-selected="false">Избранное</a>
                    </li>
                </ul>
            </div>
            <div class="tab-content col-9" id="myTabContent">
                @include('profile_tab.profile')
                @include('profile_tab.companies')
                @include('profile_tab.offices')
                @include('profile_tab.dpc')
                @include('profile_tab.lots')
                @include('profile_tab.favorites')
            </div>
        </div>
    </div>
    <script>
        $(document).ready((e) => {
            let this_url = window.location.href;
            console.log(this_url);
            if (this_url.indexOf('#') > 0){
                let activeTab = this_url.substring(this_url.indexOf("#") + 1);
                $('.nav[role="tablist"] a[href="#'+activeTab+'"]').tab('show');
            } else {
                $('#profile').tab('show');
            }
            $('a[role="tab"]').on("click", function() {
                let newUrl;
                const hash = $(this).attr("href");
                newUrl = this_url.split("#")[0] + hash;
                history.replaceState(null, null, newUrl);
            });
        });
    </script>
@endsection
