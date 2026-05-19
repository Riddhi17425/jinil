@include('layouts.frontheader')

<section class="navi_page">
    <div class="container-fluid">

        <div class="navi_page_child">
            <div>
                <p class="title_24"><a href="{{ url('/') }}" class="text-585">Home /</a> <a
                        href="{{ route('spareparts') }}" class="text-585">Spare Parts</a> </p>
                <h2 class="title_60">Spare Parts</h2>
                <p class="mb-0">Airless shot blasting machines use high-speed centrifugal wheels to deliver consistent
                    surface preparation for industrial components. Designed for efficiency and durability, these systems
                    remove scale, rust, and contaminants while ensuring uniform finishing and improved coating adhesion
                    across diverse manufacturing applications.</p>
            </div>

            <a href="{{ route('contact') }}" class="contact_circle">

                <!-- circular text image -->
                <img src="{{ asset('public/front/images/innder-header-jump.svg') }}" class="circle_text_img">

                <svg class="arrow_img" width="18" height="23" viewBox="0 0 18 23" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M8.85653 1.15617L8.85653 20.9552L8.85653 1.15617ZM8.85653 20.9552L16.5562 13.2555L8.85653 20.9552ZM8.85653 20.9552L1.15692 13.2556L8.85653 20.9552Z"
                        fill="#58595B" />
                    <path
                        d="M8.85653 1.15617L8.85653 20.9552M8.85653 20.9552L16.5562 13.2555M8.85653 20.9552L1.15692 13.2556"
                        stroke="#58595B" stroke-width="2.31318" stroke-linecap="round" stroke-linejoin="round" />
                </svg>

            </a>
        </div>

    </div>
</section>

<section class="mt_80 mb_100">
    <div class="container-fluid">

        <div class="row gy-5">
            @if($spareparts ->isEmpty())
            <div class="col-12">
                <p class="text-center">No spare parts available at the moment.</p>
            </div>
            @else
            @foreach($spareparts as $sparepart)
            <div class="col-md-6 col-lg-4" id="sparepart-{{ $sparepart->id }}"> {{-- ADD THIS ID --}}
                <div class="fea_mac">
                    <div class="fea_mac_img">
                        <img class="img-fluid" src="{{ asset('public/spareparts/'.$sparepart->image) }}"
                            alt="{{ $sparepart->title }}">
                    </div>
                    <div class="fea_mac_content">
                        <div class="fea_mac_content_inner">
                            <h3 class="title_24">{{ $sparepart->title }}</h3>

                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>

    </div>
</section>

<section class="faq_main">
    <div class="container-fluid">

        <!-- Tabs -->
        <div class="faq_tabs mb_60 justify-content-center">
            <button class="com_btn active" data-tab="all">All</button>
            <button class="com_btn" data-tab="airless">Airless</button>
            <button class="com_btn" data-tab="shot">Shot Blasting</button>
        </div>

        <!-- ALL -->
        <div class="faq_group active" id="all">
            <div class="row gy-4">
                <div class="col-md-6 col-lg-4">
                    <div class="fea_mac">
                        <img class="img-fluid"
                            src="https://jinil.in/public/Product/front_image/Airless%20Shotblasting%20Machine-Tumble%20Type.jpg">
                        <h3 class="title_24">All Item</h3>
                    </div>
                </div>
            </div>
        </div>

        <!-- AIRLESS -->
        <div class="faq_group" id="airless">
            <div class="row gy-4">
                <div class="col-md-6 col-lg-4">
                    <div class="fea_mac">
                        <img class="img-fluid"
                            src="https://jinil.in/public/Product/front_image/Airless%20Shotblasting%20Machine-Tumble%20Type.jpg">
                        <h3 class="title_24">Airless Item</h3>
                    </div>
                </div>
            </div>
        </div>

        <!-- SHOT -->
        <div class="faq_group" id="shot">
            <div class="row gy-4">
                <div class="col-md-6 col-lg-4">
                    <div class="fea_mac">
                        <img class="img-fluid"
                            src="https://jinil.in/public/Product/front_image/Airless%20Shotblasting%20Machine-Tumble%20Type.jpg">
                        <h3 class="title_24">Shot Item</h3>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<script>
document.addEventListener("DOMContentLoaded", function () {

    const tabs = document.querySelectorAll(".com_btn");
    const groups = document.querySelectorAll(".faq_group");

    tabs.forEach(tab => {
        tab.addEventListener("click", function () {

            // active tab
            tabs.forEach(t => t.classList.remove("active"));
            this.classList.add("active");

            const target = this.dataset.tab;

            // show/hide groups
            groups.forEach(group => {

                if (target === "all") {
                    group.classList.add("active");
                } else {
                    group.classList.toggle("active", group.id === target);
                }

            });

        });
    });

});
</script>

@include('front.serviceform')

@include('layouts.frontfooter')