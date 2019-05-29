$().ready(function(){
    $('.push-to-top').click(function(){
        $(this).parent().parent().css("background-color","#ff1651");
        value = $(this).attr('value').split("-");
        id = value[0];
        table = value[1];
        //ajax
        $.get('/ajaxPushMe', {id:id, table:table}, function(data){});
    });
});
