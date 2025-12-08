<?php
require_once './Model/datospersonales.php';

class DatospersonalesController {

    public function index() {
        // Acá puedes implementar una lista si lo deseas
        require './Views/datospersonales/index.php';
    }

    public function crear() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Procesar la foto
            $fotoNombre = null;
            if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
                $tmp_name = $_FILES['foto']['tmp_name'];
                $originalName = basename($_FILES['foto']['name']);
                $uploadDir = __DIR__ . '/../uploads/'; // Carpeta donde guardar las fotos (debes crearla con permisos adecuados)
                
                // Generar un nombre único para evitar colisiones
                $fotoNombre = uniqid() . "_" . $originalName;
                $destino = $uploadDir . $fotoNombre;
                
                if (!move_uploaded_file($tmp_name, $destino)) {
                    // Error al mover el archivo
                    die("Error al subir la foto");
                }
            }

            // Crear objeto con los datos POST + nombre de la foto
            $datos = $_POST;
            $datos['foto'] = $fotoNombre; // Aquí guardas el nombre/URL de la foto en la base

            $persona = new Datospersonales($datos);
            $persona->guardar();

            header('Location: index.php?controller=datospersonales&action=index');
            exit;
        } else {
            require './Views/datospersonales/crear.php';
        }
    }


    public function editar($nro_documento) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $personaExistente = Datospersonales::buscarPorDocumento($nro_documento);
            $fotoVieja = $personaExistente->getFoto();

            $fotoNombre = $fotoVieja;

            $uploadDir = __DIR__ . '/../uploads/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }

            if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
                $tmp_name = $_FILES['foto']['tmp_name'];
                $originalName = basename($_FILES['foto']['name']);
                $fotoNombre = uniqid() . "_" . $originalName;
                $destino = $uploadDir . $fotoNombre;

                if (!move_uploaded_file($tmp_name, $destino)) {
                    die("Error al subir la foto");
                }

                // Borrar la foto vieja si existe
                if ($fotoVieja && file_exists($uploadDir . $fotoVieja)) {
                    unlink($uploadDir . $fotoVieja);
                }
            }

            $datos = $_POST;
            $datos['foto'] = $fotoNombre;

            $persona = new Datospersonales($datos);
            $persona->actualizar();

            header('Location: index.php?controller=datospersonales&action=perfil');
            exit;

        } else {
            $persona = Datospersonales::buscarPorDocumento($nro_documento);
            require './Views/datospersonales/editar.php';
        }
    }


    public function ver() {
        $personas = Datospersonales::buscarTodos();

        if (!$personas) {
            die("No hay personas registradas.");
        }


        require './Views/datospersonales/ver.php';
    }

    public function perfil() {
        // Verificar que hay sesión activa y es usuario
        if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'usuario') {
            header('Location: index.php?controller=login&action=index');
            exit;
        }

        $nro_documento = $_SESSION['usuario'];
        
        // Obtener datos personales
        $datosPersonales = Datospersonales::buscarPorDocumento($nro_documento);
        
        // Obtener educación
        require_once './Model/educacion.php';
        $educaciones = Educacion::buscarPorUsuario($nro_documento);
        
        // Obtener experiencia
        $experiencias = [];
        if (file_exists('./Model/experiencia.php')) {
            require_once './Model/experiencia.php';
            $experiencias = Experiencia::buscarPorUsuario($nro_documento);
        }
        
        // Obtener portafolio
        $proyectos = [];
        if (file_exists('./Model/portafolio.php')) {
            require_once './Model/portafolio.php';
            $proyectos = Portafolio::buscarPorUsuario($nro_documento);
        }
        
        require './Views/datospersonales/perfil.php';
    }

    public function generarPDF() {
        // Verificar que hay sesión activa y es usuario
        if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'usuario') {
            header('Location: index.php?controller=login&action=index');
            exit;
        }

        // Incluir autoload de Composer para mPDF
        require_once __DIR__ . '/../vendor/autoload.php';

        $nro_documento = $_SESSION['usuario'];
        
        // Obtener datos personales
        $datosPersonales = Datospersonales::buscarPorDocumento($nro_documento);
        
        if (!$datosPersonales) {
            die("No se encontraron datos personales");
        }
        
        // Obtener educación
        require_once './Model/educacion.php';
        $educaciones = Educacion::buscarPorUsuario($nro_documento);
        
        // Obtener experiencia
        $experiencias = [];
        if (file_exists('./Model/experiencia.php')) {
            require_once './Model/experiencia.php';
            $experiencias = Experiencia::buscarPorUsuario($nro_documento);
        }
        
        // Obtener portafolio
        $portafolio = [];
        if (file_exists('./Model/portafolio.php')) {
            require_once './Model/portafolio.php';
            $portafolio = Portafolio::buscarPorUsuario($nro_documento);
        }
        
        // Preparar variables para la plantilla
        $nombreCompleto = $datosPersonales->getNombres() . ' ' . $datosPersonales->getApellidos();
        $tipoDocumento = $datosPersonales->getTipo_documento();
        $nroDocumento = $datosPersonales->getNro_documento();
        $correo = $datosPersonales->getCorreo_electronico();
        $telefono = $datosPersonales->getTelefono();
        $direccion = $datosPersonales->getDireccion_residencia();
        $fecha_nacimiento = $datosPersonales->getFecha_nacimiento();
        $sexo = $datosPersonales->getSexo();
        
        // Foto (agregar ruta completa si existe)
        $foto = null;
        if ($datosPersonales->getFoto()) {
            $fotoPath = __DIR__ . '/../uploads/' . $datosPersonales->getFoto();
            if (file_exists($fotoPath)) {
                $foto = $fotoPath;
            }
        }
        
        // Generar HTML usando la plantilla
        ob_start();
        include __DIR__ . '/../Views/templates/cv_template.php';
        $html = ob_get_clean();
        
        // Configurar mPDF
        try {
            $mpdf = new \Mpdf\Mpdf([
                'mode' => 'utf-8',
                'format' => 'A4',
                'margin_left' => 20,
                'margin_right' => 20,
                'margin_top' => 20,
                'margin_bottom' => 20,
                'margin_header' => 0,
                'margin_footer' => 0
            ]);
            
            // Escribir el HTML
            $mpdf->WriteHTML($html);
            
            // Nombre del archivo
            $nombreArchivo = 'CV_' . str_replace(' ', '_', $nombreCompleto) . '.pdf';
            
            // Enviar al navegador para descarga
            $mpdf->Output($nombreArchivo, 'D'); // 'D' = Download
            
        } catch (\Mpdf\MpdfException $e) {
            echo "Error al generar el PDF: " . $e->getMessage();
        }
    }

    public function eliminar($nro_documento) {
        Datospersonales::eliminar($nro_documento);
        header('Location: index.php?controller=datospersonales&action=ver');
    }

    public function error() {
        echo "<h1>La página que buscas no existe</h1>";
    }
}
