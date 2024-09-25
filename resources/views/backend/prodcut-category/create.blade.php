@extends('layouts.app')
@section('title',$title)
@push('styles')
        
@endpush
@section('action')
<a href="{{ route('category.index') }}" class="btn btn-sm btn-danger">Back</a>
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                @include('backend.errors.errors')
                <form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="form-label">Category Name</label>
                            <input type="text" name="category_name" class="form-control" placeholder="category name" value="{{ old('category_name') }}">
                            <div>
                                @error('category_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="form-label">Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="status form-label">Status</label>
                            <select name="status" class="form-control">
                                <option value="1">pending</option>
                                <option value="2">publiash</option>
                            </select>
                        </div>
                        <div class="col-md-12 mb-3 text-right">
                            <button type="submit" class="btn btn-sm btn-primary">Create</button>
                        </div>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('script')
   
@endpush