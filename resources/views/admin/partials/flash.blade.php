@if (session('success'))
    <div class="admin-alert-success" role="status">{{ session('success') }}</div>
@endif

@if ($errors->any())
    <div class="admin-alert-error" role="alert">
        <p class="font-semibold">Please fix the following:</p>
        <ul class="mt-2 list-disc pl-5">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
