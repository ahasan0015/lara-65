@extends("admin.layout.master")
@section('title', 'User Gallery')
@section('content')
<div class="container">
   <h4>Upload Image(s)</h4>
   @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
   @endif
   <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
        <div class="row g-3">           
            <div class="col-md-12">
                <label class="mb-3">Image</label>
                <div class="input-group mb-3">
                    <input type="file" class="form-control form-control-lg" name="image[]" multiple>
                    <span class="input-group-text bg-dark text-white"><i class="fa-solid fa-image fs-4"></i></span>
                </div>
                @error('photo')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-12 text-end">
                <input type="submit" value="Submit" class="btn btn-success">
            </div>
        </div>
    </form>   
</div>
@endsection