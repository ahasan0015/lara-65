@extends("admin.layout.master")
@section('title', 'Create User')
@section('content')
<div class="container">
   <h2>User Form</h2>
   <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
        <div class="row g-3">
            <div class="col-md-6">
                <label>First Name</label>
                <input type="text" name="first_name" class="form-control" value="{{ old('first_name') }}">
                @error('first_name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6">
                <label>Last Name</label>
                <input type="text" name="last_name" class="form-control" value="{{ old('last_name') }}">
                @error('last_name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6">
                <label>Email</label>
                <input type="text" name="email" class="form-control">
            </div>
            <div class="col-md-6">
                <label>Role</label>
                <select name="role_id" class="form-select">
                    @foreach ($roles as $item)
                    <option value="{{ $item['id'] }}">{{$item['name']}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-12">
                <label>Profile Imaged<span class="text-muted" data-bs-toggle="tooltip" data-bs-title="<ul class='text-start ps-3  mb-1'><li> Image must be jpg, jpeg or png</li> <li> Image dimension must be 200x200</li> <li> Image size must be less than 500 kb</li></ul>" data-bs-html="true"><i class="fa-solid fa-circle-question"></i></span></label>
                <input type="file" name="photo" class="form-control">
                @error('photo')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="col-md-6">
                <label>Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control">
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