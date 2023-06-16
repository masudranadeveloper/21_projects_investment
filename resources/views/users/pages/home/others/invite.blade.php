@extends('users.layout.master')
@section('master')
<link rel="stylesheet" href="{{asset('css\now\home\others\invite.css')}}?v={{Config('app.version')}}">

<section id="invite_section">
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
                    <h2 class="header">ডিপজিট কমিশন</h2>
                    <p class="title">* ১ম জেনারেশন : {{$admin_data['depositGen1st']}} % </p>
                    <p class="title">* ২য় জেনারেশন : {{$admin_data['depositGen2nd']}} % </p>
                    <p class="title">* ৩য় জেনারেশন : {{$admin_data['depositGen3rd']}} % </p>
                    <p class="title">* ৪র্থ জেনারেশন : {{$admin_data['depositGen4th']}} % </p>
                    <p class="title">* ৫ম জেনারেশন : {{$admin_data['depositGen5th']}} % </p>
                </div>
                <div class="cards">
                    <h2 class="header">জেনারেশন কমিশন</h2>
                    <p class="title">* ১ম জেনারেশন : {{$admin_data['gen1st']}} % </p>
                    <p class="title">* ২য় জেনারেশন : {{$admin_data['gen2nd']}} % </p>
                    <p class="title">* ৩য় জেনারেশন : {{$admin_data['gen3rd']}} % </p>
                    <p class="title">* ৪র্থ জেনারেশন : {{$admin_data['gen4th']}} % </p>
                    <p class="title">* ৫ম জেনারেশন : {{$admin_data['gen5th']}} % </p>
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