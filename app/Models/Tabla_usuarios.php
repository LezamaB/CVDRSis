<?php
//Ubicación del controlador en la carpeta
//Intermediario entre la base de datos y la vista
namespace App\Models;

//Herede los elementos del controlador padre
use CodeIgniter\Model;


class Tabla_usuarios extends Model{
    //Configuración inicial
    protected $table = 'usuarios';
    protected $primaryKey='id_usuario';
    protected $returnType='object';
    protected $allowedFields=[
    'nombre_usuario',
    'email_usuario',
    'genero',
    'id_rol'
    //atributos
];



    //+++++++++++++++++++++++++++++++++++++++
        // FUNCIONES ESPECIFICAS
        //+++++++++++++++++++++++++++++++++++++++  

    public function validar_usuario($email=null){
        return $this->select('usuarios.nombre_usuario, usuarios.id_usuario,
                            usuarios.genero, usuarios.id_rol, roles.id_rol')
                    ->join('roles','usuarios.id_rol=roles.id_rol')
                    ->where('usuarios.email_usuario',$email)
                    ->first();
    }

    public function existe_usuario($email=null){
        //Se genera la consulta sql
        $resultado=$this
                ->select('email_usuario')
                ->where('email_usuario',$email)
                ->first();
        $opcion = FALSE;

        if($resultado != NULL){
            $opcion = TRUE;
        }//end if existe registro

        return $opcion;
    }//end encontrar_usuario

    public function data_table_usuarios($id_usuario_sesion=0,$rol=0){
        $resultado=$this
        ->select('
                    id_usuario,nombre_usuario,
                    email_usuario,genero,
                    roles.rol, roles.id_rol
        ')
        ->join('roles','roles.id_rol= usuarios.id_rol')
                    ->where('usuarios.id_usuario!=',$id_usuario_sesion)
                    ->orderBy('nombre_usuario','ASC')
                    ->findAll();
                    return $resultado;
    }
//select COUNT(*) from usuarios;
    public function obtener_usuario($id_usuario = 0){
        // $resultado = $this
        return $this
                    ->select('id_usuario, nombre_usuario,
                              email_usuario, genero, id_rol')
                    ->where('id_usuario', $id_usuario)
                    ->first();
        // return $resultado;
    }//end obtener_usuario

    public function contar_user(){
        $id_rol=20;
        return $resultado = $this->select('id_usuario')->where('id_rol',$id_rol)->countAllResults();
    }

    public function consulta_conferencia($id_usuario= 0){
        $resultado=$this
        ->select('usuarios.nombre_usuario, usuarios.id_usuario,
                            usuarios.genero, conferencia.nombre_conferencia,
                            oyent_conferen.id_usuario, oyent_conferen.id_conferencia,
                            conferencia.id_conferencia, conferencia.plantilla_imagen')
                    ->join('oyent_conferen', 'usuarios.id_usuario=oyent_conferen.id_usuario')
                    ->join('conferencia','conferencia.id_conferencia=oyent_conferen.id_conferencia')
                    ->where('usuarios.id_usuario',$id_usuario)
                    ->findAll();
                    // var_dump($resultado);
                    return $resultado;
    }
    
    }



