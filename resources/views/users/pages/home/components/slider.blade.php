<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
<style>
.swiper {
    width: 100%;
    height: 30vh;
    background: #000;
}

.swiper-slide {
    font-size: 18px;
    color: #fff;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    padding: 1.5rem;
}

.parallax-bg {
    position: absolute;
    left: 0;
    top: 0;
    width: 130%;
    height: 100%;
    -webkit-background-size: cover;
    background-size: cover;
    background-position: center;
}
</style>

<div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff;" class="swiper mySwiper">
    <div class="parallax-bg" style="background-image: url(https://m.media-amazon.com/images/I/71tIrZqybrL._SX3000_.jpg)" data-swiper-parallax="-23%"></div>
    <div class="swiper-wrapper">
        
        <div class="swiper-slide">
            <div class="main-header" data-swiper-parallax="-300">Slide 2</div>
            <div class="header" data-swiper-parallax="-200">Subtitle</div>
            <div class="title" data-swiper-parallax="-100">
                <p>
                    Lorem ipsum dolor sit amet, consectet
                </p>
            </div>
        </div>

        <div class="swiper-slide">
            <div class="main-header" data-swiper-parallax="-300">Slide 2</div>
            <div class="header" data-swiper-parallax="-200">Subtitle</div>
            <div class="title" data-swiper-parallax="-100">
                <p>
                    Lorem ipsum dolor sit amet, consectet
                </p>
            </div>
        </div>

        <div class="swiper-slide">
            <div class="main-header" data-swiper-parallax="-300">Slide 2</div>
            <div class="header" data-swiper-parallax="-200">Subtitle</div>
            <div class="title" data-swiper-parallax="-100">
                <p>
                    Lorem ipsum dolor sit amet, consectet
                </p>
            </div>
        </div>

        <div class="swiper-slide">
            <div class="main-header" data-swiper-parallax="-800">Slide 2</div>
            <div class="header" data-swiper-parallax="-500">Subtitle</div>
            <div class="title" data-swiper-parallax="-200">
                <p>
                    Lorem ipsum dolor sit amet, consectet
                </p>
            </div>
        </div>

        <div class="swiper-slide">
            <div class="main-header" data-swiper-parallax="-300">Slide 2</div>
            <div class="header" data-swiper-parallax="-200">Subtitle</div>
            <div class="title" data-swiper-parallax="-100">
                <p>
                    Lorem ipsum dolor sit amet, consectet
                </p>
            </div>
        </div>
        
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-pagination"></div>
</div>  
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<script>
    // slider st 
    var swiper = new Swiper(".mySwiper", {
        speed: 600,
        parallax: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
</script>