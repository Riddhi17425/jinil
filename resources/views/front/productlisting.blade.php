@include('layouts.frontheader')



<section class="navi_page">

    <div class="container-fluid">



        <div class="navi_page_child">

            <div>

                <p class="title_24"><a href="{{ url('/') }}" class="text-585">Home</a> /  {{ $category->category }}</p>

                <h1 class="title_60"> {{ $category->category }}</h1>

                <p class="mb-0">{!! $category->cat_description !!}</p>

            </div>

          

                <a href="{{ route('contact') }}" class="contact_circle">



                    <!-- circular text image -->

                    <img src="{{ asset('public/front/images/innder-header-jump.svg') }}" class="circle_text_img" alt="innder header jump">



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

            @if($product->url != 'blast-wheel-shot-blasting-turbine')

                <div class="col-md-6 col-lg-4" id="product-{{ $product->id }}">   {{-- ADD THIS ID --}}

                    <div class="fea_mac">

                        <div class="fea_mac_img">

                            <img class="img-fluid" 

                                 src="{{ asset('public/Product/front_image/'.$product->front_image) }}" 

                                 alt="{{ $product->name }}">

                        </div>

                        <div class="fea_mac_content">

                            <div class="fea_mac_content_inner">

                                <h3 class="title_24">{{ $product->name }}</h3>

                                <!--<button -->

                                <!--    class="com_btn mt-2 product-enquire-btn" -->

                                <!--    data-product="{{ $product->name }}"-->

                                <!--    data-bs-toggle="modal" -->

                                <!--    data-bs-target="#productEnquiryModal">-->

                                <!--    Enquire Now-->

                                <!--</button>-->
                                <div class="btn-group">
                                 <a href="{{ route('productdetials', $product->url) }}"

                                    class="com_btn mt-2">

                                    Explore More

                                </a>
                                 <button class="com_btn mt-2 product-enquire-btn" data-product="{{ $product->name }}"

                                data-bs-toggle="modal" data-bs-target="#productEnquiryModal">

                                Enquire Now

                            </button>
                            </div>

                            </div>

                        </div>

                    </div>

                </div>

            @endif

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


@if(isset($category->faqs) && is_countable($category->faqs) && count($category->faqs) > 0)
    @php
        $faqItems = [];
        $decodedFaqItems = $category->faqs;

        if (is_array($decodedFaqItems)) {
            foreach ($decodedFaqItems as $item) {
                $question = trim(strip_tags($item['question'] ?? ''));
                $answer   = trim(strip_tags($item['answer'] ?? ''));

                if ($question && $answer) {
                    $faqItems[] = [
                        'question' => $question,
                        'answer'   => $answer,
                    ];
                }
            }
        }

        $faqSchema = [
            '@context'  => 'https://schema.org',
            '@type'     => 'FAQPage',
            'mainEntity' => array_map(function ($item) {
                return [
                    '@type' => 'Question',
                    'name'  => $item['question'],
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text'  => $item['answer'],
                    ],
                ];
            }, $faqItems),
        ];
    @endphp

    <section class="mb_100 mt_100">
        <div class="container">
            <div class="sec_hed_top mb_40">
                @if(isset($category->faqs_title) && $category->faqs_title != '')
                <h2 class="title_60 mb-3">{{ $category->faqs_title }}</h2>
            @endif
            <div class="text-585 d-block" style="margin-bottom: 60px;">{!! $category->faqs_desc ?? '' !!}</div>
                <h2 class="title_60">Frequently Asked Questions</h2>
            
            </div>
            <div class="faq_group active">
                @foreach($category->faqs as $k => $v)
                <div class="faq_item">
                    <div class="faq_question">
                        <span>{{$v['question'] ?? ''}}</span>
                        <span class="faq_icon">+</span>
                    </div>
                    <div class="faq_answer">
                        <p>{{$v['answer'] ?? ''}}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    @if(!empty($faqItems))
    <script type="application/ld+json">
        {!! json_encode($faqSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
    </script>
    @endif
@endif

<script>
document.addEventListener("DOMContentLoaded", function() {

    document.querySelectorAll(".faq_question").forEach(question => {

        question.addEventListener("click", function() {

            const item = question.parentElement;

            document.querySelectorAll(".faq_item").forEach(faq => {
                if (faq !== item) {
                    faq.classList.remove("active");
                }
            });

            item.classList.toggle("active");

        });

    });

});
</script>

@include('front.serviceform')



@include('layouts.frontfooter')