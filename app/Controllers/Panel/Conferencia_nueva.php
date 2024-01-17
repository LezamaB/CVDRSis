<?php
//Ubicación del controlador en la carpeta
namespace App\Controllers\Panel;

//Herede los elementos del controlador padre
use App\Controllers\BaseController;

class Conferencia_nueva extends BaseController{
    private $permitido = TRUE;
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
        $session->tarea_actual = TAREA_NUEVA_CONFERENCIA;

        // ------VARIABLES DE SESSION --------
        $datos['nombre_usuario'] =$session->usuario_completo;

        $datos['nombre_pagina']='Nueva conferencia';
        $datos['tarea']='Nueva conferencia';
        
        //Breadcrumb
        $breadcrumb = array(
            array(
                'tarea'=>'Conferencia',
                //manda a rutas específicas route_to
                'href'=>route_to('conferencias')
                //'href'=>''
            ),
            array(
                'tarea'=>'Nueva conferencia',
                'href'=>'#'
            )
            );
        $datos['breadcrumb']=breadcrumb($datos['tarea'],$breadcrumb);
        //$datos['breadcrumb']=breadcrumb($datos['tarea'],$breadcrumb);
        

        //+++++++++++++++++++++++++++++++++++++++
        // DATOS PROCESADOS
        //+++++++++++++++++++++++++++++++++++++++
        
        return $datos;
    }

//Función principal
public function index(){
    helper('permisos_helper');
    $this->session = session();
    //Verifica si el usuario logeado cuenta con los permiso de esta area
    if (comprobar_acceso(TAREA_NUEVA_CONFERENCIA)) {
        $this->session->tarea_actual = TAREA_NUEVA_CONFERENCIA;
    }//end if 
    else{
        $this->permitido = FALSE;
        $this->session->modulo_permitido = FALSE;
    }//end else
    if($this->permitido){
        return $this->crear_vista('panel/conferencia_nueva',$this->cargar_datos());
    }
    else{
        return redirect()->to(route_to('login'));
    }
}

// =====================================
        // Funcion agregar imagen
        // =====================================

        private function subir_archivo($path= NULL, $file = NULL){
            $file_name = $file->getRandomName();
            $file->move($path, $file_name);
            return $file_name;
        }//end subir_archivo


public function registrar(){
    //Instancia del Modelo
    $tabla_conferencia = new \App\Models\Tabla_conferencia;

    //Usuario que se desea editar
    $id_conferencia = $this->request->getPost("id_conferencia");

    //Se declara el arreglo para almacenar todo los datos
    $conferencias = array();
    $conferencias['nombre_conferencia'] = $this->request->getPost("nombre_conferencia");
    $conferencias['descripcion'] = $this->request->getPost("descripcion");
    $conferencias['fecha_conferencia'] = $this->request->getPost("fecha_conferencia");
    $conferencias['hora_conferencia'] = $this->request->getPost("hora_conferencia");

    
    //Verificamos si el usuario desea cambiar la foto
    if(!empty($this->request->getFile('foto_plantilla')) && $this->request->getFile('foto_plantilla')->getSize() > 0){
        $conferencias['plantilla_imagen'] = $this->subir_archivo(RECURSOS_IMAGENES_CERTIFICADO, $this->request->getFile('foto_plantilla'));
    }//end if existe imagen

    //Verificamos si existe un registro previo
    $encontro = $tabla_conferencia->existe_conferencia($conferencias['nombre_conferencia']);


    //Verificamos si el usuario ya existe
    if($encontro != FALSE){
        // mensaje("El nombre ".$conferencias['nombre_miraculous']." ya existe, por favor ingrese un nuevo miraculous", ALERT_WARNING, "¡Error al registrar!");
        return $this->index();
    }//end encontro TRUE
    else{
        if($tabla_conferencia->insert($conferencias) > 0){
            return redirect()->to(route_to('conferencias'));

            // mensaje("El miraculous ha sido registrado exitosamente.", ALERT_SUCCESS, "¡Registro exitoso!");
        }//end if inserta el usuario
        else{
            // mensaje("Hubo un error al registrar al usuario. Intente nuevamente, por favor", ALERT_DANGER, "¡Error al registrar!");
            return $this->index();
        }//end else inserta el usuario
    }//end else
}

}