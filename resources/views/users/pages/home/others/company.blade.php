@extends('users.layout.master')
@section('master')
<!-- Link Swiper's CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
<link rel="stylesheet" href="{{asset('.\css\now\home\others\company.css')}}?v={{Config('app.version')}}" />

<section id="company_section" style="margin-bottom: 14rem">

     <!-- Swiper -->
     <div class="container">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img style="border-radius: 7px" src="https://marketplace.canva.com/EAEwJpQuX0M/1/0/1600w/canva-dark-blue-%26-yellow-modern-jamie-completion-certificate-bi48QxAlV9o.jpg" alt="">
                </div>
                <div class="swiper-slide">
                    <img style="border-radius: 7px" src="https://marketplace.canva.com/EAEwJpQuX0M/1/0/1600w/canva-dark-blue-%26-yellow-modern-jamie-completion-certificate-bi48QxAlV9o.jpg" alt="">
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>


    <!-- Swiper JS -->
    <div class="container">
        <div class="paclages_card_wrapper">
            <div class="paclages_card_wrapper_header">
                <h2 class="header">All Certificate</h2>
                <a href="" class="title"></a>
            </div>

            <div class="paclages_card_wrapper_footer">

                <div class="cards">
                    <img src="https://marketplace.canva.com/EAEwJpQuX0M/1/0/1600w/canva-dark-blue-%26-yellow-modern-jamie-completion-certificate-bi48QxAlV9o.jpg" alt="">
                </div>

                <div class="cards">
                    <img src="https://marketplace.canva.com/EAEwJpQuX0M/1/0/1600w/canva-dark-blue-%26-yellow-modern-jamie-completion-certificate-bi48QxAlV9o.jpg" alt="">
                </div>

                <div class="cards">
                    <img src="https://marketplace.canva.com/EAEwJpQuX0M/1/0/1600w/canva-dark-blue-%26-yellow-modern-jamie-completion-certificate-bi48QxAlV9o.jpg" alt="">
                </div>

            </div>
        </div>
    </div>

</section>



<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
<script>
    var swiper = new Swiper(".mySwiper", {
        pagination: {
            el: ".swiper-pagination",
            dynamicBullets: true,
        },
        loop : true,
        autoplay: {
            delay : 2000,
        }
    });
</script>
@endsection
