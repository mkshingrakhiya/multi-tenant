@section('title')
    Tenant Management
@endsection

<x-app>
    <h1>New Tenant</h1>

    <form action="{{ route('tenants.store') }}" method="POST">
        @csrf

        <input
            autofocus
            type="text"
            name="subdomain"
            id="subdomain"
        />

        <button type="submit">Create</button>
    </form>
</x-app>
