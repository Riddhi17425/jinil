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
                @if($author->main_image)
                    <img src="{{ asset('public/Authors/main_image/' . $author->main_image) }}"
                        class="img-fluid"
                        alt="{{ $author->name }}">
                @else
                    <img src="https://ui-avatars.com/api/?name={{ urlencode($author->name) }}&size=500&background=transparent&color=fff"
                        class="img-fluid"
                        alt="{{ $author->name }}">
                @endif
            </div>

            <!-- Right Side Content -->
            <div class="author-content">
                <h2 class="author-name">{{ $author->name }}</h2>
                
                <div class="author-subtitle">
                    @if($author->designation)
                        <span>{{ $author->designation }}</span>
                    @endif
                    
                    <span class="separator">|</span>
                    
                    @if($author->years_of_experience)
                        <span>{{ $author->years_of_experience }}</span>
                    @endif
                    
                    <span class="separator">|</span>

                    @if($author->social_media)
                        <a href="{{ $author->social_media }}" target="_blank" rel="noopener noreferrer" class="linkedin-link">
                            @if($author->social_media_image)
                                <img src="{{ asset('public/Authors/social_media_image/' . $author->social_media_image) }}"
                                    alt="{{ $author->social_media_name ?? 'Social Media' }}"
                                    style="width:18px;height:18px;object-fit:contain;">
                            @endif
                            <span>{{ $author->social_media_name ?? 'LinkedIn' }}</span>
                        </a>
                    @endif
                </div>

                @if($author->description)
                    <div class="author-bio">
                        {!! $author->description !!}
                    </div>
                @endif
            </div>

            <!-- Faint background logo -->
            <img src="{{ asset('public/front/images/blogs-details-fabe.png') }}" class="author-bg-logo" alt="Jinil Logo Background">
        </div>
    </div>
</section>

<section class="mb_100">
    <div class="container-fluid">
        <div class="row gy-4">
            @forelse($blogs as $blog)
                <div class="col-md-4">
                    <div class="insight_item">
                        <div class="insight_item_img">
                            <a href="{{ route('blogdetail', ['url' => $blog->url]) }}">
                                <img class="w-100"
                                     src="{{ asset('public/Blogs/front_image/' . $blog->front_image) }}"
                                     alt="{{ $blog->title }}">
                            </a>
                        </div>

                        <div class="insight_item_content">
                            <hr>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div class="d-flex align-items-center gap-2">

                                    @if($author->thumbnail_image)
                                        <img src="{{ asset('public/Authors/thumbnail_image/' . $author->thumbnail_image) }}"
                                             alt="{{ $author->name }}"
                                             class="rounded-circle blog_author_icon">
                                    @elseif($author->main_image)
                                        <img src="{{ asset('public/Authors/main_image/' . $author->main_image) }}"
                                             alt="{{ $author->name }}"
                                             class="rounded-circle blog_author_icon">
                                    @endif

                                    <span class="blog_author_name">
                                        {{ $author->name }}
                                    </span>
                                </div>
                                <div>
                                    <span class="blog_author_date">
                                        {{ $blog->date }}
                                    </span>
                                </div>
                            </div>
                            <a href="{{ route('blogdetail', ['url' => $blog->url]) }}">
                                <h3 class="title_24">
                                    {{ $blog->title }}
                                </h3>
                            </a>
                        </div>
                    </div>

                </div>
            @empty
                <div class="col-12">
                    <p class="text-center">
                        No blogs found for this author.
                    </p>
                </div>
            @endforelse
        </div>
    </div>
</section>

@include('layouts.frontfooter')