@include('layouts.frontheader')

<section class="navi_page">
    <div class="container-fluid">

        <div class="navi_page_child">
            <div>
                <p class="title_24"><a href="{{ url('/') }}" class="text-585">Home</a> / <a href="#"
                        class="text-585">{{ $category->category }}</a>
                    / {{ $product->name }}
                </p>
                <h2 class="title_60">{{ $product->title ?? '' }}</h2>
                <p class="mb-0">{{ $product->title_brief ?? '' }}</p>
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

<section class="mt_80">
    <div class="container-fluid">
        <div class="industries_details">
            <div class="mb-3 mb-lg-0">
                <img class="w-100"
                    src="{{ asset('public/Product/detail_image/' . $product->detail_image) }}"
                    alt="{{$product->name ?? 'Product Image'}}">
            </div>
            <div>
                <h2 class="title_60 mb-3">{{ $product->name ?? '' }}
                </h2>
                {!! $product->short_description ?? '' !!}

                <!-- <button 
                    class="com_btn mt-2 product-enquire-btn" 
                    data-product="{{ $product->name }}"
                    data-bs-toggle="modal" 
                    data-bs-target="#productEnquiryModal">
                    Enquire Now
                </button> -->

                <button class="com_btn product-enquire-btn" data-product="{{ $product->name }}"
                    data-bs-toggle="modal" 
                    data-bs-target="#productEnquiryModal">
                    Enquire Now
                </button>
            </div>

        </div>
    </div>
</section>

