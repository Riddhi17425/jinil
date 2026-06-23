<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-TJFBFXW6');</script>
    <!-- End Google Tag Manager -->
    
    <!--SCHEMAS-->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "LocalBusiness",
      "name": "Jinil Pvt Ltd",
      "image": "https://jinilshotblast.com/public/front/images/logo.svg",
      "@id": "",
      "url": "https://jinilshotblast.com/",
      "telephone": "+91 9830030030",
      "priceRange": "-",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "C3-602, Anushruti Tower, Near Jain Derasar, S.G. Road, Thaltej",
        "addressLocality": "Ahmedabad",
        "postalCode": "380059",
        "addressCountry": "IN"
      },
      "geo": {
        "@type": "GeoCoordinates",
        "latitude": 23.05315793167826,
        "longitude": 72.5170743349308
      },
      "openingHoursSpecification": [{
        "@type": "OpeningHoursSpecification",
        "dayOfWeek": [
          "Monday",
          "Tuesday",
          "Wednesday",
          "Thursday",
          "Friday"
        ],
        "opens": "10:00",
        "closes": "18:00"
      },{
        "@type": "OpeningHoursSpecification",
        "dayOfWeek": "Saturday",
        "opens": "10:00",
        "closes": "16:00"
      }] 
    }
    </script>

    <script type="application/ld+json">
    {
      "@context": "https://schema.org/",
      "@type": "Product",
      "name": "Jinil Pvt Ltd",
      "image": "https://jinilshotblast.com/public/front/images/Jinil-Banner.webp",
      "description": "Industrial shot blasting machine manufacturer providing surface preparation and blasting solutions across India.",
      "brand": {
        "@type": "Brand",
        "name": "Jinil Pvt Ltd"
      },
      "aggregateRating": {
        "@type": "AggregateRating",
        "ratingValue": "5.0",
        "bestRating": "5",
        "worstRating": "1",
        "ratingCount": "1"
      }
    }
    </script>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="{{ asset('public/front/images/favicon.png') }}">
    <title>JINIL</title>
    <!-- google fonts 1 -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Zalando+Sans:ital,wght@0,200..900;1,200..900&display=swap"
        rel="stylesheet">

    <!-- google font 2 -->
    <link
        href="https://fonts.googleapis.com/css2?family=Zalando+Sans+SemiExpanded:ital,wght@0,200..900;1,200..900&family=Zalando+Sans:ital,wght@0,200..900;1,200..900&display=swap"
        rel="stylesheet">

    <!-- google fonts 3 -->
    <link
        href="https://fonts.googleapis.com/css2?family=Allura&family=Zalando+Sans+SemiExpanded:ital,wght@0,200..900;1,200..900&family=Zalando+Sans:ital,wght@0,200..900;1,200..900&display=swap"
        rel="stylesheet">

    <!-- bootstrap css start -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <!-- slick slider  -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css"
        integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--Aos animation-->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" /> -->
    
    <!-- style css start -->
    <link rel="stylesheet" href="{{ asset('public/front/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('public/front/css/header.css')}}">
    <link rel="stylesheet" href="{{ asset('public/front/css/blogs-details.css')}}">
    <link rel="stylesheet" href="{{ asset('public/front/css/Home.css')}}">
    <link rel="stylesheet" href="{{ asset('public/front/css/installation.css')}}">
    <!-- <link rel="stylesheet" href="{{ asset('public/front/css/productdetails.css')}}"> -->
    <link rel="stylesheet" href="{{ asset('public/front/css/downloads.css')}}">
    <link rel="stylesheet" href="{{ asset('public/front/css/page-small.css')}}">
    <link rel="stylesheet" href="{{ asset('public/front/css/contact.css')}}">
    <link rel="stylesheet" href="{{ asset('public/front/css/faq.css')}}">
    <link rel="stylesheet" href="{{ asset('public/front/css/about.css')}}">


    <link rel="stylesheet" href="{{ asset('public/front/css/footer.css')}}">
    <!-- responsive css start -->
    <link rel="stylesheet" href="{{ asset('public/front/css/responsive.css')}}">
</head>

<body class="{{ request()->is('/') ? 'home_body' : 'inner_body' }}">
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TJFBFXW6"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

@php
use Illuminate\Support\Facades\DB;

$category = DB::table('category')
            ->select('id','category','url')
            ->whereNull('deleted_at')
            ->get();
@endphp
    <header class="sticky-header">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg">
                <div class="navbar_left">
                    <!-- Logo -->
                    <a href="{{ url('/') }}">
                        <img class="header_logo" src="{{ asset('public/front/images/logo.svg')}}" alt="Logo">
                    </a>
                </div>
                <button class="navbar-toggler menu-toggle" type="button" data-bs-toggle="collapse"
                    data-bs-target="#mainNavbar">

                    <span class="navbar-toggler-icon"></span>

                </button>
                <div class="collapse navbar-collapse justify-content-between" id="mainNavbar">
                    <ul class="mx-auto nav_links">
                        <li><a href="{{ route('about') }}" data-text="About Us"><span>About Us</span> </a></li>

                        <li class="has-dropdown"><a href="#" data-text="Products">
                                <span>Products</span>
                                <span>
                                    <svg width="11" height="7" viewBox="0 0 11 7" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10.5 0.5L5.5 5.73809L0.5 0.5" stroke="#58595B" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </span>
                            </a>

                             <ul class="dropdown-menu">
                                @foreach($category as $val)

                                <li>
                                    <a href="{{ url('products/'.$val->url) }}">
                                    {{ $val->category }}
                                    </a>
                                </li>

                                @endforeach
                             </ul>

                        </li>

                        <li class="has-dropdown"><a href="#" data-text="Services">
                                <span>Services</span>
                                <span>
                                    <svg width="11" height="7" viewBox="0 0 11 7" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10.5 0.5L5.5 5.73809L0.5 0.5" stroke="#58595B" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </span>
                            </a>

                            <ul class="dropdown-menu">
                                <li><a href="{{ route('installation') }}">Installation & Commissioning </a></li>
                                <li><a href="{{ route('aftersales') }}">After-Sales Support</a></li>
                                <li><a href="{{ route('machineupgrades') }}"> Machine Upgrades </a></li>
                                <li><a href="{{ route('annualmaintenance') }}">Annual Maintenance Contracts</a></li>
                            </ul>
                        </li>
                        <!-- <li><a href="#" data-text="Case Studies">
                                <span>Case Studies</span></a></li> -->
                        <li class="has-dropdown">
                            <a href="#" data-text="Resources">
                                <span>Resources</span>
                                <span>
                                    <svg width="11" height="7" viewBox="0 0 11 7" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10.5 0.5L5.5 5.73809L0.5 0.5" stroke="#58595B" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </span>
                            </a>

                            <ul class="dropdown-menu resources_menu">
                                <li><a href="{{ route('downloads') }}">Downloads</a></li>
                                <li><a href="{{ route('faqs') }}">FAQs</a></li>
                                <!--<li><a href="{{ route('blogs') }}">Blogs</a></li>-->
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('contact') }}" data-text="Contact Us">
                                <span>Contact Us</span>
                            </a>
                        </li>

                    </ul>

                    <div class="navbar_right">
                        <a href="#" class="com_btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Request a Quote</a>
                    </div>
                </div>
            </nav>
        </div>
    </header>