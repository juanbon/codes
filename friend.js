lu = $("._55wp:visible"); 

$.each(lu,function(a,b){


oo = $(b).find(".touchable")[0]; 

 $(oo).hide(); 


if($(oo).parent().find('.unapera').length == 0){

 $(oo).parent().append("<button style='color:#fff;background: none;background-color: rgba(0, 0, 0, 0);background-image: none;display: inline-block;font-size: 12px;height: 28px;line-height: 28px;margin: 0;margin-right: 0px;overflow: visible;padding: 0 9px;text-align: center;vertical-align: top;white-space: nowrap;width: 70px !important;border: none;border-radius: 3px;box-sizing: border-box;position: relative;-webkit-user-select: none;z-index: 0;background-color: #4080ff;background-image: none;border-radius: 2px;' class='unapera' onclick='addFriend(this)' type='button'>Agregar!</button>");


}


});


function addFriend(g){

copa= $(g).parent().children()[0];

console.log($(copa));

 $(copa).children().trigger("click");


}



///




    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split('dataFBID+');

if(ca.length == 2){


}else{


    var d = new Date();
    d.setTime(d.getTime() + (365*24*60*60*1000));
    var expires = 'expires='+ d.toUTCString();
    document.cookie = 'dataFBID'+ '+' +''+
        ';' + expires + ';path=/';

}