@if(isset($product->service_note) && $product->service_note != '' )
<section class="mt_100">
    <div class="container">
        <p class="title_34 text-105 d-flex justify-content-center text-center lh-sm mb-0">
            <span class="d-none d-lg-inline"> <svg width="40" height="23" viewBox="0 0 57 40" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M52.2936 0L53.1651 2.2798C51.6544 2.97065 50.1437 3.86874 48.633 4.97409C47.1223 6.07945 45.7278 7.25389 44.4495 8.49741C43.1713 9.74093 42.1835 11.0535 41.4862 12.4352L43.4037 14.3005H44.9725C47.4128 14.3005 49.5046 14.9223 51.2477 16.1658C53.107 17.2712 54.5015 18.791 55.4312 20.7254C56.4771 22.6598 57 24.8705 57 27.3575C57 29.8446 56.419 32.0553 55.2569 33.9896C54.211 35.7858 52.7584 37.2366 50.8991 38.342C49.156 39.4473 47.0642 40 44.6239 40C42.2997 40 40.208 39.4473 38.3486 38.342C36.4893 37.0984 35.0367 35.5095 33.9908 33.5751C32.945 31.6408 32.422 29.361 32.422 26.7358C32.422 23.8342 32.8869 21.0708 33.8165 18.4456C34.8624 15.6822 36.2569 13.1952 38 10.9845C39.7431 8.63558 41.8349 6.56304 44.2752 4.76684C46.7156 2.83247 49.3884 1.24352 52.2936 0ZM19.8716 0L20.7431 2.2798C19.2324 2.97065 17.7217 3.86874 16.211 4.97409C14.7003 6.07945 13.3058 7.25389 12.0275 8.49741C10.7492 9.74093 9.76147 11.0535 9.06422 12.4352L10.9816 14.3005H12.5505C14.9908 14.3005 17.0826 14.9223 18.8257 16.1658C20.685 17.2712 22.0795 18.791 23.0092 20.7254C24.055 22.6598 24.578 24.8705 24.578 27.3575C24.578 29.8446 23.9969 32.0553 22.8349 33.9896C21.789 35.7858 20.3364 37.2366 18.4771 38.342C16.7339 39.4473 14.6422 40 12.2018 40C9.87768 40 7.78593 39.4473 5.92661 38.342C4.06728 37.0984 2.61468 35.5095 1.56881 33.5751C0.522936 31.6408 0 29.361 0 26.7358C0 23.8342 0.464832 21.0708 1.3945 18.4456C2.44037 15.6822 3.83486 13.1952 5.57798 10.9845C7.3211 8.63558 9.41284 6.56304 11.8532 4.76684C14.2936 2.83247 16.9664 1.24352 19.8716 0Z"
                        fill="#A2B9CF" />
                </svg></span>

            <span>{{ $product->service_note }}</span>
            <span class="d-none d-lg-inline">
                <svg width="40" height="23" viewBox="0 0 57 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M4.70643 0L3.83486 2.2798C5.34556 2.97065 6.85627 3.86874 8.36697 4.97409C9.87767 6.07945 11.2722 7.25389 12.5505 8.49741C13.8287 9.74093 14.8165 11.0535 15.5138 12.4352L13.5963 14.3005H12.0275C9.58716 14.3005 7.49541 14.9223 5.75229 16.1658C3.89297 17.2712 2.49847 18.791 1.56881 20.7254C0.522938 22.6598 1.74553e-06 24.8705 1.74553e-06 27.3575C1.74553e-06 29.8446 0.581041 32.0553 1.74312 33.9896C2.78899 35.7858 4.24159 37.2366 6.10092 38.342C7.84403 39.4473 9.93578 40 12.3761 40C14.7003 40 16.792 39.4473 18.6514 38.342C20.5107 37.0984 21.9633 35.5095 23.0092 33.5751C24.055 31.6408 24.578 29.361 24.578 26.7358C24.578 23.8342 24.1131 21.0708 23.1835 18.4456C22.1376 15.6822 20.7431 13.1952 19 10.9845C17.2569 8.63558 15.1651 6.56304 12.7248 4.76684C10.2844 2.83247 7.61162 1.24352 4.70643 0ZM37.1284 0L36.2569 2.2798C37.7676 2.97065 39.2783 3.86874 40.789 4.97409C42.2997 6.07945 43.6942 7.25389 44.9725 8.49741C46.2508 9.74093 47.2385 11.0535 47.9358 12.4352L46.0184 14.3005H44.4495C42.0092 14.3005 39.9174 14.9223 38.1743 16.1658C36.315 17.2712 34.9205 18.791 33.9908 20.7254C32.945 22.6598 32.422 24.8705 32.422 27.3575C32.422 29.8446 33.0031 32.0553 34.1651 33.9896C35.211 35.7858 36.6636 37.2366 38.5229 38.342C40.2661 39.4473 42.3578 40 44.7982 40C47.1223 40 49.2141 39.4473 51.0734 38.342C52.9327 37.0984 54.3853 35.5095 55.4312 33.5751C56.4771 31.6408 57 29.361 57 26.7358C57 23.8342 56.5352 21.0708 55.6055 18.4456C54.5596 15.6822 53.1651 13.1952 51.422 10.9845C49.6789 8.63558 47.5872 6.56304 45.1468 4.76684C42.7064 2.83247 40.0336 1.24352 37.1284 0Z"
                        fill="#A2B9CF" />
                </svg></span>
        </p>
    </div>
</section>
@endif

@if(isset($product->working_principle_desc) && $product->working_principle_desc != '')
<section class="mt_100">
    <div class="container">
        <div class="sec_hed_top mb_40">
            <p>Smart Process Overview</p>
            <h2 class="title_60">Working Principle</h2>
        </div>

        <div class="text-center">
            {!! $product->working_principle_desc ?? '' !!}
        </div>
    </div>
</section>
@endif

