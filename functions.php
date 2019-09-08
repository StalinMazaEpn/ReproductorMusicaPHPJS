<?php
// función de gestión de errores
function miGestorDeErrores($errno, $errstr, $errfile, $errline)
{
    if (!(error_reporting() & $errno)) {
        // Este código de error no está incluido en error_reporting
        return;
    }

    switch ($errno) {
    case E_USER_ERROR:
        echo "<strong>Mi ERROR</b> [$errno] $errstr<br />\n";
        echo "  Error fatal en la línea $errline en el archivo $errfile";
        echo ", PHP " . PHP_VERSION . " (" . PHP_OS . ")<br />\n";
        echo "Abortando...<br />\n";
        exit(1);
        break;

    case E_USER_WARNING:
        // echo "<strong>Mi WARNING</b> [$errno] $errstr<br />\n";
        break;

    case E_USER_NOTICE:
        // echo "<strong>Mi NOTICE</b> [$errno] $errstr<br />\n";
        break;

    default:
        echo "Tipo de error desconocido: [$errno] $errstr<br />\n";
        break;
    }

    /* No ejecutar el gestor de errores interno de PHP */
    return true;
}

function flashMessage($session_message){
   
    $_SESSION['message_info'] = $session_message;
    return true;
}

function deleteFlashMessage($session_name){
    
    if(isset($_SESSION[$session_name])){
        $_SESSION[$session_name] = null;    
        unset($_SESSION[$session_name]);
    }

    return true;

}

function deleteFile($url){
    // entonces, comprobamos que existe el archivo antes de borrarlo?
    $url_actual = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    $posicion = strpos($url_actual, "?");
    // echo $url_actual;
    $url_archivo_limpia = substr($url_actual, 0, $posicion);
    // echo $url_archivo_limpia;
    // die();
    if (is_file($url))
    { // nota que no tiene apostrofes
        $file_delete = unlink($url);
    if($file_delete){
        $message = [
            'code' => 'success',
            "msg" => 'Archivo eliminado correctamente'
        ];
        
    }else{
        $message = [
            'code' => 'error',
            "msg" => 'Archivo no se pudo eliminar correctamente'
        ];
    }
    }
    else 
    {
        $message = [
            'code' => 'error',
            "msg" => 'El Archivo no existe'
        ];
    } 
        
    

    flashMessage($message);

    echo "<script type='text/javascript'>
            window.location='$url_archivo_limpia';
            </script>";
    
    
    // header("Refresh:0");
 }

 function editFile($file_url_old,$file_url_new){
    rename($file_url_old, $file_url_new);
 }
