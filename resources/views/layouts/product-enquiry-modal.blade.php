@php
use Illuminate\Support\Facades\DB;
$states = DB::table('states')->select('id','name')->get();
$ma = rand(1,9);
$mb = rand(1,9);
@endphp

<section class="product-enquiry-modal">
<div class="modal fade" id="productEnquiryModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title title_24">Enquire Now</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="productEnquiryForm" action="#" method="post"  class="contact_form">
                    @csrf
                    <div class="row">

                        {{-- Product Name (read-only) --}}
                        <div class="col-lg-12 form-group">
                            <input type="text" name="product_name" id="pe_product_name" placeholder=" " readonly>
                            <label>Product</label>
                        </div>

                        {{-- Full Name --}}
                        <div class="col-lg-6 form-group">
                            <input type="text" name="name" id="pe_name" placeholder=" ">
                            <label>Full Name<span class="text-danger">*</span>:</label>
                            <div id="pe_name-error" class="text-danger"></div>
                        </div>

                        {{-- Company Name --}}
                        <div class="col-lg-6 form-group">
                            <input type="text" name="company_name" id="pe_company_name" placeholder=" ">
                            <label>Company Name<span class="text-danger">*</span>:</label>
                            <div id="pe_company_name-error" class="text-danger"></div>
                        </div>

                        {{-- Phone --}}
                        <div class="col-lg-6 form-group" style="position:relative;">
                            <div id="pe_phone_wrapper">
                                <input type="tel" id="pe_phone" name="phone" placeholder=" Phone Number *">
                            </div>
                            <input type="hidden" name="country"    id="pe_contact_country">
                            <input type="hidden" name="phonecode"  id="pe_contact_phonecode">
                            <input type="hidden" name="contact"    id="pe_contact_value">
                            <input type="hidden" name="full_phone" id="pe_contact_full_phone">
                            <div id="pe_full_phone-error" class="text-danger" style="display:block;font-size:14px;margin-top:4px;"></div>
                        </div>

                        {{-- Email --}}
                        <div class="col-lg-6 form-group">
                            <input type="email" name="email" id="pe_email" placeholder=" ">
                            <label>Email Address<span class="text-danger">*</span>:</label>
                            <div id="pe_email-error" class="text-danger"></div>
                        </div>

                        {{-- State --}}
                        <div class="col-lg-6 form-group">
                            <select name="state" id="pe_state">
                                <option value="">Select State</option>
                                @foreach($states as $state)
                                    <option value="{{ $state->name }}" data-id="{{ $state->id }}">{{ $state->name }}</option>
                                @endforeach
                            </select>
                            <label>State<span class="text-danger">*</span>:</label>
                            <div id="pe_state-error" class="text-danger"></div>
                        </div>

                        {{-- City --}}
                        <div class="col-lg-6 form-group">
                            <select name="city" id="pe_city">
                                <option value="">Select City</option>
                            </select>
                            <label>City<span class="text-danger">*</span>:</label>
                            <div id="pe_city-error" class="text-danger"></div>
                        </div>

                        {{-- Requirement --}}
                        <div class="col-lg-12 form-group">
                            <textarea rows="1" name="message" placeholder=" "></textarea>
                            <label>Requirement :</label>
                        </div>

                        {{-- Captcha --}}
                        <div class="col-lg-4 form-group">
                            <div style="display:flex;gap:6px;">
                                <input type="number" id="pe_simple_captcha" name="simple_captcha"
                                    placeholder="Enter answer" oninput="this.value=this.value.replace(/[^0-9]/g,'')">
                                <label>
                                    What is <span id="pe_capA">{{ $pma }}</span> + <span id="pe_capB">{{ $pmb }}</span> ?
                                </label>
                                <button type="button" id="pe_refreshCaptcha"
                                    style="border:0;background:#eee;padding:5px 8px;border-radius:5px;">↻</button>
                            </div>
                            <input type="hidden" name="captcha_sum" id="pe_captcha_sum" value="{{ $pma + $pmb }}">
                            <div id="pe_simple_captcha-error" class="text-danger"></div>
                        </div>

                        {{-- Submit --}}
                        <div class="col-lg-6 form-group" style="align-self: center;">
                            <button type="submit" class="com_btn pe_submit_btn">Request a Quote</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</section>