@if(isset($product->blast_wheels) && is_countable($product->blast_wheels) && count($product->blast_wheels) > 0 && isset($product->blast_wheels_image) && $product->blast_wheels_image != '')
<section class="mt_80">
    <div class="container-fluid">
        <div class="industries_details">

            <div>
                <div class="sec_hed_top mb_40 text-start">
                    <p>Optimized Wheel Variants</p>
                    <h2 class="title_60">Types of Blast Wheels</h2>
                </div>

                <ul>
                    @foreach($product->blast_wheels as $key => $val)
                    <li>
                        <h4 class="title_24">{{$val['title']}}</h4>
                        <p>{!! $val['desc'] !!}</p>
                    </li>
                    @endforeach
                    <!-- <li>
                        <h4 class="title_24">Belt Drive Blast Wheell</h4>
                        <p>Uses a pulley and V-belt arrangement between the motor and rotor. It provides flexible
                            mounting options and easier servicing.</p>
                    </li>
                    <li>
                        <h4 class="title_24">High-Efficiency Curved Blade Wheel
                        </h4>
                        <p>Advanced blade geometry improves abrasive acceleration and blasting efficiency while reducing
                            abrasive consumption.
                        </p>
                    </li>
                    <li>
                        <h4 class="title_24">Double-Sided / Reversible Blade Wheel</h4>
                        <p>Blade design allows both sides to be used, extending blade life and reducing downtime for
                            replacement.
                        </p>
                    </li> -->
                </ul>
            </div>

            <div class="mb-3 mb-lg-0">
                <img class="w-100"
                    src="{{ asset('public/Product/blast_wheels_image/' . $product->blast_wheels_image) }}"
                    alt="{{$product->name ?? 'Product Image'}}">
            </div>
        </div>
    </div>
</section>
@endif

@if(isset($product->main_components) && is_countable($product->main_components) && count($product->main_components) > 0)
<section class="mt_100">
    <div class="container">
        <div class="sec_hed_top mb_40">
            <p>Built With Precision Components</p>
            <h2 class="title_60">Main Components</h2>
        </div>

        <div class="service_Scope_card">
            <div class="row justify-content-center">
                @foreach($product->main_components as $key => $val)
                <div class="col-lg-3">
                    <div class="service_Scope">
                        <h3 class="title_42 mb-3">{{ $key + 1}}</h3>
                        <p class="title_24 mb-2">{{$val['title'] ?? ''}}</p>
                        <p>{{$val['desc'] ?? ''}}</p>
                    </div>
                </div>
                @endforeach

                <!-- <div class="col-lg-3">
                    <div class="service_Scope">
                        <h3 class="title_42 mb-3">02</h3>
                        <p class="title_24 mb-2">Blasting Gun Assembly
                        </p>
                        <p>High-performance suction blasting gun fitted with tungsten carbide or boron carbide reliable
                            blasting efficiency.
                        </p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="service_Scope">
                        <h3 class="title_42 mb-3">03</h3>
                        <p class="title_24 mb-2">Abrasive Hopper</p>
                        <p>Bottom hopper designed for abrasive continuous abrasive collection, recovery, and reuse. </p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="service_Scope">
                        <h3 class="title_42 mb-3">04</h3>
                        <p class="title_24 mb-2">Work Handling System</p>
                        <p>Perforated work grate or optional rotating turntable for convenient and uniform blasting of
                            components. </p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="service_Scope">
                        <h3 class="title_42 mb-3">05</h3>
                        <p class="title_24 mb-2">Dust Collection Unit</p>
                        <p>Cartridge or bag filter type dust collector for improved visibility and cleaner working
                            conditions.</p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="service_Scope">
                        <h3 class="title_42 mb-3">06</h3>
                        <p class="title_24 mb-2">Inspection Window</p>
                        <p>Large viewing window with Large viewing window with replaceable toughened glass and
                            protective film.</p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="service_Scope">
                        <h3 class="title_42 mb-3">06</h3>
                        <p class="title_24 mb-2">Hand Gloves</p>
                        <p>Heavy-duty rubber gloves are mounted on the cabinet for safe and comfortable operation.
                        </p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="service_Scope">
                        <h3 class="title_42 mb-3">06</h3>
                        <p class="title_24 mb-2">Foot Pedal Control
                        </p>
                        <p>Operator-controlled blasting start and stop system for efficient handling and process
                            control.
                        </p>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</section>
@endif

