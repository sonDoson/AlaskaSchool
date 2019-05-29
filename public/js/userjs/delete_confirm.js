$().ready(function(){
    //save
    //closePop
    $('.popup_wrap').on('click', '.pop_back', closePop);
    $('.popup_wrap').on('click', '.pop_cancel', closePop);
});
//function close popup
function closePop(){
    $('.popup').remove();
}
//function add popup
function openPop(token, string, val, url){
    //append
    $('.popup_wrap').append('<div class=\"popup\">' +
        '<div class=\"pop_back\"></div>' +
        '<div class=\"box pop form\">' +
            '<h3 class=\"box_title\" >' + string + '</h3>' +
            '<br />' +
            '<form method=\"POST\" action=\"' + url + '\">' +
                '<div style=\"height:0\">' +
                '<input type=\"hidden\" name=\"_token\" id=\"csrf-token\" value=\"' + token + '\" /><br />' +
                '<input type=\"hidden\" name=\"value\" value=\"' + val + '\" /><br />' +
                '</div>' +
                '<br />' +
                '<button type=\"submit\" class=\"btn btn-add btn-submit pop_save\">Có <i class=\"fas fa-check\"></i></button>' +
                '<button type=\"button\" style=\"float: right;\" class=\"btn_false btn-add btn-submit pop_cancel\">Hủy <i class=\"fas fa-times\"></i></button>' +
            '</form>' +
        '</div>' +
    '</div>');
}