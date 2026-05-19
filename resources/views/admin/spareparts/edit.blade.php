@extends('admin.layouts.app')

@section('title', 'Clientel Edit')

@section('content')
<div class="container-xxl">

    <div class="row align-items-center">
        <div class="border-0 mb-4">
            <div
                class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                <h3 class="fw-bold mb-0">Spareparts Edit</h3>
                <!--<button type="submit"-->
                <!--    class="btn btn-primary py-2 px-5 text-uppercase btn-set-task w-sm-100">Save</button>-->
            </div>
        </div>
    </div> <!-- Row end  -->
    <div class="card-body">
        <form method="post" enctype="multipart/form-data" action="{{ route('sparepart.update',$sparepart->id) }}">
            @csrf
            @method('PATCH')
            <div class="row g-3 mb-3">
                <div class="col-lg-12">
                    <div class="card mb-3">
                        <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                            <h6 class="mb-0 fw-bold ">Spareparts Details</h6>
                        </div>
                        <div class="card-body">
                            <div class="row g-3 align-items-center">
                                
                                <div class="col-md-6">
                                    <label for="category_url" class="form-label">Category URL</label>
                                    <select class="form-control" id="category_url" name="category_url">
                                        <option value="">Select Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->url }}" {{ $sparepart->category_url === $category->url ? 'selected' : '' }}>
                                                {{ $category->category }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('category_url'))
                                    <span class="text-danger">{{ $errors->first('category_url') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Title</label>
                                    <input type="text" id="title" name="title" class="form-control"
                                        value="{{ $sparepart->title }}" placeholder="Sparepart Title">
                                    @if ($errors->has('title'))
                                    <span class="text-danger">{{ $errors->first('title') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <label for="file" class="form-label">Images</label>
                                    <input type="file" class="form-control" name="image" id="image">
                                        <div id="image-preview" class="mt-2">
        
                                            {{-- Edit Page Existing Image --}}
                                            @if(isset($sparepart) && $sparepart->image)
                                                <img src="{{ asset('public/spareparts/'.$sparepart->image) }}"
                                                    class="img-thumbnail"
                                                    style="max-width: 200px; border-radius: 10px;">
                                            @endif

                                        </div>
                                    @if ($errors->has('image'))
                                        <span class="text-danger">{{ $errors->first('image') }}</span>
                                    @endif
                                </div>
                                
                                <div class="col-md-6">
                                    <label class="form-label">Status</label>
                                    <select class="form-control" name="status" id="status">
                                        <option value="Active" {{ $sparepart->status === 'Active' ? 'selected' : '' }}>Active</option>
                                        <option value="Inactive" {{ $sparepart->status === 'Inactive' ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary py-2 px-5 text-uppercase btn-set-task w-sm-100">Save</button>
        </form>
    </div>
</div>
@endsection

@push('styles')
<!-- Summernote CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css" rel="stylesheet">
<!-- Cropper CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css">

<!--plugin css file -->
<link rel="stylesheet" href="{!! asset('public/admin_public/dist/assets/plugin/multi-select/css/multi-select.css') !!}">
<link rel="stylesheet"
    href="{!! asset('public/admin_public/dist/assets/plugin/bootstrap-tagsinput/bootstrap-tagsinput.css') !!}">
<link rel="stylesheet" href="{!! asset('public/admin_public/dist/assets/plugin/dropify/dist/css/dropify.min.css') !!}">
<link rel="stylesheet"
    href="{!! asset('public/admin_public/dist/assets/plugin/datatables/responsive.dataTables.min.css') !!}">
<link rel="stylesheet"
    href="{!! asset('public/admin_public/dist/assets/plugin/datatables/dataTables.bootstrap5.min.css') !!}">
@endpush

@push('scripts')
<!-- Summernote JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>
<!-- Cropper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>
<script src="{!! asset('public/admin_public/dist/assets/plugin/multi-select/js/jquery.multi-select.js') !!}"></script>
<script src="{!! asset('public/admin_public/dist/assets/plugin/bootstrap-tagsinput/bootstrap-tagsinput.js') !!}">
</script>
<script src="{!! asset('public/admin_public/dist/assets/bundles/dropify.bundle.js') !!}"></script>
<script src="{!! asset('public/admin_public/dist/assets/bundles/dataTables.bundle.js') !!}"></script>
<script src="{{ asset('public/admin_public/js/spareparts/spareparts.js') }}"></script>
@endpush
