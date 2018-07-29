lu = $("._55wp:visible"); 

$.each(lu,function(a,b){


oo = $(b).find(".touchable")[0]; 

 $(oo).hide(); 


if($(oo).parent().find('.unapera').length == 0){

 $(oo).parent().append("<button class='unapera' onclick='addFriend(this)' type='button'>Agregar!</button>");


}


});


function addFriend(g){

copa= $(g).parent().children()[0];

console.log($(copa));

 $(copa).children().trigger("click");


}



///




decodedCookie = decodeURIComponent(document.cookie);
ca = decodedCookie.split('dataFBID+');


if(ca.length == 2){

valor = getcuky();

if(valor!= ""){

data = valor.split(",");
console.log("El valor es: "+valor);

}





}else{


//  Setear Cookie

vaciarcoky();

}

function getcuky(){


var decodedCookie = decodeURIComponent(document.cookie);
var ca = decodedCookie.split('dataFBID+');
var hh= ca[1];
var val = hh.split(";");

return val[0];

}


function vaciarcoky(){

setcoky("");

}


function setcoky(val){

    var d = new Date();
    d.setTime(d.getTime() + (365*24*60*60*1000));
    var expires = 'expires='+ d.toUTCString();
    document.cookie = 'dataFBID'+ '+' +val+
        ';' + expires + ';path=/';

}



//   Cancelar solicitud de amistad


fin=$("._58x3")[12];

$(fin).children().trigger("click");
ddddddddd

