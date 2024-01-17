<?php
    namespace App\Models;
    use CodeIgniter\Model;

    class Tabla_oyent_conferen extends Model{

        protected $table = 'oyent_conferen';
        protected $primaryKey = ['id_usuario', 'id_conferencia'];
        protected $returnType = 'object';
        protected $allowedFields = ['id_usuario', 'id_conferencia'];
    }//end class