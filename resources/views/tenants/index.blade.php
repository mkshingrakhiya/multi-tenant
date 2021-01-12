@section('title')
    Tenant Management
@endsection

<x-app>
    <h1>Tenants</h1>
    
    <ul>
        @forelse ($tenants as $tenant)
            <li>{{ $tenant->subdomain }}</li>
        @empty
            <li>No tenants found.</li>
        @endforelse
    </ul>
    
    <div>
        <a href="{{ route('tenants.create') }}">Add new tenant</a>
    </div>
</x-app>
