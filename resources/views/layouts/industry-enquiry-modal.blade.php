@php
use Illuminate\Support\Facades\DB;
$states = DB::table('states')->select('id','name')->get();
$ma = rand(1,9);
$mb = rand(1,9);
@endphp


<section class="industry-enquiry-modal">
<div class="modal fade" id="industryEnquiryModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title title_24">Enquire Now</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="industryEnquiryForm" action="#" method="post" class="contact_form">
                    @csrf
                    <div class="row">

                        {{-- Industry Name (read-only) --}}
                        <div class="col-lg-12 form-group">
                            <input type="text" name="industry_name" id="ie_industry_name" placeholder=" " readonly>
                            <label>Industry</label>
                        </div>

                        {{-- Full Name --}}
                        <div class="col-lg-6 form-group">
                            <input type="text" name="name" id="ie_name" placeholder=" ">
                            <label>Full Name<span class="text-danger">*</span>:</label>
                            <div id="ie_name-error" class="text-danger"></div>
                        </div>

                        {{-- Company Name --}}
                        <div class="col-lg-6 form-group">
                            <input type="text" name="company_name" id="ie_company_name" placeholder=" ">
                            <label>Company Name<span class="text-danger">*</span>:</label>
                            <div id="ie_company_name-error" class="text-danger"></div>
                        </div>

                        {{-- Phone --}}
                        <div class="col-lg-6 form-group" style="position:relative;">
                            <div id="ie_phone_wrapper">
                                <input type="tel" id="ie_phone" name="phone" placeholder=" Phone Number *">
                            </div>
                            <input type="hidden" name="country"    id="ie_contact_country">
                            <input type="hidden" name="phonecode"  id="ie_contact_phonecode">
                            <input type="hidden" name="contact"    id="ie_contact_value">
                            <input type="hidden" name="full_phone" id="ie_contact_full_phone">
                            <div id="ie_full_phone-error" class="text-danger" style="display:block;font-size:14px;margin-top:4px;"></div>
                        </div>

                        {{-- Email --}}
                        <div class="col-lg-6 form-group">
                            <input type="email" name="email" id="ie_email" placeholder=" ">
                            <label>Email Address<span class="text-danger">*</span>:</label>
                            <div id="ie_email-error" class="text-danger"></div>
                        </div>

                        {{-- State --}}
                        <div class="col-lg-6 form-group">
                            <select name="state" id="ie_state">
                                <option value="">Select State</option>
                                @foreach($states as $state)
                                    <option value="{{ $state->name }}" data-id="{{ $state->id }}">{{ $state->name }}</option>
                                @endforeach
                            </select>
                            <label>State<span class="text-danger">*</span>:</label>
                            <div id="ie_state-error" class="text-danger"></div>
                        </div>

                        {{-- City --}}
                        <div class="col-lg-6 form-group">
                            <select name="city" id="ie_city">
                                <option value="">Select City</option>
                            </select>
                            <label>City<span class="text-danger">*</span>:</label>
                            <div id="ie_city-error" class="text-danger"></div>
                        </div>

                        {{-- Requirement --}}
                        <div class="col-lg-12 form-group">
                            <textarea rows="1" name="message" placeholder=" "></textarea>
                            <label>Requirement :</label>
                        </div>

                        {{-- Captcha --}}
                        <div class="col-lg-4 form-group">
                            <div style="display:flex;gap:6px;">
                                <input type="number" id="ie_simple_captcha" name="simple_captcha"
                                    placeholder="Enter answer" oninput="this.value=this.value.replace(/[^0-9]/g,'')">
                                <label>
                                    What is <span id="ie_capA">{{ $ima }}</span> + <span id="ie_capB">{{ $imb }}</span> ?
                                </label>
                                <button type="button" id="ie_refreshCaptcha"
                                    style="border:0;background:#eee;padding:5px 8px;border-radius:5px;">↻</button>
                            </div>
                            <input type="hidden" name="captcha_sum" id="ie_captcha_sum" value="{{ $ima + $imb }}">
                            <div id="ie_simple_captcha-error" class="text-danger"></div>
                        </div>

                        {{-- Submit --}}
                        <div class="col-lg-6 form-group" style="align-self:anchor-center;">
                            <button type="submit" class="com_btn ie_submit_btn">Request a Quote</button>
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
    var iePhoneEl = document.getElementById('ie_phone');
    var ieIti = window.intlTelInput(iePhoneEl, {
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

    // ── Pre-fill industry name when button clicked ────────────────
    $(document).on('click', '.industry-enquire-btn', function () {
        $('#ie_industry_name').val($(this).data('industry'));
    });

    // ── Reset on modal open ───────────────────────────────────────
    $('#industryEnquiryModal').on('show.bs.modal', function () {
        $('#industryEnquiryForm .text-danger').text('');
        $('#industryEnquiryForm')[0].reset();
        $('#ie_city').html('<option value="">Select City</option>');
        refreshIeCaptcha();
    });

    // ── Captcha refresh ───────────────────────────────────────────
    function refreshIeCaptcha() {
        var a = Math.floor(Math.random() * 9) + 1;
        var b = Math.floor(Math.random() * 9) + 1;
        $('#ie_capA').text(a);
        $('#ie_capB').text(b);
        $('#ie_captcha_sum').val(a + b);
        $('#ie_simple_captcha').val('');
        $('#ie_simple_captcha-error').text('');
    }
    $('#ie_refreshCaptcha').on('click', refreshIeCaptcha);

    // ── State → City ──────────────────────────────────────────────
    $('#ie_state').on('change', function () {
        var state_id = $(this).find('option:selected').data('id');
        if (state_id) {
            $.ajax({
                url: "{{ url('get-cities') }}/" + state_id,
                type: "GET",
                success: function (data) {
                    $('#ie_city').html('<option value="">Select City</option>');
                    $.each(data, function (key, value) {
                        $('#ie_city').append('<option value="' + value.name + '">' + value.name + '</option>');
                    });
                }
            });
        }
    });

    // ── Real-time error clearing ──────────────────────────────────
    $('#ie_name').on('input',         function () { if ($(this).val().trim()) $('#ie_name-error').text(''); });
    $('#ie_company_name').on('input', function () { if ($(this).val().trim()) $('#ie_company_name-error').text(''); });
    $('#ie_email').on('input',        function () { if ($(this).val().trim()) $('#ie_email-error').text(''); });
    $('#ie_state').on('change',       function () { if ($(this).val())        $('#ie_state-error').text(''); });
    $('#ie_city').on('change',        function () { if ($(this).val())        $('#ie_city-error').text(''); });
    $('#ie_simple_captcha').on('input', function () { if ($(this).val().trim()) $('#ie_simple_captcha-error').text(''); });
    $('#ie_phone').on('keyup change', function () {
        var countryData = ieIti.getSelectedCountryData();
        var rawVal = $.trim(this.value);
        $('#ie_contact_country').val(countryData.name);
        $('#ie_contact_phonecode').val(countryData.dialCode);
        $('#ie_contact_value').val(rawVal);
        $('#ie_contact_full_phone').val(rawVal ? '+' + countryData.dialCode + rawVal : '');
        if (rawVal.length > 0) $('#ie_full_phone-error').text('');
    });

    // ── Validation ────────────────────────────────────────────────
    function validateIeForm() {
        var isValid = true;

        if ($('#ie_name').val().trim() === '') {
            $('#ie_name-error').text('The Name is required.'); isValid = false;
        }
        if ($('#ie_company_name').val().trim() === '') {
            $('#ie_company_name-error').text('The Company Name is required.'); isValid = false;
        }

        var phoneVal       = $('#ie_phone').val().trim();
        var countryData    = ieIti.getSelectedCountryData();
        var iso2           = countryData.iso2 || '';
        var digitsOnly     = phoneVal.replace(/\D/g, '');
        var requiredDigits = getRequiredDigits(iso2);
        var countryRule    = phoneDigitRules[(iso2 || '').toLowerCase()];

        if (!phoneVal || phoneVal.length < 1) {
            $('#ie_full_phone-error').text('The Phone Number is required.'); isValid = false;
        } else if (digitsOnly.length < requiredDigits) {
            $('#ie_full_phone-error').text('Please enter a valid ' + requiredDigits + '-digit phone number.'); isValid = false;
        } else if (countryRule !== undefined && digitsOnly.length !== countryRule) {
            $('#ie_full_phone-error').text('Please enter a valid ' + countryRule + '-digit phone number.'); isValid = false;
        }

        var emailVal = $('#ie_email').val().trim();
        if (emailVal === '') {
            $('#ie_email-error').text('The Email Address is required.'); isValid = false;
        } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailVal)) {
            $('#ie_email-error').text('Please enter a valid Email Address.'); isValid = false;
        }

        if ($('#ie_state').val() === '') {
            $('#ie_state-error').text('The State is required.'); isValid = false;
        }
        if ($('#ie_city').val() === '') {
            $('#ie_city-error').text('The City is required.'); isValid = false;
        }

        var captchaInput = $('#ie_simple_captcha').val().trim();
        var captchaSum   = $('#ie_captcha_sum').val();
        if (captchaInput === '') {
            $('#ie_simple_captcha-error').text('The Captcha is required.'); isValid = false;
        } else if (parseInt(captchaInput) !== parseInt(captchaSum)) {
            $('#ie_simple_captcha-error').text('The Captcha answer is incorrect.'); isValid = false;
        }

        return isValid;
    }

    // ── AJAX Submit ───────────────────────────────────────────────
    $('#industryEnquiryForm').on('submit', function (e) {
        e.preventDefault();
        e.stopPropagation();

        var $form = $(this);
        $form.find('.text-danger').text('');

        var rawPhone = $.trim($('#ie_phone').val());
        var dialCode = ieIti.getSelectedCountryData().dialCode;
        $('#ie_contact_full_phone').val(rawPhone ? '+' + dialCode + rawPhone : '');

        if (!validateIeForm()) return false;

        $.ajax({
            url: "{{ route('industry.enquiry.store') }}",
            type: "POST",
            data: $form.serialize(),
            dataType: "json",
            beforeSend: function () {
                $form.find('.ie_submit_btn').prop('disabled', true).text('Sending...');
            },
            success: function (res) {
                $form.find('.ie_submit_btn').prop('disabled', false).text('Request a Quote');

                if (res.status === 'success' && res.redirect) {
                    var redirectUrl = res.redirect;
                    var modalEl = document.getElementById('industryEnquiryModal');
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
                        $('#ie_' + key + '-error').text(value[0] || value);
                    });
                }
            },
            error: function (xhr) {
                $form.find('.ie_submit_btn').prop('disabled', false).text('Request a Quote');
                if (xhr.status === 422) {
                    var errors = xhr.responseJSON.errors;
                    $.each(errors, function (key, value) {
                        $('#ie_' + key + '-error').text(value[0]);
                    });
                } else {
                    alert('An unexpected error occurred. Please try again.');
                }
            }
        });
    });

});
</script>