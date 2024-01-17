<?php
/*
function namefunction($parametros){

}*/

//******************************************* */
//  BREADCRUMB
//******************************************* */
/*function breadcrumb($tarea='',$navegacion=array()){

}*/
    function breadcrumb($tarea = '', $breadcrumb = array()){
    $html = '';
    if(sizeof($breadcrumb)> 0){
        $html.= '
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">'.$tarea.'</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="'.route_to("dashboard").'">Inicio</a></li>';
                        foreach ($breadcrumb as $nav) {
                            if(isset($nav['href'])){
                                if($nav["href"] != '#'){
                                    $html.= '<li class="breadcrumb-item active"><a href="'.$nav["href"].'">'.$nav["tarea"].'</a></li>';
                                }//end nav
                                else{
                                    $html.= '<li class="breadcrumb-item text-black">'.$nav["tarea"].'</li>';
                                }//end else
                            }//end if isset
                        }//end foreach
                        $html.='</ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        ';
    }//end if sizeof
    return $html;
}//end breadcrumb