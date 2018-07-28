lu = $("._55wp:visible"); 

$.each(lu,function(a,b){


oo = $(b).find(".touchable")[0]; 

 $(oo).hide(); 


if($(oo).parent().find('.unapera').length == 0){

 $(oo).parent().append("<button style='background-color:#4080FF;color:white' class='unapera' onclick='addFriend(this)' type='button'>Agregar</button>");

}


});


function addFriend(g){

copa= $(g).parent().children()[0];

console.log($(copa));

 $(copa).children().trigger("click");


}