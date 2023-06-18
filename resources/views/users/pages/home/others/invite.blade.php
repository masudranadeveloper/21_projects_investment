@extends('users.layout.master')
@section('master')
<link rel="stylesheet" href="{{asset('css\now\home\others\invite.css')}}?v={{Config('app.version')}}">

<section id="invite_section" style="margin-bottom:14rem">
    <div class="container">
        <!--copy invitaion code-->  
        <div class="copy_invitation_code_wrapper">
            <div class="top">
                <h2 class="header">আমন্ত্রন লিঙ্ক নিচে</h2>
            </div>
            <div class="body">
                <p class="title">লিঙ্ক কপি করে বন্ধুদের মাঝে ছড়িয়ে দিন।</p>
                <input style="width: 100%" type="text" style="color: green !important" class="form-controll header" id="copy_my_btn_t" value="{{url('account/signup/?reg='.$userData['invite'])}}">
                <span class="copy_my_btn">
                    <i class="fa-solid fa-copy"></i>
                </span>
            </div>
        </div>


        <!-- Swiper JS -->
        <div class="paclages_card_wrapper">
            <div class="paclages_card_wrapper_header">
                <h2 class="header">কমিশনের তথ্য</h2>
            </div>

            <div class="paclages_card_wrapper_footer">
                <div class="cards">
                    <h2 class="header">রেফার কমিশন</h2>
                    @if (!empty($admin_data['depositGen1st']))
                        <p class="title">* ১ম জেনারেশন : {{$admin_data['depositGen1st']}} % </p>
                    @endif

                    @if (!empty($admin_data['depositGen2nd']))
                        <p class="title">* ২য় জেনারেশন : {{$admin_data['depositGen2nd']}} % </p>
                    @endif
                    @if (!empty($admin_data['depositGen3rd']))
                        <p class="title">* ৩য় জেনারেশন : {{$admin_data['depositGen3rd']}} % </p>
                    @endif

                    @if (!empty($admin_data['depositGen4th']))
                        <p class="title">* ৪র্থ জেনারেশন : {{$admin_data['depositGen4th']}} % </p>
                    @endif

                    @if (!empty($admin_data['depositGen5th']))
                        <p class="title">* ৫ম জেনারেশন : {{$admin_data['depositGen5th']}} % </p>
                    @endif
                </div>
                <div class="cards">
                    <h2 class="header">দল কমিশন</h2>

                    @if (!empty($admin_data['taskGen1st']))
                        <p class="title">* ১ম জেনারেশন : {{$admin_data['taskGen1st']}} % </p>
                    @endif

                    @if (!empty($admin_data['taskGen2nd']))
                        <p class="title">* ২য় জেনারেশন : {{$admin_data['taskGen2nd']}} % </p>
                    @endif

                    @if (!empty($admin_data['taskGen3rd']))
                        <p class="title">* ৩য় জেনারেশন : {{$admin_data['taskGen3rd']}} % </p>
                    @endif

                    @if (!empty($admin_data['taskGen4th']))
                        <p class="title">* ৪র্থ জেনারেশন : {{$admin_data['taskGen4th']}} % </p>
                    @endif

                    @if (!empty($admin_data['taskGen5th']))
                        <p class="title">* ৫ম জেনারেশন : {{$admin_data['taskGen5th']}} % </p>
                    @endif

                </div>
            </div>
        </div>
    </div>
</section>

<script>
    // Select the text you want to copy
    const textToCopy = $('#copy_my_btn_t').val();
    $('.copy_my_btn i').click(function(){
        $(this).addClass('fa-spinner');
        $(this).removeClass('fa-copy');
        $(this).removeClass('fa-circle-check');
        setTimeout(() => {
            $(this).removeClass('fa-spinner');
            $(this).removeClass('fa-copy');
            $(this).addClass('fa-circle-check');
        }, 500);
        try {
        // Use the newer Clipboard API if available
        navigator.clipboard.writeText(textToCopy).then(function() {
        }, function() {
            // If Clipboard API is not available, use document.execCommand() instead
            const textField = document.createElement("textarea");
            textField.value = textToCopy;
            document.body.appendChild(textField);
            textField.select();
            document.execCommand("copy");
            textField.remove();
            });
        } catch (err) {
            // Fallback to document.execCommand() if Clipboard API is not available
            const textField = document.createElement("textarea");
            textField.value = textToCopy;
            document.body.appendChild(textField);
            textField.select();
            document.execCommand("copy");
            textField.remove();
        }
    });
</script>
@endsection