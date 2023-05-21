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
                <a href="{{route('web_index_show')}}">
                    <i class="fa-solid fa-arrow-left title"></i>
                </a>
                <p class="title">Back</p>
                <span></span>
            </div>

            <form method="post" class="account_login">

                <div class="box">
                    <i class="fa-solid fa-user title"></i>
                    <input type="text" name="" class="title username" placeholder="Username...">
                </div>
                <p class="title error username_error"></p>

                <div class="box">
                    <i class="fa-solid fa-lock title"></i>
                    <input type="text" name="" class="title password" placeholder="Password...">
                </div>
                <p class="title error password_error"></p>

                <div class="box">
                    <input type="submit" class="title submit" value="SIGN IN">
                </div>

                <div class="box box_footer">
                    <p class="title">Not a member? <a href="{{route('web_account_show_signup')}}">Sign up now</a> <i class="fa-solid fa-arrow-right"></i></p>
                </div>

            </form>

        </div>
    </section>

    {{-- <script></script> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script>
        const urls = {
            login : '{{route('api_users_accounts_login')}}',
            home : '{{route('web_home_show')}}',
        };
    </script>
    <script src="{{asset('.\js\now\account.js')}}"></script>

</body>
</html>