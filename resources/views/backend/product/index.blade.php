@extends('layouts.app')
@section('category',$title)
@push('styles')
        
@endpush
@section('action')
    <a href="{{ route('product.create') }}" class="btn btn-sm btn-primary">Add Product</a>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            @include('backend.errors.errors')
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title"></div>
                </div>
                <div class="ibox-body px-2 justify-content-center">
                    <table class="table table-sm table-responsive" id="role-datatables">
                        <thead>
                            <th>SL</th>
                            <th>Category</th>
                            <th>title</th>
                            <th>description</th>
                            <th>quantity</th>
                            <th>tag</th>
                            <th>Discount Price</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>status</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @forelse ($product as $key=>$value)
                            <td>{{ $key+1 }}</td>
                            <td>{{ $value->category->category_name }}</td>
                            <td>{{ $value->product_title }}</td>
                            <td>{{ $value->product_description }}</td>
                            <td>{{ $value->product_quantity }}</td>
                            <td>{{ $value->product_tag }}</td>
                            <td>{{ $value->discount_price }}</td>
                            <td>{{ $value->price }}</td>
                            <td><img style="width: 50px; height:50px; border-radius: 5px;" src="/images/product/{{ $value->image }}"></td>
                            <td>{!! $value->satus==1 ? '<span class="badge bg-danger">pending</span>' : '<span class="badge bg-success">publish</span>' !!}</td>
                            <td class="d-flex pr-0">
                                <a href="{{ route('product.edit',$value->id) }}" class="btn btn-sm btn-primary mr-1"><i class="fa-solid fa-pen-to-square"></i></a>
                                <form action="{{ route('product.delete',$value->id) }}" method="post" id="delete-form-{{ $value->id }}" enctype="multipart/form-data">
                                @csrf
                                @method('DELETE')
                            </form> 
                            <button type="button" style="cursor: pointer" class="btn btn-sm btn-danger" onclick="alert_message({{ $value->id }})"><i class="fa-solid fa-trash"></i></button>
                            </td> 
                        </tbody>
                        @empty
                        <tr>
                            <td colspan="7" class="text-danger">Data not found</td>
                        </tr>
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
      function alert_message(delete_id) { 
    Swal.fire({
    title: "Are you sure?",
    text: "Prodcut Delete!!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "confirm"
    }).then((result) => {
    if (result.isConfirmed) {
                document.getElementById('delete-form-'+delete_id).submit();
            }
        });
    }
    
</script>
@endpush