// open notice 
let notice = $('.deposit .container .notification_wrapper .notification_close i.fa-solid.fa-circle-xmark.header');
notice.click(function(){
    $('.hidden_notice').removeClass('d-none');
});

// active method 
let method = $('.deposit .container .deposit_wrapper span .method_wrapper .item');
method.click(function(){
    method.children('input').attr('checked', false);
    method.removeClass('active');
    $(this).addClass('active');
    $(this).children('input').attr('checked', true);

    let method_name = $(this).children('input').val();
    if(method_name == 'bkash'){
        $('.payment').removeClass('d-none');
        $('.sendmoney').addClass('d-none');
        // number 
        $('#copy_our_number').val($('.bkash_number').val());
    }else if(method_name == 'nagad'){
        $('.payment').addClass('d-none');
        $('.sendmoney').removeClass('d-none');
        // number 
        $('#copy_our_number').val($('.nagad_number').val());
    }else{
        $('.payment').addClass('d-none');
        $('.sendmoney').removeClass('d-none');
        // number 
        $('#copy_our_number').val($('.rocket_number').val());
    }
});

// click number 
// Select the text you want to copy
const textToCopy = $('#copy_our_number').val();
$('i.fa-solid.title').click(function(){
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