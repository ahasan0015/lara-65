@extends("admin.layout.master")
@section('title', 'Users')
@section('content')
<div class="container">
   <h2>Users List</h2>
   @if(session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
   @endif
   <div class="my-3 text-end">
    <a href="{{ route('users.create') }}" class="btn btn-outline-primary">Add New</a>
   </div>
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
                <td>{{ $item['first_name'] }} {{ $item['last_name'] }}</td>
                <td>{{ $item['email'] }}</td>
                <td>{{ $item['role'] }}</td>
                <td>
                    <a href="{{ route('users.show', $item['id']) }}" class="btn btn-dark">Details</a>

                    <form action="{{ route('users.destroy', $item['id']) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
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