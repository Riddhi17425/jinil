@include('layouts.frontheader')
<section class="navi_page">
    <div class="container-fluid">

        <div class="navi_page_child">
            <div>
                <p class="title_24"><a href="{{ url('/') }}" class="text-585">Home</a> / <a href="{{ route('blogs') }}"
                        class="text-585">Blogs</a> / {{ $blogsdetail->title }}</p>
                <h1 class="title_60">{{ $blogsdetail->title }}</h1>
                <p class="mb-0">{{ $blogsdetail->date }}</p>
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

@if($blogsdetail)
<section class="mb_100 blogs_detials">
    <div class="container-fluid">

        <div class="mb_40">
            <img class=" img-fluid" src="{{ asset('public/Blogs/detail_image/' . $blogsdetail->detail_image) }}" alt="images">
        </div>

        <div class="mb_40">
            <p>{!! $blogsdetail->short_description!!}</p>
           
        </div>

        <div class="mb_40">
            <p>{!! $blogsdetail->description !!}</p>
        </div>
        
        <div class="mb_40">
            <div class="blog_det_consu">
                <div class="col-lg-10">{!! $blogsdetail->cta_text !!}</div>
                <!-- <h2 class="title_80">Initiate your Project</h2>
                <p>Consult with our engineering team. Receive a technical <br> proposal within 24 hours.</p> -->
                <!-- <a href="#" class="com_btn com_btn_3">Request Consultation</a> -->
            </div>
        </div>
        <div class="mb_40">
            <h4 class="title_24">Conclusion</h4>
            <p>{!! $blogsdetail->conclusion !!}</p>
        </div>
    </div>
</section>
@endif
<section class="insights_section mt_100 mb_100">
    <div class="container-fluid">
        <div class="row align-items-center mb_40">
            <div class="col-md-7">
                <h2 class="title_60">Insights from the Surface Preparation Industry</h2>
            </div>

            <div class="col-md-5 text-lg-end">
                <a href="{{ route('blogs') }}" class="com_btn com_btn_2">View all</a>
            </div>

        </div>

        <div class="insights_wrapper">
            <div class="row">
                @foreach($blogs as $blog)
                    <div class="col-md-4">
                        <div class="insight_item">
                            <div class="insight_item_img">
                                <img class="w-100" src="{{ asset('public/Blogs/front_image/' . $blog->front_image) }}" alt="{{ $blog->title }}" />
                            </div>
                            <div class="insight_item_content">
                                <hr>
                                <p class="mb-2">{{ $blog->date}}</p>
                                <a href="{{ route('blogdetail', ['url' => $blog->url]) }}"><h3 class="title_24">{{ $blog->title }}</h3></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
               
            </div>
        </div>
    </div>
</section>

@include('layouts.frontfooter')