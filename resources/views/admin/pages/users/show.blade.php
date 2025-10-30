@extends("admin.layout.master")
@section('title', 'Users')
@section('content')
    <div class="container py-4">
        <a href="{{ route('users.index') }}" class="btn btn-outline-secondary mb-4">
            <i class="bi bi-arrow-left"></i> Back to Users
        </a>

        <div class="card shadow-sm border-0 rounded-4">
            <div class="card-header bg-dark text-white rounded-top-4">
                <h4 class="mb-0">User Details — #{{ $user->id }}</h4>
            </div>

            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-4 text-center mb-3 mb-md-0">
                        <img src="{{ asset('storage/' . $user['photo']) }}" alt="User Photo"
                            class="me-2 rounded-circle shadow-sm img-fluid border border-5 border-warning"
                            style="max-width: 180px; height: 180px; object-fit: cover;">


                    </div>

                    <div class="col-md-8">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <strong>Name:</strong> {{ $user->first_name }} {{ $user->last_name }}
                            </li>
                            <li class="list-group-item">
                                <strong>Email:</strong> {{ $user->email }}
                            </li>
                            <li class="list-group-item">
                                <strong>Role:</strong> {{ $user->role->name ?? 'N/A' }}
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection