@section('title')
    Users
@endsection

<x-app>
    <h1>Tenant Users</h1>

    <ul>
        @forelse ($users as $user)
            <li>{{ $user->id }}</li>
        @empty
            <li>No users found.</li>
        @endforelse
    </ul>
</x-app>
