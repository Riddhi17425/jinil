@extends('admin.layouts.app')

@section('title', 'Product Add')

@section('content')
    <div class="container-xxl">
        <div class="row align-items-center">
            <div class="border-0 mb-4">
                <div
                    class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                    <h3 class="fw-bold mb-0">Product Add</h3>
                </div>
            </div>
        </div>

        <div class="card-body">
            <form method="post" enctype="multipart/form-data" action="{{ route('product.store') }}">
                @csrf

                <div class="card mb-4">
                    <div class="card-header py-3 bg-transparent">
                        <h6 class="mb-0 fw-bold">Basic Details</h6>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label class="form-label">Category</label>
                                <select name="category_id" class="form-control">
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->category }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-8">
                                <label class="form-label">Title</label>
                                <input type="text" id="title" name="title" class="form-control"
                                    placeholder="Product Title">
                                @if ($errors->has('title'))
                                    <span class="text-danger">{{ $errors->first('title') }}</span>
                                @endif
                            </div>

                            <div class="col-md-12">
                                <label class="form-label">Title Brief</label>
                                <input type="text" name="title_brief" class="form-control" placeholder="Title Brief">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Name</label>
                                <input type="text" id="name" name="name" class="form-control"
                                    placeholder="Product Name">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Url</label>
                                <input type="text" id="url" name="url" class="form-control"
                                    placeholder="Product Url">
                            </div>

                            <div class="col-md-12">
                                <label class="form-label">Service Note</label>
                                <input type="text" name="service_note" class="form-control" placeholder="Service Note">
                            </div>


                            <div class="col-md-12">
                                <label class="form-label">Related Industries Description</label>
                                <textarea id="related_industries_desc" name="related_industries_desc" class="form-control"></textarea>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Industries (Multiple)</label>
                                <select name="industries[]" class="form-control" multiple>
                                    @foreach ($industriesCategories as $industry)
                                        <option value="{{ $industry->id }}">{{ $industry->indcategory }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-12">
                                <label class="form-label">Working Principle Description</label>
                                <textarea id="working_principle_desc" name="working_principle_desc" class="form-control"></textarea>
                            </div>

                            <div class="col-md-12">
                                <label class="form-label">Configuration Title</label>
                                <input type="text" name="configuration_title" class="form-control"
                                    placeholder="Configuration Title">
                            </div>

                            <div class="col-md-12">
                                <label class="form-label">Configuration Description</label>
                                <textarea id="configuration_description" name="configuration_description" class="form-control"></textarea>
                            </div>

                            <div class="col-md-12">
                                <label class="form-label">Why Choose Title</label>
                                <input type="text" name="why_choose_title" class="form-control"
                                    placeholder="Why Choose Title">
                            </div>

                            <div class="col-md-12">
                                <label class="form-label">Why Choose Description</label>
                                <textarea id="why_choose_description" name="why_choose_description" class="form-control"></textarea>
                            </div>

                            <div class="col-md-12">
                                <label class="form-label">Product Image</label>
                                <input type="file" class="form-control" name="front_image" id="front_image">
                            </div>

                            <div class="col-md-12">
                                <label class="form-label">Product Detail Image</label>
                                <input type="file" class="form-control" name="detail_image" id="detail_image">
                            </div>

                            <div class="col-md-12">
                                <label class="form-label">Short Description</label>
                                <textarea id="short_description" name="short_description" class="form-control"></textarea>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Meta Title</label>
                                <input type="text" id="meta_title" name="meta_title" class="form-control"
                                    placeholder="Product Meta Title">
                            </div>

                            <div class="col-md-12">
                                <label class="form-label">Meta Description</label>
                                <textarea id="meta_description" name="meta_description" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header py-3 bg-transparent">
                        <h6 class="mb-0 fw-bold">Types Of Blast Wheels</h6>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-12">
                                <label class="form-label">Blast Wheels Image</label>
                                <input type="file" class="form-control" name="blast_wheels_image">
                            </div>
                            <div class="col-md-12">
                                <div id="blast-wheels-wrapper"></div>
                                <button type="button" class="btn btn-sm btn-outline-primary mt-2"
                                    onclick="addTitleDescRow('blast-wheels-wrapper', 'blast_wheels')">Add Blast
                                    Wheel</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header py-3 bg-transparent">
                        <h6 class="mb-0 fw-bold">Main Components</h6>
                    </div>
                    <div class="card-body">
                        <div id="main-components-wrapper"></div>
                        <button type="button" class="btn btn-sm btn-outline-primary mt-2"
                            onclick="addTitleDescRow('main-components-wrapper', 'main_components')">Add Component</button>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header py-3 bg-transparent">
                        <h6 class="mb-0 fw-bold">Technical Specifications</h6>
                    </div>
                    <div class="card-body">
                        <div id="tech-spec-wrapper"></div>
                        <button type="button" class="btn btn-sm btn-outline-primary mt-2" onclick="addTechSpecRow()">Add
                            Parameter</button>
                        <div class="col-md-12 mt-4">
                            <label class="form-label">Technical Details</label>
                            <textarea id="technical_details" name="technical_details" class="form-control"></textarea>
                        </div>
                    </div>
                </div>




                <div class="card mb-4">
                    <div class="card-header py-3 bg-transparent">
                        <h6 class="mb-0 fw-bold">Applications</h6>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-12">
                                <label class="form-label">Application Description</label>
                                <textarea name="application_desc" class="form-control" rows="3"></textarea>
                            </div>
                            <div class="col-md-12">
                                <div id="applications-wrapper"></div>
                                <button type="button" class="btn btn-sm btn-outline-primary mt-2"
                                    onclick="addSimpleRow('applications-wrapper', 'applications', 'Application')">Add
                                    Application</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header py-3 bg-transparent">
                        <h6 class="mb-0 fw-bold">Advantages</h6>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-12">
                                <label class="form-label">Advantages Description</label>
                                <textarea id="advantages_desc" name="advantages_desc" class="form-control" rows="3"></textarea>
                            </div>
                            <div class="col-md-12">
                                <div id="advantages-wrapper"></div>
                                <button type="button" class="btn btn-sm btn-outline-primary mt-2"
                                    onclick="addSimpleRow('advantages-wrapper', 'advantages', 'Advantage')">Add
                                    Advantage</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header py-3 bg-transparent">
                        <h6 class="mb-0 fw-bold">Design Features</h6>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-12">
                                <label class="form-label">Design Features Description</label>
                                <textarea name="design_features_desc" class="form-control" rows="3"></textarea>
                            </div>
                            <div class="col-md-12">
                                <div id="design-features-wrapper"></div>
                                <button type="button" class="btn btn-sm btn-outline-primary mt-2"
                                    onclick="addSimpleRow('design-features-wrapper', 'design_features', 'Design Feature')">Add
                                    Design Feature</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header py-3 bg-transparent">
                        <h6 class="mb-0 fw-bold">Selection Guidelines</h6>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-12">
                                <label class="form-label">Selection Guidelines Description</label>
                                <textarea name="selection_guidelines_desc" class="form-control" rows="3"></textarea>
                            </div>
                            <div class="col-md-12">
                                <div id="selection-guidelines-wrapper"></div>
                                <button type="button" class="btn btn-sm btn-outline-primary mt-2"
                                    onclick="addSimpleRow('selection-guidelines-wrapper', 'selection_guidelines', 'Guideline')">Add
                                    Guideline</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header py-3 bg-transparent">
                        <h6 class="mb-0 fw-bold">Optional Features</h6>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-12">
                                <label class="form-label">Optional Features Description</label>
                                <textarea name="optional_features_desc" class="form-control" rows="3"></textarea>
                            </div>
                            <div class="col-md-12">
                                <div id="optional-features-wrapper"></div>
                                <button type="button" class="btn btn-sm btn-outline-primary mt-2"
                                    onclick="addSimpleRow('optional-features-wrapper', 'optional_features', 'Optional Feature')">Add
                                    Optional Feature</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header py-3 bg-transparent">
                        <h6 class="mb-0 fw-bold">Operational Accessories</h6>
                    </div>
                    <div class="card-body">
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Optional Accessories Description</label>
                            <textarea id="optional_accessories_desc" name="optional_accessories_desc" class="form-control"></textarea>
                        </div>
                        <div id="operational-accessories-wrapper"></div>
                        <button type="button" class="btn btn-sm btn-outline-primary mt-2"
                            onclick="addTitleDescRow('operational-accessories-wrapper', 'operational_accessories')">Add
                            Accessory</button>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header py-3 bg-transparent">
                        <h6 class="mb-0 fw-bold">FAQs</h6>
                    </div>
                    <div class="card-body">
                        <div class="col-md-12 mb-3">
                            <label class="form-label">FAQ Description</label>
                            <textarea id="faqs_desc" name="faqs_desc" class="form-control"></textarea>
                        </div>
                        <div id="faq-wrapper"></div>
                        <button type="button" class="btn btn-sm btn-outline-primary mt-2" onclick="addFaqRow()">Add
                            FAQ</button>
                    </div>
                </div>

                <button type="submit"
                    class="btn btn-primary py-2 px-5 text-uppercase btn-set-task w-sm-100">Save</button>
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
    <link rel="stylesheet" href="{!! asset('public/admin_public/dist/assets/plugin/bootstrap-tagsinput/bootstrap-tagsinput.css') !!}">
    <link rel="stylesheet" href="{!! asset('public/admin_public/dist/assets/plugin/dropify/dist/css/dropify.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('public/admin_public/dist/assets/plugin/datatables/responsive.dataTables.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('public/admin_public/dist/assets/plugin/datatables/dataTables.bootstrap5.min.css') !!}">
@endpush

@push('scripts')
    <!-- Summernote JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>
    <!-- Cropper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>
    <script src="{!! asset('public/admin_public/dist/assets/plugin/multi-select/js/jquery.multi-select.js') !!}"></script>
    <script src="{!! asset('public/admin_public/dist/assets/plugin/bootstrap-tagsinput/bootstrap-tagsinput.js') !!}"></script>
    <script src="{!! asset('public/admin_public/dist/assets/bundles/dropify.bundle.js') !!}"></script>
    <script src="{!! asset('public/admin_public/dist/assets/bundles/dataTables.bundle.js') !!}"></script>



    <script>
        $(document).ready(function() {
            $('#meta_description,#short_description,#working_principle_desc,#configuration_description,#why_choose_description,#optional_accessories_desc,#faqs_desc,#related_industries_desc,#advantages_desc,#technical_details')
                .summernote({
                    placeholder: 'Enter here...',
                    height: 300,
                    toolbar: [
                        ['style', ['style']],
                        ['font', ['bold', 'italic', 'underline', 'clear']],
                        ['fontname', ['fontname']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['height', ['height']],
                        ['insert', ['link', 'picture', 'hr']],
                        ['view', ['fullscreen', 'codeview']],
                        ['help', ['help']]
                    ]
                });

            addTitleDescRow('blast-wheels-wrapper', 'blast_wheels');
            addTitleDescRow('main-components-wrapper', 'main_components');
            addTechSpecRow();
            addSimpleRow('applications-wrapper', 'applications', 'Application');
            addSimpleRow('advantages-wrapper', 'advantages', 'Advantage');
            addSimpleRow('design-features-wrapper', 'design_features', 'Design Feature');
            addSimpleRow('selection-guidelines-wrapper', 'selection_guidelines', 'Guideline');
            addSimpleRow('optional-features-wrapper', 'optional_features', 'Optional Feature');
            addTitleDescRow('operational-accessories-wrapper', 'operational_accessories');
            addFaqRow();
        });

        function addTitleDescRow(wrapperId, fieldName) {
            const wrapper = document.getElementById(wrapperId);
            const index = wrapper.querySelectorAll('.dynamic-row').length;
            const row = document.createElement('div');
            row.className = 'row g-2 mt-2 dynamic-row';
            row.innerHTML = `
        <div class="col-md-5"><input type="text" name="${fieldName}[${index}][title]" class="form-control" placeholder="Title"></div>
        <div class="col-md-6"><textarea name="${fieldName}[${index}][desc]" class="form-control" rows="2" placeholder="Description"></textarea></div>
        <div class="col-md-1"><button type="button" class="btn btn-danger btn-sm" onclick="this.closest('.dynamic-row').remove()">X</button></div>
    `;
            wrapper.appendChild(row);
        }

        function addSimpleRow(wrapperId, fieldName, placeholder) {
            const wrapper = document.getElementById(wrapperId);
            const index = wrapper.querySelectorAll('.dynamic-row').length;
            const row = document.createElement('div');
            row.className = 'row g-2 mt-2 dynamic-row';
            row.innerHTML = `
        <div class="col-md-11"><input type="text" name="${fieldName}[${index}]" class="form-control" placeholder="${placeholder}"></div>
        <div class="col-md-1"><button type="button" class="btn btn-danger btn-sm" onclick="this.closest('.dynamic-row').remove()">X</button></div>
    `;
            wrapper.appendChild(row);
        }

        function addTechSpecRow(existing = null) {
            const wrapper = document.getElementById('tech-spec-wrapper');
            const index = wrapper.querySelectorAll('.spec-row').length;
            const row = document.createElement('div');
            row.className = 'border rounded p-3 mt-2 spec-row';
            row.innerHTML = `
        <div class="row g-2">
            <div class="col-md-11"><input type="text" name="tech_specifications[${index}][parameter]" class="form-control" placeholder="Parameter"></div>
            <div class="col-md-1"><button type="button" class="btn btn-danger btn-sm" onclick="this.closest('.spec-row').remove()">X</button></div>
            <div class="col-md-12 spec-points mt-2"></div>
            <div class="col-md-12"><button type="button" class="btn btn-sm btn-outline-secondary" onclick="addSpecPoint(this, ${index})">Add Specification</button></div>
        </div>
    `;
            wrapper.appendChild(row);
            addSpecPoint(row.querySelector('button.btn-outline-secondary'), index);
        }

        function addSpecPoint(button, index) {
            const pointsWrapper = button.closest('.row').querySelector('.spec-points');
            const pointIndex = pointsWrapper.querySelectorAll('.spec-point-row').length;
            const point = document.createElement('div');
            point.className = 'row g-2 mt-1 spec-point-row';
            point.innerHTML = `
        <div class="col-md-11"><input type="text" name="tech_specifications[${index}][specifications][${pointIndex}]" class="form-control" placeholder="Specification"></div>
        <div class="col-md-1"><button type="button" class="btn btn-danger btn-sm" onclick="this.closest('.spec-point-row').remove()">X</button></div>
    `;
            pointsWrapper.appendChild(point);
        }

        function addFaqRow() {
            const wrapper = document.getElementById('faq-wrapper');
            const index = wrapper.querySelectorAll('.faq-row').length;
            const row = document.createElement('div');
            row.className = 'row g-2 mt-2 faq-row';
            row.innerHTML = `
        <div class="col-md-5"><input type="text" name="faqs[${index}][question]" class="form-control" placeholder="Question"></div>
        <div class="col-md-6"><textarea name="faqs[${index}][answer]" class="form-control" rows="2" placeholder="Answer"></textarea></div>
        <div class="col-md-1"><button type="button" class="btn btn-danger btn-sm" onclick="this.closest('.faq-row').remove()">X</button></div>
    `;
            wrapper.appendChild(row);
        }
    </script>
@endpush
