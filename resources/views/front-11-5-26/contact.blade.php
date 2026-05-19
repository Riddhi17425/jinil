@include('layouts.frontheader')

<section class="navi_page">
    <div class="container-fluid">
        <div class="navi_page_child">
            <div>
                <p class="title_24"><a href="{{ url('/') }}" class="text-585">Home</a> / Contact Us</p>
                <h2 class="title_60">Get in Touch</h2>
                <p class="mb-0">Get in touch with our engineering team to discuss your shot blasting, surface
                    preparation, or custom machine requirements. We're here to support your project from concept to
                    commissioning.</p>
            </div>
           
        </div>
    </div>
</section>

<section class="mb_100 con_map">
    <div class="container-fluid">
        <div class="row">
            <div class="mb-4 mb-lg-0 col-lg-6 pe-lg-5">
                <div class="inve_Pro_card">
                    <h4 class="title_24">Head Office</h4>
                    <p><a href="https://maps.app.goo.gl/gQvGLF1yj93x7JhQA" target="_blank">C3-602, anushruti tower, near jain derasar, s.g.road, <br/> thaltej,  ahmedabad 380059 india</a></p>
                    <hr>
                </div>
                <div class="inve_Pro_card">
                    <h4 class="title_24">Business Hours</h4>
                     <p>10-6 pm Monday to Friday <br/>
                     10- 4 Saturday
</p>
                    <hr>
                </div>
                <div class="inve_Pro_card">
                    <h4 class="title_24">Direct Contact</h4>
                    <div class="con_num">
                        <div>
                             <p class="mb-1">Mr Nilesh Todi :</p>
                            <p class="mb-1">Mr. Ramesh Tripathi :</p>
                            <p class="mb-1">Email Address:</p>
                        </div>
                        <div>
                            <p class="mb-1"><a href="tel: +91 9830030030">+91 9830030030</a></p>
                            <p class="mb-1"><a href="tel: +91 9462419670">+91 9462419670</a></p>
                            <p class="mb-1"> <a href="mailto:ntodi@jinilspinning.com">ntodi@jinilspinning.com</a><br>
                              
                               <a href="mailto:ramesh@jinilspinning.com">ramesh@jinilspinning.com</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
               
                    
                  <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7342.434200690239!2d72.5119774!3d23.052501!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e9b0000e4233d%3A0x7c2da11434e789ba!2sJinil%20Spinning%20Pvt%20Ltd!5e0!3m2!1sen!2sin!4v1774248205549!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</section>

@php
use Illuminate\Support\Facades\DB;
$states = DB::table('states')->select('id','name')->get();
$ca = rand(1,9);
$cb = rand(1,9);
@endphp

