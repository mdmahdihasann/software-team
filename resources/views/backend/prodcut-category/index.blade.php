@extends('layouts.app')
@section('title',$title)
@push('styles')
@endpush
@section('action')
<a href="{{ route('category.create') }}" class="btn btn-sm btn-primary">Add Category</a>
@endsection

@section('content')
<div class="row">
    @include('backend.errors.errors')
    <div class="col-12">
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">{{ $title }}</div>
            </div>
            <div class="ibox-body px-2 justify-content-center">
                <table class="table table-sm table-responsive" id="role-datatables">
                    <thead>
                        <th>SL</th>
                        <th>Category Name</th>
                        <th>Image</th>
                        <th>status</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @forelse ($categorys as $key=>$category)
                            <td>{{ $key+1 }}</td>
                            <td>{{ $category->category_name }}</td>
                            <td ><img style="width: 60px; height:60px;" src="/images/category/{{ $category->image }}"></td>
                            <td>
                                {!! $category->status == 1 ? '<span class="badge bg-danger">pending</span>' : '<span class="badge bg-success">publish</span>' !!}
                            </td>
                                <td class="d-flex" style="justify-content: right">
                                    <a href="{{ route('category.edit',$category->id) }}" class="btn btn-sm btn-primary mr-2"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <form action="{{ route('category.delete',$category->id) }}" id="delete-form-{{ $category->id }}" enctype="multipart/form-data" method="post">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    <button style="cursor: pointer" type="button" class="btn btn-sm btn-danger" onclick="alert_message({{ $category->id }})"><i class="fa-solid fa-trash"></i></button>
                                </td>
                            </tbody>
                        @empty
                           <tr>
                                <td colspan="5"><h5 class="text-danger text-center">Data not found</h5> </td>
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
    text: "Category Delete!!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Confirm"
    }).then((result) => {
    if (result.isConfirmed) {
                document.getElementById('delete-form-'+delete_id).submit();
            }
        });
    }
    
</script>

@endpush