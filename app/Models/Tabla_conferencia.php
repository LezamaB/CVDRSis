<?php

//Ubicación del controlador en la carpeta
//Intermediario entre la base de datos y la vista
namespace App\Models;

//Herede los elementos del controlador padre
use CodeIgniter\Model;

class Tabla_conferencia extends Model{
    //Configuración inicial
    protected $table = 'conferencia';
    protected $primaryKey='id_conferencia';
    protected $returnType='object';
    protected $allowedFields=['nombre_conferencia',
    'descripcion',
    'fecha_conferencia',
    'hora_conferencia',
    'plantilla_imagen'
    //atributos
];

    //+++++++++++++++++++++++++++++++++++++++
        // FUNCIONES ESPECIFICAS
        //+++++++++++++++++++++++++++++++++++++++  
    public function validar_conferencia($nombre_conferencia=null){
        return $this->select('conferencia.id_conferencia,conferencia.nombre_conferencia,descripcion,
                            id_conferencia.fecha_conferencia,conferencia.hora_conferencia,conferencia.plantilla_imagen')
                    ->where('conferencia.nombre_conferencia',$nombre_conferencia)
                    ->first();
    }
    public function existe_conferencia($nombre_conferencia=null){
        //Se genera la consulta sql
        $resultado=$this
                ->select('nombre_conferencia')
                ->where('nombre_conferencia',$nombre_conferencia)
                ->first();
        $opcion = FALSE;

        if($resultado != NULL){
            $opcion = TRUE;
        }//end if existe registro

        return $opcion;
    }//end encontrar_conferencia

    public function data_table_conferencia(){
        $resultado=$this
        ->select('
                    id_conferencia,nombre_conferencia,descripcion,
                    fecha_conferencia,hora_conferencia,plantilla_imagen
        ')
                    ->orderBy('nombre_conferencia','ASC')
                    ->findAll();
                    return $resultado;
    }

    public function obtener_conferencia($id_conferencia = 0){
        // $resultado = $this
        return $this
                    ->select('id_conferencia,nombre_conferencia,descripcion,
                    fecha_conferencia,hora_conferencia,plantilla_imagen')
                    ->where('id_conferencia', $id_conferencia)
                    ->first();
        // return $resultado;
    }//end obtener_conferencia

    public function contar_conferencias(){
        return $resultado = $this->select('id_conferencia')->countAllResults();
    }

    public function conferencias_actuales()
    {
        $now = date('Y-m-d H:i:s');
        
        $resultado=$this
            ->select('id_conferencia,nombre_conferencia')
            ->where('fecha_conferencia', date('Y-m-d', strtotime($now)))
            ->where('hour(hora_conferencia)', date('H', strtotime($now)))
            ->findAll();
            // var_dump($resultado);
            return $resultado;
    }

    }