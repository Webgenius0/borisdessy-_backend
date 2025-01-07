@extends('backend.app')

@section('title', 'Create Blog')

@push('style')
    <!-- Add CKEditor CSS here if needed -->
@endpush

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card p-5">
                <h3 class="card-title mb-4">Create New Blog</h3>
                <form action="{{ route('blog.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $data->id }}">
                    <div class="mb-3">
                        <label for="title" class="form-label">Blog Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Enter blog title" value="{{ old('title',$data->title) }}" >
                        @error('title')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="content" class="form-label">Content</label>
                        <textarea class="form-control ck-editor" name="content" rows="10" >{{ old('content',$data->content) }}</textarea>
                        @error('content')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="Image">Upload blog image</label>
                        <input type="file" id="image" class="dropify" name="image" data-default-file="{{ asset($data->image) }}" />
                        </div>

                    <div class="mb-3 text-end">
                        <button type="submit" class="btn btn-primary">Update Blog</button>
                        <a href="{{ route('blog.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

