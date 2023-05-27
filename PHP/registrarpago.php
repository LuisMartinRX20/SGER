<?php
require('conexion.php');
session_start();
$nik = mysqli_real_escape_string($con,(strip_tags($_GET["nik"],ENT_QUOTES)));
$consulta ="select * from ficha where id_ficha='$nik' ";
$query=mysqli_query($con,$consulta);
$row = mysqli_fetch_assoc($query);
$con->autocommit(false);
try{
    $con->query("UPDATE ficha SET estado_pago='1' where id_ficha='$nik'");
    $consultarpadre="select count(*) as contar from padre where nombre='$row[nombreT]' and apellidoP='$row[apellido_PT]' and apellidoM='$row[apellido_MT]' and fecha_nac='$row[fecha_nacT]'";
    $validarconsulta=mysqli_query($con,$consultarpadre);
    $arreglopadre=mysqli_fetch_array($validarconsulta);
    if($arreglopadre['contar']>0){
        $consultarpadre="select id_padre from padre where nombre='$row[nombreT]' and apellidoP='$row[apellido_PT]' and apellidoM='$row[apellido_MT]' and fecha_nac='$row[fecha_nacT]'";
        $validarconsulta=mysqli_query($con,$consultarpadre);
        $arreglo=mysqli_fetch_array($validarconsulta); 
        $con->query("INSERT INTO alumno(id_alumno,noControl,nombre,apellido_P,apellido_M,curp,fecha_nac,fecha_registro,estado_act,id_grupo,grado,id_padre) VALUES(NULL,null,'$row[nombreA]','$row[apellido_PA]','$row[apellido_MA]','$row[fecha_nacA]','$row[curpA]','$row[fecha_registro]','1',null,'1','$arreglo[id_padre]')");  
        $idAlumno="SELECT id_alumno FROM alumno where curp='$row[curpA]'";
        $consulta1=mysqli_query($con,$idAlumno);
        $array=mysqli_fetch_array($consulta1);
        $con-> query("UPDATE alumno SET noControl='$array[id_alumno]ALM' where id_alumno='$array[id_alumno]'");
        
    }
    else{
        $con->query("INSERT INTO padre(id_padre,nombre,apellidoP,apellidoM,calle,no,colonia,CP,fecha_nac,fecha_registro,estado_act,correo,telefono,password)  VALUES(NULL,'$row[nombreT]','$row[apellido_PT]','$row[apellido_MT]','$row[calle]','$row[num]','$row[colonia]','$row[CP]','$row[fecha_nacT]','$row[fecha_registro]','1','$row[correo]','$row[telefono]',null)");
        $consultarpadre="select count(*) as contar,id_padre from padre where nombre='$row[nombreT]' and apellidoP='$row[apellido_PT]' and apellidoM='$row[apellido_MT]' and fecha_nac='$row[fecha_nacT]'";
        $validarconsulta=mysqli_query($con,$consultarpadre);
        $arreglo=mysqli_fetch_array($validarconsulta); 
        $con->query("INSERT INTO alumno(id_alumno,noControl,nombre,apellido_P,apellido_M,curp,fecha_nac,fecha_registro,estado_act,id_grupo,grado,id_padre)  VALUES(NULL,null,'$row[nombreA]','$row[apellido_PA]','$row[apellido_MA]','$row[curpA]','$row[fecha_nacA]','$row[fecha_registro]','1',null,'1','$arreglo[id_padre]')");
        $con->query("UPDATE padre SET password='$arreglo[id_padre]$row[CP]' where id_padre='$arreglo[id_padre]'");  
        $idAlumno="SELECT id_alumno FROM alumno where curp='$row[curpA]'";
        $consulta1=mysqli_query($con,$idAlumno);
        $array=mysqli_fetch_array($consulta1);
        $con-> query("UPDATE alumno SET noControl='$array[id_alumno]ALM' where id_alumno='$array[id_alumno]'");
        
    }
    $con->COMMIT();
}catch(Exception $e){
    $con->rollback();
    echo 'Error, no se pudo guardar los datos';

}
        $consultaAlumno="SELECT noControl FROM alumno WHERE curp='$row[curpA]'";
        $validarconsultaA=mysqli_query($con,$consultaAlumno);
        $noControl=mysqli_fetch_array($validarconsultaA);
        $consultarpadre="select password from padre where nombre='$row[nombreT]' and apellidoP='$row[apellido_PT]' and apellidoM='$row[apellido_MT]' and fecha_nac='$row[fecha_nacT]'";
        $validarconsulta=mysqli_query($con,$consultarpadre);
        $arreglopadre=mysqli_fetch_array($validarconsulta); 
        echo $noControl['noControl'];
        echo '<br>';
        echo $arreglopadre['password'];

?>