<section class="mt_100 mb_100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 pe-lg-5">
                <h2 class="title_80 fw-medium text-111" style="mix-blend-mode: normal;">Need Technical Assistance?</h2>
                <p>Our experienced engineers can help you select the right shot blasting solution based on your application,
                    material type, and production capacity.</p>
            </div>

            <div class="col-lg-8">
                <form class="contact_form" id="contact_form" action="#" method="post">
                    @csrf
                    <div class="row">

                        {{-- Full Name --}}
                        <div class="col-lg-6 form-group">
                            <input type="text" name="name" placeholder=" ">
                            <label>Full Name<span class="text-danger">*</span>:</label>
                            <span id="cf_name-error" class="text-danger"></span>
                        </div>

                        {{-- Company Name --}}
                        <div class="col-lg-6 form-group">
                            <input type="text" name="company_name" placeholder=" ">
                            <label>Company Name<span class="text-danger">*</span>:</label>
                            <span id="cf_company_name-error" class="text-danger"></span>
                        </div>

                        {{-- Phone Number (intl-tel-input) --}}
                        <div class="col-lg-6 form-group" style="position:relative;">
                            <div id="cf_phone_wrapper">
                                <input type="tel" id="cf_phone" name="phone" placeholder=" Phone Number *">
                            </div>
                            <input type="hidden" name="country"    id="cf_contact_country">
                            <input type="hidden" name="phonecode"  id="cf_contact_phonecode">
                            <input type="hidden" name="contact"    id="cf_contact_value">
                            <input type="hidden" name="full_phone" id="cf_contact_full_phone">
                            <span id="cf_full_phone-error" class="text-danger" style="display:block; font-size:14px; margin-top:4px;"></span>
                        </div>

                        {{-- Email Address --}}
                        <div class="col-lg-6 form-group">
                            <input type="email" name="email" placeholder=" ">
                            <label>Email Address<span class="text-danger">*</span>:</label>
                            <span id="cf_email-error" class="text-danger"></span>
                        </div>

                        {{-- State --}}
                        <div class="col-lg-6 form-group">
                            <select name="state" id="cf_state">
                                <option value="">Select State</option>
                                @foreach($states as $state)
                                    <option value="{{ $state->name }}" data-id="{{ $state->id }}">{{ $state->name }}</option>
                                @endforeach
                            </select>
                            <label>State<span class="text-danger">*</span>:</label>
                            <span id="cf_state-error" class="text-danger"></span>
                        </div>

                        {{-- City --}}
                        <div class="col-lg-6 form-group">
                            <select name="city" id="cf_city">
                                <option value="">Select City</option>
                            </select>
                            <label>City<span class="text-danger">*</span>:</label>
                            <span id="cf_city-error" class="text-danger"></span>
                        </div>

                        {{-- Requirement --}}
                        <div class="col-lg-12 form-group">
                            <textarea rows="1" name="message" placeholder=" "></textarea>
                            <label>Requirement :</label>
                            <span id="cf_message-error" class="text-danger"></span>
                        </div>

                        {{-- Captcha --}}
                        <div class="col-8 col-lg-3 form-group">
                            <div style="display:flex;gap:6px;">
                                <input type="number" id="cf_simple_captcha" name="simple_captcha"
                                    placeholder="Enter answer" oninput="this.value=this.value.replace(/[^0-9]/g,'')">
                                <label>
                                    What is <span id="cf_capA">{{ $ca }}</span> + <span id="cf_capB">{{ $cb }}</span> ?
                                </label>
                                <button type="button" id="cf_refreshCaptcha"
                                    style="border:0;background:#eee;padding:5px 8px;border-radius:5px;">↻</button>
                            </div>
                            <input type="hidden" name="captcha_sum" id="cf_captcha_sum" value="{{ $ca + $cb }}">
                            <span id="cf_simple_captcha-error" class="text-danger"></span>
                        </div>

                        {{-- Submit --}}
                        <div class="col-lg-6 form-group" style="align-self: anchor-center;">
                            <button type="submit" class="com_btn cf_submit_btn">Request a Quote</button>
                        </div>

                    </div>
                </form>
            </div>

        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/intlTelInput.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
