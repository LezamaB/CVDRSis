<?php
//Ubicación del controlador en la carpeta
namespace App\Controllers\Panel;

//Herede los elementos del controlador padre
use App\Controllers\BaseController;

class Conferencia_detalles extends BaseController{
    private $permitido = TRUE;
    //Generar y mandar a llamar la vista específica
    private function crear_vista($nombre_vista='',$datos=array()){
        $datos['menu']=crear_menu_panel();
        //$datos['menu']='';
        return view($nombre_vista,$datos);
    }

    private function cargar_datos($info_conferencias = array()){
        $datos=array();
        //+++++++++++++++++++++++++++++++++++++++
        // DATOS FUNDAMENTALES PARA LA PLANTILLA
        //+++++++++++++++++++++++++++++++++++++++
        $session = session();
        $session->tarea_actual = TAREA_DETALLES_CONFERENCIA;

        $datos['nombre_pagina']='Detalles de la conferencia';
        $datos['tarea']='Detalles conferencia';

        // ------VARIABLES DE SESSION --------
        $datos['nombre_usuario'] = $session->nombre_usuario;
        
        $datos['nombre_pagina'] = 'Conferencia detalles';
        $datos['tarea'] = 'Conferencia detalles';
        
        //Breadcrumb
        $breadcrumb = array(
            array(
                'tarea'=>'Conferencias',
                //manda a rutas específicas route_to
                'href'=>route_to('conferencias')
                //'href'=>''
            ),
            array(
                'tarea'=>'Detalles de conferencia',
                'href'=>'#'
            )
            );
        $datos['breadcrumb']=breadcrumb($datos['tarea'],$breadcrumb);
        //$datos['breadcrumb']=breadcrumb($datos['tarea'],$breadcrumb);
        

        //+++++++++++++++++++++++++++++++++++++++
        // DATOS PROCESADOS
        //+++++++++++++++++++++++++++++++++++++++
        $datos['conferencias'] = $info_conferencias;
        return $datos;
    }

    //Función principal
    public function index($id_conferencia = 0) {
        helper('permisos_helper');
        $this->session = session();
        //Verifica si el usuario logeado cuenta con los permiso de esta area
        if (comprobar_acceso(TAREA_CONFERENCIAS)) {
            $this->session->tarea_actual = TAREA_CONFERENCIAS;
        }//end if 
        else{
            $this->permitido = FALSE;
            $this->session->modulo_permitido = FALSE;
        }//end else         
        //Instacia al modelo usuarios
        $tabla_conferencia = new \App\Models\Tabla_conferencia;
        $conferencias = $tabla_conferencia->obtener_conferencia($id_conferencia);
        if($this->permitido){
        //Verificamos si no esta vacio
        if(is_null($conferencias)){
            // mensaje('No se encuentra al miraculous propocionado.', ALERT_WARNING);
            return redirect()->to(route_to('conferencias'));
        }//end if 
        else{
            return $this->crear_vista('panel/conferencia_detalles',$this->cargar_datos($conferencias));         
        }//end else
        }
        else{
            return redirect()->to(route_to('login'));
        }

    }//end index
// =====================================
    // Funcion agregar imagen
    // =====================================

    private function subir_archivo($path= NULL, $file = NULL){
        $file_name = $file->getRandomName();
        $file->move($path, $file_name);
        return $file_name;
    }//end subir_archivo

    // =====================================
    // Funcion eliminar imagen
    // =====================================

    private function eliminar_archivo ($path = NULL, $file = NULL){
        if (!empty($file)) {
            if(file_exists($path.$file)){
                unlink($path.$file);
                return TRUE;
            }//end if
        }//end if is_null
        else{
            return FALSE;
        }//end else is_null
    }//end eliminar_archivo

    /**
     * Funciones externas 
    */
    public function editar(){
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
            $this->eliminar_archivo(RECURSOS_IMAGENES_CERTIFICADO, $this->request->getPost('foto_anterior'));
            $miraculou['plantilla_imagen'] = $this->subir_archivo(RECURSOS_IMAGENES_CERTIFICADO, $this->request->getFile('foto_miraculous'));
        }//end if existe imagen

        
        if($tabla_conferencia->update($id_conferencia, $conferencias) > 0){
            // mensaje("El miraculous ha sido actualizado exitosamente.", ALERT_SUCCESS);
            return redirect()->to(route_to('conferencias'));
        }//end if se actualiza el usuario
        else{
            // mensaje("Hubo un error al actualizar al miraculous. Intente nuevamente, por favor", ALERT_DANGER);
            return $this->index($id_conferencia);
        }//end else se inserta el usuario

    }//end editar

}