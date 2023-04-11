<div class="tab-pane fade" id="offices-tab" role="tabpanel" aria-labelledby="offices-tab">
    <form id="add_company" class="">
        @csrf
        <select name="company_id" id="company_id">
            @foreach($user->companies as $company)
                <option value="{{$company->id}}">{{$company->name}}</option>
            @endforeach
        </select>
        <input type="text" name="name">
        <input type="file" name="logo_file">
        <input type="submit" value="Добавить">
    </form>
</div>