<script>
jQuery(document).ready(function ($) {

    var phoneDigitRules = {
        'in':10,'us':10,'gb':10,'au':9,'ca':10,'ae':9,'sa':9,
        'pk':10,'bd':10,'np':10,'lk':9,'cn':11,'jp':10,'de':10,
        'fr':9,'it':10,'br':11,'mx':10,'za':9,'ng':10,'ke':9,'default':7
    };

    function getRequiredDigits(iso2) {
        var code = (iso2 || '').toLowerCase();
        return phoneDigitRules[code] !== undefined ? phoneDigitRules[code] : phoneDigitRules['default'];
    }

    // ── intl-tel-input ────────────────────────────────────────────
    var pePhoneEl = document.getElementById('pe_phone');
    var peIti = window.intlTelInput(pePhoneEl, {
        initialCountry: "auto",
        geoIpLookup: function (callback) {
            fetch("https://ipapi.co/json")
                .then(function (res) { return res.json(); })
                .then(function (data) { callback(data.country_code); })
                .catch(function () { callback("in"); });
        },
        separateDialCode: true,
        utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/utils.js"
    });

    // ── Pre-fill product name when modal opens ────────────────────
    $(document).on('click', '.product-enquire-btn', function () {
        var productName = $(this).data('product');
        $('#pe_product_name').val(productName);
    });

    // ── Reset on modal close ──────────────────────────────────────
    $('#productEnquiryModal').on('show.bs.modal', function () {
        $('#productEnquiryForm .text-danger').text('');
        $('#productEnquiryForm')[0].reset();
        $('#pe_city').html('<option value="">Select City</option>');
        refreshPeCaptcha();
    });

    // ── Captcha refresh ───────────────────────────────────────────
    function refreshPeCaptcha() {
        var a = Math.floor(Math.random() * 9) + 1;
        var b = Math.floor(Math.random() * 9) + 1;
        $('#pe_capA').text(a);
        $('#pe_capB').text(b);
        $('#pe_captcha_sum').val(a + b);
        $('#pe_simple_captcha').val('');
        $('#pe_simple_captcha-error').text('');
    }
    $('#pe_refreshCaptcha').on('click', refreshPeCaptcha);

    // ── State → City ──────────────────────────────────────────────
    $('#pe_state').on('change', function () {
        var state_id = $(this).find('option:selected').data('id');
        if (state_id) {
            $.ajax({
                url: "{{ url('get-cities') }}/" + state_id,
                type: "GET",
                success: function (data) {
                    $('#pe_city').html('<option value="">Select City</option>');
                    $.each(data, function (key, value) {
                        $('#pe_city').append('<option value="' + value.name + '">' + value.name + '</option>');
                    });
                }
            });
        }
    });

    // ── Real-time error clearing ──────────────────────────────────
    $('#pe_name').on('input', function () { if ($(this).val().trim()) $('#pe_name-error').text(''); });
    $('#pe_company_name').on('input', function () { if ($(this).val().trim()) $('#pe_company_name-error').text(''); });
    $('#pe_email').on('input', function () { if ($(this).val().trim()) $('#pe_email-error').text(''); });
    $('#pe_state').on('change', function () { if ($(this).val()) $('#pe_state-error').text(''); });
    $('#pe_city').on('change', function () { if ($(this).val()) $('#pe_city-error').text(''); });
    $('#pe_simple_captcha').on('input', function () { if ($(this).val().trim()) $('#pe_simple_captcha-error').text(''); });
    $('#pe_phone').on('keyup change', function () {
        var countryData = peIti.getSelectedCountryData();
        var rawVal = $.trim(this.value);
        $('#pe_contact_country').val(countryData.name);
        $('#pe_contact_phonecode').val(countryData.dialCode);
        $('#pe_contact_value').val(rawVal);
        $('#pe_contact_full_phone').val(rawVal ? '+' + countryData.dialCode + rawVal : '');
        if (rawVal.length > 0) $('#pe_full_phone-error').text('');
    });

    // ── Validation ────────────────────────────────────────────────
    function validatePeForm() {
        var isValid = true;

        if ($('#pe_name').val().trim() === '') {
            $('#pe_name-error').text('The Name is required.'); isValid = false;
        }
        if ($('#pe_company_name').val().trim() === '') {
            $('#pe_company_name-error').text('The Company Name is required.'); isValid = false;
        }

        var phoneVal       = $('#pe_phone').val().trim();
        var countryData    = peIti.getSelectedCountryData();
        var iso2           = countryData.iso2 || '';
        var digitsOnly     = phoneVal.replace(/\D/g, '');
        var requiredDigits = getRequiredDigits(iso2);
        var countryRule    = phoneDigitRules[(iso2 || '').toLowerCase()];

        if (!phoneVal || phoneVal.length < 1) {
            $('#pe_full_phone-error').text('The Phone Number is required.'); isValid = false;
        } else if (digitsOnly.length < requiredDigits) {
            $('#pe_full_phone-error').text('Please enter a valid ' + requiredDigits + '-digit phone number.'); isValid = false;
        } else if (countryRule !== undefined && digitsOnly.length !== countryRule) {
            $('#pe_full_phone-error').text('Please enter a valid ' + countryRule + '-digit phone number.'); isValid = false;
        }

        var emailVal = $('#pe_email').val().trim();
        if (emailVal === '') {
            $('#pe_email-error').text('The Email Address is required.'); isValid = false;
        } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailVal)) {
            $('#pe_email-error').text('Please enter a valid Email Address.'); isValid = false;
        }

        if ($('#pe_state').val() === '') {
            $('#pe_state-error').text('The State is required.'); isValid = false;
        }
        if ($('#pe_city').val() === '') {
            $('#pe_city-error').text('The City is required.'); isValid = false;
        }

        var captchaInput = $('#pe_simple_captcha').val().trim();
        var captchaSum   = $('#pe_captcha_sum').val();
        if (captchaInput === '') {
            $('#pe_simple_captcha-error').text('The Captcha is required.'); isValid = false;
        } else if (parseInt(captchaInput) !== parseInt(captchaSum)) {
            $('#pe_simple_captcha-error').text('The Captcha answer is incorrect.'); isValid = false;
        }

        return isValid;
    }

    // ── AJAX Submit ───────────────────────────────────────────────
    $('#productEnquiryForm').on('submit', function (e) {
        e.preventDefault();
        e.stopPropagation();

        var $form = $(this);
        $form.find('.text-danger').text('');

        var rawPhone  = $.trim($('#pe_phone').val());
        var dialCode  = peIti.getSelectedCountryData().dialCode;
        $('#pe_contact_full_phone').val(rawPhone ? '+' + dialCode + rawPhone : '');

        if (!validatePeForm()) return false;

        $.ajax({
            url: "{{ route('product.enquiry.store') }}",
            type: "POST",
            data: $form.serialize(),
            dataType: "json",
            beforeSend: function () {
                $form.find('.pe_submit_btn').prop('disabled', true).text('Sending...');
            },
            success: function (res) {
                $form.find('.pe_submit_btn').prop('disabled', false).text('Request a Quote');

                if (res.status === 'success' && res.redirect) {
                    var redirectUrl = res.redirect;
                    var modalEl = document.getElementById('productEnquiryModal');
                    var bsModal = bootstrap.Modal.getInstance(modalEl);
                    var redirected = false;
                    var fallbackTimer = setTimeout(function () {
                        if (!redirected) { redirected = true; window.location.href = redirectUrl; }
                    }, 800);
                    if (bsModal) {
                        modalEl.addEventListener('hidden.bs.modal', function () {
                            clearTimeout(fallbackTimer);
                            if (!redirected) { redirected = true; window.location.href = redirectUrl; }
                        }, { once: true });
                        bsModal.hide();
                    } else {
                        clearTimeout(fallbackTimer);
                        window.location.href = redirectUrl;
                    }
                } else if (res.errors) {
                    $.each(res.errors, function (key, value) {
                        $('#pe_' + key + '-error').text(value[0] || value);
                    });
                }
            },
            error: function (xhr) {
                $form.find('.pe_submit_btn').prop('disabled', false).text('Request a Quote');
                if (xhr.status === 422) {
                    var errors = xhr.responseJSON.errors;
                    $.each(errors, function (key, value) {
                        $('#pe_' + key + '-error').text(value[0]);
                    });
                } else {
                    alert('An unexpected error occurred. Please try again.');
                }
            }
        });
    });

});
</script>