<?php

	/* Conexion con base de datos. */
  $conexion = new PDO('mysql:host=sql101.eshost.com.ar;dbname=eshos_22364449_listas;charset=UTF8', 'eshos_22364449', 'cocom1ke');
//   $conexion = new PDO('mysql:host=localhost;dbname=listas;charset=UTF8', 'root', '');

	$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
	$matriz = array(); // En esta matriz almacenaremos los resultados.

?>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>

<script>

$(document).ready(function(){

$(".migo").change(function() {

	if($(".migo").val()!=""){

		window.location.href = "?type=ver_migos&myFb="+$(".migo").val();

	}

});

});
</script>	

<?php


if(!empty($_GET)){



if(!empty($_GET['type_action'])){

	if($_GET['type_action']=='guardar_paja'){


	$consulta2 = " select fb_id from friends where my_user=".$_GET['my_fbid'];

	foreach ($conexion->query($consulta2, PDO::FETCH_ASSOC) as $item2) $ffri[] = $item2['fb_id'];


 	$ral = json_decode($_GET['data_json']);


	foreach ($ral as $key => $value) {


			if (!in_array((string)$value[2], $ffri)) {

			$consulta = "insert into friends (fb_id,friends,my_user,status,name) values ('".$value[2]."','".trim($value[0])."','".$_GET['my_fbid']."',0,'".$value[1]."')";


			$conexion->query($consulta, PDO::FETCH_ASSOC);

		}

}

	echo json_encode(array("status"=>"ok"));

	exit;

 // header("Location: ?type=ver_listas");

}

}


}







if(!empty($_POST)){


if($_POST['type_action']=='register_lugar'){


	$consulta = "insert into lugar (name) values ('".$_POST['createlugar']."')";
	$conexion->query($consulta, PDO::FETCH_ASSOC);

 header("Location: ?type=ver_listas");

}


$f = explode(" ",$_POST['listas']);


//   hacer trim


foreach ($f as $key => $value) {

	$parts = parse_url(trim($value));
	parse_str($parts['query'], $query);


	if($query['ft_ent_identifier']!='events'){

		$consulta = "insert into lista (name,id_account,status,id_lugar) values ('".trim($value)."','".$_POST['account']."','0','".$_POST['lugar']."')";

		$conexion->query($consulta, PDO::FETCH_ASSOC);

	}

}


//  redirect  exit; 



}





	if(!empty($_GET['eject'])){


		    

				$consulta = "update blocked set status=1 where fb_id=".$_GET['eject'];

				$conexion->query($consulta, PDO::FETCH_ASSOC);




				header('Location: https://m.facebook.com/privacy/touch/block/confirm/?bid='.$_GET['eject'].'&ret_cancel&source=profile&refid=17');



	}

?>

<a href="?type=listado"><button> Cargar Listas</button></a>
<a  href="?type=create_lugar"><button> Crear Lugar</button></a>
<a href="?type=ver_listas"><button> Ver listado</button></a>
</br>
<a href="?type=ver_migos"><button style="margin-top:  7px;"> Ver Amigos</button></a>
</br>
</br>
</br>

<?php


