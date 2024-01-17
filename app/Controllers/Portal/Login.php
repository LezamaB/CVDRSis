<?php
//Ubicación del controlador en la carpeta
namespace App\Controllers\Portal;

//Herede los elementos del controlador padre
use App\Controllers\BaseController;

class Login extends BaseController
{
    //Genrar y mandar a llamar la vista específica
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
            }else{
            
            return redirect()->to(route_to('portal/iniciou'));}
        }//end if
        else{
            return $this->crear_vista('portal/login');            
        }//end else
    }//end index


    //función validar
    public function validar()
    //debugeando
    {
        // dd('Voy a validar tu información para acceder al Dashboard');
        $email=$this->request->getPost("email");
        #return $this->crear_vista('usuario/acceso');

        //CARGAR UN MODELO
        $tabla_usuarios=new \App\Models\Tabla_usuarios;
        $usuario = $tabla_usuarios->validar_usuario(hash("sha256",$email));
        // dd($usuario);
        if($usuario != NULL){

                //Creación de la variable de session.
                $session=session();
                $session->set("sesion_iniciada",TRUE);
                $session->set("id_usuario",$usuario->id_usuario);
                $session->set("nombre_usuario",$usuario->nombre_usuario);
                $session->set("sexo_usuario",$usuario->genero);
                $session->set("email_usuario", $email);
                $session->set("rol_actual",$usuario->id_rol);

                if($session->sesion_iniciada==TRUE){

                if($usuario->id_rol==10){
                    $session->set("tarea_actual",TAREA_DASHBOARD);
                    return redirect()->to(route_to('dashboard'));

                }
                elseif($usuario->id_rol==20){
                    $session->set("tarea_actual",TAREA_INICIO);
                    return redirect()->to(route_to('inicio'));

                }}
                    }//end if
                    else{
                        session()->setFlashdata('mensaje_error', 'El correo no se encuntra registrado. Cree una cuenta');
                        return redirect()->to(route_to('login'));
                    }//end 

    }
}
