<?php
//Ubicación del controlador en la carpeta
namespace App\Controllers\Portal;

//Herede los elementos del controlador padre
use App\Controllers\BaseController;
use App\Models\Tabla_usuarios;

class Registro extends BaseController
{
    private $permitido = TRUE;

    //Generar y mandar a llamar la vista específica
    private function crear_vista($nombre_vista=''){
        return view($nombre_vista);
    }
    
    //Funcion principal
    public function index() {
        //Cargamos la intancia de sesion
        $session = session();

        //Comprobamos si el valor ha sido instanciado
        if(isset($session->sesion_iniciada)){

            if ($session->modulo_permitido == FALSE) {
                return redirect()->to(route_to('error_401'));
            }
            
            return redirect()->to(route_to('portal/iniciou'));
        }//end if
        else{
            return $this->crear_vista('portal/registro');            
        }//end else
    }//end index


    // Función para registrar un nuevo usuario
    public function registrar() {

    // Instancia del Modelo de usuarios
    $tabla_usuarios = new Tabla_usuarios();

    // Recuperar los datos del formulario
    $nombre = $this->request->getPost("nombre");
    $email = hash('sha256', $this->request->getPost('email'));
    $email_logeo = $this->request->getPost('email');
    $genero = $this->request->getPost("genero");

    // Verificar si el correo ya existe en la base de datos
    if ($tabla_usuarios->existe_usuario($email)) {
        session()->setFlashdata('mensaje_alerta', 'El correo ya existe. Por favor, ingresa uno nuevo.');
        return redirect()->to(route_to('registro')); // Redirige nuevamente al formulario de registro
    }

    // Preparar los datos para el nuevo usuario
    $usuario = [
        'nombre_usuario' => $nombre,
        'email_usuario' => $email,
        'genero' => $genero,
        'id_rol' => 20, // Establece el ID de rol 
    ];


    // Insertar el nuevo usuario en la base de datos
    if ($tabla_usuarios->insert($usuario)) {
      // Realiza la validación del usuario
        $usuario = $tabla_usuarios->validar_usuario($email);
        if ($usuario !== null) {
                // Inicia la sesión y establece la información del usuario en la sesión
                $session=session();
                $session->set("sesion_iniciada", TRUE);
                $session->set("id_usuario", $usuario->id_usuario);
                $session->set("nombre_usuario", $usuario->nombre_usuario);
                $session->set("genero",$usuario->genero);
                $session->set("email_usuario", $email_logeo);
                $session->set("rol_actual",$usuario->id_rol);
                $session->set("tarea_actual",TAREA_INICIO);



                if(isset($session->sesion_iniciada)){
                    session()->setFlashdata('mensaje_exito', '¡Registro exitoso!');
                // Define otros datos de usuario según tus necesidades
                            return redirect()->to(route_to('inicio'));
                        }
        }
    } else {           
            session()->setFlashdata('mensaje_error', 'Hubo un error. Intente nuevamente, por favor');
            return redirect()->to(route_to('registro')); // Redirige nuevamente al formulario de registro
    }
}
    
}