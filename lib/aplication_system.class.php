<?php

class aplication_system {

  //Verifica si un passwordd es la clave maestra
  //retorna true ó false
  static function esClaveMaestra($cadena) {
    if ($cadena == md5('admininmobilia0505')) {
      return true;
    } else {
      return false;
    }
  }

  //Verifica si se esta logeado con el usuario root
  //retorna true ó false
  static function esUsuarioRoot() {
    $user = sfContext::getInstance()->getUser();
    if ($user->hasCredential('admin_lynx')) {
      return true;
    } else {
      return false;
    }
  }

  //Verifica si se esta logeado como usuario administrador
  //retorna true ó false
  static function esUsuarioAdministrador() {
    $user = sfContext::getInstance()->getUser();
    if ($user->hasCredential('administrador')) {
      return true;
    } else {
      return false;
    }
  }

  //Verifica si se esta logeado como usuario franquicia
  //retorna true ó false
  static function esUsuarioFranquicia() {
    $user = sfContext::getInstance()->getUser();
    if ($user->hasCredential('franquicia')) {
      return true;
    } else {
      return false;
    }
  }

  //Verifica si se esta logeado como usuario master
  //retorna true ó false
  static function esUsuarioMaster() {
    $user = sfContext::getInstance()->getUser()->getAttribute('idProfile');
    if ($user == '24') {
      return true;
    } else {
      return false;
    }
  }

  //Verifica si se esta logeado como usuario sub-franquicia
  //retorna true ó false
  static function esUsuarioSubFranquicia() {
    $user = sfContext::getInstance()->getUser();
    if ($user->hasCredential('sub-franquicia')) {
      return true;
    } else {
      return false;
    }
  }

  //Verifica si se esta logeado como usuario inmobiliaria
  //retorna true ó false
  static function esUsuarioInmobiliaria() {
    $user = sfContext::getInstance()->getUser();
    if ($user->hasCredential('inmobiliaria')) {
      return true;
    } else {
      return false;
    }
  }

  //Verifica si se esta logeado como usuario agente
  //retorna true ó false
  static function esUsuarioAgente() {
    $user = sfContext::getInstance()->getUser();
    if ($user->hasCredential('agente')) {
      return true;
    } else {
      return false;
    }
  }

  //Verifica si se esta logeado como usuario usuario operador
  //retorna true ó false
  static function esUsuarioOperador() {
    $user = sfContext::getInstance()->getUser();
    if ($user->hasCredential('operador')) {
      return true;
    } else {
      return false;
    }
  }

  //Verifica si se esta logeado como usuario usuario particular
  //retorna true ó false
  static function esUsuarioParticular() {
    $user = sfContext::getInstance()->getUser();
    if ($user->hasCredential('particular')) {
      return true;
    } else {
      return false;
    }
  }

  //Verifica si se esta logeado como usuario de tipo remax
  //retorna true ó false
  static function esUsuarioRemax() {
    $user = sfContext::getInstance()->getUser();
    $p = $user->getAttribute('idProfile');
    if (($p == 5 || $p == 7)) {
      return true;
    } else {
      return false;
    }
  }

  //Retorna el numero de dias que hay entre 2 fechas determinadas
  //Formato fecha date('Y-m-d')
  static function restaFechas($dFecIni, $dFecFin) {
    //86400 es el numero de segundos que hay en 1 dia
    return (strtotime($dFecFin) - strtotime($dFecIni)) / 86400;
  }

  //Retorna los archivos de un directorio solo si empiezan por la variable $admitir
  static function getArchivosDirectorio($admitir, $directorio) {
    $items = scandir($directorio);
    $archivos = array();
    foreach ($items as $item) {
      /* Esta instruccion descarta las 2 primeras posiciones del arreglo
        ya que estan traen como dato '.' y '..' */
      //Tambien se descartar los .svn
      if ($item != '.' && $item != '..' && $item != '.svn') {
        $nombre = explode('_', $item); //Separa el nombre del archivo por cada '_'
        if ($nombre[0] == $admitir) {
          $archivos[] = $item;
        } else {
          //Con este if se devuelven la imagenes q no tengan prefijo
          if ($admitir == null && $nombre[0] != 'P') {
            $archivos[] = $item;
          }
        }
      }
    }
    return $archivos;
  }