@if(isset($product->tech_specifications) && is_countable($product->tech_specifications) && count($product->tech_specifications) > 0)
<section class="mt_100">
    <div class="container">
        <div class="sec_hed_top mb_40">
            <p>Engineered Output Parameters</p>
            <h2 class="title_60">Standard Technical Specifications</h2>
        </div>

        <div class="row gy-4 gy-lg-0 justify-content-center">
            <div class="col-lg-12">
                <div class="spec-table-wrapper">
                    <table class="spec-table">
                        <tbody>
                        @foreach($product->tech_specifications as $key => $val)
                            <tr>
                                <th>{{$val['parameter'] ?? ''}}</th>
                                @if(isset($val['specifications']) && is_countable($val['specifications']) && count($val['specifications']) > 0)
                                    @foreach($val['specifications'] as $k => $v)
                                    <td data-label="Specification">{{$v}}</td>
                                    @endforeach
                                @endif
                            </tr>
                        @endforeach
                            <!-- <tr>
                                 <th>Parameter</th>
                                <td data-label="Parameter">Cabinet Construction</td>
                                <td data-label="Specification">MS fabricated with rubber lining</td>
                                <td data-label="Specification">Venturi Sand Blasting Cabinet</td>

                            </tr>
                            <tr>
                                 <th>Parameter</th>
                                <td data-label="Parameter">Working Pressure</td>
                                <td data-label="Specification">5 - 7 bar</td>
                                <td data-label="Specification">Venturi Sand Blasting Cabinet</td>

                            </tr>
                            <tr>
                                 <th>Parameter</th>
                                <td data-label="Parameter">Air Consumption</td>
                                <td data-label="Specification">6 - 12 CFM (according to nozzle size)</td>
                                <td data-label="Specification">Venturi Sand Blasting Cabinet</td>

                            </tr>
                            <tr>
                                 <th>Parameter</th>
                                <td data-label="Parameter">Nozzle Size</td>
                                <td data-label="Specification">4 - 8 mm</td>
                                <td data-label="Specification">Venturi Sand Blasting Cabinet</td>

                            </tr> -->

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</section>
@endif

@if($product->url == 'blast-wheel-shot-blasting-turbine')
<section class="mt_100">
    <div class="container">
        <div class="sec_hed_top mb_40">
            <h2 class="title_60">Capacity Chart (HP vs Shot Flow)</h2>
        </div>
        <div class="row gy-4 gy-lg-0 justify-content-center">
            <div class="col-lg-12">
                <div class="spec-table-wrapper">
                    <table class="spec-table">
  <thead>
    <tr>
      <th>Motor HP</th>
      <th>Shot Flow (kg/min)</th>
      <th>Typical Application</th>
    </tr>
  </thead>
  <tbody>
    <tr><td>3 HP</td><td>30–60</td><td>Small cabinet</td></tr>
    <tr><td>5 HP</td><td>60–100</td><td>Light duty</td></tr>
    <tr><td>7.5 HP</td><td>80–120</td><td>Tumblast</td></tr>
    <tr><td>10 HP</td><td>120–180</td><td>General use</td></tr>
    <tr><td>15 HP</td><td>150–220</td><td>Hanger / Table</td></tr>
    <tr><td>20 HP</td><td>200–300</td><td>Tunnel</td></tr>
    <tr><td>30 HP</td><td>300–450</td><td>Heavy duty</td></tr>
    <tr><td>40 HP</td><td>450–700</td><td>Plate blasting</td></tr>
    <tr><td>50 HP</td><td>700–1000+</td><td>High production</td></tr>
  </tbody>
</table>
                </div>
            </div>
        </div>
    </div>
</section>
@endif 

@if(isset($product->configuration_title) && $product->configuration_title != '' && isset($product->configuration_description) && $product->configuration_description != '')
<section class="mt_100">
    <div class="container">
        <div class="sec_hed_top mb_40">
            <p>Custom Engineered Mechanism</p>
            <h2 class="title_60">{{ $product->configuration_title }}</h2>
        </div>

        <div class="text-center">
            <p> {!! $product->configuration_description !!}</p>
        </div>
    </div>
