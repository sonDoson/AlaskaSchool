$().ready(function(){
    //function append arrow
    softArrowCreate();
    
    $('.btn-table').click(function(){
        var val = $(this).attr('value');
        soft(val);
        makingUrlAndGo();
    });
});
//
function soft(val){
    //make request to url
    if(get[1] == undefined){
        get[1] = val + "-desc";
    }   else    {
        var get_sub = get[1].split("-");
        if(get_sub[0] == val){
            if(get_sub[1] == 'desc'){
                get[1] = val + "-asc";
            }   else    {
                get[1] = val + "-desc";
            }
        }   else    {
            get[1] = val + "-desc";
        }
    }
}
//function soft arrow
function softArrowCreate(){
    if(get[1] !== undefined){
        var get_sub = get[1].split("-");
        if(get_sub[1] == 'desc'){// up arrow
            $('#' + get_sub[0]).append(' ' + '<i class="fas fa-caret-up"></i>');
        }   else    {  //down arrow
            $('#' + get_sub[0]).append(' ' + '<i class="fas fa-caret-down"></i>');
        }
    }
}
//Page Mode
var page_active = $('.page-mode').attr('value');
$(page_active).css('background-color', 'grey');
//Click action
$('.page-number').on('click', function(){
    get[2] = $(this).attr('value');//push to get method
    makingUrlAndGo();
});

//button flash
var flash_page = 10;
$('.btn-flash').click(function(){
    var btn = $(this).attr('id');
    var btn_round = $(this).attr('value');
    if(get[2] == undefined){
        if($btn == 'btn-forward'){
            get[2] = 10;
        }
    }   else    {
        if(btn == 'btn-forward'){
            get[2] = parseInt(get[2]) + 10;
            if(get[2] > btn_round){
                get[2] = btn_round
            }
        }   else    {
            get[2] = parseInt(get[2]) - 10;
                if(get[2] < btn_round){
                    get[2] = btn_round
                }
        }
    }
    makingUrlAndGo();
});