<!-- Подключение CSS Select2 -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/css/select2.min.css" rel="stylesheet" />

<!-- Подключение JavaScript Select2 -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/js/select2.min.js"></script>

<div class="form-group">
    <label for="{{ $row->field }}">{{ $row->display_name }}</label>

    @php
        $selectedOptions = json_decode($dataTypeContent->{$row->field}, true) ?? [];
        $options = $row->details->options ?? [];
    @endphp

    <select name="{{ $row->field }}[]" class="form-control select2" multiple>
        @foreach ($options as $key => $option)
            <option value="{{ $key }}"
                {{ in_array($key, $selectedOptions) ? 'selected' : '' }}>
                {{ $option }}
            </option>
        @endforeach
    </select>
</div>

<script>
    $(document).ready(function() {
        $('.select2').select2({
            width: '40%',
            placeholder: 'Выберите варианты',
        });
    });
</script>
