<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/css/intlTelInput.css">

@php
use Illuminate\Support\Facades\DB;
$states = DB::table('states')->select('id','name')->get();
$ma = rand(1,9);
$mb = rand(1,9);
@endphp

<section class="inquiry-modal">
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title title_24">Enquire Now</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form class="contact_form" id="headerstore" action="#" method="post">
                    @csrf
                    <div class="row">

                        <div class="col-lg-6 form-group">
                            <input type="text" name="name" placeholder=" ">
                            <label>Full Name<span class="text-danger">*</span>:</label>
                            <div id="modal_name-error" class="text-danger"></div>
                        </div>

                        <div class="col-lg-6 form-group">
                            <input type="text" name="company_name" placeholder=" ">
                            <label>Company Name<span class="text-danger">*</span>:</label>
                            <div id="modal_company_name-error" class="text-danger"></div>
                        </div>

                        {{-- Phone Number (intl-tel-input) --}}
                        <div class="col-lg-6 form-group" style="position:relative;">
                            <div id="modal_phone_wrapper">
                                <input type="tel" id="modal_phone" name="phone" placeholder=" Phone Number *" maxlength="15">
                            </div>
                            <input type="hidden" name="country"    id="modal_contact_country">
                            <input type="hidden" name="phonecode"  id="modal_contact_phonecode">
                            <input type="hidden" name="contact"    id="modal_contact_value">
                            <input type="hidden" name="full_phone" id="modal_contact_full_phone">
                            <div id="modal_full_phone-error" class="text-danger" style="display:block; font-size:14px; margin-top:4px;"></div>
                        </div>

                        <div class="col-lg-6 form-group">
                            <input type="email" name="email" placeholder=" ">
                            <label>Email Address<span class="text-danger">*</span>:</label>
                            <div id="modal_email-error" class="text-danger"></div>
                        </div>

                        <div class="col-lg-6 form-group">
                            <select name="state" id="modal_state">
                                <option value="">Select State</option>
                                @foreach($states as $state)
                                    <option value="{{ $state->name }}" data-id="{{ $state->id }}">{{ $state->name }}</option>
                                @endforeach
                            </select>
                            <label>State<span class="text-danger">*</span>:</label>
                            <div id="modal_state-error" class="text-danger"></div>
                        </div>

                        <div class="col-lg-6 form-group">
                            <select name="city" id="modal_city">
                                <option value="">Select City</option>
                            </select>
                            <label>City<span class="text-danger">*</span>:</label>
                            <div id="modal_city-error" class="text-danger"></div>
                        </div>

                        <div class="col-lg-12 form-group">
                            <textarea rows="1" name="message" placeholder=" "></textarea>
                            <label>Requirement :</label>
                            <div id="modal_message-error" class="text-danger"></div>
                        </div>

                        <div class="col-lg-4 form-group">
                            <div style="display:flex;gap:6px;">
                                <input type="number" id="modal_simple_captcha" name="simple_captcha"
                                    placeholder="Enter answer" oninput="this.value=this.value.replace(/[^0-9]/g,'')">
                                <label>
                                    What is <span id="modal_capA">{{ $ma }}</span> + <span id="modal_capB">{{ $mb }}</span> ?
                                </label>
                                <button type="button" id="modal_refreshCaptcha"
                                    style="border:0;background:#eee;padding:5px 8px;border-radius:5px;">↻</button>
                            </div>
                            <input type="hidden" name="captcha_sum" id="modal_captcha_sum" value="{{ $ma + $mb }}">
                            <div id="modal_simple_captcha-error" class="text-danger"></div>
                        </div>

                        <div class="col-lg-6 form-group" style="align-self: anchor-center;">
                            <button type="submit" class="com_btn modal_submit_btn">Request a Quote</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</section>

<script src="https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/intlTelInput.min.js"></script>

