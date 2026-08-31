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

                <img src="{{ asset('public/front/images/innder-header-jump.svg') }}" class="circle_text_img"
                    alt="innder header jump">

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

@if ($blogsdetail)

    <section class="mb_100 blogs_detials">

        <div class="container-fluid">

            <div class="mb_40">

                <img class="img-fluid" src="{{ asset('public/Blogs/detail_image/' . $blogsdetail->detail_image) }}"
                    alt="images">

            </div>

            <div class="blog-guide-section">

                <!-- Sidebar -->

                <aside class="blog-sidebar">

                    <p class="title_24">CONTENTS</p>

                    <ul id="dynamic-sidebar">

                        <!-- Links will be generated here dynamically via JS -->

                    </ul>

                </aside>

                <!-- Main Content -->

                <div class="blog-content">

                    <!-- Short Description -->

                    <div class="blog-content-section">

                        {!! $blogsdetail->short_description !!}

                    </div>

                    <!-- Main Description -->

                    <div class="blog-content-section">

                        {!! $blogsdetail->description !!}

                    </div>

                    <!-- CTA Box -->

                    @php
                        $ctaTextClean = trim(strip_tags($blogsdetail->cta_text ?? ''));
                    @endphp

                    @if ($blogsdetail->cta_image)
                        <a href="{{route('contact')}}"><div class="blog-content-section">
                            <div class="cta_image_wrap">
                                <img class="img-fluid"
                                    src="{{ asset('public/Blogs/cta_image/' . $blogsdetail->cta_image) }}"
                                    alt="{{ $blogsdetail->title }}">
                            </div>
                        </div></a>
                    @elseif($ctaTextClean !== '')
                        <a href="{{route('contact')}}"><div class="blog-content-section">
                            <div class="blog_det_consu">
                                <div class="col-lg-10">{!! $blogsdetail->cta_text !!}</div>
                            </div>
                        </div></a>
                    @endif

                    <!-- Conclusion -->

                    <div class="blog-content-section" id="conclusion">

                        <h2>Conclusion</h2>

                        {!! $blogsdetail->conclusion !!}

                    </div>

                    <!-- Author Box -->

                    <div class="author-box rounded p-4" id="author-profile">

                        <!-- Avatar -->

                        <div class="author-avatar position-relative flex-shrink-0">

                            <img class="author-avatar-img" src="{{ asset('public/front/images/author.jpg') }}"
                                onerror="this.src='https://ui-avatars.com/api/?name=Jinil+Desai&size=100&background=e8f0fb&color=105293'"
                                alt="Author">

                        </div>

                        <!-- Info -->

                        <div class="author-info">

                            <h4 class="author-name d-flex align-items-center m-0 mb-2">

                                Jinil Desai

                            </h4>

                            <p class="author-bio m-0 mt-2">

                                Jinil Desai is a surface preparation industry expert with years of experience in
                                providing innovative solutions for industrial surface treatment. Passionate about
                                quality and precision in every project.

                            </p>

                        </div>

                    </div>

                    @if ($blogsdetail->title_description && count($blogsdetail->title_description) > 0)
                        @php
                            $faqItems = [];

                            $decodedFaqItems = $blogsdetail->title_description;

                            if (is_array($decodedFaqItems)) {
                                foreach ($decodedFaqItems as $item) {
                                    $question = trim(strip_tags($item['faq_title'] ?? ''));
                                    $answer = trim(strip_tags($item['faq_description'] ?? ''));

                                    if ($question && $answer) {
                                        $faqItems[] = [
                                            'question' => $question,
                                            'answer' => $answer,
                                        ];
                                    }
                                }
                            }

                            $faqSchema = [
                                '@context' => 'https://schema.org',
                                '@type' => 'FAQPage',
                                'mainEntity' => array_map(function ($item) {
                                    return [
                                        '@type' => 'Question',
                                        'name' => $item['question'],
                                        'acceptedAnswer' => [
                                            '@type' => 'Answer',
                                            'text' => $item['answer'],
                                        ],
                                    ];
                                }, $faqItems),
                            ];
                        @endphp

                        <div class="blog-content-section" id="faqs">
                            <h2>FAQs</h2>
                            <div class="faq_group active">
                                @foreach ($blogsdetail->title_description as $index => $faq)
                                    <div class="faq_item {{ $index === 0 ? 'active' : '' }}">
                                        <div class="faq_question">
                                            <h5 class="faq_title">{{ $faq['faq_title'] }}</h5>
                                            <span class="faq_icon">+</span>
                                        </div>
                                        <div class="faq_answer">
                                            {!! $faq['faq_description'] !!}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    @if(!empty($faqItems))
                    <script type="application/ld+json">
                        {!! json_encode($faqSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
                    </script>
                @endif

                    <!--faqs -->

                    <!--          <div class="blog-content-section" id="faqs">-->

                    <!--              <h2>FAQs</h2>-->

                    <!--               <div class="faq_group active">-->

                    <!--   <div class="faq_item active">-->

                    <!--      <div class="faq_question">-->

                    <!--         <h5 class="faq_title">What services do you provide?</h5>-->

                    <!--         <span class="faq_icon">+</span>-->

                    <!--      </div>-->

                    <!--      <div class="faq_answer">-->

                    <!--         <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam, voluptatum. We provide high-quality industrial solutions and engineering services.</p>-->

                    <!--      </div>-->

                    <!--   </div>-->

                    <!--   <div class="faq_item">-->

                    <!--      <div class="faq_question">-->

                    <!--         <h5 class="faq_title">How can I request a quotation?</h5>-->

                    <!--         <span class="faq_icon">+</span>-->

                    <!--      </div>-->

                    <!--      <div class="faq_answer">-->

                    <!--         <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Simply contact our sales team through the enquiry form or call us directly.</p>-->

                    <!--      </div>-->

                    <!--   </div>-->

                    <!--   <div class="faq_item">-->

                    <!--      <div class="faq_question">-->

                    <!--         <h5 class="faq_title">Do you offer customized solutions?</h5>-->

                    <!--         <span class="faq_icon">+</span>-->

                    <!--      </div>-->

                    <!--      <div class="faq_answer">-->

                    <!--         <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. We design customized solutions according to customer requirements.</p>-->

                    <!--      </div>-->

                    <!--   </div>-->

                    <!--   <div class="faq_item">-->

                    <!--      <div class="faq_question">-->

                    <!--         <h5 class="faq_title">What industries do you serve?</h5>-->

                    <!--         <span class="faq_icon">+</span>-->

                    <!--      </div>-->

                    <!--      <div class="faq_answer">-->

                    <!--         <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. We serve automotive, engineering, fabrication, foundry, and infrastructure industries.</p>-->

                    <!--      </div>-->

                    <!--   </div>-->

                    <!--   <div class="faq_item">-->

                    <!--      <div class="faq_question">-->

                    <!--         <h5 class="faq_title">Do you provide installation support?</h5>-->

                    <!--         <span class="faq_icon">+</span>-->

                    <!--      </div>-->

                    <!--      <div class="faq_answer">-->

                    <!--         <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Yes, our team provides installation, commissioning, and operator training.</p>-->

                    <!--      </div>-->

                    <!--   </div>-->

                    <!--   <div class="faq_item">-->

                    <!--      <div class="faq_question">-->

                    <!--         <h5 class="faq_title">Is after-sales service available?</h5>-->

                    <!--         <span class="faq_icon">+</span>-->

                    <!--      </div>-->

                    <!--      <div class="faq_answer">-->

                    <!--         <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. We provide dedicated after-sales support and maintenance services.</p>-->

                    <!--      </div>-->

                    <!--   </div>-->

                    <!--</div>-->

                    <!--          </div>-->

                </div>

            </div>

        </div>

    </section>

@endif

<!--<section class="insights_section mt_100 mb_100">-->

<!--    <div class="container-fluid">-->

<!--        <div class="row align-items-center mb_40">-->

<!--            <div class="col-md-7">-->

<!--                <h2 class="title_60">Insights from the Surface Preparation Industry</h2>-->

<!--            </div>-->

<!--            <div class="col-md-5 text-lg-end">-->

<!--                <a href="{{ route('blogs') }}" class="com_btn com_btn_2">View all</a>-->

<!--            </div>-->

<!--        </div>-->

<!--        <div class="insights_wrapper">-->

<!--            <div class="row">-->

<!--                @foreach ($blogs as $blog)
-->

<!--                    <div class="col-md-4">-->

<!--                        <div class="insight_item">-->

<!--                            <div class="insight_item_img">-->

<!--                                <img class="w-100" src="{{ asset('public/Blogs/front_image/' . $blog->front_image) }}" alt="{{ $blog->title }}" />-->

<!--                            </div>-->

<!--                            <div class="insight_item_content">-->

<!--                                <hr>-->

<!--                                <p class="mb-2">{{ $blog->date }}</p>-->

<!--                                <a href="{{ route('blogdetail', ['url' => $blog->url]) }}"><h3 class="title_24">{{ $blog->title }}</h3></a>-->

<!--                            </div>-->

<!--                        </div>-->

<!--                    </div>-->

<!--
@endforeach-->

<!--            </div>-->

<!--        </div>-->

<!--    </div>-->

<!--</section>-->

<!--<section class="faq_main mb_100 mt_100">-->

<!--   <div class="container">-->

<!--      <h2 id="h2-heading-12">Conclusion</h2>-->

<!--      <div class="faq_group">-->

<!--         <div class="faq_item active">-->

<!--            <div class="faq_question">-->

<!--               <h4 class="faq_title">What services do you provide?</h4>-->

<!--               <span class="faq_icon">+</span>-->

<!--            </div>-->

<!--            <div class="faq_answer">-->

<!--               <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam, voluptatum. We provide high-quality industrial solutions and engineering services.</p>-->

<!--            </div>-->

<!--         </div>-->

<!--         <div class="faq_item">-->

<!--            <div class="faq_question">-->

<!--               <h4 class="faq_title">How can I request a quotation?</h4>-->

<!--               <span class="faq_icon">+</span>-->

<!--            </div>-->

<!--            <div class="faq_answer">-->

<!--               <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Simply contact our sales team through the enquiry form or call us directly.</p>-->

<!--            </div>-->

<!--         </div>-->

<!--         <div class="faq_item">-->

<!--            <div class="faq_question">-->

<!--               <h4 class="faq_title">Do you offer customized solutions?</h4>-->

<!--               <span class="faq_icon">+</span>-->

<!--            </div>-->

<!--            <div class="faq_answer">-->

<!--               <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. We design customized solutions according to customer requirements.</p>-->

<!--            </div>-->

<!--         </div>-->

<!--         <div class="faq_item">-->

<!--            <div class="faq_question">-->

<!--               <h4 class="faq_title">What industries do you serve?</h4>-->

<!--               <span class="faq_icon">+</span>-->

<!--            </div>-->

<!--            <div class="faq_answer">-->

<!--               <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. We serve automotive, engineering, fabrication, foundry, and infrastructure industries.</p>-->

<!--            </div>-->

<!--         </div>-->

<!--         <div class="faq_item">-->

<!--            <div class="faq_question">-->

<!--               <h4 class="faq_title">Do you provide installation support?</h4>-->

<!--               <span class="faq_icon">+</span>-->

<!--            </div>-->

<!--            <div class="faq_answer">-->

<!--               <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Yes, our team provides installation, commissioning, and operator training.</p>-->

<!--            </div>-->

<!--         </div>-->

<!--         <div class="faq_item">-->

<!--            <div class="faq_question">-->

<!--               <h4 class="faq_title">Is after-sales service available?</h4>-->

<!--               <span class="faq_icon">+</span>-->

<!--            </div>-->

<!--            <div class="faq_answer">-->

<!--               <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. We provide dedicated after-sales support and maintenance services.</p>-->

<!--            </div>-->

<!--         </div>-->

<!--      </div>-->

<!--   </div>-->

<!--</section>-->

<script>
    document.addEventListener("DOMContentLoaded", function() {



        document.querySelectorAll(".faq_question").forEach(question => {



            question.addEventListener("click", function() {



                const item = this.parentElement;

                const group = item.closest(".faq_group");



                group.querySelectorAll(".faq_item").forEach(faq => {

                    if (faq !== item) {

                        faq.classList.remove("active");

                    }

                });



                item.classList.toggle("active");



            });



        });



    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {

        const sidebarList = document.getElementById("dynamic-sidebar");

        const headings = document.querySelectorAll(".blog-content h2, .blog-content h3");

        const sections = [];

        let currentH2Li = null;

        let currentH3Ul = null;

        const allDropdowns = [];



        if (headings.length > 0) {

            headings.forEach((heading, index) => {

                let targetId = heading.id;

                if (!targetId) {

                    targetId = heading.tagName.toLowerCase() + "-heading-" + index;

                    heading.id = targetId;

                }



                const a = document.createElement("a");

                a.href = "#" + targetId;

                a.className = "nav-link";

                a.textContent = heading.textContent.trim();



                if (heading.tagName.toLowerCase() === 'h2') {

                    const li = document.createElement("li");

                    const flexContainer = document.createElement("div");

                    flexContainer.className =
                        "d-flex align-items-center justify-content-between heading-wrapper";

                    flexContainer.appendChild(a);

                    li.appendChild(flexContainer);



                    if (index === 0) {
                        a.classList.add("active");
                    }



                    sidebarList.appendChild(li);

                    currentH2Li = li;

                    currentH3Ul = null;

                    sections.push(heading);

                } else if (heading.tagName.toLowerCase() === 'h3' && currentH2Li) {

                    if (!currentH3Ul) {

                        const ul = document.createElement("ul");

                        currentH3Ul = ul;

                        ul.className = "sub-menu ps-3";

                        ul.style.overflow = "hidden";

                        ul.style.transition = "max-height 0.3s ease-in-out";

                        ul.style.maxHeight = "0px";

                        ul.style.listStyleType = "none";

                        ul.id = "submenu-" + index;



                        const toggleBtn = document.createElement("button");

                        toggleBtn.className = "dropdown-toggle-btn border-0 bg-transparent ms-2 p-0";

                        toggleBtn.style.transition = "transform 0.3s ease-in-out";

                        toggleBtn.style.cursor = "pointer";

                        toggleBtn.innerHTML =
                            '<svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M3 4.5L6 7.5L9 4.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>';



                        allDropdowns.push({
                            ul: ul,
                            btn: toggleBtn
                        });



                        if (currentH2Li === sidebarList.firstElementChild) {

                            ul.style.maxHeight = "1000px";

                            toggleBtn.style.transform = "rotate(180deg)";

                        }



                        toggleBtn.onclick = function(e) {

                            e.preventDefault();
                            e.stopPropagation();

                            const isCollapsed = ul.style.maxHeight === "0px" || ul.style
                                .maxHeight === "";

                            allDropdowns.forEach(item => {

                                if (item.ul !== ul) {
                                    item.ul.style.maxHeight = "0px";
                                    item.btn.style.transform = "rotate(0deg)";
                                }

                            });

                            if (isCollapsed) {

                                ul.style.maxHeight = ul.scrollHeight + "px";

                                toggleBtn.style.transform = "rotate(180deg)";

                                setTimeout(() => {
                                    if (ul.style.maxHeight !== "0px") ul.style.maxHeight =
                                        "1000px";
                                }, 300);

                            } else {

                                ul.style.maxHeight = "0px";

                                toggleBtn.style.transform = "rotate(0deg)";

                            }

                        };



                        const flexContainer = currentH2Li.querySelector(".heading-wrapper");

                        if (flexContainer) {
                            flexContainer.appendChild(toggleBtn);
                        }

                        currentH2Li.appendChild(ul);

                    }



                    const subLi = document.createElement("li");

                    a.classList.add("sub-link");

                    subLi.appendChild(a);

                    currentH3Ul.appendChild(subLi);

                    sections.push(heading);

                }

            });

        }



        const links = document.querySelectorAll("#dynamic-sidebar li a.nav-link");

        let isClickScrolling = false;



        links.forEach(link => {

            link.addEventListener("click", function(e) {

                e.preventDefault();

                isClickScrolling = true;

                links.forEach(l => l.classList.remove("active"));

                this.classList.add("active");



                const targetId = this.getAttribute("href");

                const targetSection = document.querySelector(targetId);

                if (targetSection) {

                    const headerOffset = 100;

                    const elementPosition = targetSection.getBoundingClientRect().top;

                    const offsetPosition = elementPosition + window.pageYOffset - headerOffset;

                    window.scrollTo({
                        top: offsetPosition,
                        behavior: "smooth"
                    });

                }



                const sidebarContainer = document.querySelector(".blog-sidebar");

                if (sidebarContainer) {

                    const containerRect = sidebarContainer.getBoundingClientRect();

                    const linkRect = this.getBoundingClientRect();

                    const relativeTop = linkRect.top - containerRect.top + sidebarContainer
                        .scrollTop;

                    const centerOffset = relativeTop - (sidebarContainer.clientHeight / 2) + (
                        linkRect.height / 2);

                    sidebarContainer.scrollTo({
                        top: centerOffset > 0 ? centerOffset : 0,
                        behavior: 'smooth'
                    });

                }



                setTimeout(() => {
                    isClickScrolling = false;
                }, 800);

            });

        });



        window.addEventListener("scroll", function() {

            let current = "";

            let currentLink = null;



            sections.forEach(section => {

                const sectionTop = section.getBoundingClientRect().top + window.scrollY;

                if (window.scrollY >= sectionTop - 180) {
                    current = section.getAttribute("id");
                }

            });



            if (current) {

                links.forEach(link => {

                    link.classList.remove("active");

                    if (link.getAttribute("href") === "#" + current) {

                        link.classList.add("active");

                        currentLink = link;



                        const parentUl = link.closest('.sub-menu');

                        const li = link.closest('li');

                        const ownUl = li ? li.querySelector('.sub-menu') : null;

                        const targetUl = parentUl || ownUl;



                        allDropdowns.forEach(item => {

                            if (item.ul !== targetUl) {
                                item.ul.style.maxHeight = "0px";
                                item.btn.style.transform = "rotate(0deg)";
                            }

                        });



                        if (targetUl && (targetUl.style.maxHeight === '0px' || targetUl.style
                                .maxHeight === '')) {

                            targetUl.style.maxHeight = targetUl.scrollHeight + "px";

                            setTimeout(() => {
                                if (targetUl.style.maxHeight !== "0px") targetUl.style
                                    .maxHeight = "1000px";
                            }, 300);

                            const toggleBtn = targetUl.parentElement.querySelector(
                                '.dropdown-toggle-btn');

                            if (toggleBtn) toggleBtn.style.transform = 'rotate(180deg)';

                        }

                    }

                });



                if (!isClickScrolling) {

                    const sidebarContainer = document.querySelector(".blog-sidebar");

                    if (sidebarContainer && currentLink) {

                        const containerRect = sidebarContainer.getBoundingClientRect();

                        const linkRect = currentLink.getBoundingClientRect();

                        if (linkRect.top < containerRect.top || linkRect.bottom > containerRect
                            .bottom) {

                            const relativeTop = linkRect.top - containerRect.top + sidebarContainer
                                .scrollTop;

                            const centerOffset = relativeTop - (sidebarContainer.clientHeight / 2) + (
                                linkRect.height / 2);

                            sidebarContainer.scrollTo({
                                top: centerOffset > 0 ? centerOffset : 0,
                                behavior: 'smooth'
                            });

                        }

                    }

                }

            } else if (window.scrollY < 200 && links.length > 0) {

                links.forEach(l => l.classList.remove("active"));

                links[0].classList.add("active");

                const firstUl = allDropdowns.length > 0 ? allDropdowns[0].ul : null;

                allDropdowns.forEach(item => {

                    if (item.ul !== firstUl) {

                        item.ul.style.maxHeight = "0px";
                        item.btn.style.transform = "rotate(0deg)";

                    } else if (item.ul.style.maxHeight === '0px' || item.ul.style.maxHeight ===
                        '') {

                        item.ul.style.maxHeight = "1000px";
                        item.btn.style.transform = "rotate(180deg)";

                    }

                });

            }

        });

    });
</script>

@include('layouts.frontfooter')