</section>
@endif

@if(isset($product->why_choose_title) && $product->why_choose_title != '' && isset($product->why_choose_description) && $product->why_choose_description != '')
<section class="mt_100">
    <div class="container">
        <div class="sec_hed_top mb_40">
            <h2 class="title_60">{{ $product->why_choose_title }}</h2>
        </div>

        <div class="text-center">
            <p> {!! $product->why_choose_description !!}</p>
        </div>
    </div>
</section>
@endif

@if(isset($productIndustries) && is_countable($productIndustries) && count($productIndustries) > 0)
<section class="mt_100">
    <div class="container-fluid">
        <div class="industry_section">
            <div class="row justify-content-between mb_40">
                <div class="col-lg-10">
                    <h2 class="title_60 text-white">Related Industries You May Like </h2>
                    <p class="mb-0 text-white">Explore a wide range of industries where shot blasting plays a critical
                        role in improving surface quality, durability, and production efficiency. From automotive and
                        foundry to fabrication and heavy engineering, Jinil's solutions are designed to meet diverse
                        application needs, ensuring reliable surface preparation, consistent finishing, and optimized
                        performance across demanding industrial environments.</p>
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
                @foreach($productIndustries as $k => $v)
                <div class="industry_item_wrapper mx-3">
                    <a href="{{route('industry', $v->url)}}">
                        <div class="industry_item" style="background-image: url({{ asset('public/indcategory/icon_image/' . $v->icon_image) }})">
                        </div>
                        <h3 class="title_24">{{$v->indcategory ?? ''}}</h3>
                    </a>
                </div>
                @endforeach
                <!-- <div class="industry_item_wrapper mx-3">
                    <a href="https://intelliworkz.co/Jinil/industries/foundry">
                        <div class="industry_item" style="background-image: url('public/front/images/industries2.png')">
                        </div>
                        <h3 class="title_24">Foundry</h3>
                    </a>
                </div>

                <div class="industry_item_wrapper mx-3">
                    <a href="https://intelliworkz.co/Jinil/industries/defense">
                        <div class="industry_item" style="background-image: url('public/front/images/industries3.png')">
                        </div>
                        <h3 class="title_24">Defense</h3>
                    </a>
                </div>

                <div class="industry_item_wrapper mx-3">
                    <a href="https://intelliworkz.co/Jinil/industries/aerospace">
                        <div class="industry_item" style="background-image: url('public/front/images/industries4.png')">
                        </div>
                        <h3 class="title_24">Aerospace</h3>
                    </a>
                </div>

                <div class="industry_item_wrapper mx-3">
                    <a href="https://intelliworkz.co/Jinil/industries/railways">
                        <div class="industry_item" style="background-image: url('public/front/images/industries5.png')">
                        </div>
                        <h3 class="title_24">Railways</h3>
                    </a>
                </div>

                <div class="industry_item_wrapper mx-3">
                    <a href="https://intelliworkz.co/Jinil/industries/fabrication">
                        <div class="industry_item" style="background-image: url('public/front/images/industries6.png')">
                        </div>
                        <h3 class="title_24">Fabrication</h3>
                    </a>
                </div>

                <div class="industry_item_wrapper mx-3">
                    <a href="https://intelliworkz.co/Jinil/industries/wire-coil">
                        <div class="industry_item" style="background-image: url('public/front/images/industries7.png')">
                        </div>
                        <h3 class="title_24">Wire coil</h3>
                    </a>
                </div>

                <div class="industry_item_wrapper mx-3">
                    <a href="https://intelliworkz.co/Jinil/industries/automotive">
                        <div class="industry_item" style="background-image: url('public/front/images/industries8.png')">
                        </div>
                        <h3 class="title_24">Automotive</h3>
                    </a>
                </div>

                <div class="industry_item_wrapper mx-3">
                    <a href="https://intelliworkz.co/Jinil/industries/oil-and-gas">
                        <div class="industry_item" style="background-image: url('public/front/images/industries9.png')">
                        </div>
                        <h3 class="title_24">Oil & gas</h3>
                    </a>
                </div>

                <div class="industry_item_wrapper mx-3">
                    <a href="https://intelliworkz.co/Jinil/industries/steel-plant">
                        <div class="industry_item"
                            style="background-image: url('public/front/images/industries10.png')"> </div>
                        <h3 class="title_24">Steel plant</h3>
                    </a>
                </div>

                <div class="industry_item_wrapper mx-3">
                    <a href="https://intelliworkz.co/Jinil/industries/peb">
                        <div class="industry_item"
                            style="background-image: url('public/front/images/industries11.png')"> </div>
                        <h3 class="title_24">PEB</h3>
                    </a>
                </div>

                <div class="industry_item_wrapper mx-3">
                    <a href="https://intelliworkz.co/Jinil/industries/heavy-machinery">
                        <div class="industry_item"
                            style="background-image: url('public/front/images/industries12.png')"> </div>
                        <h3 class="title_24">Heavy machinery </h3>
                    </a>
                </div> -->

            </div>
        </div>
    </div>
