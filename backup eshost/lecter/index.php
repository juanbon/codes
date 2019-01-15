<?php 


if(!empty($_POST)){


    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {


        $file = $_FILES["fileToUpload"];

        $info = pathinfo($_FILES['fileToUpload']['name']);
        $ext = $info['extension']; // get the extension of the file
        $newname = "newname.".$ext; 
        
        $target = 'uploads/'.$newname;
        move_uploaded_file( $_FILES['fileToUpload']['tmp_name'], $target);

        $fichero = file_get_contents("uploads/newname.sql", true);

        $re = '/\(\d+,\h*\'(\d+)\'/';
        preg_match_all($re, $fichero, $matches);
 

        $nuevo = array();

        foreach ($matches[1] as $key3 => $value3) {
            array_push($nuevo,(int)$value3);
        }


        echo "abloquear = ".json_encode($nuevo).";";
            
        exit; 
  

    }
    



?>

<div style="margin-top:10%;margin-left:5%">  Recibido  </div>


<?php

exit; 

}else{

    ?>

<!DOCTYPE html>
<html>
<body>

<form accept="aplication/sql" style="position: relative;margin-left: 30%;margin-top: 5%;" action="" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <div style="position:relative;margin-top:70px">
    <input type="submit" value="Upload Image" name="submit">
    </div>
</form>

</body>
</html>





<?php

}



?>