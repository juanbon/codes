da= $(".uiList")[4]; 

 bloqueados = [];

 $.each($(da).children(),function(a,b){

 rr= $(b).find("input")[2];

 bloqueados.push(parseInt($(rr).val()));




 }); 



mur=0;
gg="";

$.each(abloquear,function(r,t){

if(bloqueados.includes(t)){

//  console.log(t);

}else{

// console.log("no esta "+t);

mur++;

gg +=" update blocked set status=0 where fb_id='"+t+"'; ";

}

});


gg

// mur;