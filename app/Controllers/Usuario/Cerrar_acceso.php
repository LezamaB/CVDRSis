<?php
//Ubicación del controlador en la carpeta
namespace App\Controllers\Usuario;

//Herede los elementos del controlador padre
use App\Controllers\BaseController;

class Cerrar_acceso extends BaseController{
    public function index(){
        session()->destroy();
        return redirect()->to(route_to('login'));
    }
}