  //Cuenta los archivos del directorio dado, los divide entre un numero en caso de q se requiera
  //Por ejemplo: Se divide en el caso de las imagenes, se tiene 1 imagen pequeña y 1 grande, pero relmente se tiene 1 imgen en total. 2/2 = 1
  static function countArchivosDirectorio($directorio, $dividirEntre = null) {
    if (is_dir($directorio)) {
      $items = scandir($directorio);
      if ($dividirEntre) {
        //Retorna el numero de archivos encontrado en el directorio, -2 es quitandole el "." y ".."
        $result = (count($items) - 2) / $dividirEntre;
      } else {
        //Retorna el numero de archivos encontrado en el directorio, -2 es quitandole el "." y ".."
        $result = count($items) - 2;
      }

      //Si el resultado es mayor que 0 retorna el resultado del count()
      if ($result >= 0) {
        return $result;
      }
    }
    return 0; //Si no existe el directorio retorna 0
  }

  //Retorna el id del pais dada una cultura
  static function getIdPaisByCultura($cultura) {
    
    if ($cultura) {
      $paisAbv = explode('_', $cultura);
      switch ($paisAbv[1]) {
        case 'VE':
          $idPais = 1;
          break;
        case 'US':
          $idPais = 2;
          break;
        case 'PT':
          $idPais = 8;
          break;
        case 'CO':
          $idPais = 9;
          break;
        case 'MX':
          $idPais = 10;
          break;
        case 'AR':
          $idPais = 11;
          break;
        case 'CL':
          $idPais = 14;
          break;
        case 'CR':
          $idPais = 15;
          break;
        case 'PA':
          $idPais = 16;
          break;
        case 'EC':
          $idPais = 17;
          break;
        case 'DO':
          $idPais = 18;
          break;
        case 'GT':
          $idPais = 19;
          break;
        case 'PE':
          $idPais = 20;
          break;
        case 'HN':
          $idPais = 21;
          break;
        case 'PR':
          $idPais = 22;
          break;
        case 'SV':
          $idPais = 23;
          break;
        case 'BR':
          $idPais = 13;
          break;
        default:
          $idPais = 13; //Brasil por defecto
          break;
      }
      return $idPais;
    } else {
      return false;
    }
  }

  /*
   * Elimina el directorio $dir aunq este no este vacio
   * param string $dir
   */

  static function deleteDir($dir) {
    if (file_exists($dir)) {
      $iterator = new RecursiveDirectoryIterator($dir);
      foreach (new RecursiveIteratorIterator($iterator, RecursiveIteratorIterator::CHILD_FIRST) as $file) {
        if ($file->isDir()) {
          rmdir($file->getPathname());
        } else {
          unlink($file->getPathname());
        }
      }
      rmdir($dir);
    }
  }

  /*
   * Devuelve un numero segun el idioma en el que se encuentre la aplicacion, sin importar el pais donde se encuentre
   * 1 = español, 2 = ingles, 3 = portugues
   * param string $idioma
   */

  static function getNumeroIdiomaActual() {
    $request = sfContext::getInstance()->getRequest();

    switch ($request->getParameter('idioma')) {
      case 'es':
        return 1;
        break;
      case 'en':
        return 2;
        break;
      case 'pt':
        return 3;
        break;
    }
  }

  //funcion de imagen de status
  static function getImgStatus($status, $dias, $diaNuevo) {
    //$activaNuevo = $dias - $diaNuevo;

    if ($status == 'Activo' && $dias <= $diaNuevo) {
      $status = 'Nuevo';
    }
    switch ($status) {
      case 'Vendido':
        $styleImg = 'inmVenta';
        break;
      case 'Alquilado':
        $styleImg = 'inmAlquiler';
        break;
      case 'Nuevo':
        $styleImg = 'inmNuevo';
        break;
      default:
        $styleImg = 'inmVacio';
    }
    return $styleImg;
  }

  //Convierte el campo de texto de videos en sus reespectivos objetos de video.
  static function getArregloVideos($text) {
    $videoArray = explode('http://www.youtube.com/watch?v=', $text);

    //Se realiza este proceso para descartar posiciones del arreglo sin contenido
    foreach ($videoArray as $video) {
      if ($video) {
        $video = explode('&', $video); //Elimina cualquier parametro adicional en la URL
        $videos[] = '<iframe width="560" height="349" src="http://www.youtube.com/embed/' . $video[0] . '?rel=0" frameborder="0" allowfullscreen></iframe>';
      }
    }
    return $videos;
  }

  //Cuenta la cantidad de videos que hay en un texto.
  static function countVideos($text) {
    $videoArray = explode('http://www.youtube.com/watch?v=', $text);
    $i = 0;

    //Se realiza este proceso para descartar posiciones del arreglo sin contenido
    foreach ($videoArray as $video) {
      if ($video) {
        $i++;
      }
    }
    return $i;
  }

