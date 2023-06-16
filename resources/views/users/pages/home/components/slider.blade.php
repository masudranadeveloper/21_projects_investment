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
.swiper-slide img{
}
</style>

  <!-- Swiper -->
  <div class="swiper mySwiper">
    <div class="swiper-wrapper">
      <div class="swiper-slide"><img src="{{asset("images\slider\sl1.png")}}" alt=""></div>
      <div class="swiper-slide"><img src="{{asset("images\slider\sl2.jpg")}}" alt=""></div>
      <div class="swiper-slide"><img src="{{asset("images\slider\sl3.jpg")}}" alt=""></div>
      <div class="swiper-slide"><img src="{{asset("images\slider\sl4.jpg")}}" alt=""></div>
    </div>
    <div class="swiper-pagination"></div>
  </div>

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<!-- Initialize Swiper -->
<script>
    var swiper = new Swiper(".mySwiper", {
        pagination: {
        el: ".swiper-pagination",
        },
    });
</script>