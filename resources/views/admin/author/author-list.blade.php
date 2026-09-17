@extends('admin.layouts.app')

@section('title', 'Author List')

@section('content')
<div class="container-xxl">

    <!-- Header -->
    <div class="row align-items-center mb-4">
        <div class="col">
            <h3 class="fw-bold mb-0">Authors</h3>
        </div>

        <div class="col-auto">
            <a href="{{ route('author.create') }}" class="btn btn-primary">
                <i class="icofont-plus-circle me-1"></i> Add Author
            </a>
        </div>
    </div>

    <!-- Card -->
    <div class="card">
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">

                    <thead class="table-light">
                        <tr>
                            <th>Id</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Designation</th>
                            <th>Experience</th>
                            <th>Status</th>
                            <th class="text-end">Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($authors as $author)

                        <tr>

                            <!-- ID -->
                            <td>
                                <strong>{{ $author->id }}</strong>
                            </td>

                            <!-- Image -->
                            <td style="width:80px;">
                                @if($author->thumbnail_image)
                                    <img src="{{ asset('public/Authors/thumbnail_image/'.$author->thumbnail_image) }}"
                                         class="img-thumbnail"
                                         style="width:60px;height:60px;object-fit:cover;">
                                @elseif($author->main_image)
                                    <img src="{{ asset('public/Authors/main_image/'.$author->main_image) }}"
                                         class="img-thumbnail"
                                         style="width:60px;height:60px;object-fit:cover;">
                                @else
                                    <span class="text-muted">No Image</span>
                                @endif
                            </td>

                            <!-- Name -->
                            <td>
                                <strong>{{ $author->name }}</strong>
                            </td>

                            <!-- Designation -->
                            <td>
                                {{ $author->designation ?? '-' }}
                            </td>

                            <!-- Experience -->
                            <td>
                                @if($author->years_of_experience !== null)
                                    {{ $author->years_of_experience }} Years
                                @else
                                    -
                                @endif
                            </td>

                            <!-- Status -->
                            <td>
                                @if($author->is_active)
                                    <span class="badge bg-success">
                                        Active
                                    </span>
                                @else
                                    <span class="badge bg-secondary">
                                        Inactive
                                    </span>
                                @endif
                            </td>

                            <!-- Action -->
                            <td class="text-end">

                                <a href="{{ route('author.edit', $author->id) }}"
                                   class="btn btn-sm btn-outline-success">
                                    <i class="icofont-edit"></i>
                                </a>

                                <a href="{{ route('author.delete', $author->id) }}"
                                class="btn btn-sm btn-outline-danger"
                                onclick="return confirm('Are you sure you want to delete this author?');">
                                    <i class="icofont-ui-delete"></i>
                                </a>


                            </td>

                        </tr>

                        @empty

                        <tr>
                            <td colspan="7" class="text-center text-muted">
                                No Authors found
                            </td>
                        </tr>

                        @endforelse

                    </tbody>

                </table>
            </div>

        </div>
    </div>

</div>
@endsection