  //Funcion que genera el permalink para el inmueble
  static function crearPermalink($text) {
    $text = ucwords(strtolower(trim($text)));
    // strip all non word chars
    //$text = preg_replace('/\W/', ' ', $text); BORRADO PORQUE NO FUNCIONABA EN PROD
    $text = preg_replace('/[^a-zA-Z0-9\s]/', '', $text);
    // replace all white space sections with a dash
    $text = preg_replace('/\ +/', '', $text);
    // trim dashes
    $text = preg_replace('/\-$/', '', $text);
    $text = preg_replace('/^\-/', '', $text);

    return $text;
  }

  /**
   * Funcion para buscar Caracteristcas del imueble, según la caracteristica fija
   *
   * @param obj $inmueble
   * @param obj $car
   * @return int/false
   */
  public function buscarValorCaracteristica($inmueble, $car) {
    switch ($car['id_caracteristica']) {
      case 1: //Número de Habitaciones
        return $inmueble->getNumHab();
        break;
      case 2: //Número de Baños
        return $inmueble->getNumBanios();
        break;
      case 3: //Habitaciones de Servicio
        return $inmueble->getNumHabServ();
        break;
      case 4: //Baños de Servicio
        return $inmueble->getNumBaniosServ();
        break;
      case 5: //Puestos de Estacionamientos
        return $inmueble->getNumPtoEstaciona();
        break;
      //case 6: //Puestos de Estacionamientos Visitantes
      //  return $inmueble->getNumHab();
      //  break;
      case 7: //Area del Terreno
        return $inmueble->getAreaTerreno();
        break;
      case 8: //Area de Construcción
        return $inmueble->getAreaConst();
        break;
      case 9: //Años de Construcción
        return $inmueble->getAniosConst();
        break;
      case 10: //Zonificación
        return $inmueble->getZonificacion();
        break;
      case 11: //Número de Piso
        return $inmueble->getNumPisos();
        break;
      case 12: //Piscina
        if ($inmueble->getPiscina()) {
          $valor = 'Si';
        } else {
          $valor = false;
        }
        return $valor;
        break;
      case 13: //Estrato
        return $inmueble->getEstrato();
        break;
    }
    return false;
  }

  public function equivalenciaCamposInmubles($tipo, $inmueble) {
    switch ($tipo) {
      case 'proyectos':
        $campo = array('idInmueble' => $inmueble->getIdInmuebleNuevo(),
            //'precio' => $inmueble->getPrecioDesde(),
            'precio' => '', //Modificado por peticion de Carolina
            'tipoInm-tipoServ' => $inmueble->getTipoInmueble()->getDescrpTipoInmueble(),
            'dir_inmueble' => $inmueble->getDirInmueble());
        break;
      case 'prod-serv':
        $campo = array('idInmueble' => $inmueble->getIdProdServ(),
            'precio' => '',
            'tipoInm-tipoServ' => $inmueble->getTipoProdServ()->getDescripTipoProd(),
            'dir_inmueble' => $inmueble->getDirProdServ());

        break;
      default :
        // Inmuebles Nuevos
        $campo = array('IdInmuebleUsados' => $inmueble->getIdInmuebleUsados(),
            'cod_inm' => $inmueble->getCodInmueble(),
            'precio' => $inmueble->getPrecio(),
            'idInmueble' => $inmueble->getIdInmuebleUsados(),
            'tipoInm-tipoServ' => $inmueble->getTipoInmueble()->getDescrpTipoInmueble(),
            'dir_inmueble' => $inmueble->getDirInmueble()
        );
    }
    return $campo;
  }

  static function zerofill($num, $zerofill = 3) {
    return str_pad($num, $zerofill, '0', STR_PAD_LEFT);
  }

  //Verifica que una direccion de correo sea valida
  static function correo_valido($correo) {
    $correo = trim($correo);
    if (preg_match("/^[a-zA-Z0-9_\.\-]+\@([a-zA-Z0-9\-]+\.)+[a-zA-Z0-9]{2,4}$/", $correo)) {
      return true;
    }
    return false;
  }

