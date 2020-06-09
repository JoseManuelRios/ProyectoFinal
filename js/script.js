$(document).ready(function(){
    $(window).scroll(function(){    
        var height=$(window).scrollTop();
        var width=$(window).width();
        if(width>100){
            if(height>100) {
                $(".sticky").addClass("fijar");
                $("nav").css({"opacity":"80%"});
                $("section").css({"padding-top":"10vh"});
            }else{
                $(".sticky").removeClass("fijar");
                $("nav").css({"opacity":"100%"});
                $("section").css({"padding-top":"0"});
            }
        }

        var width=$(window).width();
        if(width>100){
            if($(this).scrollTop()>300){
                $('a.scroll-top').fadeIn('slow');    
            }else{
                $('a.scroll-top').fadeOut('slow');
            }
        }
    });

    $("#hamburguesa").click(function(){
        var existe=$(".abrir").val();
        if(existe!=""){
            $("section").addClass("abrir");
            $("footer").css("opacity",0.5);
            $("section").removeClass("cerrar");
            $("#myNav").width("100%");
            $("nav").css("opacity",1);
            $("body").css("overflow","hidden");
        }else{
            $("section").addClass("cerrar");
            $("footer").css("opacity",1);
            $("nav").css("opacity",0.8);
            $("section").removeClass("abrir");
            $("#myNav").width("0%");
            $("body").css("overflow","auto");
        }
    });

    $('.slider').bxSlider();
});