jQuery(document).ready(function ($) {

    // ── State → City ──────────────────────────────────────────────
    $('#cf_state').on('change', function () {
        var state_id = $(this).find('option:selected').data('id');
        if (state_id) {
            $.ajax({
                url: "{{ url('get-cities') }}/" + state_id,
                type: "GET",
                success: function (data) {
                    $('#cf_city').html('<option value="">Select City</option>');
                    $.each(data, function (key, value) {
                        $('#cf_city').append('<option value="' + value.name + '">' + value.name + '</option>');
                    });
                }
            });
        }
    });

    // ── CAPTCHA refresh ───────────────────────────────────────────
    function refreshCfCaptcha() {
        var a = Math.floor(Math.random() * 9) + 1;
        var b = Math.floor(Math.random() * 9) + 1;
        $('#cf_capA').text(a);
        $('#cf_capB').text(b);
        $('#cf_captcha_sum').val(a + b);
        $('#cf_simple_captcha').val('');
        $('#cf_simple_captcha-error').text('');
    }
    $('#cf_refreshCaptcha').on('click', refreshCfCaptcha);

    // ── intl-tel-input ────────────────────────────────────────────
    var cfPhoneEl = document.getElementById('cf_phone');
    var cfIti = window.intlTelInput(cfPhoneEl, {
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

    $('#cf_phone').on('keyup change', function () {
        var countryData = cfIti.getSelectedCountryData();
        $('#cf_contact_country').val(countryData.name);
        $('#cf_contact_phonecode').val(countryData.dialCode);
        $('#cf_contact_value').val(this.value);
        $('#cf_contact_full_phone').val('+' + countryData.dialCode + this.value);
    });

    // ── Client-side validation ────────────────────────────────────
    function validateCfForm() {
        var isValid = true;

        // Full Name
        if ($('#contact_form input[name="name"]').val().trim() === '') {
            $('#cf_name-error').text('The Name is required.');
            isValid = false;
        }

        // Company Name
        if ($('#contact_form input[name="company_name"]').val().trim() === '') {
            $('#cf_company_name-error').text('The Company Name is required.');
            isValid = false;
        }

        // Phone
        var phoneVal = $('#cf_phone').val().trim();
        if (!phoneVal || phoneVal.length < 1) {
            $('#cf_full_phone-error').text('The Phone Number is required.');
            isValid = false;
        } else if (phoneVal.replace(/\D/g, '').length < 7) {
            $('#cf_full_phone-error').text('Please enter a valid Phone Number.');
            isValid = false;
        }

        // Email
        var emailVal = $('#contact_form input[name="email"]').val().trim();
        if (emailVal === '') {
            $('#cf_email-error').text('The Email Address is required.');
            isValid = false;
        } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailVal)) {
            $('#cf_email-error').text('Please enter a valid Email Address.');
            isValid = false;
        }

        // State
        if ($('#cf_state').val() === '') {
            $('#cf_state-error').text('The State is required.');
            isValid = false;
        }

        // City
        if ($('#cf_city').val() === '') {
            $('#cf_city-error').text('The City is required.');
            isValid = false;
        }

        // Captcha
        var captchaInput = $('#cf_simple_captcha').val().trim();
        var captchaSum   = $('#cf_captcha_sum').val();
        if (captchaInput === '') {
            $('#cf_simple_captcha-error').text('The Captcha is required.');
            isValid = false;
        } else if (parseInt(captchaInput) !== parseInt(captchaSum)) {
            $('#cf_simple_captcha-error').text('The Captcha answer is incorrect.');
            isValid = false;
        }

        return isValid;
    }

    // ── AJAX Form Submission ──────────────────────────────────────
    $('#contact_form').on('submit', function (e) {
        e.preventDefault();
        e.stopPropagation();

        var $form = $(this);

        // ✅ Clear ALL errors first
        $form.find('.text-danger').text('');

        // ✅ Build full phone
        var dialCode  = cfIti.getSelectedCountryData().dialCode;
        var phoneVal  = $('#cf_phone').val().trim();
        var fullPhone = '+' + dialCode + phoneVal;
        $('#cf_contact_full_phone').val(fullPhone);

        // ✅ Run client-side validation — stop if any field is invalid
        if (!validateCfForm()) {
            return false;
        }

        var formData = $form.serialize();

        $.ajax({
            url: "{{ route('contact.store') }}",
            type: "POST",
            data: formData,
            dataType: "json",
            beforeSend: function () {
                $form.find('.cf_submit_btn').prop('disabled', true).text('Sending...');
            },
            success: function (res) {
                $form.find('.cf_submit_btn').prop('disabled', false).text('Request a Quote');
                if (res.status === 'success' && res.redirect) {
                    window.location.href = res.redirect;
                } else if (res.errors) {
                    $.each(res.errors, function (key, value) {
                        $('#cf_' + key + '-error').text(value[0] || value);
                    });
                }
            },
            error: function (xhr) {
                $form.find('.cf_submit_btn').prop('disabled', false).text('Request a Quote');
                if (xhr.status === 422) {
                    var errors = xhr.responseJSON.errors;
                    $.each(errors, function (key, value) {
                        $('#cf_' + key + '-error').text(value[0]);
                    });
                } else {
                    alert('An unexpected error occurred. Please try again.');
                }
            }
        });
    });

});
</script>
@include('layouts.frontfooter')