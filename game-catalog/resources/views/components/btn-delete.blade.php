@props(['action'])

<form method="POST" action="{{ $action }}">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger ms-1">Delete</button>
</form>
