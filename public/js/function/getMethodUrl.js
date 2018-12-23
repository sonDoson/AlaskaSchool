//su dung cho phan trang

//Load Url
var get = [];
var get_name = [ 'search', 'soft', 'page']; //id url
//
var str = window.location.href;
var res = str.split("?");
var res_sub = res[1].split("&");

//
res_sub.forEach(subRes);
function subRes(val){
    val_sub = val.split("=");
    get[arraySearch(get_name, val_sub[0])] = val_sub[1];
}
//remake url and go to this url
function makingUrlAndGo(){
    url = '';
    get.forEach(goHref);
    url = url.substring(0, url.length -1);
    url = res[0] + "?" + url;
    window.location.href = url;
}
function goHref(item, index){
    url += get_name[index] + "=" + item + "&";
}

//Search in array and take key
function arraySearch(arr,val) {
    for (var i=0; i<arr.length; i++)
        if (arr[i] === val)                    
            return i;
    return false;
}

//function get request on url
function requestUrl(){
    var str = window.location.href;
    var res = str.split("?");
    return res[1];
}