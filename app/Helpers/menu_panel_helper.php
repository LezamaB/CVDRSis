<?php
/* ******************************************* 
    Función para configurar el menu
******************************************* */

function configurar_menu_panel($ro_actual=NULL){
    //INSTANCIA DE LA VARIABLE DE SESSION
    $session=session();

    $menu=array();
    $menu_item=array();

    
    // if($session->rol_actual == ROL_ADMINISTRADOR["clave"]){
        //Opción Dashboard
        $menu_item['is_active']=FALSE;
        //Toma datos del archivo rutas : route_to
        $menu_item['href']=route_to('dashboard');
        $menu_item['icon']='fas fa-home';
        $menu_item['text']='Dashboard';
        $menu_item['submenu']=array();
        $menu['dashboard']=$menu_item;
        //Opción Usuarios
        $menu_item['is_active']=FALSE;
        $menu_item['href']=route_to('usuarios');
        $menu_item['icon']='fas fa-users';
        $menu_item['text']='Usuarios';
        $menu_item['submenu']=array();
        $menu['usuarios']=$menu_item;

        //Opción conferencias
        $menu_item['is_active']=FALSE;
        $menu_item['href']=route_to('conferencias');
        $menu_item['icon']='fas fa-book';
        $menu_item['text']='Conferencias';
        $menu_item['submenu']=array();
        $menu['conferencias']=$menu_item;
        //
        return $menu;
}
/* ******************************************* 
   Función para activar una opción del menu
******************************************* */
function activar_menu_item_panel($menu=NULL, $tarea_actual=NULL) {
    switch ($tarea_actual) {
        //SECCION DASHBOARD
        case TAREA_DASHBOARD:
            $menu['dashboard']['is_active']=TRUE;
        break;

        case TAREA_USUARIOS:
            $menu['usuarios']['is_active']=TRUE;
        break;
        
        case TAREA_CONFERENCIAS:
        case TAREA_DETALLES_CONFERENCIA:
        case TAREA_NUEVA_CONFERENCIA:
            $menu['conferencias']['is_active']=TRUE;
        break;

        default:
        break;
    }
    return $menu;

}
/* ******************************************* 
    Función para crear el menu
******************************************* */
function crear_menu_panel() {
        $session=session();
        //Opción para generar el arreglo de todo el menú
        $menu = configurar_menu_panel();

        //Opción para activar dicha opción de cada módulo
        if(isset($session->tarea_actual)){
            $menu = activar_menu_item_panel($menu, $session->tarea_actual);
        }//end isset

        $html= '<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">';
            foreach ($menu as $item) {
                if(isset($item['href'])){
                    if($item['href'] != '#'){
                        $html.='
                        <li class="nav-item">
                            <a href="'.$item['href'].'"  class="nav-link '.($item["is_active"] ? 'active' : '').'">
                            <i class="'.$item['icon'].' nav-icon"></i>
                            <p>'.$item['text'].'</p>
                            </a>
                        </li>';
                    }//end if href != # 
                    else{
                        if(sizeof($item['submenu']) > 0){
                            $html.='
                            <li class="nav-item '.($item["is_active"] ? 'menu-is-opening menu-open' : '').'">
                                <a href="'.$item['href'].'" class="nav-link '.($item["is_active"] ? 'active' : '').'">
                                    <i class="nav-icon '.$item['icon'].'"></i>
                                    <p>
                                        '.$item['text'].'
                                        <i class="right fa fa-sort-desc"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">';
                                foreach ($item['submenu'] as $item_sub_menu) {
                                    // $html.='<li><a href="'.$item_sub_menu["href"].'">'.$item_sub_menu["text"].'</a></li>';
                                    $html.= '
                                        <li class="nav-item">
                                            <a href="'.$item_sub_menu["href"].'"  class="nav-link '.($item_sub_menu["is_active"] ? 'active' : '').'">
                                                <i class="'.$item_sub_menu['icon'].' nav-icon"></i>
                                                <p>'.$item_sub_menu["text"].'</p>
                                            </a>
                                        </li>
                                    ';
                                }//end foreach
                                $html.='</ul>
                            </li>
                            ';
                        }//end else sizeof
                    }//end else href != #
                }//end if 
            }//end foreach
        $html.= '</ul>';
        return $html;
    }//end crear_menu_panel
