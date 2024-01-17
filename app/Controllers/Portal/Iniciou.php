<?php
//Ubicación del controlador en la carpeta
namespace App\Controllers\Portal;

//Herede los elementos del controlador padre
use App\Controllers\BaseController;

class Iniciou extends BaseController
{
    private $session;
    private $permitido = TRUE;

    //Constructor
    public function __construct(){
        //Se intancia el Acceso helper
        helper('permisos_helper');

        //instancia de la sesion
        $this->session = session();

        // //Verifica si el usuario logeado cuenta con los permiso de esta area
        if (comprobar_acceso(TAREA_INICIO)) {
            $this->session->tarea_actual = TAREA_INICIO;
        }//end if 
        else{
            $this->permitido = FALSE;
            $this->session->modulo_permitido = FALSE;
        }//end else
    }//end constructor

    //Generar y mandar a llamar la vista específica
    private function crear_vista($nombre_vista='',$datos = array()){
        return view($nombre_vista,$datos);
    }
    
        private function cargar_datos(){
            $datos = array();
            // =====================================
            // Datos fundamentales para la plantilla
            // =====================================
            $session = session();
            // ------VARIABLES DE SESSION --------
            $datos['nombre_usuario'] = $session->nombre_usuario;
            $datos['email_usuario'] = $session->email_usuario;
            $datos['id_rol'] = $session->id_rol;

            $arreglo = array();

            // =====================================
            // Datos prepocesados
            // =====================================
            $tabla_usuarios = new \App\Models\Tabla_usuarios;
            $usuario = $tabla_usuarios->obtener_usuario($session->id_usuario);
            $datos["conferencias"] = $tabla_usuarios->consulta_conferencia($session->id_usuario);
            return $datos;
        }//end cargar_datos

        public function obtenerConferenciasActuales()
        {
        // Intanciar el modelo
        $tabla_conferencia = new \App\Models\Tabla_conferencia();
        $conferencias=array();
        // Obtener datos de la conferencia actual desde el modelo
        $conferencias['conferencias'] = $tabla_conferencia->conferencias_actuales();

        // Establecer el encabezado de respuesta para indicar que es JSON
        $this->response->setHeader('Content-Type', 'application/json');

        // Convertir los datos a JSON y devolver la respuesta
        return $this->response->setJSON($conferencias['conferencias']);
        }
        //Funcion principal
        // public function index() {
        //     // if($session==TRUE){
        //     //     if(0==0){}
        //     //     else{}}
        //     return $this->crear_vista('portal/iniciou',$this->cargar_datos());   
        //                 //Función principal
            public function index() {
                //Se verifica si la bandera es true
                if($this->permitido){
                    return $this->crear_vista('portal/iniciou',$this->cargar_datos());            
                }//end else
                else{
                    // mensaje("No tienes permiso para acceder a este módulo, contacte al administrador", ALERT_WARNING);
                    return redirect()->to(route_to('login'));
                }//end else
            }//end index
            
                  
        // }//end 

        public function registrar_conferencia_us(){
            // Solicitud POST
            $data = $this->request->getJSON();
            // Accede a la opción seleccionada
            $opcion = $data->opcionSeleccionada;
            // var_dump($opcion);
            $session = session();
            $tabla_oyent_conferen = new \App\Models\Tabla_oyent_conferen;
            $new_conferencia_tomada=array();
            $new_conferencia_tomada['id_usuario']=$session->id_usuario;
            $new_conferencia_tomada['id_conferencia']=$opcion;

            // return redirect()->to(route_to('iniciou'));
            if($tabla_oyent_conferen->insert($new_conferencia_tomada) > 0){
            }//end if inserta el usuario
            else{
            }//end else inserta el usuario
            return redirect()->to(current_url());

        }
    

}