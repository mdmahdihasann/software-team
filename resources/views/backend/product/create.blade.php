@extends('layouts.app')
@section('title',$title)
@push('styles')
        
@endpush
@section('action')
<a href="{{ route('product.index') }}" class="btn btn-sm btn-danger">Back</a>
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                @include('backend.errors.errors')
                <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="form-label">Category</label>
                            <select name="category" class="form-control" id="category">
                                <option value="">select category</option>
                                @foreach ($category as $value)
                                    <option value="{{ $value->id }}">{{ $value->category_name }}</option>
                                @endforeach
                            </select>
                            <div>
                                @error('category')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="form-label">title</label>
                            <input type="text" name="title" class="form-control" placeholder="title name" value="{{ old('title') }}">
                            <div>
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="form-label">Description</label>
                            <input type="text" name="description" class="form-control" placeholder="description name" value="{{ old('description') }}">
                            <div>
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="form-label">Quantity</label>
                            <input type="number" name="quantity" class="form-control" placeholder="quantity" value="{{ old('quantity') }}">
                            <div>
                                @error('quantity')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="form-label">Discount Price</label>
                            <input type="number" name="discount_price" class="form-control" placeholder="discount_price" value="{{ old('discount price') }}">
                            
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="form-label"> Price</label>
                            <input type="number" name="price" class="form-control" placeholder="price" value="{{ old('price') }}">
                            <div>
                                @error('price')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="form-label"> Product Tag</label>
                            <input type="text" name="product_tag" class="form-control" placeholder="product_tag" value="{{ old('product tag') }}">
                            
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="form-label">Image</label>
                            <input type="file" name="image" class="form-control">
                            <div>
                                @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="status form-label">Status</label>
                            <select name="status" class="form-control">
                                <option value="1">pending</option>
                                <option value="2">publiash</option>
                            </select>
                            <div>
                                @error('status')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
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