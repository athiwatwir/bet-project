<section class="d-none d-sm-block swiper-container swiper-btn-group swiper-btn-group-end text-white p-0 h-60vh overflow-hidden"
    data-swiper='{
        "slidesPerView": 1,
        "spaceBetween": 0,
        "autoplay": { "delay" : 3500, "disableOnInteraction": false },
        "loop": true,
        "pagination": { "type": "bullets" }
    }'
    style="margin-top: 130px;"
    >

    <div class="swiper-wrapper h-100">

        <!-- slide 2 -->
        <div class="lazy h-100 swiper-slide d-middle bg-white overlay-dark overlay-opacity-1 bg-cover" style="background-image:url('img/sliders/master-01.jpg')">
        </div>
        
        <div class="lazy h-100 swiper-slide d-middle bg-white overlay-dark overlay-opacity-1 bg-cover" style="background-image:url('img/sliders/master-02.jpg')">
        </div>

        <div class="lazy h-100 swiper-slide d-middle bg-white overlay-dark overlay-opacity-1 bg-cover" style="background-image:url('img/sliders/master-01.jpg')">
        </div>

        <div class="lazy h-100 swiper-slide d-middle bg-white overlay-dark overlay-opacity-1 bg-cover" style="background-image:url('img/sliders/master-02.jpg')">
        </div>

    </div>
    <!-- Add Arrows -->
    <div class="swiper-button-next swiper-button-white"></div>
    <div class="swiper-button-prev swiper-button-white"></div>

    <!-- Add Pagination -->
    <div class="swiper-pagination"></div>
</section> 


<section class="d-block d-sm-none swiper-container text-white p-0"
    data-swiper='{
        "slidesPerView": 1,
        "spaceBetween": 0,
        "autoplay": { "delay" : 3500, "disableOnInteraction": false },
        "loop": true,
        "pagination": { "type": "bullets" }
    }'>

    <div class="swiper-wrapper h-100">

        <!-- slide 2 -->
        <div class="swiper-slide d-middle bg-white" >
            <img class="img-fluid" src="img/sliders/master-01.jpg" alt="...">
        </div>
        <div class="swiper-slide d-middle bg-white" >
            <img class="img-fluid" src="img/sliders/master-02.jpg" alt="...">
        </div>
        
        

    </div>
    <!-- Add Arrows -->
    <div class="swiper-button-next swiper-button-white"></div>
    <div class="swiper-button-prev swiper-button-white"></div>

    <!-- Add Pagination -->
    <div class="swiper-pagination"></div>
</section>

<style>
    div#js_header_spacer{
        height: 0 !important;
    }
</style>