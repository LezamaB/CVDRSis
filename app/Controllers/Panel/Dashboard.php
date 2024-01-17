<?php
//Ubicación del controlador en la carpeta
//Intermediario entre la base de datos y la vista
namespace App\Controllers\Panel;

//Herede los elementos del controlador padre
use App\Controllers\BaseController;

class Dashboard extends BaseController{
    private $session;
    private $permitido = TRUE;

    //Constructor
    public function __construct(){
        //Se intancia el Acceso helper
        helper('permisos_helper');
        //instancia de la sesion
        $this->session = session();
        //Verifica si el usuario logeado cuenta con los permiso de esta area
        if (comprobar_acceso(TAREA_DASHBOARD)) {
            $this->session->tarea_actual = TAREA_DASHBOARD;
        }//end if 
        else{
            $this->permitido = FALSE;
            $this->session->modulo_permitido = FALSE;
        }//end else
    }//end constructor

    //Generar y mandar a llamar la vista específica
    private function crear_vista($nombre_vista='',$datos=array()){
        $datos['menu']=crear_menu_panel();
        //$datos['menu']='';
        return view($nombre_vista,$datos);
    }

    private function cargar_datos(){
        $datos=array();
        //+++++++++++++++++++++++++++++++++++++++
        // DATOS FUNDAMENTALES PARA LA PLANTILLA
        //+++++++++++++++++++++++++++++++++++++++
        $session = session();
        $session->tarea_actual = TAREA_DASHBOARD;

        // ---------------VARIABLES DE SESSION------------
        $datos['nombre_usuario'] = $this->session->nombre_usuario;
        $datos['nombre_pagina'] = 'Dashboard';
        $datos['tarea'] = 'Dashboard';
        
        //Breadcrumb
        $breadcrumb = array(
            array(
                'tarea'=>'Dashboard',
                'href'=>'#'
            )
            );
        $datos['breadcrumb']=breadcrumb($datos['tarea'],$breadcrumb);
        //+++++++++++++++++++++++++++++++++++++++
        // DATOS PROCESADOS
        //+++++++++++++++++++++++++++++++++++++++
        $tabla_usuarios = new \App\Models\Tabla_usuarios;
	    $tabla_conferencia = new \App\Models\Tabla_conferencia;

        $datos['contador']['usuarios'] = $tabla_usuarios->contar_user();
        $datos['contador']['conferencia'] = $tabla_conferencia->contar_conferencias();
        return $datos;
    }

    //Función principal
    public function index() {
        //Se verifica si la bandera es true
        if($this->permitido){
            return $this->crear_vista('panel/dashboard',$this->cargar_datos());            
        }//end else
        else{
            // mensaje("No tienes permiso para acceder a este módulo, contacte al administrador", ALERT_WARNING);
            return redirect()->to(route_to('login'));
        }//end else
    }//end index

}