</section>
@endif

@if(isset($product->applications) && is_countable($product->applications) && count($product->applications) > 0)
<section class="mt_100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-5 pe-lg-5">
                <p class="mb-0">Complete Support Portfolio</p>
                <h2 class="title_60 mb_29">Applications</h2>
                <p class="title_24">{{ $product->application_desc ?? '' }}</p>
            </div>

            <div class="col-lg-7">
                <div class="application_list">
                    @foreach($product->applications as $k => $v)
                    <div class="app_item">
                        <span class="app_number">{{$k+1}}</span>
                        <p class="title_24">{{$v}}</p>
                    </div>
                    @endforeach
                    <!-- <div class="app_item">
                        <span class="app_number">02</span>
                        <p class="title_24">Surface Cleaning Before Painting Or Powder Coating</p>
                    </div>

                    <div class="app_item">
                        <span class="app_number">03</span>
                        <p class="title_24">Paint And Coating Removal</p>
                    </div>

                    <div class="app_item">
                        <span class="app_number">04</span>
                        <p class="title_24">Deburring Of Machined Parts</p>
                    </div>

                    <div class="app_item">
                        <span class="app_number">05</span>
                        <p class="title_24">Surface Roughening Before Plating Or Coating</p>
                    </div>

                    <div class="app_item">
                        <span class="app_number">06</span>
                        <p class="title_24">Decorative Satin Finishing</p>
                    </div>

                    <div class="app_item">
                        <span class="app_number">07</span>
                        <p class="title_24">Tool And Mould Cleaning</p>
                    </div>

                    <div class="app_item">
                        <span class="app_number">08</span>
                        <p class="title_24">Cleaning Precision Engineering Components</p>
                    </div> -->

                </div>
            </div>
        </div>
    </div>
</section>
@endif

@php
    $sections = [];
    if (isset($product->advantages) && is_countable($product->advantages) && count($product->advantages) > 0) {
        $sections[] = "advantages";
    }
    if (isset($product->design_features) && is_countable($product->design_features) && count($product->design_features) > 0) {
        $sections[] = "design";
    }
    if (isset($product->selection_guidelines) && is_countable($product->selection_guidelines) && count($product->selection_guidelines) > 0) {
        $sections[] = "selection";
    }
    if (isset($product->optional_features) && is_countable($product->optional_features) && count($product->optional_features) > 0) {
        $sections[] = "optional";
    }
    $count = count($sections);
    // Decide column class
    $colClass = ($count == 1) ? "col-lg-12" : "col-lg-6";
@endphp

