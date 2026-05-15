@include('layouts.frontheader')

<section class="navi_page">
    <div class="container-fluid">

        <div class="navi_page_child">
            <div>
                <p class="title_24"><a href="{{ url('/') }}" class="text-585">Home /</a> <a href="{{ route('spareparts') }}" class="text-585">Spare Parts</a> </p>

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
                    <div class="col-md-6 col-lg-4" id="sparepart-{{ $sparepart->id }}">   {{-- ADD THIS ID --}}
                        <div class="fea_mac">
                            <div class="fea_mac_img">
                                <img class="img-fluid" 
                                    src="{{ asset('public/spareparts/'.$sparepart->image) }}" 
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

@include('front.serviceform')

@include('layouts.frontfooter')
