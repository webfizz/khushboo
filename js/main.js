jQuery(document).ready(function () {
    new Typed(".text", {
        strings: ["Live, Love, Laugh", "We are With You", "Don't Feel Alone."],
        typeSpeed: 100,
        loop: true
    });
    
    $(window).scroll(function(){
        var top=$(window).scrollTop();
            if(top>=20){
                $("nav").addClass('secondary');
            }
            else
                if($("nav").hasClass('secondary')){
                    $("nav").removeClass('secondary');
                }
    });
});

