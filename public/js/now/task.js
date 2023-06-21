$(window).ready(function(){
    // get_users_data
    get_users_data();
});

// start 
let start = $('#start_grabing');
let img = $('#task .container .body_mr .products_wrapper .img');
let img1 = $('#task .container .body_mr .products_wrapper .img:nth-child(1)');
let img2 = $('#task .container .body_mr .products_wrapper .img:nth-child(2)');
let img3 = $('#task .container .body_mr .products_wrapper .img:nth-child(3)');

start.click(function(){
    get_products_data();
    start.html('Loadding...');
    img1.css('animation', 'anim_up_1 4s ease forwards');
    img2.css('animation', 'anim_down 4s ease forwards');
    img3.css('animation', 'anim_up_2 4s ease forwards');
    setTimeout(() => {
        $('.commission_recived').removeClass('d-none');
        // show 
        setTimeout(() => {
            img.css('animation', 'none');
            start.html('Start Grabing');
        }, 500);
    }, 5000);
});
// get products data 
const get_products_data = () => {
    // ajax
    $.ajax({
        'url' : url+'api/users/task/get_products',
        'method' : 'POST',
        'data' : {},
        success:function(data){
            $('.maching_img').attr('src', url+'images/task/products/'+data.data.img);
            $('.products_img').attr('src', url+'images/task/products/'+data.data.img);
            $('.products_id').val(data.data.id);
            $('.products_title').html(data.data.title);
            $('.products_price').html(data.data.price);
            $('.products_rate').html(data.data.rate);
            $('.products_ratings').html(data.data.ratings);
        }
    });
};

// get commission 
let commission = $('#get_commission');
commission.click(function(){
    commission.html('Collecting...');
    // ajax
    $.ajax({
        'url' : url+'api/users/task/get_commission',
        'method' : 'POST',
        'data' : {
            'product_id' : $('.products_id').val(),
        },
        success:function(data){
            get_users_data();
            if(data.st == true){
                commission.html('SUCCESS');
                setTimeout(() => {
                    $('.commission_recived').addClass('d-none');
                    commission.html('আপনার কমিশন সংগ্রহ করুন');
                }, 500);
            }else{
                start.attr('disabled', true);
                commission.html(data.msg);
                setTimeout(() => {
                    $('.commission_recived').addClass('d-none');
                }, 1000);
            }
            
        }
    });
});

// get users data 
const get_users_data = () => {
    $('.user_total_amount').html('...');
    $('.user_today_income').html('...');
    $('.user_generation_commission').html('...');
    $('.user_available_task').html('...');
    $.ajax({
        'url' : url+'api/users/task/get_users_data',
        'method' : 'POST',
        'data' : {
            'product_id' : $('.products_id').val(),
        },
        success:function(data){
            $('.user_total_amount').html(Number(data.data.totalAmount).toFixed(2));
            $('.user_today_income').html(Number(data.data.todayIncome).toFixed(2));
            $('.user_generation_commission').html(Number(data.data.todayRaferIncome).toFixed(2));
            $('.user_available_task').html(Number(data.data.task));
        }
    });
}