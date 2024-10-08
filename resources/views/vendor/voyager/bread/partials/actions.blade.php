@if($data)
    @php
        $class = get_class($action);
        $action = new $class($dataType, $data);
    @endphp
    @can ($action->getPolicy(), $data)
        @if ($action->shouldActionDisplayOnRow($data))
            @if (method_exists($action, 'view'))
                @include($action->view(), ['action' => $action, 'data' => $data, 'dataType' => $dataType])
            @else
                <a href="{{ $action->getRoute($dataType->name) }}" title="{{ $action->getTitle() }}" {!! $action->convertAttributesToHtml() !!}>
                    <i class="{{ $action->getIcon() }}"></i> <span class="hidden-xs hidden-sm">{{ $action->getTitle() }}</span>
                </a>
            @endif
        @endif
    @endcan
@elseif (method_exists($action, 'massAction') && method_exists($action, 'view'))
    @include($action->view(), ['action' => $action, 'data' => null, 'dataType' => $dataType])
@elseif (method_exists($action, 'massAction'))
    <form method="post" action="{{ route('voyager.'.$dataType->slug.'.action') }}" style="display:inline">
        {{ csrf_field() }}
        <button type="submit" {!! $action->convertAttributesToHtml() !!}><i class="{{ $action->getIcon() }}"></i>  <span class="hidden-xs hidden-sm">{{ $action->getTitle() }}</span></button>
        <input type="hidden" name="action" value="{{ get_class($action) }}">
        <input type="hidden" name="ids" value="" class="selected_ids">
    </form>
@endif
