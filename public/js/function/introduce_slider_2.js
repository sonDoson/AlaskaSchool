$().ready(function(){
    $('body').on('mouseenter', '#back-section-2', function(){
        hoverSmoke();
    }).on("mouseleave", "#back-section-2", function(){
        $('.smoke-slider').css('opacity','0');
    });

    $('.btn-slider-left').click(function(){

    });
    $('.btn-slider-right').click(function(){

    });
});

function hoverSmoke(){
    $('.smoke-slider-right').css('opacity','1');
    $('.smoke-slider-left').css('opacity','1');
}