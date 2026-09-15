@include('layouts.frontheader')

<section class="navi_page text-center">
    <div class="container">

        <h2 class="title_60">Thank You!</h2>
        <p>
            Your enquiry has been successfully submitted.
            Our team will contact you shortly.
        </p>

        <a href="{{ url('/') }}" class="com_btn back_btn">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M21 12H3M3 12L10 5M3 12L10 19" stroke="#58595b" stroke-width="1.5" stroke-linecap="round"
                    stroke-linejoin="round"></path>
            </svg>
            <span> Back to Home</span>
        </a>

        <img src="{{ asset('public/front/images/than-you.png') }}" class=" img-fluid">
    </div>
</section>


@include('layouts.frontfooter')