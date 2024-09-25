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
                    
                <form action="{{ route('category.update',$category->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="form-label">Category Name</label>
                            <input type="text" name="category_name" class="form-control" placeholder="category name" value="{{ $category->category_name }}">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="form-label">Image</label>
                            <input type="file" name="image" class="form-control">
                            <img style="width: 60px; height:60px; margin-top: 10px" src="{{ asset('images/category/'.$category->image) }}">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="form-label">Status</label>
                            <select name="status" class="form-control">
                                <option value="">select status</option>
                                <option value="1"@isset($category)
                                {{ $category->status == 1 ? 'selected' : '' }}
                                @endisset>pending</option>
                                <option value="2" @isset($category)
                                {{ $category->status == 2 ? 'selected' : '' }}
                                @endisset>publiash</option>
                            </select>
                        </div>
                        <div class="col-md-12 mb-3 text-right">
                            <button type="submit" class="btn btn-sm btn-primary">update</button>
                        </div>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('script')

@endpush