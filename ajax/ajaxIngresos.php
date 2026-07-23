<?php
require_once "../modelos/mdlIngreso.php";
require_once "../controladores/ctrlIngresos.php";
require_once __DIR__ . '/../vendor/autoload.php';
use Zxing\QrReader;
class ingresosAjax
{
    public $id_ingreso;

    public function traerDatosIngresos()
    {
        $parametros = False;
        $id = $this->id_ingreso;
        $respuesta = ControladorIngreso::ctrlCargarDatosIngresos($parametros, $id);
        echo json_encode($respuesta);
    }
    public function eliminarIngreso()
    {
        $id = $this->id_ingreso;
        $respuesta = ControladorIngreso::ctrlEliminarIngreso($id);
        echo json_encode($respuesta);
    }
}
if (isset($_POST["id_ingreso"])) {
    $objIngresosAjax = new ingresosAjax();
    $objIngresosAjax->id_ingreso = $_POST["id_ingreso"];
    switch ($_POST['operacion']) {
        case 'editar':
            $objIngresosAjax->traerDatosIngresos();
            break;
        case 'eliminar':
            $objIngresosAjax->eliminarIngreso();
            break;
    }
}
if (isset($_POST['operacion']) && $_POST['operacion'] === 'leerQR') {
    if (isset($_FILES['qr_file']) && $_FILES['qr_file']['error'] === UPLOAD_ERR_OK) {
        $tmpPath = $_FILES['qr_file']['tmp_name'];

        try {
            // Intento 1: Lectura directa de la imagen
            $qrcode = new QrReader($tmpPath);
            $textoQR = $qrcode->text();

            // Intento 2: Si falla, pre-procesamos la imagen con GD para mejorar nitidez
            if (empty($textoQR) && function_exists('imagecreatefromstring')) {
                $imgData = file_get_contents($tmpPath);
                $source = imagecreatefromstring($imgData);

                if ($source !== false) {
                    $width  = imagesx($source);
                    $height = imagesy($source);

                    // Escalar a un tamaño óptimo para el decodificador (máx 600px)
                    $maxSize = 600;
                    if ($width > $maxSize || $height > $maxSize) {
                        $newWidth  = $maxSize;
                        $newHeight = (int)($height * ($maxSize / $width));
                        
                        $virtualImage = imagecreatetruecolor($newWidth, $newHeight);
                        imagecopyresampled($virtualImage, $source, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
                        
                        // Guardar en un archivo temporal optimizado
                        $tempOptimized = sys_get_temp_dir() . '/qr_opt_' . time() . '.png';
                        imagepng($virtualImage, $tempOptimized);
                        imagedestroy($virtualImage);

                        // Probar nuevamente la lectura con la imagen optimizada
                        $qrcodeOpt = new QrReader($tempOptimized);
                        $textoQR   = $qrcodeOpt->text();

                        // Borrar archivo temporal optimizado
                        if (file_exists($tempOptimized)) {
                            unlink($tempOptimized);
                        }
                    }
                    imagedestroy($source);
                }
            }

            if (!empty($textoQR)) {
                echo json_encode(["status" => "success", "codigo" => trim($textoQR)]);
            } else {
                echo json_encode([
                    "status" => "error", 
                    "mensaje" => "No se pudo detectar el código QR. Intenta con una imagen más nítida o recortada."
                ]);
            }

        } catch (Exception $e) {
            echo json_encode(["status" => "error", "mensaje" => $e->getMessage()]);
        }
    } else {
        echo json_encode(["status" => "error", "mensaje" => "Error al subir la imagen."]);
    }
    exit();
}

