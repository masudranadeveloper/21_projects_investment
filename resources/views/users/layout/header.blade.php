<!DOCTYPE html>
<html lang="en">
<head>
    @php
        $userData = App\Models\user_account::where('csrf', session() -> get('csrf')) -> first();
        $adminData = App\Models\admin_account::where('id',1) -> first();
    @endphp
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$adminData['title']}}</title>
   
    <!-- css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.0/css/bootstrap.min.css" integrity="sha512-NZ19NrT58XPK5sXqXnnvtf9T5kLXSzGQlVZL9taZWeTBtXoN3xIfTdxbkQh6QSoJfJgpojRqMfhyqBAAEeiXcA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('css\now\main.css')}}?v={{Config('app.version')}}" />
    <!-- script -->
    <script src="{{asset('js\old\jQuery.js')}}"></script>
    <script src="{{asset('js\old\url.js')}}?v={{Config('app.version')}}"></script>
</head>
<body>

<div class="full_wrapper d-none">
    <a href="{{$adminData['teligram_link']}}" class="whatsapp_header">
        {{-- <img src="{{asset('.\images\all_icons\teligram.png')}}" alt=""> --}}
        <span class="btn_animation_wrapper">
            <div class="animation">
                <span style="--i:1"><i class="fa-solid fa-play"></i></span>
                <span style="--i:2"><i class="fa-solid fa-play"></i></span>
                <span style="--i:3"><i class="fa-solid fa-play"></i></span>
                <span style="--i:4"><i class="fa-solid fa-play"></i></span>
                <span style="--i:5"><i class="fa-solid fa-play"></i></span>
            </div>
        </span>
    </a>
</div>