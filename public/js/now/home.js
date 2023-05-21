$(window).ready(function(){
    // card_wrapper_f
    card_wrapper_f();
});

// cards 
let card_wrapper = $('.paclages_card_wrapper_footer');

// card wrapper 
const card_wrapper_f = () => {
    // ajax 
    $.ajax({
        'url' : url+'api/users/home/home_card_show',
        'method' : 'POST',
        'data' : {},
        success:function(data){
            console.log(data);
            const mapData = data.map((curE) => {
                return `
                    <div class="cards ${curE.st}">
                        <h2 class="header">${curE.name}</h2>
                        <p class="title">* ${curE.task*curE.commission}% কমিশন প্রতিদিন</p>
                        <p class="title">* ${curE.task}টি কাজ প্রতিদিন</p>
                        <p class="title">* ${curE.min_amount}টাকা - ${curE.max_amount}টাকা</p>
                        <div class="img_wrapper">
                            <img src="${url}images/cards/${curE.img}" alt="">
                            <img class="lock_img lock " src="${url}images/icons/lock.png" alt="">
                        </div>
                    </div>
                `;
            });
            card_wrapper.html(mapData);
        }
    });
};

// open notice 
let notice = $('.notification_wrapper i.fa-solid.fa-circle-xmark.header');
notice.click(function(){
    $('.home_notice').removeClass('d-none');
});