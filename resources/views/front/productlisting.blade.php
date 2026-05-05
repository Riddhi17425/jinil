@include('layouts.frontheader')

<section class="navi_page">
    <div class="container-fluid">

        <div class="navi_page_child">
            <div>
                <p class="title_24"><a href="{{ url('/') }}" class="text-585">Home</a> /  {{ $category->category }}</p>
                <h2 class="title_60"> {{ $category->category }}</h2>
                <p class="mb-0">{!! $category->cat_description !!}</p>
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
        <!--<div class="sec_hed_top mb_60">-->
        <!--    <h2 class="title_60">Featured Machines</h2>-->
        <!--</div>-->

        <div class="row gy-5">
      
            @foreach($productlist->whereNotNull('front_image') as $product)
                <div class="col-md-4" id="product-{{ $product->id }}">   {{-- ADD THIS ID --}}
                    <div class="fea_mac">
                        <div class="fea_mac_img">
                            <img class="img-fluid" 
                                 src="{{ asset('public/Product/front_image/'.$product->front_image) }}" 
                                 alt="{{ $product->name }}">
                        </div>
                        <div class="fea_mac_content">
                            <div class="fea_mac_content_inner">
                                <h3 class="title_24">{{ $product->name }}</h3>
                                <button 
                                    class="com_btn mt-2 product-enquire-btn" 
                                    data-product="{{ $product->name }}"
                                    data-bs-toggle="modal" 
                                    data-bs-target="#productEnquiryModal">
                                    Enquire Now
                                </button>
                                <!-- <a href="{{ route('productdetials', $product->url) }}"
                                    class="com_btn mt-2">
                                    Explore More
                                </a> -->
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
        </div>
        
    </div>
</section>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const hash = window.location.hash;
    if (hash) {
        setTimeout(function () {
            const target = document.querySelector(hash);
            if (target) {
                target.scrollIntoView({ behavior: 'smooth', block: 'center' });

                // Optional: highlight the product briefly
                target.style.transition = 'box-shadow 0.4s ease';
                target.style.boxShadow = '0 0 0 3px #105293';
                setTimeout(() => target.style.boxShadow = '', 2000);
            }
        }, 300);
    }
});
</script>
@include('front.serviceform')

@include('layouts.frontfooter')