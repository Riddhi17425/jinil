@include('layouts.frontheader')

<style>
  


    .author-banner-card {
      background: radial-gradient(561.33% 75.38% at 56.26% 52.09%, #1F3566 0%, #243F7A 50%, #1C2F5A 100%), #105293;
        display: flex;
        position: relative;
        overflow: hidden;
        align-items: stretch;
    }
    
    .author-image-wrapper {
        position: relative;
        flex: 0 0 35%;
        display: flex;
        align-items: flex-end;
        justify-content: center;
        padding-top: 50px;
    }

  

    .author-image-wrapper img {
        position: relative;
        z-index: 2;
        max-width: 100%;
        height: auto;
        display: block;
    }

    .author-content {
        flex: 1;
        padding: 70px 80px 70px 20px;
        color: #ffffff;
        display: flex;
        flex-direction: column;
        justify-content: center;
        z-index: 2;
    }
    .author-name {
        font-size: 56px;
        font-weight: 700;
        margin-bottom: 10px;
        font-family: 'Inter', sans-serif;
        color: #ffffff;
    }
    .author-subtitle {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        gap: 15px;
        font-size: 16px;
        font-weight: 500;
        margin-bottom: 30px;
        color: #ffffff;
    }
    .author-subtitle .separator {
        color: #ffffff;
        opacity: 0.5;
    }
    .linkedin-link {
        color: #ffffff;
        text-decoration: none;
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 16px;
    }
    .linkedin-link:hover {
        color: #d0d0d0;
    }
    .author-bio {
        font-size: 14px;
        line-height: 1.8;
        color: #d1d9e6;
        margin-bottom: 0;
        text-align: left;
        width: 90%;
    }
    .author-bg-logo {
         position: absolute;
    right: 0;
    bottom: 0;
    height: 200px;
    width: 200px;
    z-index: 1;
    mix-blend-mode: luminosity;
    pointer-events: none;
    object-fit: contain;
    }

    @media (max-width: 991px) {
        .header-content-wrapper {
            flex-direction: column;
            text-align: center;
            gap: 30px;
        }
        .author-banner-card {
            flex-direction: column;
        }
        .author-image-wrapper {
            flex: 0 0 auto;
            width: 100%;
            padding-top: 50px;
        }
        .author-content {
            padding: 40px 30px;
            align-items: center;
            text-align: center;
        }
        .author-name {
            font-size: 40px;
        }
        .author-subtitle {
            justify-content: center;
        }
        .author-bio {
            width: 100%;
            text-align: center;
        }
    }

    @media (max-width: 767px) {
        .author-name {
            font-size: 32px;
        }
        .author-subtitle {
            flex-direction: column;
            gap: 10px;
        }
        .author-subtitle .separator {
            display: none;
        }
        .author-content {
            padding: 30px 15px;
        }
        .author-bg-logo {
            height: 120px;
            width: 120px;
        }
    }
</style>

<section class="navi_page">
    <div class="container-fluid">

        <div class="navi_page_child">
            <div>
                <p class="title_24"><a href="{{ url('/') }}" class="text-585">Home</a> / About Us</p>
                <h1 class="title_60">Thought Leadership & Industry Insights</h1>
            </div>

            <a href="{{ route('contact') }}"  class="contact_circle">

                <!-- circular text image -->
                <img src="{{ asset('public/front/images/innder-header-jump.svg') }}" class="circle_text_img" alt="inner header jump">

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

<section class="author-banner-section mb_100">
    <div class="container-fluid">
        <div class="author-banner-card">
            <!-- Left Side Image -->
            <div class="author-image-wrapper">
                <img src="{{ asset('public/front/images/Nilesh-Todi.webp') }}" class="img-fluid" alt="Nilesh Todi" onerror="this.src='https://ui-avatars.com/api/?name=Nilesh+Todi&size=500&background=transparent&color=fff'">
            </div>

            <!-- Right Side Content -->
            <div class="author-content">
                <h2 class="author-name">Nilesh Todi</h2>
                
                <div class="author-subtitle">
                    <span>Executive Director At Jinil Pvt. Ltd.</span>
                    <span class="separator">|</span>
                    <span>18 Years of Experinece</span>
                    <span class="separator">|</span>
                    <a href="https://linkedin.com" target="_blank" class="linkedin-link">
                      <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_1_388)">
