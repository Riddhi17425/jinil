@include('layouts.frontheader')
<style>
    @media (max-width: 768px) {
   

    /* Har pair me pehla div = image */
    .industries_details > div:nth-child(odd) {
        order: 1;
    }

    /* Har pair me dusra div = text */
    .industries_details > div:nth-child(even) {
        order: 2;
    }

    /* spacing better karne ke liye */
    .industries_details > div {
        margin-bottom: 20px;
    }
    
}
</style>
<section class="navi_page">
    <div class="container-fluid">

        <div class="navi_page_child">
            <div>
                <p class="title_24"><a href="{{ url('/') }}" class="text-585">Home</a> / <a href="#">Industries</a>
                    {{ $category->indcategory }}</p>
                <h2 class="title_60">{{ $category->indcategory }}</h2>
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

<!--<section class="mt_80">-->
<!--    <div class="container-fluid">-->
<!--        <div class="industries_details">-->

<!--            @foreach($industries as $key => $industry)-->

<!--            @if($key % 2 == 0)-->

<!--            <div>-->
<!--                <img class="img-fluid" src="{{ asset('public/industryImage/'.$industry->image) }}" alt="images">-->
<!--            </div>-->

<!--            <div>-->
<!--                <h2 class="title_60 text-111 mb-3">{{ $industry->title }}</h2>-->
<!--                <p class="mb-0">{!! $industry->description !!}</p>-->
<!--                <a href="#" class="com_btn mt_40">Enquire Now</a>-->
<!--            </div>-->

<!--            @else-->

<!--            <div>-->
<!--                <h2 class="title_60 text-111 mb-3">{{ $industry->title }}</h2>-->
<!--                <p class="mb-0">{!! $industry->description !!}</p>-->
<!--                <a href="#" class="com_btn mt_40">Enquire Now</a>-->
<!--            </div>-->

<!--            <div>-->
<!--                <img class="w-100" src="{{ asset('public/industryImage/'.$industry->image) }}" alt="images">-->
<!--            </div>-->

<!--            @endif-->

<!--            @endforeach-->

<!--        </div>-->
<!--    </div>-->
<!--</section>-->
<section class="mt_80">
    <div class="container-fluid">
        <div class="industries_details">
        @forelse($industries as $key => $industry)
            @if($key % 2 == 0)
                <div>
                    <img class="img-fluid" src="{{ asset('public/industryImage/'.$industry->image) }}" alt="images">
                </div>
                <div class="ind-text-{{ $key }}">
                    <h2 class="title_60 text-111 mb-3">{{ $industry->title }}</h2>
                    <p class="mb-0">{!! $industry->description !!}</p>
                    <button 
                        class="com_btn industry-enquire-btn  mt-3 mt-lg-4 mb-4 mb-lg-0"
                        data-industry="{{ $industry->title }}"
                        data-bs-toggle="modal"
                        data-bs-target="#industryEnquiryModal">
                        Enquire Now
                    </button>
                </div>
            @else
                <div class="odd-text">
                    <h2 class="title_60 text-111 mb-3">{{ $industry->title }}</h2>
                    <p class="mb-0">{!! $industry->description !!}</p>
                    <button 
                        class="com_btn industry-enquire-btn  mt-3 mt-lg-4 mb-4 mb-lg-0"
                        data-industry="{{ $industry->title }}"
                        data-bs-toggle="modal"
                        data-bs-target="#industryEnquiryModal">
                        Enquire Now
                    </button>
                </div>
                <div class="odd-image">
                    <img class="w-100" src="{{ asset('public/industryImage/'.$industry->image) }}" alt="images">
                </div>
            @endif
        @empty
            <!--<div style="text-align:center; width:100%;">-->
                <!--<h2 class="title_60">Coming Soon</h2>-->
            <!--</div>-->
        @endforelse
    </div>
    </div>
</section>


