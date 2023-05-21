// open notice 
let notice = $('.deposit .container .notification_wrapper .notification_close i.fa-solid.fa-circle-xmark.header');
notice.click(function(){
    $('.withdraw_notification').removeClass('d-none');
});

// active method 
let method = $('.deposit .container .deposit_wrapper span .method_wrapper .item');
method.click(function(){
    method.removeClass('active');
    $(this).addClass('active');
});

// withdraw submit 
$('.submit_form').submit(function(e){
    e.preventDefault();
    $('.submit').html('লোডিং...');

    // ajax
    $.ajax({
        'url' : url+'api/users/withdraw/submit',
        'method' : 'POST',
        'data' : {
            'amount' : $('.amount_r').val(),
            'method' : $('.item.active').children('input').val(),
            'address' : $('.address').val(),
        },
        success:function(data){
            $('.withdraw_err').removeClass('d-none');
            $('.withdraw_err .bottom_top').html(data.msg);
            $('.submit').html('কনর্ফম করুন');
        }
    });

});