<script>
jQuery(document).ready(function ($) {

    var phoneDigitRules = {
        'in': 10, 'us': 10, 'gb': 10, 'au': 9, 'ca': 10, 'ae': 9, 'sa': 9,
        'pk': 10, 'bd': 10, 'np': 10, 'lk': 9, 'cn': 11, 'jp': 10, 'de': 10,
        'fr': 9, 'it': 10, 'br': 11, 'mx': 10, 'za': 9, 'ng': 10, 'ke': 9,
        'default': 7
    };
    function getRequiredDigits(iso2) {
        var code = (iso2 || '').toLowerCase();
        return phoneDigitRules[code] !== undefined ? phoneDigitRules[code] : phoneDigitRules['default'];
    }

    $('#modal_state').on('change', function () {
        var state_id = $(this).find('option:selected').data('id');
        if (state_id) {
            $.ajax({
                url: "{{ url('get-cities') }}/" + state_id,
                type: "GET",
                success: function (data) {
                    $('#modal_city').html('<option value="">Select City</option>');
                    $.each(data, function (key, value) {
                        $('#modal_city').append('<option value="' + value.name + '">' + value.name + '</option>');
                    });
                }
            });
        }
        if ($(this).val() !== '') $('#modal_state-error').text('');
    });

    function refreshModalCaptcha() {
        var a = Math.floor(Math.random() * 9) + 1;
        var b = Math.floor(Math.random() * 9) + 1;
        $('#modal_capA').text(a);
        $('#modal_capB').text(b);
        $('#modal_captcha_sum').val(a + b);
        $('#modal_simple_captcha').val('');
        $('#modal_simple_captcha-error').text('');
    }
    $('#modal_refreshCaptcha').on('click', refreshModalCaptcha);

    $('#staticBackdrop').on('show.bs.modal', function () {
        $('#headerstore .text-danger').text('');
        $('#headerstore')[0].reset();
        $('#modal_city').html('<option value="">Select City</option>');
        refreshModalCaptcha();
    });

    // ── intl-tel-input: single, simple init ─────────────────────
    var modalPhoneEl = document.getElementById('modal_phone');
    var modalIti = window.intlTelInput(modalPhoneEl, {
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

    $('#modal_phone').on('input', function () {
        var cleaned = this.value.replace(/[^0-9]/g, '');
        if (cleaned.length > 15) cleaned = cleaned.substring(0, 15);
        this.value = cleaned;
    });

    $('#modal_phone').on('keypress', function (e) {
        var charCode = e.which ? e.which : e.keyCode;
        if (charCode < 48 || charCode > 57) e.preventDefault();
        if (this.value.replace(/[^0-9]/g, '').length >= 15) e.preventDefault();
    });

    $('#modal_phone').on('keyup change', function () {
        var countryData = modalIti.getSelectedCountryData();
        var rawVal = $.trim(this.value);
        $('#modal_contact_country').val(countryData.name);
        $('#modal_contact_phonecode').val(countryData.dialCode);
        $('#modal_contact_value').val(rawVal);
        $('#modal_contact_full_phone').val(rawVal ? '+' + countryData.dialCode + rawVal : '');
        if (rawVal.length > 0) $('#modal_full_phone-error').text('');
    });

    $('#headerstore input[name="name"]').on('input', function () {
        if ($(this).val().trim() !== '') $('#modal_name-error').text('');
    });
    $('#headerstore input[name="company_name"]').on('input', function () {
        if ($(this).val().trim() !== '') $('#modal_company_name-error').text('');
    });
    $('#headerstore input[name="email"]').on('input', function () {
        if ($(this).val().trim() !== '') $('#modal_email-error').text('');
    });
    $('#modal_city').on('change', function () {
        if ($(this).val() !== '') $('#modal_city-error').text('');
    });
    $('#modal_simple_captcha').on('input', function () {
        if ($(this).val().trim() !== '') $('#modal_simple_captcha-error').text('');
    });

    function validateModalForm() {
        var isValid = true;

        if ($('#headerstore input[name="name"]').val().trim() === '') {
            $('#modal_name-error').text('The Name is required.');
            isValid = false;
        }
        if ($('#headerstore input[name="company_name"]').val().trim() === '') {
            $('#modal_company_name-error').text('The Company Name is required.');
            isValid = false;
        }

        var phoneVal       = $('#modal_phone').val().trim();
        var countryData    = modalIti.getSelectedCountryData();
        var iso2           = countryData.iso2 || '';
        var digitsOnly     = phoneVal.replace(/\D/g, '');
        var requiredDigits = getRequiredDigits(iso2);
        var countryRule    = phoneDigitRules[(iso2 || '').toLowerCase()];

        if (!phoneVal) {
            $('#modal_full_phone-error').text('The Phone Number is required.');
            isValid = false;
        } else if (digitsOnly.length < 8) {
            $('#modal_full_phone-error').text('Phone number must be at least 8 digits.');
            isValid = false;
        } else if (digitsOnly.length > 15) {
            $('#modal_full_phone-error').text('Phone number cannot be more than 15 digits.');
            isValid = false;
        } else if (digitsOnly.length < requiredDigits) {
            $('#modal_full_phone-error').text('Please enter a valid ' + requiredDigits + '-digit phone number.');
            isValid = false;
        } else if (countryRule !== undefined && digitsOnly.length !== countryRule) {
            $('#modal_full_phone-error').text('Please enter a valid ' + countryRule + '-digit phone number.');
            isValid = false;
        }

        var emailVal = $('#headerstore input[name="email"]').val().trim();
        if (emailVal === '') {
            $('#modal_email-error').text('The Email Address is required.');
            isValid = false;
        } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailVal)) {
            $('#modal_email-error').text('Please enter a valid Email Address.');
            isValid = false;
        }

        if ($('#modal_state').val() === '') {
            $('#modal_state-error').text('The State is required.');
            isValid = false;
        }
        if ($('#modal_city').val() === '') {
            $('#modal_city-error').text('The City is required.');
            isValid = false;
        }

        var captchaInput = $('#modal_simple_captcha').val().trim();
        var captchaSum   = $('#modal_captcha_sum').val();
        if (captchaInput === '') {
            $('#modal_simple_captcha-error').text('The Captcha is required.');
            isValid = false;
        } else if (parseInt(captchaInput) !== parseInt(captchaSum)) {
            $('#modal_simple_captcha-error').text('The Captcha answer is incorrect.');
            isValid = false;
        }

        return isValid;
    }

    $('#headerstore').on('submit', function (e) {
        e.preventDefault();
        e.stopPropagation();

        var $form = $(this);
        $form.find('.text-danger').text('');

        var rawPhone  = $.trim($('#modal_phone').val());
        var dialCode  = modalIti.getSelectedCountryData().dialCode;
        var fullPhone = rawPhone ? '+' + dialCode + rawPhone : '';
        $('#modal_contact_full_phone').val(fullPhone);

        if (!validateModalForm()) return false;

        var formData = $form.serialize();

        $.ajax({
            url: "{{ route('headerstore') }}",
            type: "POST",
            data: formData,
            dataType: "json",
            beforeSend: function () {
                $form.find('.modal_submit_btn').prop('disabled', true).text('Sending...');
            },
            success: function (res) {
                $form.find('.modal_submit_btn').prop('disabled', false).text('Request a Quote');
                if (res.status === 'success' && res.redirect) {
                    var redirectUrl = res.redirect;
                    var modalEl = document.getElementById('staticBackdrop');
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
                        $('#modal_' + key + '-error').text(value[0] || value);
                    });
                }
            },
            error: function (xhr) {
                $form.find('.modal_submit_btn').prop('disabled', false).text('Request a Quote');
                if (xhr.status === 422) {
                    var errors = xhr.responseJSON.errors;
                    $.each(errors, function (key, value) {
                        $('#modal_' + key + '-error').text(value[0]);
                    });
                } else {
                    alert('An unexpected error occurred. Please try again.');
                }
            }
        });
    });

});
</script>