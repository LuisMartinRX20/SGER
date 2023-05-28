<?php
require 'conexion.php';
    // Obtener los valores del formulario de alumno
    $nombreAlumno = $_POST["nombre"];
    $apellidoPaternoAlumno = $_POST["apellido_paterno"];
    $apellidoMaternoAlumno = $_POST["apellido_materno"];
    $id = $_POST["numero_control"];
    $grupoAlumno = $_POST["grupo"];
    $gradoAlumno = $_POST["grado"];
    $direccionAlumno = $_POST["direccion_al"];
    $correoAlumno = $_POST["correo"];
    $fechaNacimientoAlumno = $_POST["fecha_nacimiento"];
    $fechaRegistroAlumno = $_POST["fecha_registro"];
    $contrasenaAlumno = $_POST["contraseña"];
    $estatusAlumno = $_POST["estatus"];
    $telefonoAl=$_POST["telefono_al"];
    $idObtenido=$_POST["padre"];

    
    // Obtener los valores del formulario de padre
    $nombrePadre = $_POST["nombre_padre"];
    $apellidoPaternoPadre = $_POST["apellido_paterno_padre"];
    $apellidoMaternoPadre = $_POST["apellido_materno_padre"];
    $idP = $_POST["curp_padre"];
    $telefonoPadre = $_POST["telefono_padre"];
    $domicilioPadre = $_POST["domicilio_padre"];
    $correoPadre = $_POST["correo_padre"];
    $fechaNacimientoPadre = $_POST["fecha_nacimiento_padre"];
    $fechaRecPadre = $_POST["fecha_rec_padre"];
    $contrasenaPadre = $_POST["contraseña_padre"];
    $estatusPadre = $_POST["estatus_padre"];



    $message = "";
    $class = "";
    include '../PHP/obtenerPadres.php';

    while ($row = $result->fetch_assoc()) {
        $padre = array(
            'id' => $row['padre_id'],
            'nombre' => $row['nombre_padre']
        );
        $padres[] = $padre;
    
        // Guardar el ID del padre en la variable $idObtenido
        if ($row['padre_id'] == $idObtenido) {
            $idObtenido = $row['padre_id'];
        }else{
            $idObtenido='';
        }
    }


    if($idObtenido!=''){
        $sqlAlumno = "INSERT INTO alumnos(alumno_id, nombre_alumno, apeP_alumno, apeM_alumno,edad, direccion,
         grupo, grado, telefono, correo
        , fecha_nac, fecha_registro, password
        , padre_id, estado)
        VALUES ( '$id','$nombreAlumno', '$apellidoPaternoAlumno', '$apellidoMaternoAlumno','', '$direccionAlumno',
                '$grupoAlumno', '$gradoAlumno', '$telefonoAl', '$correoAlumno', 
                '$fechaNacimientoAlumno', '$fechaRegistroAlumno', '$contrasenaAlumno', '$idObtenido', '$estatusAlumno')";
       // Realiza la consulta
        if ($conn->query($sqlAlumno) === TRUE) {
            ?>
            <script>
            document.addEventListener("DOMContentLoaded", function() {
            // Tu código SweetAlert aquí
            swal({
                title: "",
                text: "Se Registro un alumno con éxito",
                icon: "success",
                button: "Listo"
            }).then(function() {
                window.location.href = "../PHP/Adm_Alumnos.php";
            });
        });
            </script>
            <?php
        } else {
            ?>
            <script>
           document.addEventListener("DOMContentLoaded", function() {
            // Tu código SweetAlert aquí
            swal({
                title: "",
                text: "Hubo un problema al registrar Alumno",
                icon: "error",
                button: "Listo"
            }).then(function() {
                window.location.href = "../PHP/Adm_Alumnos.php";
            });
        });
            </script>
            <?php
        }
    }else{
        $sqlPadre = "INSERT INTO padres(padre_id, nombre_padre, ApeP_padre, ApeM_padre, edad, direccion,
        telefono, correo, fecha_nac, fecha_registro, estado, password)
        VALUES ('$idP', '$nombrePadre', '$apellidoPaternoPadre', '$apellidoMaternoPadre','', '$domicilioPadre',
        '$telefonoPadre','$correoPadre', '$fechaNacimientoPadre', '$fechaRecPadre', 
         '$estatusPadre','$contrasenaPadre')";

        if ($conn->query($sqlPadre) === TRUE) {
            ?>
            <script>
           document.addEventListener("DOMContentLoaded", function() {
            // Tu código SweetAlert aquí
            swal({
                title: "",
                text: "Se Registro un Padre con éxito",
                icon: "success",
                button: "Listo"
            }).then(function() {
                window.location.href = "../PHP/Adm_Alumnos.php";
            });
        });
            </script>
            <?php
        } else {
            ?>
            <script>
           document.addEventListener("DOMContentLoaded", function() {
            // Tu código SweetAlert aquí
            swal({
                title: "",
                text: "Hubo un problema al registrar un Padre",
                icon: "error",
                button: "Listo"
            }).then(function() {
                window.location.href = "../PHP/Adm_Alumnos.php";
            });
        });
            </script>
            <?php
        }
        
         $sqlAlumno = "INSERT INTO alumnos(alumno_id, nombre_alumno, apeP_alumno, apeM_alumno,edad, direccion,
         grupo, grado, telefono, correo
        , fecha_nac, fecha_registro, password
        , padre_id, estado)
        VALUES ( '$id','$nombreAlumno', '$apellidoPaternoAlumno', '$apellidoMaternoAlumno','', '$direccionAlumno',
                '$grupoAlumno', '$gradoAlumno', '$telefonoAl', '$correoAlumno', 
                '$fechaNacimientoAlumno', '$fechaRegistroAlumno', '$contrasenaAlumno', '$idP', '$estatusAlumno')";

        if ($conn->query($sqlAlumno) === TRUE) {
            ?>
            <script>
           document.addEventListener("DOMContentLoaded", function() {
            // Tu código SweetAlert aquí
            swal({
                title: "",
                text: "Se Registro un alumno con éxito",
                icon: "success",
                button: "Listo"
            }).then(function() {
                window.location.href = "../PHP/Adm_Alumnos.php";
            });
        });
            </script>
            <?php
        } else {
            ?>
            <script>
           document.addEventListener("DOMContentLoaded", function() {
            // Tu código SweetAlert aquí
            swal({
                title: "",
                text: "hubo un problema al registrar alumno",
                icon: "error",
                button: "Listo"
            }).then(function() {
                window.location.href = "../PHP/Adm_Alumnos.php";
            });
        });
            </script>
            <?php
        }
    }
    


?>
