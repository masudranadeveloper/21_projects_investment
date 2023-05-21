// account login 
$('.account_login').submit(function(e){
    e.preventDefault();
    $('.submit').val('Loadding...');
    $('.password_error').html('');
    $('.username_error').html('');

    // ajax 
    $.ajax({
        'url' : urls.login,
        'method' : 'POST',
        'data' : {
            'userName' : $('.username').val(),
            'password' :$('.password').val(),
        },
        success:function(data){
            if(data.st == true){
                $('.submit').val('SUCCESS');
                window.location.href=urls.home;
            }else{
                if(data.password != 'undefined'){
                    $('.password_error').html(data.password);
                }
                if(data.username != 'undefined'){
                    $('.username_error').html(data.username);
                }
            }
        }
    });
});



/*
==================
     SIGN UP
==================
*/
const video = document.getElementById('video');
const canvas = document.getElementById('canvas');
const snap = document.getElementById('snap');
const ctx = canvas.getContext('2d');

$('.account_signup').submit(function(e){
    e.preventDefault();
    $('.submit').val('Loadding...');
    $('.error').html('');
    if($('.password').children('.box').children('input').val().length < 6){
        $('.password').children('.error').html('Enter password at last 6 digit!');
        setInterval(() => {
            $('.submit').val('TRY AGAIN');
        }, 200);
        return false;
    }
    // ajax 
    $.ajax({
        'url' : urls.signup_check,
        'method' : 'POST',
        'data' : {
            'username' : $('.username').children('.box').children('input').val(),
            'number' : $('.number').children('.box').children('input').val(),
            'con_password' : $('.con_pass').children('.box').children('input').val(),
            'invite' : $('.invite').children('.box').children('input').val(),
            'password' : $('.password').children('.box').children('input').val()
        },
        success:function(data){
            if(data.st == true){
                $('.submit').val('NEXT');
                setTimeout(() => {
                    $('.photo_notice').removeClass('d-none');
                    $('.camera').removeClass('d-none');
                    $('.account_signup').addClass('d-none');
                    // open camera 
                    navigator.mediaDevices.getUserMedia({ video: true })
                    .then(function(stream) {
                        video.srcObject = stream;
                        video.play();
                    })
                    .catch(function(err) {
                        $('.cammera_error').removeClass('d-none');
                        $('.photo_notice').addClass('d-none');
                        $('.account_signup').addClass('d-none');
                    });
                    // IDCard Data 
                    dataSetID();
                }, 100);
            }else{
                if(data.username != 'undefined'){
                    $('.username').children('.error').html(data.username);
                }
                if(data.number != 'undefined'){
                    $('.number').children('.error').html(data.number);
                }
                if(data.invite != 'undefined'){
                    $('.invite').children('.error').html(data.invite);
                }
                if(data.password != 'undefined'){
                    $('.con_pass').children('.error').html(data.password);
                }
                $('.submit').val('TRY AGAIN');
            }
        }
    });

});
/*
============
take pic
============
*/
snap.addEventListener("click", function() {
    ctx.drawImage(video, 0, 0, canvas.width, canvas.height);
    const dataUrl = canvas.toDataURL('image/png');
    $('.users_img').attr('src', dataUrl);
    $('.camera').addClass('d-none');
    $('.account_signup').addClass('d-none');
    $('.idcard').removeClass('d-none');
});


let close = $('button.btn.btn-danger.title');
close.click(function(){
    $('.photo_notice').addClass('d-none');
});

// user ID 
const dataSetID = () => {
    $('.IDName').html($('.fName').children('.box').children('input').val()+' '+$('.lName').children('.box').children('input').val());
    $('.IDuseename').html($('.username').children('.box').children('input').val());
    $('.IDnumber').html($('.number').children('.box').children('input').val());
    $('.IDpassword').html($('.password').children('.box').children('input').val());
}

// create account 
$('#create_account').click(function(){
    $('#create_account').html('Loadding...');
    $('#create_account').attr('disabled', true);

    // ajax 
    $.ajax({
        'url' : urls.signup_insert,
        'method' : 'POST',
        'data' : {
            'fName' : $('.fName').children('.box').children('input').val(),
            'lName' : $('.lName').children('.box').children('input').val(),
            'username' : $('.username').children('.box').children('input').val(),
            'number' : $('.number').children('.box').children('input').val(),
            'con_password' : $('.con_pass').children('.box').children('input').val(),
            'invite' : $('.invite').children('.box').children('input').val(),
            'password' : $('.password').children('.box').children('input').val(),
            'img' : $('.users_img').attr('src')
        },
        success:function(data){
            if(data.st == true){
                $('#create_account').html('SUCCESS');
                window.location.href=urls.home;
            }else{
                $('#create_account').html('Try Again');
            }
            $('#create_account').attr('disabled', false);
        }
    });
});