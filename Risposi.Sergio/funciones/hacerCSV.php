<?php
/*exportData.php

En el fichero exportData.php, realizaremos las siguientes tareas:

Extraer la información de la base de datos
Crear el puntero al fichero con la función fopen()
Definir las columnas de la cabecera y ponerlas dentro del fichero CSV
Pintar cada uno de los registros de la tabla members en líneas separadas de nuestro CSV
Establecer el Content-Type y el Content-Disposition para forzar al navegador a descargar el fichero en lugar de mostrarlo.
*/


//include database configuration file
include 'AccesoDatos.php';

//get records from database
$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
$consulta =$objetoAccesoDato->RetornarConsulta("SELECT * FROM usuario");
$consulta->execute();			
$datos= $consulta->fetchAll(PDO::FETCH_ASSOC);


$info = array(); //los datos se guardaran en este arreglo
foreach ($datos as $usuario) {
    $info[]=$usuario;
}

//($result = $datos)
/*{
	$info[] = $result; //guardo cada resultado en este arreglo
}*/
 $file = "archivo_exportado.csv"; //le doy un nombre al archivo
    file_put_contents($file, "id,nombre,perfil,estado".PHP_EOL); //creamos el archivo
    for($i = 0; $i < count($info); $i++)
    {
        file_put_contents($file, implode(";", $info[$i]), FILE_APPEND); //escribo en el archivo separando el arreglo con comas
        file_put_contents($file, PHP_EOL, FILE_APPEND); //agrego un salto de linea
    }

if (file_exists($file)) { //verifico que el archivo haya sido creado
			header('Content-Description: File Transfer');
			header('Content-Type: application/octet-stream');
			header('Content-Disposition: attachment; filename='.basename($file));
			header('Content-Transfer-Encoding: binary');
			header('Expires: 0');
			header('Cache-Control: must-revalidate');
			header('Pragma: public');
			header('Content-Length: ' . filesize($file));
			ob_clean();
			flush();
			readfile($file);		


			header("Location: ../paginas/listarUsuario.php?exitoCSV=exitoCSV");

			exit();

	} else
	{
		header("Location: ../paginas/listarUsuario.php?exitoCSV=errorCSV");

			exit();//en caso no se haya creado el archivo, muestro un mensaje
	//		echo "Hubo un error al momento de crear el archivo, verifique los permisos de las carpetas del servidor.";
	}
	






























/*
if($consulta->execute() > 0){
    $delimiter = ",";
    $filename = "usuarios" . date('Y-m-d') . ".csv";
    
    //create a file pointer
    $f = fopen('php://memory', 'w');
    
    //set column headers
    $fields = array('id', 'Nombre', 'perfil', 'estado');
    fputcsv($f, $fields, $delimiter);
    //output each row of the data, format line as csv and write to file pointer
    while($row = $datos){
        $status = ($row['status'] == '1')?'Active':'Inactive';
        $lineData = array($row['id'], $row['nombre'], $row['perfil'], $row['estado'], $status);
        fputcsv($f, $lineData, $delimiter);
    }    
    //move back to beginning of file
    fseek($f, 0);    
    //set headers to download file rather than displayed
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '";');    
    //output all remaining data on a file pointer
    fpassthru($f);
}
exit();
*/
?>