<footer class="footer_header">
    <div class="container">
        <ul>
            <li>
                <a href="{{route('web_home_show')}}" class="title {{Route::is('web_home_show') ? 'active' : ''}}">
                    <span>{{__('all_btn.Home')}}</span>
                    <i class="fa-solid fa-house-user"></i>
                </a>
            </li>

            <li>
                <a href="{{route('web_history_task_today_show')}}" class="title {{Route::is('web_history_task_today_show') ? 'active' : ''}}">
                    <span>{{__('all_btn.Mining')}}</span>
                    <i class="fa-solid fa-clock-rotate-left"></i>
                </a>
            </li>

            <li>
                <a href="{{route('web_task_show')}}" class="title {{Route::is('web_task_show') ? 'active' : ''}}">
                    <img style="width:7rem" src="{{asset('.\images\icons\giphy.gif')}}" alt="">
                    <span>{{__('all_btn.Task')}}</span>
                </a>
            </li>

            <li>
                <a href="{{route('web_support_show')}}" class="title {{Route::is('web_support_show') ? 'active' : ''}}">
                    <span>{{__('all_btn.Contact')}}</span>
                    <i class="fa-solid fa-comments"></i>
                </a>
            </li>

            <li>
                <a href="@if(\App\Models\user_account::where('csrf', session() -> get('csrf'))->exists()) {{route('web_personal_show')}} @else {{route('web_account_show_login')}} @endif" class="title {{Route::is('web_personal_show') ? 'active' : ''}}">
                    <span>@if(\App\Models\user_account::where('csrf', session() -> get('csrf'))->exists()) {{__('all_btn.Profile')}} @else {{__('all_btn.Login')}} @endif</span>
                    <i class="fa-solid fa-id-card-clip"></i>
                </a>
            </li>
        </ul>
    </div>
</footer>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="{{asset('js\old\main.js')}}?v={{Config('app.version')}}"></script>

</body>
</html>