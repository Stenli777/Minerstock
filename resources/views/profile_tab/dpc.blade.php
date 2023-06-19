<div class="tab-pane fade" id="dpc-tab" role="tabpanel" aria-labelledby="dpc-tab">
    <form id="dpc_add_company" class="">
        @csrf
        <select name="company_id" id="dpc_company_id">
            @foreach($user->companies as $company)
                <option value="{{$company->id}}">{{$company->name}}</option>
            @endforeach
        </select>
        <input type="text" name="name">
        <input type="file" name="logo_file">
        <input type="submit" value="Добавить">
    </form>
</div>
