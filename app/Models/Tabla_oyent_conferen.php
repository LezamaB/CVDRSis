<?php
    namespace App\Models;
    use CodeIgniter\Model;

    class Tabla_oyent_conferen extends Model{

        protected $table = 'oyent_conferen';
        protected $primaryKey = ['id_usuario', 'id_conferencia'];
        protected $returnType = 'object';
        protected $allowedFields = ['id_usuario', 'id_conferencia'];
    
    public function existe_relacion_conferencia($id_conferencia=null){
        return $this->select('id_conferencia')
        ->where()
        ->first();
    }

    }//end class
