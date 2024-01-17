<?php

/*
 | --------------------------------------------------------------------
 | App Namespace
 | --------------------------------------------------------------------
 |
 | This defines the default Namespace that is used throughout
 | CodeIgniter to refer to the Application directory. Change
 | this constant to change the namespace that all application
 | classes should use.
 |
 | NOTE: changing this will require manually modifying the
 | existing namespaces of App\* namespaced-classes.
 */
defined('APP_NAMESPACE') || define('APP_NAMESPACE', 'App');

/*
 | --------------------------------------------------------------------------
 | Composer Path
 | --------------------------------------------------------------------------
 |
 | The path that Composer's autoload file is expected to live. By default,
 | the vendor folder is in the Root directory, but you can customize that here.
 */
defined('COMPOSER_PATH') || define('COMPOSER_PATH', ROOTPATH . 'vendor/autoload.php');

/*
 |--------------------------------------------------------------------------
 | Timing Constants
 |--------------------------------------------------------------------------
 |
 | Provide simple ways to work with the myriad of PHP functions that
 | require information to be in seconds.
 */
defined('SECOND') || define('SECOND', 1);
defined('MINUTE') || define('MINUTE', 60);
defined('HOUR')   || define('HOUR', 3600);
defined('DAY')    || define('DAY', 86400);
defined('WEEK')   || define('WEEK', 604800);
defined('MONTH')  || define('MONTH', 2_592_000);
defined('YEAR')   || define('YEAR', 31_536_000);
defined('DECADE') || define('DECADE', 315_360_000);

/*
 | --------------------------------------------------------------------------
 | Exit Status Codes
 | --------------------------------------------------------------------------
 |
 | Used to indicate the conditions under which the script is exit()ing.
     | While there is no universal standard for error codes, there are some
 | broad conventions.  Three such conventions are mentioned below, for
 | those who wish to make use of them.  The CodeIgniter defaults were
 | chosen for the least overlap with these conventions, while still
 | leaving room for others to be defined in future versions and user
 | applications.
 |
 | The three main conventions used for determining exit status codes
 | are as follows:
 |
 |    Standard C/C++ Library (stdlibc):
 |       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
 |       (This link also contains other GNU-specific conventions)
 |    BSD sysexits.h:
 |       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
 |    Bash scripting:
 |       http://tldp.org/LDP/abs/html/exitcodes.html
 |
 */
defined('EXIT_SUCCESS')        || define('EXIT_SUCCESS', 0);        // no errors
defined('EXIT_ERROR')          || define('EXIT_ERROR', 1);          // generic error
defined('EXIT_CONFIG')         || define('EXIT_CONFIG', 3);         // configuration error
defined('EXIT_UNKNOWN_FILE')   || define('EXIT_UNKNOWN_FILE', 4);   // file not found
defined('EXIT_UNKNOWN_CLASS')  || define('EXIT_UNKNOWN_CLASS', 5);  // unknown class
defined('EXIT_UNKNOWN_METHOD') || define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     || define('EXIT_USER_INPUT', 7);     // invalid user input
defined('EXIT_DATABASE')       || define('EXIT_DATABASE', 8);       // database error
defined('EXIT__AUTO_MIN')      || define('EXIT__AUTO_MIN', 9);      // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      || define('EXIT__AUTO_MAX', 125);    // highest automatically-assigned error code

/**
 * @deprecated Use \CodeIgniter\Events\Events::PRIORITY_LOW instead.
 */
define('EVENT_PRIORITY_LOW', 200);

/**
 * @deprecated Use \CodeIgniter\Events\Events::PRIORITY_NORMAL instead.
 */
define('EVENT_PRIORITY_NORMAL', 100);

/**
 * @deprecated Use \CodeIgniter\Events\Events::PRIORITY_HIGH instead.
 */
define('EVENT_PRIORITY_HIGH', 10);
//******************************************* */
//      CONSTANTES CARPETA PANEL
//******************************************* */
define('PLUGINS_DASHBOARD','recursos/AdminLT3/plugins/');
define('DIST_DASHBOARD','recursos/AdminLT3/dist/');
define("RECURSOS_IMAGENES", 'recursos/plugins/fpdf/');


