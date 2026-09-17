@extends('admin.layouts.app')

@section('title', 'Add Author')

@section('content')
<div class="container-xxl">

    <!-- Header -->
    <div class="row align-items-center mb-4">
        <div class="col">
            <h3 class="fw-bold mb-0">Add Author</h3>
        </div>

        <div class="col-auto">
            <a href="{{ route('author.index') }}" class="btn btn-secondary">
                <i class="icofont-arrow-left me-1"></i> Back
            </a>
        </div>
    </div>

    <!-- Form Card -->
    <div class="card">
        <div class="card-body">

            <form action="{{ route('author.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <div class="row">

                    <!-- Name -->
                    <div class="col-md-6 mb-3">
                        <label for="name" class="form-label">
                            Name <span class="text-danger">*</span>
                        </label>

                        <input type="text"
                               name="name"
                               id="name"
                               class="form-control @error('name') is-invalid @enderror"
                               value="{{ old('name') }}"
                               placeholder="Enter Author Name">

                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Designation -->
                    <div class="col-md-6 mb-3">
                        <label for="designation" class="form-label">
                            Designation
                        </label>

                        <input type="text"
                               name="designation"
                               id="designation"
                               class="form-control @error('designation') is-invalid @enderror"
                               value="{{ old('designation') }}"
                               placeholder="Enter Designation">

                        @error('designation')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Years of Experience -->
                    <div class="col-md-6 mb-3">
                        <label for="years_of_experience" class="form-label">Years of Experience</label>

                        <input type="text"
                            name="years_of_experience"
                            id="years_of_experience"
                            class="form-control @error('years_of_experience') is-invalid @enderror"
                            value="{{ old('years_of_experience') }}"
                            placeholder="e.g. 18 Years of Experience">

                        @error('years_of_experience')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Social Media -->
                    <div class="col-md-4 mb-3">
                        <label for="social_media_name" class="form-label">Social Media Name</label>

                        <input type="text"
                            name="social_media_name"
                            id="social_media_name"
                            class="form-control @error('social_media_name') is-invalid @enderror"
                            value="{{ old('social_media_name') }}"
                            placeholder="e.g. LinkedIn">

                        @error('social_media_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="social_media" class="form-label">Social Media URL</label>

                        <input type="text"
                            name="social_media"
                            id="social_media"
                            class="form-control @error('social_media') is-invalid @enderror"
                            value="{{ old('social_media') }}"
                            placeholder="https://www.linkedin.com/...">

                        @error('social_media')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="social_media_image" class="form-label">Social Media Image</label>

                        <input type="file"
                            name="social_media_image"
                            id="social_media_image"
                            class="form-control @error('social_media_image') is-invalid @enderror"
                            accept="image/*">

                        @error('social_media_image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div class="col-md-12 mb-3">
                        <label for="description" class="form-label">Description</label>

                        <textarea name="description"
                                id="description"
                                rows="8"
                                class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>

                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Main Image -->
                    <div class="col-md-4 mb-3">
                        <label for="main_image" class="form-label">
                            Main Image
                        </label>

                        <input type="file"
                               name="main_image"
                               id="main_image"
                               class="form-control @error('main_image') is-invalid @enderror"
                               accept="image/*">

                        @error('main_image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Thumbnail Image -->
                    <div class="col-md-4 mb-3">
                        <label for="thumbnail_image" class="form-label">
                            Thumbnail Image
                        </label>

                        <input type="file"
                               name="thumbnail_image"
                               id="thumbnail_image"
                               class="form-control @error('thumbnail_image') is-invalid @enderror"
                               accept="image/*">

                        @error('thumbnail_image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Status -->
                    <div class="col-md-6 mb-3">
                        <label for="is_active" class="form-label">
                            Status
                        </label>

                        <div class="form-check form-switch">
                            <input type="checkbox"
                                   name="is_active"
                                   id="is_active"
                                   value="1"
                                   class="form-check-input"
                                   {{ old('is_active', 1) ? 'checked' : '' }}>

                            <label class="form-check-label" for="is_active">
                                Active
                            </label>
                        </div>
                    </div>

                </div>

                <!-- Buttons -->
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">
                        <i class="icofont-save me-1"></i> Save Author
                    </button>

                    <a href="{{ route('author.index') }}"
                       class="btn btn-secondary">
                        Cancel
                    </a>
                </div>

            </form>

        </div>
    </div>

</div>
<script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>

<script>
    ClassicEditor
        .create(document.querySelector('#description'))
        .catch(error => {
            console.error(error);
        });
</script>
@endsection