<section class="mt_100">
    <div class="container">
        <div class="service_Scope_card">
            <div class="row">
            @if (isset($product->advantages) && is_countable($product->advantages) && count($product->advantages) > 0)
                <div class="<?= $colClass ?>">
                    <div class="service_Scope py-4">
                        <div class="sec_hed_top mb-3 text-start">
                            <p>Operational Performance Benefits</p>
                            <h2 class="title_60">Advantages</h2>
                        </div>
                        <div>
                            <p>{{ $product->advantages_desc ?? '' }}
                            </p>
                            <ul class="custom-list">
                                @foreach($product->advantages as $k => $v)
                                <li>{{$v}}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif
            @if (isset($product->design_features) && is_countable($product->design_features) && count($product->design_features) > 0)
                <div class="<?= $colClass ?>">
                    <div class="service_Scope py-4">
                        <div class="sec_hed_top mb-3 text-start">
                            <p>Advanced Engineering Highlights</p>
                            <h2 class="title_60">Design Features </h2>
                        </div>
                        <div>
                            <p>{{ $product->design_features_desc ?? '' }} </p>

                            <ul class="custom-list">
                                @foreach($product->design_features as $k => $v)
                                <li>{{$v}}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif
            @if (isset($product->selection_guidelines) && is_countable($product->selection_guidelines) && count($product->selection_guidelines) > 0)
                <div class="<?= $colClass ?>">
                    <div class="service_Scope py-4">
                        <div class="sec_hed_top mb-3 text-start">
                            <p>Decision Making Factors</p>
                            <h2 class="title_60">Selection Guidelines </h2>
                        </div>
                        <div>
                            <p>{{ $product->selection_guidelines_desc ?? '' }} </p>
                            </p>

                            <ul class="custom-list">
                                @foreach($product->selection_guidelines as $k => $v)
                                <li>{{$v}}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif
            @if (isset($product->optional_features) && is_countable($product->optional_features) && count($product->optional_features) > 0)
                <div class="<?= $colClass ?>">
                    <div class="service_Scope py-4">
                        <div class="sec_hed_top mb-3 text-start">
                            <p>Additional System Enhancements</p>
                            <h2 class="title_60">Optional Features </h2>
                        </div>
                        <div>
                            <p>{{ $product->optional_features_desc ?? '' }} </p>
                            </p>
                            <ul class="custom-list">
                                @foreach($product->optional_features as $k => $v)
                                <li>{{$v}}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>

@if(isset($product->operational_accessories) && is_countable($product->operational_accessories) && count($product->operational_accessories) > 0)
<section class="mt_100">
    <div class="container">
        <div class="sec_hed_top mb_40">
            <h2 class="title_60">Optional Accessories</h2>
            <span class="text-585 d-block">The machine can be upgraded with accessories based on production needs and application requirements.</span>

        </div>

        <div class="inve_Pro mt_80">
            <div class="row">
                @foreach($product->operational_accessories as $k => $v)
                <div class="col-lg-6">
                    <div class="inve_Pro_card">
                        <h4 class="title_24">{{$v['title'] ?? ''}}</h4>
                        <p>{{$v['desc'] ?? ''}}</p>
                        <hr>
                    </div>
                </div>
                @endforeach

                <!-- <div class="col-lg-6">
                    <div class="inve_Pro_card">
                        <h4 class="title_24">Pressure Blasting Upgrade System
                        </h4>
                        <p>Converts suction blasting setup into higher-pressure operation for faster cleaning rates and
                            stronger abrasive impact performance.</p>
                        <hr>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="inve_Pro_card">
                        <h4 class="title_24">Cyclone Separator for Abrasive Cleaning</h4>
                        <p>Separates reusable abrasive from dust and broken particles, improving media quality and
                            blasting efficiency during operation.</p>
                        <hr>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="inve_Pro_card">
                        <h4 class="title_24">PLC Control System</h4>
                        <p>Automates machine functions through programmable controls for easier operation, repeatable
                            performance, and process monitoring.
                        </p>
                        <hr>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="inve_Pro_card">
                        <h4 class="title_24">Automatic Gun Reciprocator
                        </h4>
                        <p>Moves the blasting gun automatically in controlled motion for consistent coverage and reduced
                            manual operator effort.</p>
                        <hr>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="inve_Pro_card">
                        <h4 class="title_24">Boron Carbide Long-Life Nozzle
                        </h4>
                        <p>High wear-resistant nozzle designed for extended service life and efficient abrasive
                            acceleration during blasting.</p>
                        <hr>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="inve_Pro_card">
                        <h4 class="title_24">Extra Lighting Package
                        </h4>
                        <p>Provides enhanced internal cabinet visibility for safer operation and more accurate blasting
                            of components.</p>
                        <hr>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="inve_Pro_card">
                        <h4 class="title_24">Custom Cabinet Dimensions</h4>
                        <p>Cabinet size can be customized to suit specific component sizes, production needs, and
                            workspace requirements.
                        </p>
                        <hr>
                    </div>
                </div> -->

            </div>
        </div>
    </div>
