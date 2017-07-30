@foreach (['info', 'success', 'warning', 'error'] as $state)
    @if (Session::get($state))
        <p class="alert alert-{{ $state=='error' ? 'danger' : $state }} my-1">
            {{ Session::get($state) }}
        </p>
    @endif
@endforeach
