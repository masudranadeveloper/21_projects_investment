<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <!-- css -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.0/css/bootstrap.min.css" integrity="sha512-NZ19NrT58XPK5sXqXnnvtf9T5kLXSzGQlVZL9taZWeTBtXoN3xIfTdxbkQh6QSoJfJgpojRqMfhyqBAAEeiXcA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link rel="stylesheet" href="{{asset('css\now\main.css')}}?v={{Config('app.version')}}" />
   <link rel="stylesheet" href="{{asset('.\css\now\account\login.css')}}">
   <!-- script -->
   <script src="{{asset('js\old\jQuery.js')}}"></script>
   <script src="{{asset('js\old\url.js')}}?v={{Config('app.version')}}"></script>

</head>
<body>
    
    <section class="accounts">

        <div class="container">
            <div class="header_mr">
                <a href="">
                          <i class="fa-solid fa-arrow-left title"></i>
                      </a>
                <p class="title">Back</p>
                <span></span>
            </div>
    
            <form method="post" class="account_signup">
    
                <div class="row" style="width: 100%">
    
                    <div class="box box_footer mb-5">
                        <p class="title">Create a new account</p>
                    </div>
    
                    <div class="col-6 fName">
                        <p class="title mb-0">First name</p>
                        <div class="box mt-0" style="width: 100%">
                            <i class="fa-solid fa-lock title"></i>
                            <input required type="text" class="title" placeholder="First name..." />
                        </div>
                        <p class="title error"></p>
                    </div>
    
                    <div class="col-6 lName">
                        <p class="title mb-0">Last name</p>
                        <div class="box mt-0" style="width: 100%">
                            <i class="fa-solid fa-lock title"></i>
                            <input required type="text" class="title" placeholder="Last name..." />
                        </div>
                        <p class="title error"></p>
                    </div>
    
                    <div class="col-12 mt-3 username">
                        <p class="title mb-0">Username</p>
                        <div class="box mt-0" style="width: 100%">
                            <i class="fa-solid fa-lock title"></i>
                            <input required type="text" class="title" placeholder="Username..." />
                        </div>
                        <p class="title error"></p>
                    </div>
    
                    <div class="col-12 mt-3 number">
                        <p class="title mb-0">Your number</p>
                        <div class="box mt-0" style="width: 100%">
                            <i class="fa-solid fa-lock title"></i>
                            <input required type="text" class="title" placeholder="Number..." />
                        </div>
                        <p class="title error"></p>
                    </div>
    
                    <div class="col-6 password">
                        <p class="title mb-0">Password</p>
                        <div class="box mt-0" style="width: 100%">
                            <i class="fa-solid fa-lock title"></i>
                            <input required type="text" class="title" placeholder="Password..." />
                        </div>
                        <p class="title error"></p>
                    </div>
    
                    <div class="col-6 con_pass">
                        <p class="title mb-0">Confirmed password</p>
                        <div class="box mt-0" style="width: 100%">
                            <i class="fa-solid fa-lock title"></i>
                            <input required type="text" class="title" placeholder="Confirmed password..." />
                        </div>
                        <p class="title error"></p>
                    </div>
    
                    <div class="col-12 mt-3 invite">
                        <p class="title mb-0">Invitation code(optional)</p>
                        <div class="box mt-0" style="width: 100%">
                            <i class="fa-solid fa-lock title"></i>
                            <input type="text" class="title" placeholder="Invitation code..." />
                        </div>
                        <p class="title error"></p>
                    </div>
    
                    <div class="col-12 mt-3">
                        <div class="box" style="width: 100%">
                            <input type="submit" class="title submit" value="NEXT" />
                        </div>
                    </div>
    
                </div>
    
            </form>

            <div class="camera d-none">
                <video id="video" autoplay></video>
                <button id="snap" class="btn btn-success title">Take Photo</button>
                <canvas id="canvas"></canvas>
            </div>
            
            <section class="idcard d-none">
                <div class="id-card-tag"></div>
                <div class="id-card-tag-strip"></div>
                <div class="id-card-hook"></div>
                <div class="id-card-holder">
                    <div class="id-card">
                        <div class="header">
                            <img src='' class="users_img" />
                        </div>
                        <h2 class="IDName"></h2>
                        <h3 class="IDuseename"></h3>
                        <p><strong class="IDnumber"></strong></p>
                        <hr class='text-primary' />
                        <p><strong>PASSWORD : </strong><span class="IDpassword"></span></p>
                        <p>Save this information</p>
                    </div>
                </div>

                <button id="create_account" style="width:225px" class="btn btn-success title d-block m-auto mt-5">Create Account & Login</button>
            </section>

        </div>

    </section>

    {{-- hidden  --}}
    <div class="hidden_notice photo_notice d-none">
        <div class="container">
            <div class="container_wrapper">
                <div class="top">
                    <h4 class="header text-warning">
                        <span>
                            <i class="fa-solid fa-hand-point-right text-success"></i>
                        </span>
                        <span> জরুরী বিজ্ঞপ্তী </span>
                        <span>
                            <i class="fa-solid fa-hand-point-left text-success"></i>
                        </span>
                    </h4>
                </div>
                
                <div class="bottom">
                    <div class="bottom_top">
                        <p class="title">
                            আপনি অবশ্যই আপনার ছবি দিবেন। তা না হলে আপনার একাউন্টি ব্যান করা হতে পারে।
                        </p>
                    </div>
                    <div class="bottom_bottom">
                        <button class="btn btn-danger title">
                            OK
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="hidden_notice cammera_error d-none">
        <div class="container">
            <div class="container_wrapper">
                <div class="top">
                    <h4 class="header text-warning">
                        <span>
                            <i class="fa-solid fa-hand-point-right text-success"></i>
                        </span>
                        <span> ক্যামেরা ত্রুটি </span>
                        <span>
                            <i class="fa-solid fa-hand-point-left text-success"></i>
                        </span>
                    </h4>
                </div>
                
                <div class="bottom">
                    <div class="bottom_top">
                        <p class="title">
                            আপনার ক্যামেরাতে ত্রুটি রয়েছে। ক্যামেরার পারমিশন ছাড়া আপনি আগিয়ে যেতে পারবেন না।
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const urls = {
            'signup_check' : '{{route('api_users_accounts_signup_check')}}',
            'signup_insert' : '{{route('api_users_accounts_signup_insert')}}',
            'home' : '{{route('web_home_show')}}',
        }
    </script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="{{asset('.\js\now\account.js')}}?v={{Config('app.version')}}"></script>

</body>
</html>