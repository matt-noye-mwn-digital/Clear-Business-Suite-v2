
$(document).ready(function(){
    //Desktop / large screens only
    if($(window).width() >= 1081) {
        $('.sidebarMenu').addClass('open');
        $('header .topBar button.sidebarMenuToggler').click(function(){
            $('.sidebarMenu').toggleClass('open', 1000);
            $('main.adminMain').toggleClass('full', 1100);
        });
        $('button.sidebarMenuToggler').click(function(){
           $(this).find('i').toggleClass('fa-times fa-bars');
        });
    }
    //tablets and mobiles only
    if($(window).width() <= 1080) {
        $('.sidebarMenu').removeClass('open');
        $('header .topBar button.sidebarMenuToggler').click(function(){
           $('.sidebarMenu').toggleClass('open', 1000);
        });

    }

    $('.addPaymentBtn').click(function(event){
        event.preventDefault();
        if($(this).hasClass('disabled')){
            Swal.fire({
                title: 'oops!',
                text: 'This invoice needs to be published before you can add a payment',
                icon: 'warning',
                confirmButtonText: 'ok',
                buttonStyling: false,
                customClass: {
                    confirmButton: 'mediumBlueBtn'
                }
            });
        }
        else {
            console.log('button pressed');
        }
    })
});
