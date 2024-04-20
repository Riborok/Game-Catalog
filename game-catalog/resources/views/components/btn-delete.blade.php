@props(['action'])

<form method="POST" action="{{ $action }}">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger w-100">@lang('element.delete')</button>
</form>