<section class="mt_100 mb_100">
    <div class="container-fluid">
        <div class="industry_section">
            <div class="row justify-content-between mb_40">
                <div class="col-lg-10">
                    <h2 class="title_60 text-white">Related Industries You May Like </h2>
                    <p class="mb-0 text-white">Explore a wide range of industries where shot blasting plays a critical role in improving surface quality, durability, and production efficiency. From automotive and foundry to fabrication and heavy engineering, Jinil’s solutions are designed to meet diverse application needs, ensuring reliable surface preparation, consistent finishing, and optimized performance across demanding industrial environments.</p>
                </div>
                <div class="slider_arrow mt-4 mt-lg-0 col">
                    <svg class="prev_arrow" width="68" height="68" viewBox="0 0 68 68" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <rect x="68" y="68" width="68" height="68" rx="34" transform="rotate(180 68 68)"
                            fill="#E4ECF4" />
                        <path
                            d="M46.7279 33.9996L21.2721 33.9996M21.2721 33.9996L29.7574 42.4849M21.2721 33.9996L29.7574 25.5143"
                            stroke="#111111" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>

                    <svg class="next_arrow" width="68" height="68" viewBox="0 0 68 68" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <rect width="68" height="68" rx="34" fill="#E4ECF4" />
                        <path
                            d="M21.2721 34.0004H46.7279M46.7279 34.0004L38.2426 25.5151M46.7279 34.0004L38.2426 42.4857"
                            stroke="#111111" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>

                </div>
            </div>

            
             <div class="industry_detals_grid">
                
                <div class="industry_item_wrapper mx-3">
                     <a href="https://jinil.in/industries/forging">
                        <div class="industry_item" style="background-image: url('../public/front/images/industries1.png')"> </div>
                        <h3 class="title_24">Forging</h3>
                    </a>
                </div>
                
                <div class="industry_item_wrapper mx-3">
                    <a href="https://jinil.in/industries/foundry">
                        <div class="industry_item" style="background-image: url('../public/front/images/industries2.png')"> </div>
                        <h3 class="title_24">Foundry</h3>
                    </a>
                </div>

                <div class="industry_item_wrapper mx-3">
                    <a href="https://jinil.in/industries/defense">
                        <div class="industry_item" style="background-image: url('../public/front/images/industries3.png')"> </div>
                        <h3 class="title_24">Defense</h3>
                    </a>
                </div>

                <div class="industry_item_wrapper mx-3">
                    <a href="https://jinil.in/industries/aerospace">
                        <div class="industry_item" style="background-image: url('../public/front/images/industries4.png')"> </div>
                        <h3 class="title_24">Aerospace</h3>
                    </a>
                </div>

                <div class="industry_item_wrapper mx-3">
                    <a href="https://jinil.in/industries/railways">
                        <div class="industry_item" style="background-image: url('../public/front/images/industries5.png')"> </div>
                        <h3 class="title_24">Railways</h3>
                    </a>
                </div>

                <div class="industry_item_wrapper mx-3">
                    <a href="https://jinil.in/industries/fabrication">
                        <div class="industry_item" style="background-image: url('../public/front/images/industries6.png')"> </div>
                        <h3 class="title_24">Fabrication</h3>
                    </a>
                </div>

                <div class="industry_item_wrapper mx-3">
                    <a href="https://jinil.in/industries/wire-coil">
                        <div class="industry_item" style="background-image: url('../public/front/images/industries7.png')"> </div>
                        <h3 class="title_24">Wire coil</h3>
                    </a>
                </div>

                <div class="industry_item_wrapper mx-3">
                    <a href="https://jinil.in/industries/automotive">
                        <div class="industry_item" style="background-image: url('../public/front/images/industries8.png')"> </div>
                        <h3 class="title_24">Automotive</h3>
                    </a>
                </div>
                
                  <div class="industry_item_wrapper mx-3">
                    <a href="https://jinil.in/industries/oil-and-gas">  
                        <div class="industry_item" style="background-image: url('../public/front/images/industries9.png')"> </div>
                        <h3 class="title_24">Oil & gas</h3>
                    </a>
                </div>
                
                  <div class="industry_item_wrapper mx-3">
                    <a href="https://jinil.in/industries/steel-plant"> 
                        <div class="industry_item" style="background-image: url('../public/front/images/industries10.png')"> </div>
                        <h3 class="title_24">Steel plant</h3>
                    </a>
                </div>
                
                  <div class="industry_item_wrapper mx-3">
                    <a href="https://jinil.in/industries/peb">
                        <div class="industry_item" style="background-image: url('../public/front/images/industries11.png')"> </div>
                        <h3 class="title_24">PEB</h3>
                    </a>
                </div>
                
                   <div class="industry_item_wrapper mx-3">
                    <a href="https://jinil.in/industries/heavy-machinery">   
                        <div class="industry_item" style="background-image: url('../public/front/images/industries12.png')"> </div>
                        <h3 class="title_24">Heavy machinery </h3>
                    </a>
                </div>
            

               
            </div>
        </div>
    </div>
</section>


@include('layouts.frontfooter')
@include('layouts.industry-enquiry-modal', ['ima' => rand(1,9), 'imb' => rand(1,9)])
