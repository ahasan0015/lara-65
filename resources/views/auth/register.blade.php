@extends('admin.layout.form')
@section('title', 'Register Form')
@section('content')

@section('content')
    <div class="col-lg-5 col-sm-5">
        <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
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
                    <input type="text" name="email" class="form-control" value="{{ old('email') }}">
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label>Role</label>
                    <select name="role_id" class="form-select">
                        @php
                            $selected = old('role_id' ?? null);
                        @endphp
                        @foreach ($roles as $item)
                            <option value="{{ $item['id'] }}" @selected($item['id'] == old('role_ld') ? 'selected' : '')>
                                {{$item['name']}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control">
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
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