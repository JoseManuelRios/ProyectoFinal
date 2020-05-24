$(document).ready(function(){
    $(window).scroll(function(){    
        var height=$(window).scrollTop();
        var width=$(window).width();
        if(width>100){
            if(height>150) {
                $("nav").css({"position": "fixed"});
                $("nav").css({"opacity":"80%"});
            }else{
                $("nav").css({"position": "relative"});
                $("nav").css({"opacity":"100%"});
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
            $("#myNav").width("75%");
            $("body").css("overflow","hidden");
        }else{
            $("section").addClass("cerrar");
            $("footer").css("opacity",1);
            $("section").removeClass("abrir");
            $("#myNav").width("0%");
            $("body").css("overflow","auto");
        }
    });
});