define("TAREA_DASHBOARD", 'tarea_dashboard');
define("TAREA_OPERADOR", 'tarea_operador');
define("TAREA_PERFIL", 'tarea_perfil');


//PERMISOS TAREAS PARA EL MODULO DE USUARIO
define("TAREA_USUARIOS", 'tarea_usuarios');
define("TAREA_NUEVO_USUARIO", 'tarea_nuevo_usuario');
define("TAREA_DETALLES_USUARIO", 'tarea_detalles_usuario');
define("TAREA_INICIO", 'tarea_inicio');


//PERMISOS TAREAS PARA EL MODULO DE CONFERENCIAS
define("TAREA_CONFERENCIAS", 'tarea_conferencias');
define("TAREA_NUEVA_CONFERENCIA", 'tarea_nueva_conferencia');
define("TAREA_DETALLES_CONFERENCIA", 'tarea_detalles_conferencia');

//CONSTANTES PARA LOS ROLES
define("ROL_ADMINISTRADOR",array('clave'=>10,'rol'=>'Administrador'));
define("ROL_OYENTE",array('clave'=>20,'rol'=>'Operador'));
define("ROLES", array(
    ROL_ADMINISTRADOR['clave'] => ROL_ADMINISTRADOR['rol'], 
    ROL_OYENTE["clave"] => ROL_OYENTE["rol"]
));

//CONSTANTES PARA EL ACCESO AL SISTEMA
define("ACCESO_ADMINISTRADOR", array(
    TAREA_DASHBOARD,
    TAREA_USUARIOS,
    TAREA_NUEVO_USUARIO,
    TAREA_DETALLES_USUARIO,
    TAREA_PERFIL,
    TAREA_CONFERENCIAS,
    TAREA_NUEVA_CONFERENCIA,
    TAREA_DETALLES_CONFERENCIA   
));

define("ACCESO_OYENTE", array(
    TAREA_INICIO
));


//******************************************* */
//      CONSTANTES CARPETA PORTAL
//******************************************* */
define('ESPECIFICOS_CSS','/recursos/css/');
define('ESPECIFICOS_JS','/recursos/js/');
define('PLUGINS','recursos/plugins/');

//IMAGENES
define("RECURSOS_IMAGENES_PORTAL", 'recursos/img/Portal/');
define("RECURSOS_IMAGENES_CERTIFICADO", 'recursos/plugins/fpdf');

//PDF
define("Z_FUENTE",'recursos/plugins/fpdf/z/');
//Notificacion
define('JQUERY_VALIDATION','recursos/plugins/jquery-validation/');


//INICIO DE USUARIO
//Carpeta ASSETS
define("ASSETS_IMG",'recursos/plantilla/assets/img/');
define("ASSETS_VENDOR",'recursos/plantilla/assets/vendor/');
define("ASSETS_CSS",'recursos/plantilla/assets/css/');
define("ASSETS_JS",'recursos/plantilla/assets/js/');

//DATATABLES
define('DATATABLES','recursos/plugins/datatables/datatables/');
define('DATATABLES_BS4','recursos/plugins/datatables/datatables-bs4/');
define('DATATABLES_RESPONSIVE','recursos/plugins/datatables/datatables-responsive/');
define('DATATABLES_BUTTONS','recursos/plugins/datatables/datatables-buttons/css/');


//CONSTANTES PARA GENERO
define("GENERO_FEMENINO",array('clave'=>1,'genero'=>'Femenino'));
define("GENERO_MASCULINO",array('clave'=>2,'genero'=>'Masculino'));
define("GENERO_OTRO",array('clave'=>3,'genero'=>'Otro'));
define("GENEROS", array(
    GENERO_FEMENINO['clave'] => GENERO_FEMENINO['genero'], 
    GENERO_MASCULINO["clave"] => GENERO_MASCULINO["genero"],
    GENERO_OTRO["clave"] => GENERO_OTRO["genero"]

));

