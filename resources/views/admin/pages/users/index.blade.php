@extends("admin.layout.master")
@section('title', 'Users')
@section('content')
<div class="container">
   <h2>Users List</h2>
   <div class="my-3 text-end">
    <a href="{{ route('users.create') }}" class="btn btn-outline-primary">Add New</a>
   </div>   
   @if(session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
   @endif
   <table class="table table-striped">
        <thead>
            <tr>
                <th>SL</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $i => $item)
            <tr>
                <td>{{ $users->firstItem() + $i }}</td>
                {{-- <td>{{ $item['id'] }}</td> --}}
                <td>
                    @if($item['photo'] !== null)
                    <img src="{{ asset('storage/' . $item['photo']) }}" class="rounded-circle me-2" alt="Profile image" width="50">
                    @else
                    <img src="https://placehold.co/50" class="rounded-circle me-2" alt="Profile image">
                    @endif

                    {{ $item['first_name'] }} {{ $item['last_name'] }}
                </td>
                <td>{{ $item['email'] }}</td>
                <td>{{ $item['role'] }}</td>
                <td>
                    {{-- @if($item['id'] === Auth::user()->id) --}}
                    <a href="{{ route('users.show', $item['id']) }}" class="btn btn-dark">Details</a>
                    <a href="{{ route('users.edit', ['user' => $item['id'], 'page' => request('page', 1)]) }}" class="btn btn-success">Edit</a>
                    
                    <form action="{{ route('users.destroy', $item['id']) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <a type="submit" class="btn btn-danger">Delete</a>
                        {{-- <button type="submit" class="btn btn-danger">Delete</button> --}}
                    </form>
                    {{-- @endif --}}
                </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th colspan="5">
                    {{ $users->links('vendor.pagination.bootstrap-5') }}
                </th>
            </tr>
        </tfoot>
   </table>
</div>
@endsection