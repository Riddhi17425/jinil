@extends('admin.layouts.app')

@section('title', 'Product Edit')

@section('content')
<div class="container-xxl">

    <div class="row align-items-center">
        <div class="border-0 mb-4">
            <div
                class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                <h3 class="fw-bold mb-0">Product Edit</h3>
                <!--<button type="submit"-->
                <!--    class="btn btn-primary py-2 px-5 text-uppercase btn-set-task w-sm-100">Save</button>-->
            </div>
        </div>
    </div> <!-- Row end  -->
    <div class="card-body">
        <form method="post" enctype="multipart/form-data" action="{{ route('product.update',$product->id) }}">
            @csrf
            @method('PATCH')
            <div class="row g-3 mb-3">
                <div class="col-lg-12">
                    <div class="card mb-3">
                        <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                            <h6 class="mb-0 fw-bold ">Product Details</h6>
                        </div>
                        <div class="card-body">
                            <div class="row g-3 align-items-center">
                                <div class="col-md-4">
                                    <label class="form-label">Category</label>
                                    <select name="category_id" class="form-control">
                                        <option value="">Select Category</option>
                                        @foreach($categories as $cat)
                                            <option value="{{ $cat->id }}"
                                                {{ $product->category_id == $cat->id ? 'selected' : '' }}>
                                                {{ $cat->category }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-8">
                                    <label class="form-label">Title</label>
                                    <input type="text" id="title" name="title" class="form-control"
                                        value="{{ $product->title }}" placeholder="Product Title">
                                    @if ($errors->has('title'))
                                    <span class="text-danger">{{ $errors->first('title') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label">Title Brief</label>
                                    <input type="text" name="title_brief" class="form-control" value="{{ $product->title_brief }}" placeholder="Title Brief">
                                </div>

                                 <div class="col-md-6">
                                    <label class="form-label">Url</label>
                                    <input type="text" id="url" name="url" class="form-control"
                                        value="{{ $product->url }}" placeholder="Product Url">
                                </div>

                                 <div class="col-md-6">
                                    <label class="form-label">Name</label>
                                    <input type="text" id="name" name="name" class="form-control"
                                        value="{{ $product->name }}" placeholder="Product Name">
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label">Service Note</label>
                                    <input type="text" name="service_note" class="form-control" value="{{ $product->service_note }}" placeholder="Service Note">
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label">Related Industries Description</label>
                                    <textarea id="related_industries_desc" name="related_industries_desc" class="form-control">{!! $product->related_industries_desc !!}</textarea>
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label">Industries (Multiple)</label>
                                    @php $selectedIndustries = collect($product->industries ?? [])->map(fn($id) => (int)$id)->all(); @endphp
                                    <select name="industries[]" class="form-control" multiple>
                                        @foreach($industriesCategories as $industry)
                                            <option value="{{ $industry->id }}" {{ in_array((int)$industry->id, $selectedIndustries, true) ? 'selected' : '' }}>
                                                {{ $industry->indcategory }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label">Working Principle Description</label>
                                    <textarea id="working_principle_desc" name="working_principle_desc" class="form-control">{!! $product->working_principle_desc !!}</textarea>
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label">Configuration Title</label>
                                    <input type="text" name="configuration_title" class="form-control" value="{{ $product->configuration_title }}" placeholder="Configuration Title">
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label">Configuration Description</label>
                                    <textarea id="configuration_description" name="configuration_description" class="form-control">{!! $product->configuration_description !!}</textarea>
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label">Why Choose Title</label>
                                    <input type="text" name="why_choose_title" class="form-control" value="{{ $product->why_choose_title }}" placeholder="Why Choose Title">
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label">Why Choose Description</label>
                                    <textarea id="why_choose_description" name="why_choose_description" class="form-control">{!! $product->why_choose_description !!}</textarea>
                                </div>

                                <div class="col-md-6">
                                    <label for="file" class="form-label">Product Image</label>
                                    <input type="file" class="form-control" name="front_image" id="front_image">
                                    @if ($errors->has('front_image'))
                                    <span class="text-danger">{{ $errors->first('front_image') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    @if($product->front_image)
                                        <img
                                            src="{{ asset('public/Product/front_image/' . $product->front_image) }}"
                                            alt="Product Image"
                                            style="width:120px; height:auto; border:1px solid #ddd; padding:5px;">
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <label for="file" class="form-label">Product Detail Image</label>
                                    <input type="file" class="form-control" name="detail_image" id="detail_image">
                                    @if ($errors->has('detail_image'))
                                    <span class="text-danger">{{ $errors->first('detail_image') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    @if($product->detail_image)
                                        <img src="{{ asset('public/Product/detail_image/' . $product->detail_image) }}" alt="Product Detail Image" style="width:120px; height:auto; border:1px solid #ddd; padding:5px;">
                                    @endif
                                </div>
                                <div class="col-md-12">
                                    <label for="short_description" class="form-label">Short Description</label>
                                    <textarea id="short_description" name="short_description" class="form-control">{!! $product->short_description !!}</textarea>
                                </div>

                                 <div class="col-md-6">
                                    <label class="form-label">Meta Title</label>
                                    <input type="text" id="meta_title" name="meta_title" class="form-control"
                                        value="{{ $product->meta_title }}" placeholder="Product Meta Title">
                                </div>
                                <div class="col-md-12">
                                    <label for="meta_description" class="form-label">Meta Description</label>
                                    <textarea id="meta_description" name="meta_description" class="form-control">{!! $product->meta_description !!}</textarea>
                                </div>

                                <hr class="mt-4">
                                <h5 class="mt-3 fw-bold">Types Of Blast Wheels</h5>
                                <div class="col-md-6">
                                    <label class="form-label">Blast Wheels Image</label>
                                    <input type="file" class="form-control" name="blast_wheels_image">
                                </div>
                                <div class="col-md-6">
                                    @if($product->blast_wheels_image)
                                        <img src="{{ asset('public/Product/blast_wheels_image/' . $product->blast_wheels_image) }}" alt="Blast Wheels Image" style="width:120px; height:auto; border:1px solid #ddd; padding:5px;">
                                    @endif
                                </div>
                                <div class="col-md-12">
                                    <div id="blast-wheels-wrapper"></div>
                                    <button type="button" class="btn btn-sm btn-outline-primary mt-2" onclick="addTitleDescRow('blast-wheels-wrapper', 'blast_wheels')">Add Blast Wheel</button>
                                </div>

                                <hr class="mt-4">
                                <h5 class="mt-3 fw-bold">Main Components</h5>
                                <div class="col-md-12">
                                    <div id="main-components-wrapper"></div>
                                    <button type="button" class="btn btn-sm btn-outline-primary mt-2" onclick="addTitleDescRow('main-components-wrapper', 'main_components')">Add Component</button>
                                </div>

                                <hr class="mt-4">
                                <h5 class="mt-3 fw-bold">Technical Specifications</h5>
                                <div class="col-md-12">
                                    <div id="tech-spec-wrapper"></div>
                                    <button type="button" class="btn btn-sm btn-outline-primary mt-2" onclick="addTechSpecRow()">Add Parameter</button>
                                </div>

                                <hr class="mt-4">
                                <h5 class="mt-3 fw-bold">Applications</h5>
                                <div class="col-md-12">
                                    <label class="form-label">Application Description</label>
                                    <textarea name="application_desc" class="form-control" rows="3">{{ $product->application_desc }}</textarea>
                                </div>
                                <div class="col-md-12">
                                    <div id="applications-wrapper"></div>
                                    <button type="button" class="btn btn-sm btn-outline-primary mt-2" onclick="addSimpleRow('applications-wrapper', 'applications', 'Application')">Add Application</button>
                                </div>

                                <hr class="mt-4">
                                <h5 class="mt-3 fw-bold">Advantages</h5>
                                <div class="col-md-12">
                                    <label class="form-label">Advantages Description</label>
                                    <textarea name="advantages_desc" class="form-control" rows="3">{{ $product->advantages_desc }}</textarea>
                                </div>
                                <div class="col-md-12">
                                    <div id="advantages-wrapper"></div>
                                    <button type="button" class="btn btn-sm btn-outline-primary mt-2" onclick="addSimpleRow('advantages-wrapper', 'advantages', 'Advantage')">Add Advantage</button>
                                </div>

                                <hr class="mt-4">
                                <h5 class="mt-3 fw-bold">Design Features</h5>
                                <div class="col-md-12">
                                    <label class="form-label">Design Features Description</label>
                                    <textarea name="design_features_desc" class="form-control" rows="3">{{ $product->design_features_desc }}</textarea>
                                </div>
                                <div class="col-md-12">
                                    <div id="design-features-wrapper"></div>
                                    <button type="button" class="btn btn-sm btn-outline-primary mt-2" onclick="addSimpleRow('design-features-wrapper', 'design_features', 'Design Feature')">Add Design Feature</button>
                                </div>

                                <hr class="mt-4">
                                <h5 class="mt-3 fw-bold">Selection Guidelines</h5>
                                <div class="col-md-12">
                                    <label class="form-label">Selection Guidelines Description</label>
                                    <textarea name="selection_guidelines_desc" class="form-control" rows="3">{{ $product->selection_guidelines_desc }}</textarea>
                                </div>
                                <div class="col-md-12">
                                    <div id="selection-guidelines-wrapper"></div>
                                    <button type="button" class="btn btn-sm btn-outline-primary mt-2" onclick="addSimpleRow('selection-guidelines-wrapper', 'selection_guidelines', 'Guideline')">Add Guideline</button>
                                </div>

                                <hr class="mt-4">
                                <h5 class="mt-3 fw-bold">Optional Features</h5>
                                <div class="col-md-12">
                                    <label class="form-label">Optional Features Description</label>
                                    <textarea name="optional_features_desc" class="form-control" rows="3">{{ $product->optional_features_desc }}</textarea>
                                </div>
                                <div class="col-md-12">
                                    <div id="optional-features-wrapper"></div>
                                    <button type="button" class="btn btn-sm btn-outline-primary mt-2" onclick="addSimpleRow('optional-features-wrapper', 'optional_features', 'Optional Feature')">Add Optional Feature</button>
                                </div>

                                <hr class="mt-4">
                                <h5 class="mt-3 fw-bold">Operational Accessories</h5>
                                <div class="col-md-12">
                                    <label class="form-label">Optional Accessories Description</label>
                                    <textarea id="optional_accessories_desc" name="optional_accessories_desc" class="form-control">{!! $product->optional_accessories_desc !!}</textarea>
                                </div>
                                <div class="col-md-12">
                                    <div id="operational-accessories-wrapper"></div>
                                    <button type="button" class="btn btn-sm btn-outline-primary mt-2" onclick="addTitleDescRow('operational-accessories-wrapper', 'operational_accessories')">Add Accessory</button>
                                </div>

                                <hr class="mt-4">
                                <h5 class="mt-3 fw-bold">FAQs</h5>
                                <div class="col-md-12">
                                <label class="form-label">FAQ Description</label>
                                <textarea id="faqs_desc" name="faqs_desc" class="form-control">{!! $product->faqs_desc !!}</textarea>
                            </div>
                                <div class="col-md-12">
                                    <div id="faq-wrapper"></div>
                                    <button type="button" class="btn btn-sm btn-outline-primary mt-2" onclick="addFaqRow()">Add FAQ</button>
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
<link rel="stylesheet" href="yearpicker.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"/>
<link rel="stylesheet" href="{{ asset('public/admin_public/plugins/daterangepicker/daterangepicker.css') }}">
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

<script src="{{ asset('public/admin_public/plugins/daterangepicker/daterangepicker.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script src="yearpicker.js" ></script>
<script>
    $(document).ready(function () {
    $('#year').datepicker({
        format: "yyyy",
        viewMode: "years",
        minViewMode: "years",
        autoclose: true,
        // startDate: "1900",
        // endDate: new Date().getFullYear().toString(),
        orientation: "bottom",
        container: 'body',
        appendTo: 'body',
    });


});
</script>


<script>
$(document).ready(function() {
    $('#meta_description,#short_description,#working_principle_desc,#configuration_description,#why_choose_description,#optional_accessories_desc,#faqs_desc,#related_industries_desc').summernote({
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

    const blastWheels = @json($product->blast_wheels ?? []);
    const mainComponents = @json($product->main_components ?? []);
    const techSpecifications = @json($product->tech_specifications ?? []);
    const applications = @json($product->applications ?? []);
    const advantages = @json($product->advantages ?? []);
    const designFeatures = @json($product->design_features ?? []);
    const selectionGuidelines = @json($product->selection_guidelines ?? []);
    const optionalFeatures = @json($product->optional_features ?? []);
    const operationalAccessories = @json($product->operational_accessories ?? []);
    const faqs = @json($product->faqs ?? []);

    hydrateTitleDesc('blast-wheels-wrapper', 'blast_wheels', blastWheels);
    hydrateTitleDesc('main-components-wrapper', 'main_components', mainComponents);
    hydrateTechSpecs(techSpecifications);
    hydrateSimpleList('applications-wrapper', 'applications', 'Application', applications);
    hydrateSimpleList('advantages-wrapper', 'advantages', 'Advantage', advantages);
    hydrateSimpleList('design-features-wrapper', 'design_features', 'Design Feature', designFeatures);
    hydrateSimpleList('selection-guidelines-wrapper', 'selection_guidelines', 'Guideline', selectionGuidelines);
    hydrateSimpleList('optional-features-wrapper', 'optional_features', 'Optional Feature', optionalFeatures);
    hydrateTitleDesc('operational-accessories-wrapper', 'operational_accessories', operationalAccessories);
    hydrateFaqs(faqs);
});

function hydrateTitleDesc(wrapperId, fieldName, items) {
    if (!items.length) {
        addTitleDescRow(wrapperId, fieldName);
        return;
    }
    items.forEach(item => addTitleDescRow(wrapperId, fieldName, item));
}

function addTitleDescRow(wrapperId, fieldName, existing = null) {
    const wrapper = document.getElementById(wrapperId);
    const index = wrapper.querySelectorAll('.dynamic-row').length;
    const row = document.createElement('div');
    row.className = 'row g-2 mt-2 dynamic-row';
    row.innerHTML = `
        <div class="col-md-5"><input type="text" name="${fieldName}[${index}][title]" value="${existing?.title ?? ''}" class="form-control" placeholder="Title"></div>
        <div class="col-md-6"><textarea name="${fieldName}[${index}][desc]" class="form-control" rows="2" placeholder="Description">${existing?.desc ?? ''}</textarea></div>
        <div class="col-md-1"><button type="button" class="btn btn-danger btn-sm" onclick="this.closest('.dynamic-row').remove()">X</button></div>
    `;
    wrapper.appendChild(row);
}

function hydrateSimpleList(wrapperId, fieldName, placeholder, items) {
    if (!items.length) {
        addSimpleRow(wrapperId, fieldName, placeholder);
        return;
    }
    items.forEach(item => addSimpleRow(wrapperId, fieldName, placeholder, item));
}

function addSimpleRow(wrapperId, fieldName, placeholder, existing = '') {
    const wrapper = document.getElementById(wrapperId);
    const index = wrapper.querySelectorAll('.dynamic-row').length;
    const row = document.createElement('div');
    row.className = 'row g-2 mt-2 dynamic-row';
    row.innerHTML = `
        <div class="col-md-11"><input type="text" name="${fieldName}[${index}]" value="${existing ?? ''}" class="form-control" placeholder="${placeholder}"></div>
        <div class="col-md-1"><button type="button" class="btn btn-danger btn-sm" onclick="this.closest('.dynamic-row').remove()">X</button></div>
    `;
    wrapper.appendChild(row);
}

function hydrateTechSpecs(items) {
    if (!items.length) {
        addTechSpecRow();
        return;
    }
    items.forEach(item => addTechSpecRow(item));
}

function addTechSpecRow(existing = null) {
    const wrapper = document.getElementById('tech-spec-wrapper');
    const index = wrapper.querySelectorAll('.spec-row').length;
    const row = document.createElement('div');
    row.className = 'border rounded p-3 mt-2 spec-row';
    row.innerHTML = `
        <div class="row g-2">
            <div class="col-md-11"><input type="text" name="tech_specifications[${index}][parameter]" value="${existing?.parameter ?? ''}" class="form-control" placeholder="Parameter"></div>
            <div class="col-md-1"><button type="button" class="btn btn-danger btn-sm" onclick="this.closest('.spec-row').remove()">X</button></div>
            <div class="col-md-12 spec-points mt-2"></div>
            <div class="col-md-12"><button type="button" class="btn btn-sm btn-outline-secondary" onclick="addSpecPoint(this, ${index})">Add Specification</button></div>
        </div>
    `;
    wrapper.appendChild(row);

    const specs = existing?.specifications?.length ? existing.specifications : [''];
    specs.forEach(spec => addSpecPoint(row.querySelector('button.btn-outline-secondary'), index, spec));
}

function addSpecPoint(button, index, existing = '') {
    const pointsWrapper = button.closest('.row').querySelector('.spec-points');
    const pointIndex = pointsWrapper.querySelectorAll('.spec-point-row').length;
    const point = document.createElement('div');
    point.className = 'row g-2 mt-1 spec-point-row';
    point.innerHTML = `
        <div class="col-md-11"><input type="text" name="tech_specifications[${index}][specifications][${pointIndex}]" value="${existing ?? ''}" class="form-control" placeholder="Specification"></div>
        <div class="col-md-1"><button type="button" class="btn btn-danger btn-sm" onclick="this.closest('.spec-point-row').remove()">X</button></div>
    `;
    pointsWrapper.appendChild(point);
}

function hydrateFaqs(items) {
    if (!items.length) {
        addFaqRow();
        return;
    }
    items.forEach(item => addFaqRow(item));
}

function addFaqRow(existing = null) {
    const wrapper = document.getElementById('faq-wrapper');
    const index = wrapper.querySelectorAll('.faq-row').length;
    const row = document.createElement('div');
    row.className = 'row g-2 mt-2 faq-row';
    row.innerHTML = `
        <div class="col-md-5"><input type="text" name="faqs[${index}][question]" value="${existing?.question ?? ''}" class="form-control" placeholder="Question"></div>
        <div class="col-md-6"><textarea name="faqs[${index}][answer]" class="form-control" rows="2" placeholder="Answer">${existing?.answer ?? ''}</textarea></div>
        <div class="col-md-1"><button type="button" class="btn btn-danger btn-sm" onclick="this.closest('.faq-row').remove()">X</button></div>
    `;
    wrapper.appendChild(row);
}


</script>
@endpush