<path d="M16.6676 0H1.32891C0.594141 0 0 0.580078 0 1.29727V16.6992C0 17.4164 0.594141 18 1.32891 18H16.6676C17.4023 18 18 17.4164 18 16.7027V1.29727C18 0.580078 17.4023 0 16.6676 0ZM5.34023 15.3387H2.66836V6.74648H5.34023V15.3387ZM4.0043 5.57578C3.14648 5.57578 2.45391 4.8832 2.45391 4.02891C2.45391 3.17461 3.14648 2.48203 4.0043 2.48203C4.85859 2.48203 5.55117 3.17461 5.55117 4.02891C5.55117 4.87969 4.85859 5.57578 4.0043 5.57578ZM15.3387 15.3387H12.6703V11.1621C12.6703 10.1672 12.6527 8.88398 11.2816 8.88398C9.89297 8.88398 9.68203 9.97031 9.68203 11.0918V15.3387H7.01719V6.74648H9.57656V7.9207H9.61172C9.9668 7.2457 10.8387 6.53203 12.1359 6.53203C14.8395 6.53203 15.3387 8.31094 15.3387 10.6242V15.3387Z" fill="white"/>
</g>
<defs>
<clipPath id="clip0_1_388">
<rect width="18" height="18" fill="white"/>
</clipPath>
</defs>
</svg>

                        <span>LinkedIn</span>
                    </a>
                </div>

                <p class="author-bio">
                    Lorem ipsum dolor sit amet consectetur. Volutpat consectetur lorem aliquet venenatis neque quisque. Ut aliquam vivamus odio amet praesent. Ipsum tristique nibh tincidunt dis ornare est sem. Gravida blandit facilisi consequat lectus hendrerit neque luctus quisque. Quis vitae viverra justo scelerisque cursus. Amet posuere facilisis accumsan tortor. Lacinia pharetra nunc lorem viverra non ridiculus ut. Potenti convallis sit sed bibendum sed tincidunt. Sit elit sed suspendisse scelerisque ornare. Enim magna lorem eros vitae leo. Turpis blandit vehicula donec lacus massa et tortor. Enim ullamcorper rhoncus volutpat leo commodo pulvinar augue. Nibh a faucibus libero faucibus placerat diam adipiscing. Turpis dolor lacus vitae gravida ut elementum at laoreet condimentum. Donec tempus leo mauris eu augue vel pretium libero nec. Ultricies tristique aliquet blandit in ut. Nunc eu amet lacus ac diam non sed ultrices lacus. Dictum diam imperdiet massa nisl proin nisi egestas.
                </p>
            </div>

            <!-- Faint background logo -->
            <img src="{{ asset('public/front/images/blogs-details-fabe.png') }}" class="author-bg-logo" alt="Jinil Logo Background">
        </div>
    </div>
</section>


