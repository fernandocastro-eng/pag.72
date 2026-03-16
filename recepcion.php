<?php
// 1. Incluimos el archivo de conexión que hicimos antes
include("conexion.php");

// 2. Atrapamos los datos del formulario usando los 'name' del HTML
// Usamos $_POST porque es el método que definimos en el <form>
$nom = $_POST['nombres'];
$ape = $_POST['apellidos'];
$ema = $_POST['email'];
$gen = $_POST['genero'];

// 3. Especial: Como los intereses son varios (Checkboxes), vienen en un arreglo
// Usamos 'implode' para convertir esa lista en un solo texto separado por comas
$libros_interes = isset($_POST['libros']) ? implode(", ", $_POST['libros']) : "Ninguno";

// 4. Creamos la consulta SQL para insertar los datos
// ¡OJO! El orden de las columnas debe ser igual al de los valores
$sql = "INSERT INTO usuarios (nombres, apellidos, email, genero, intereses) 
        VALUES ('$nom', '$ape', '$ema', '$gen', '$libros_interes')";

// 5. Ejecutamos la consulta
$resultado = mysqli_query($conexion, $sql);

// 6. Verificamos si se guardó bien para avisar al usuario
if($resultado) {
    echo "<script>
            alert('¡Registro guardado con éxito en Ediciones Fares!');
            window.location.href='index.html';
          </script>";
} else {
    echo "Error al guardar: " . mysqli_error($conexion);
}

// 7. Cerramos la conexión (buena práctica)
mysqli_close($conexion);
?>