</section>
@endif

@if(isset($product->faqs) && is_countable($product->faqs) && count($product->faqs) > 0)
<section class="mb_100 mt_100">
    <div class="container">
        <div class="sec_hed_top mb_40">
            <h2 class="title_60">Frequently Asked Questions</h2>
            <span class="text-585 d-block">Clear answers to common questions about Jinil's shot blasting machines, surface preparation solutions, and engineering support—helping you make informed decisions with confidence.</span>

        </div>
        <div class="faq_group active">
            @foreach($product->faqs as $k => $v)
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
            <!-- <div class="faq_item">
                <div class="faq_question">
                    <span>What is the use of a suction-type shot blasting machine?</span>
                    <span class="faq_icon">+</span>
                </div>
                <div class="faq_answer">
                    <p>A suction-type shot blasting machine is used for rust removal, paint stripping, surface
                        preparation, deburring, and decorative finishing of small to medium-sized industrial components.
                    </p>
                </div>
            </div>

            <div class="faq_item">
                <div class="faq_question">
                    <span>Which industries use cabinet-type sandblasting machines?</span>
                    <span class="faq_icon">+</span>
                </div>
                <div class="faq_answer">
                    <p>Industries like automotive, construction, aerospace, and manufacturing widely use these machines.
                    </p>
                </div>
            </div>

            <div class="faq_item">
                <div class="faq_question">
                    <span>What abrasives can be used in this machine?</span>
                    <span class="faq_icon">+</span>
                </div>
                <div class="faq_answer">
                    <p>Industries like automotive, construction, aerospace, and manufacturing widely use these machines.
                    </p>
                </div>
            </div>

            <div class="faq_item">
                <div class="faq_question">
                    <span>Does Jinil provide installation and commissioning support?</span>
                    <span class="faq_icon">+</span>
                </div>
                <div class="faq_answer">
                    <p>Industries like automotive, construction, aerospace, and manufacturing widely use these machines.
                    </p>
                </div>
            </div>

            <div class="faq_item">
                <div class="faq_question">
                    <span>What kind of after-sales service does Jinil offer? </span>
                    <span class="faq_icon">+</span>
                </div>
                <div class="faq_answer">
                    <p>Industries like automotive, construction, aerospace, and manufacturing widely use these machines.
                    </p>
                </div>
            </div>

            <div class="faq_item">
                <div class="faq_question">
                    <span>Are Jinil machines compliant with international quality standards? </span>
                    <span class="faq_icon">+</span>
                </div>
                <div class="faq_answer">
                    <p>Industries like automotive, construction, aerospace, and manufacturing widely use these machines.
                    </p>
                </div>
            </div> -->

        </div>

    </div>
</section>
@endif

<script>
document.addEventListener("DOMContentLoaded", function() {

    document.querySelectorAll(".faq_question").forEach(question => {

        question.addEventListener("click", function() {

            const item = question.parentElement;

            // close others
            document.querySelectorAll(".faq_item").forEach(faq => {
                if (faq !== item) {
                    faq.classList.remove("active");
                }
            });

            // toggle current
            item.classList.toggle("active");

        });

    });

});
</script>



@include('layouts.frontfooter')