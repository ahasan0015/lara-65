@extends("admin.layout.master")
@section('title', 'Gallery')
@section('content')
<div class="container">
   <h4>User Gallery</h4>
   <div class="row g-3">
    @if(count($galleries) !== 0)
      @foreach ($galleries as $image)
      <div class="col-md-3">
         <img src="{{ asset('storage/'.$image->image) }}" class="img-fluid" alt="Image">
      </div>
      @endforeach
    @else
    <h6 class="text-muted">Your gallery is empty</h6>
    @endif
   </div>
</div>
@endsection