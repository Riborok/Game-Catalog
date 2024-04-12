@props(['action'])

<form method="POST" action="{{ $action }}">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger ms-1">@lang('element.delete')</button>
</form>