<section class="mb_100">
    <div class="container-fluid">
        <div class="row gy-4">
            <div class="col-md-4">
                <div class="insight_item">
                    <div class="insight_item_img">
                        <a href="#"><img class="w-100" src="http://localhost/jinil/public/Blogs/front_image/airless-shot-blasting-machine-list.jpg" alt="" /></a>
                    </div>
                    <div class="insight_item_content">
                        <hr>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="d-flex align-items-center gap-2">
                                <img src="{{ asset('public/front/images/Nilesh-Todi-icon.png') }}" alt="" class="rounded-circle blog_author_icon">
                                 <span class="blog_author_name">Nilesh Todi</span>
                            </div>
                            <div>
                                <span class="blog_author_date">October 9, 2023</span>
                            </div>
                        </div>  
                        <a href="#"><h3 class="title_24">How Shot Peening Enhances Fatigue Life in Aerospace Components</h3></a>
                    </div>
                </div>
            </div>

              <div class="col-md-4">
                <div class="insight_item">
                    <div class="insight_item_img">
                        <a href="#"><img class="w-100" src="http://localhost/jinil/public/Blogs/front_image/airless-shot-blasting-machine-list.jpg" alt="" /></a>
                    </div>
                    <div class="insight_item_content">
                        <hr>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="d-flex align-items-center gap-2">
                                <img src="{{ asset('public/front/images/Nilesh-Todi-icon.png') }}" alt="" class="rounded-circle blog_author_icon">
                                 <span class="blog_author_name">Nilesh Todi</span>
                            </div>
                            <div>
                                <span class="blog_author_date">October 9, 2023</span>
                            </div>
                        </div>  
                        <a href="#"><h3 class="title_24">How Shot Peening Enhances Fatigue Life in Aerospace Components</h3></a>
                    </div>
                </div>
            </div>

              <div class="col-md-4">
                <div class="insight_item">
                    <div class="insight_item_img">
                        <a href="#"><img class="w-100" src="http://localhost/jinil/public/Blogs/front_image/airless-shot-blasting-machine-list.jpg" alt="" /></a>
                    </div>
                    <div class="insight_item_content">
                        <hr>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="d-flex align-items-center gap-2">
                                <img src="{{ asset('public/front/images/Nilesh-Todi-icon.png') }}" alt="" class="rounded-circle blog_author_icon">
                                 <span class="blog_author_name">Nilesh Todi</span>
                            </div>
                            <div>
                                <span class="blog_author_date">October 9, 2023</span>
                            </div>
                        </div>  
                        <a href="#"><h3 class="title_24">How Shot Peening Enhances Fatigue Life in Aerospace Components</h3></a>
                    </div>
                </div>
            </div>

              <div class="col-md-4">
                <div class="insight_item">
                    <div class="insight_item_img">
                        <a href="#"><img class="w-100" src="http://localhost/jinil/public/Blogs/front_image/airless-shot-blasting-machine-list.jpg" alt="" /></a>
                    </div>
                    <div class="insight_item_content">
                        <hr>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="d-flex align-items-center gap-2">
                                <img src="{{ asset('public/front/images/Nilesh-Todi-icon.png') }}" alt="" class="rounded-circle blog_author_icon">
                                 <span class="blog_author_name">Nilesh Todi</span>
                            </div>
                            <div>
                                <span class="blog_author_date">October 9, 2023</span>
                            </div>
                        </div>  
                        <a href="#"><h3 class="title_24">How Shot Peening Enhances Fatigue Life in Aerospace Components</h3></a>
                    </div>
                </div>
            </div>

              <div class="col-md-4">
                <div class="insight_item">
                    <div class="insight_item_img">
                        <a href="#"><img class="w-100" src="http://localhost/jinil/public/Blogs/front_image/airless-shot-blasting-machine-list.jpg" alt="" /></a>
                    </div>
                    <div class="insight_item_content">
                        <hr>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="d-flex align-items-center gap-2">
                                <img src="{{ asset('public/front/images/Nilesh-Todi-icon.png') }}" alt="" class="rounded-circle blog_author_icon">
                                 <span class="blog_author_name">Nilesh Todi</span>
                            </div>
                            <div>
                                <span class="blog_author_date">October 9, 2023</span>
                            </div>
                        </div>  
                        <a href="#"><h3 class="title_24">How Shot Peening Enhances Fatigue Life in Aerospace Components</h3></a>
                    </div>
                </div>
            </div>

              <div class="col-md-4">
                <div class="insight_item">
                    <div class="insight_item_img">
                        <a href="#"><img class="w-100" src="http://localhost/jinil/public/Blogs/front_image/airless-shot-blasting-machine-list.jpg" alt="" /></a>
                    </div>
                    <div class="insight_item_content">
                        <hr>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="d-flex align-items-center gap-2">
                                <img src="{{ asset('public/front/images/Nilesh-Todi-icon.png') }}" alt="" class="rounded-circle blog_author_icon">
                                 <span class="blog_author_name">Nilesh Todi</span>
                            </div>
                            <div>
                                <span class="blog_author_date">October 9, 2023</span>
                            </div>
                        </div>  
                        <a href="#"><h3 class="title_24">How Shot Peening Enhances Fatigue Life in Aerospace Components</h3></a>
                    </div>
                </div>
            </div>
          
        </div>
    </div>
</section>

@include('layouts.frontfooter')