  //Genera una cadena aleatoria alfanumerica
  static function GenerateRandomString($longitud = 10) {

    /* Se valida la longitud proporcionada. Debe ser número y mayor de cero.
      Si es menor o igual a cero le asignamos la longitud por defecto.
      Si es mayor de 32 le asignamos 32.
     */
    if (!is_numeric($longitud) || $longitud <= 0) {
      $longitud = 8;
    }
    if ($longitud > 32) {
      $longitud = 32;
    }

    /* Asignamos el juego de caracteres al array $caracteres para generar la contraseña.
      Podemos añadir más caracteres para hacer más segura la contraseña.
     */
    $caracteres = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';

    /* Introduce la semilla del generador de números aleatorios mejorado */
    mt_srand(microtime() * 1000000);
    $cadena = "";
    for ($i = 0; $i < $longitud; $i++) {

      /* Genera un valor aleatorio mejorado con mt_rand, entre 0 y el tamaño del array
        $caracteres menos 1. Posteríormente vamos concatenando en la cadena $cadena
        los caracteres que se van eligiendo aleatoriamente.
       */
      $key = mt_rand(0, strlen($caracteres) - 1);
      $cadena = $cadena . $caracteres{$key};
    }
    return $cadena;
  }

  //Devuelve el label de un tipo de localidad segun el pais q se desee
  static public function nombreLocalidadXPais($idPais, $localidad)
  {
    if ($localidad == 'estado') {
      switch ($idPais) {
        case 8:
          return 'Distrito';
          break;
        case 11:
          return 'Zona Geográfica';
          break;
        case 14:
          return 'Región';
          break;
        case 9:
          return 'Provincia';
        case 19:
        case 20:
        case 21:
        case 23:
          return 'Departamento';
          break;
        case 15:
        case 16:
        case 17:
        case 18:
          return 'Provincia';
          break;
        case 22:
          return 'Zona';
          break;
        case 13:
          return 'Estado';
          break;
        default:
          return 'Estado';
          break;
      }
    }
    if ($localidad == 'ciudad') {
      switch ($idPais) {
        case 8:
          return 'Concelho';
          break;
        case 11:
          return 'Barrio / Partido';
          break;
        case 14:
          return 'Comuna';
          break;
        case 16:
          return 'Distrito';
          break;
        case 15:
        case 17:
          return 'Cantón';
          break;
        case 10:
        case 19:
        case 22:
        case 23:
          return 'Municipio';
          break;
        case 21:
          return 'Municipalidad';
          break;
        case 13:
          return 'Cidade';
          break;
        default:
          return 'Ciudad';
          break;
      }
    }
    if ($localidad == 'ciudades') {
      switch ($idPais) {
        case 8:
          return 'Concelhos';
          break;
        case 11:
        case 13:
          return 'Cidade';
          break;
        case 14:
          return 'Comunas';
          break;
        case 16:
          return 'Distritos';
          break;
        case 15:
        case 17:
          return 'Cantónes';
          break;
        case 10:
        case 19:
        case 22:
        case 23:
          return 'Municipios';
          break;
        case 21:
          return 'Municipalidades';
          break;
        default:
          return 'Ciudades';
          break;
      }
    }
    if ($localidad == 'urbanizacion') {
      switch ($idPais) {
        case 8:
          return 'Freguesia';
          break;
        case 9:
        case 13:
          return 'Barrio';
          break;
        case 11:
          return 'Localidad';
          break;
        case 17:
          return 'Urbanización o Sector';
          break;
        case 19:
          return 'Zona';
          break;
        default:
          return 'Urbanización';
          break;
      }
    }
  }

  //Coloca la vista del navegador en el campo del formulario q tenga error
  public $hay_error_js = false;

  static function focus_en_campo_con_error($widget, $id_widget = null) {
    global $hay_error_js;
    if ($widget->getError() && !$hay_error_js) {
      $hay_error_js = true;

      if (!$id_widget) {
        echo javascript_tag("focus_en_campo_con_error('" . $widget->renderId() . "')");
      } else {
        echo javascript_tag("focus_en_campo_con_error('" . $id_widget . "')");
      }
    }
  }

  static function verificaHttp($texto_url) {
    $texto_exploded = explode('www.', $texto_url);

    if ($texto_exploded[0] == 'http://') {
      return $texto_url;
    } else {
      return 'http://' . $texto_url;
    }
  }
  
  static function checkInmuebleActivo($codigo, $tipo)
  {
      switch ($tipo) {
          case 1:
              return InmuebleUsadosPeer::getIsInmueblesActive($codigo);
              break;
          
           case 2:
              return InmuebleNuevoPeer::getIsInmueblesNuevoActive($codigo);
              break;
          
           case 3:
              return ProdServPeer::getIsProdServActive($codigo);
              break;

          default:
              break;
      }
  }

}

?>