@extends("admin.layout.master")
@section('title', 'Create User')
@section('content')
<div class="container">
   <h2>User Edit</h2>
   <form action="{{ route('users.update', $user['id']) }}" method="POST">
    @csrf
    @method('PATCH')
    <input type="hidden" name="page" value="{{ $page }}">
        <div class="row g-3">
            <div class="col-md-6">
                <label>First Name</label>
                <input type="text" name="first_name" class="form-control" value="{{old('first_name') ?? $user['first_name'] }}">
                @error('first_name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6">
                <label>Last Name</label>
                <input type="text" name="last_name" class="form-control" value="{{ old('last_name') ??$user['last_name'] }}">
                @error('last_name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6">
                <label>Email</label>
                <input type="text" name="email" class="form-control" value="{{ old('email') ??$user['email'] }}">
            </div>
            <div class="col-md-6">
                <label>Role</label>
                <select name="role_id" class="form-select">
                    @php
                        $selected = old('role_id') ?? $user['role_id'];
                    @endphp
                    @foreach ($roles as $item)
                    <option value="{{ $item['id'] }}" @selected( $selected == $item['id'])>{{$item['name']}}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="col-12">
                @if($errors->any())
                <ul class="text-danger">
                    @foreach ($errors->all() as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
            <div class="col-md-12 text-end">
                <input type="submit" value="Submit" class="btn btn-success">
            </div>
        </div>
    </form>   
</div>
@endsection