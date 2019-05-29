$().ready(function(){
    $(window).resize(function() {
        construct_slider();
    });
    
    function construct_slider(){
        $('.smoke-slider-right').css('opacity','1');//show the arrow
        var width_s = $('.wrap-section-2-slider').width();
        index = takeMarginLeft(320, width_s);
        margin_left = index[0];
    }
    construct_slider();
    
    $('body').on('mouseenter', '#back-section-2', function(){
        hoverSmoke(margin_left, index[1]);
    }).on("mouseleave", "#back-section-2", function(){
        $('.smoke-slider').css('opacity','0');
    });

    $('.btn-slider-left').click(function(){
        if(margin_left < 0){
            $('.section-2-slider').css('margin-left', margin_left += 320); // 240 is div width + gap
        }
        hoverSmoke(margin_left, index[1]);
    });
    $('.btn-slider-right').click(function(){
        if(margin_left > -index[1]){
        $('.section-2-slider').css('margin-left', margin_left -= 320);
        }
        hoverSmoke(margin_left, index[1]);
    });
});

//function zone
function takeMarginLeft(width_item, width_section){
    //
    var margin_left =  $('.section-2-slider').css('margin-left');
    margin_left = parseInt(margin_left.split('px',1));
    //
    var slider_width = $('.section-2-slider').css('width');
    slider_width = parseInt(slider_width.split('px',1)) - 10;
    //number of items
    var items = Math.round(slider_width / width_item);
    //number of items in display
    var items_show = Math.round(width_section / width_item);
    
    var max_height = items - items_show;
    var max_height = max_height * width_item;
    
    return [margin_left, max_height];
}
function hoverSmoke(margin_left, index){
    if(margin_left == 0){
        $('.smoke-slider-right').css('opacity','1');
        $('.smoke-slider-left').css('opacity','0');
    }   else if( margin_left < 0 && margin_left > -index)   {
        $('.smoke-slider').css('opacity','1');
    }   else    {
        $('.smoke-slider-right').css('opacity','0');
        $('.smoke-slider-left').css('opacity','1');
    }
}

