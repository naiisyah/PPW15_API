@extends('auth.layouts')
@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Dashboard</div>
            <div class="card-body">
                <div class="row">
                    @if(count($galleries) > 0)
                        @foreach ($galleries as $gallery)
                        <div class="col-sm-2 mb-4">
                            <div>
                                <a class="example-image-link" href="{{ asset('storage/posts_image/'.$gallery->picture) }}" data-lightbox="roadtrip" data-title="{{ $gallery->description }}">
                                    <img class="example-image img-fluid mb-2" src="{{ asset('storage/posts_image/'.$gallery->picture) }}" alt="image-1">
                                </a>
                            </div>
                            <div>
                                <a href="{{ route('gallery.edit', $gallery->id) }}" class="btn btn-sm btn-primary mb-2">EDIT</a>
                                <form action="{{ route('gallery.destroy', $gallery->id) }}" method="POST" style="display: inline;">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger">DELETE</button>
                                </form>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <h3>Tidak ada data</h3>
                    @endif
                    <div class="d-flex justify-content-center w-100 mt-3">
                        {{ $galleries->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