if(!empty($_GET)){


if((!empty($_GET['type']))AND($_GET['type']="ver_migos")){ 


	$mat = array("1"=>"Juann Manuel","2"=>"Juan Manuell","3"=>"Juan Bouni","5"=>"Ian Manuel","6"=>"Juan Bon");

	echo "Seleccionar : <br>";

//	$myFb = (!empty($_GET['myFb']))?$_GET['myFb']:3;

	$mfb = (!empty($_GET['myFb']))?$_GET['myFb']:3;


	echo "<select class='migo'  name='migo'>";
        foreach ($mat as $key77 => $value77) {

        	$sele = ($mfb==$key77)?'selected':'';

          echo '<option '.$sele.' value="'.$key77.'">'.$value77.'</option>';
        }
	echo "</select>";

echo "<br><br>";





	// cast(registration_no as unsigned)  convert(`proc`, decimal)

	$cuentas = "SELECT * FROM friends f where f.my_user=".$mfb." AND f.status=0 order by convert(f.friends,decimal) DESC";

	foreach ($conexion->query($cuentas, PDO::FETCH_ASSOC) as $item) $resultados[] = $item;


// var_dump($resultados,$cuentas);  exit; 


if(!empty($resultados)){

	
echo "Cantidad : ".count($resultados)."</br></br>";

?>


<table><thead align="left" style="display: table-header-group"><tr><th>
    <table><tr> <td>id</td>
                <td>Nombre</td>
                <td>En Comun</td>
    </tr></table>
</th></tr></thead>
<tbody>
<?php foreach ($resultados as $rows){?>
    <tr class="item_row">
   
            <td><?php echo $rows['id']; ?></td>

<?php

$vv =  (is_numeric($rows['fb_id']))?"/profile.php?id=".$rows['fb_id']:$rows['fb_id']; 

?>


            <td><a target="_blank" href="https://m.facebook.com<?php echo $vv; ?>"><?php echo $rows['name']; ?></a></td>
         <td><?php echo $rows['friends']; ?></td>
         
    </tr>
<?php } ?>
</tbody>
</table>

<?php


}

exit;

}









if(!empty($_GET['visitpage'])){



/*

		$consulta = "update lista set status=1 where id=".$_GET['visitpage'];

		$conexion->query($consulta, PDO::FETCH_ASSOC);

*/




		$cuentas = "SELECT * FROM lista where id=".$_GET['visitpage'];

	    foreach ($conexion->query($cuentas, PDO::FETCH_ASSOC) as $item) $matriz[] = $item;


		header('Location: '.$matriz[0]['name']);

}




if($_GET['type']=="create_lugar"){

?>
<form action="?type=create_lugar" name="registro_lugar" method="POST">

</br>
Lugar: 
<input type="text" name="createlugar" value="" >
<input type="hidden" name="type_action" value="register_lugar" >
</br>
</br>
<input type="submit" name="Enviar" value="Registrar">
</form>


<?php
exit;

 	}


if($_GET['type']=="ver_listas"){



?>



<form action="" method="POST">

</br>
Usuario: 
	<?php

	$cuentas = "SELECT * FROM account";

	foreach ($conexion->query($cuentas, PDO::FETCH_ASSOC) as $item) $matriz[] = $item;

// echo "<pre>"; var_dump($matriz); echo "</pre>";exit; 

	echo "<select class='cuenta'  name='account'>";
        foreach ($matriz as $key => $value) {

        	$sele = ($_GET['cuenta']==$value['id'])?'selected':'';


          echo '<option '.$sele.' value="'.$value['id'].'">'.$value['account'].'</option>';
        }
	echo "</select>";

?>
</br>
</br>
Lugar: 
	<?php

	$cuentas2 = "SELECT * FROM lugar";

	foreach ($conexion->query($cuentas2, PDO::FETCH_ASSOC) as $item) $matriz2[] = $item;

// echo "<pre>"; var_dump($matriz); echo "</pre>";exit; 

	echo "<select class='lugar' name='lugar'>";
	echo  "<option value='' selected >Seleccionar</option>";
        foreach ($matriz2 as $key2 => $value2) {




        	$sele = ($_GET['lugar']==$value2['id'])?'selected':'';


          echo '<option '.$sele.' value="'.$value2['id'].'">'.$value2['name'].'</option>';
        }
	echo "</select>";

?>
</br>
</br>
</form>


<?php














if((!empty($_GET['cuenta']))AND($_GET['lugar'])){ 


	$cuentas = "SELECT * FROM lista where id_account=".$_GET['cuenta']." AND id_lugar=".$_GET['lugar']." AND status=0";

	foreach ($conexion->query($cuentas, PDO::FETCH_ASSOC) as $item) $resultados[] = $item;


}



if(!empty($resultados)){

	
echo "cantidad : ".count($resultados)."</br>";

?>


<table><thead align="left" style="display: table-header-group"><tr><th>
    <table><tr> <td>id</td>
                <td>Evento</td>
    </tr></table>
</th></tr></thead>
<tbody>
<?php foreach ($resultados as $rows){?>
    <tr class="item_row">
   
            <td><?php echo $rows['id']; ?></td>
            <td><a target="_blank" href="?visitpage=<?php echo $rows['id']; ?>">Evento <?php echo $rows['id']; ?></td>
         
    </tr>
<?php } ?>
</tbody>
</table>

<?php






}


	exit;

}





}



 
	/* Se defina la consulta SQL */
	// $consulta = "SELECT * FROM blocked where status=0 limit 10";


	echo "Ingresar Listas de eventos: </br></br>";

	?>
<form action="" method="POST">
 <textarea rows="8" cols="35" name="listas">

</textarea> 
</br>
Usuario: 
	<?php

	$cuentas = "SELECT * FROM account";

	foreach ($conexion->query($cuentas, PDO::FETCH_ASSOC) as $item) $matriz[] = $item;

// echo "<pre>"; var_dump($matriz); echo "</pre>";exit; 

	echo "<select name='account'>";
        foreach ($matriz as $key => $value) {
          echo '<option value="'.$value['id'].'">'.$value['account'].'</option>';
        }
	echo "</select>";

?>
</br>
</br>
Lugar: 
	<?php

	$cuentas2 = "SELECT * FROM lugar";

	foreach ($conexion->query($cuentas2, PDO::FETCH_ASSOC) as $item) $matriz2[] = $item;

// echo "<pre>"; var_dump($matriz); echo "</pre>";exit; 

	echo "<select name='lugar'>";
        foreach ($matriz2 as $key2 => $value2) {
          echo '<option value="'.$value2['id'].'">'.$value2['name'].'</option>';
        }
	echo "</select>";

?>
<input type="hidden" name="type_action" value="register_lista" name="action">
</br>
</br>
<input type="submit" name="Enviar" value="Registrar">
</form>

<script>
$(document).ready(function(){

$(".lugar").change(function() {

	if($(".lugar").val()!=""){

		window.location.href = "?type=ver_listas&cuenta="+$(".cuenta").val()+"&lugar="+$(".lugar").val();

	}

});


});
</script>	