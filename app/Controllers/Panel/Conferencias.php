<?php
//Ubicación del controlador en la carpeta
namespace App\Controllers\Panel;

//Herede los elementos del controlador padre
use App\Controllers\BaseController;

class Conferencias extends BaseController{
     //Atributos
     private $session;
     private $permitido = TRUE;

     //Constructor
     public function __construct(){
         //Se intancia el Acceso helper
         helper('permisos_helper');

         //instancia de la sesion
         $this->session = session();

         //Verifica si el usuario logeado cuenta con los permiso de esta area
         if (comprobar_acceso(TAREA_CONFERENCIAS)) {
             $this->session->tarea_actual = TAREA_CONFERENCIAS;
         }//end if 
         else{
             $this->permitido = FALSE;
             $this->session->modulo_permitido = FALSE;
         }//end else
     }//end constructor

     //Generar y mandar a llamar la vista específica
     private function crear_vista($nombre_vista = '', $datos = array()) {
         $datos['menu'] = crear_menu_panel();
         return view($nombre_vista, $datos);
     }//end crear_vista
     
    private function cargar_datos(){
        $datos=array();
        $session = session();
        $session->tarea_actual = TAREA_CONFERENCIAS;
        //+++++++++++++++++++++++++++++++++++++++
        // DATOS FUNDAMENTALES PARA LA PLANTILLA
        //+++++++++++++++++++++++++++++++++++++++

        // ---------------VARIABLES DE SESSION------------
        $datos['nombre_usuario']=$this->session->nombre_usuario;
        //+++++++++++++++++++++++++++++++++++++++
        // DATOS FUNDAMENTALES PARA LA PLANTILLA
        //+++++++++++++++++++++++++++++++++++++++
        $datos['nombre_pagina']='Conferencias';
        $datos['tarea']='Conferencias';
        
        //Breadcrumb
        $breadcrumb = array(
            array(
                'tarea'=>'Conferencias',
                'href'=>'#'
            )
            );
        $datos['breadcrumb']=breadcrumb($datos['tarea'],$breadcrumb);
        //$datos['breadcrumb']=breadcrumb($datos['tarea'],$breadcrumb);
        

        //+++++++++++++++++++++++++++++++++++++++
        // DATOS PROCESADOS
        //+++++++++++++++++++++++++++++++++++++++
        $tabla_conferencia=new \App\Models\Tabla_conferencia;
        $datos['conferencia']=$tabla_conferencia->data_table_conferencia($session->id_usuario,ROL_ADMINISTRADOR['clave']);
        return $datos;
    }

    //Función principal
    public function index(){
        //Se verifica si la bandera es true
        if($this->permitido){
            return $this->crear_vista('panel/conferencias',$this->cargar_datos());            
        }
        else{
            return redirect()->to(route_to('login'));
        }
    }

        //FUNCIÓN PARA eliminar
        public function eliminar($id_conferencia = 0)  {
            //Modelo
            $tabla_conferencia = new \App\Models\Tabla_conferencia;

            if($tabla_conferencia->delete($id_conferencia) > 0){
                session()->setFlashdata('mensaje_alerta', 'El usuario ha sido eliminado exitosamente.');
            }//end if se actualiza el usuario
            else{
                mensaje("Hubo un error al eliminar este usuario. Intente nuevamente, por favor", ALERT_DANGER);
            }//end else se inserta el usuario
            
            // return redirect()->to(route_to('usuarios'));
            return $this->index();
        }

}