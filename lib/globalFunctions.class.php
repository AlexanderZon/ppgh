<?php

class globalFunctions {
  
  //Completa con ceros un int dado
  static function zerofill($num, $zerofill = 3)
  {
    return str_pad($num, $zerofill, '0', STR_PAD_LEFT);
  }

  //Genera una cadena aleatoria alfanumerica
  static function GenerateRandomString($longitud = 8){

    /* Se valida la longitud proporcionada. Debe ser número y mayor de cero.
    Si es menor o igual a cero le asignamos la longitud por defecto.
    Si es mayor de 32 le asignamos 32.
    */
    if(!is_numeric( $longitud ) || $longitud <= 0){
      $longitud = 8;
    }
    if( $longitud > 32 ){
      $longitud = 32;
    }

    /* Asignamos el juego de caracteres al array $caracteres para generar la contraseña.
    Podemos añadir más caracteres para hacer más segura la contraseña.
    */
    $caracteres = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';

    /* Introduce la semilla del generador de números aleatorios mejorado */
    mt_srand(microtime() * 1000000);
    $cadena = "";
    for($i = 0; $i < $longitud; $i++){

      /* Genera un valor aleatorio mejorado con mt_rand, entre 0 y el tamaño del array
	    $caracteres menos 1. Posteríormente vamos concatenando en la cadena $cadena
	    los caracteres que se van eligiendo aleatoriamente.
      */
      $key = mt_rand(0,strlen($caracteres)-1);
      $cadena = $cadena . $caracteres{$key};
    }
    return $cadena;
  }

  //Funcion que genera un permalink
  static function crearPermalink($text){
    $text = ucwords(strtolower(trim($text)));
    // strip all non word chars

    //cambios en acentos, dieresis y enies
    $text = str_replace('á','a',$text);
    $text = str_replace('é','e',$text);
    $text = str_replace('í','i',$text);
    $text = str_replace('ó','o',$text);
    $text = str_replace('ú','u',$text);
    $text = str_replace('ç','c',$text);
    $text = str_replace('ñ','n',$text);

    $text = preg_replace('/[^a-zA-Z0-9\s]/', '-', $text);
    // replace all white space sections with a dash
    $text = preg_replace('/\ +/', '-', $text);
    // trim dashes
    $text = preg_replace('/\-$/', '-', $text);
    $text = preg_replace('/^\-/', '-', $text);

    return $text;
  }

  //Trunca un texto por palabra
  static function trunkTextByword($text, $num_caracteres = 100){
    if (strlen($text) > $num_caracteres){
      $text_trun = preg_replace('/\s+?(\S+)?$/', '', substr($text, 0, $num_caracteres));
      return $text_trun.'...';
    }
    
    return $text;
  }
  
  static function headerMail()
  {
      $request = sfContext::getInstance()->getRequest();
      $header = '
        <html>
            <body style="background-color: #EEE; padding-bottom: 10px; padding-top: 10px; ">

              <table align="center" cellpadding="0" cellspacing="0" width="739" style="background-color:#FFF;padding-left: 15px; padding-right: 15px; border-radius: 10px; ">
                  <tr>
                      <td align="center">&nbsp;
                          <div id="header" align="center">
                            <a href="http://ppgh1.hospedagemdesites.ws/backend.php" target="_blank">
                              <img alt="" style="border: 0" src="http://ppgh1.hospedagemdesites.ws/images/mail/headerMail.jpg" >
                            </a>
                          </div>
                      </td>
                  </tr>  
                  
      ';
      return $header;       
  }
  
  static function footerMail()
  {
      $footer = '
            <tr>
              <td style="font-family: Verdana, Arial, Helvetica, sans-serif; color:#333333; font-size:12px; ">
                  <p style="line-height:1.5;color:rgb(85,85,85);font-size:14px;font-family:Arial,Helvetica,sans-serif">
                      <strong><em>Boa Navega&ccedil;&atilde;o!.</em></strong>
                      <br />Equipe DEPARTAMENTO DE GEOGRAFIA - UNIVERSIDADE DE SÃO PAULO<br />
                      <a href="http://ppgh1.hospedagemdesites.ws" style="color:rgb(0,102,204)" target="_blank">http://ppgh1.hospedagemdesites.ws</a>
                  </p>
              </td>
            </tr>
          </table>
          </body>
          </html>    
      ';  
      return $footer;
  }
  /**
   * Generador Simple Paginador
   */
  static function generatePaginatorSimple($nucleo, $secciones, $total_pages, $page,  $limit, $stages)
  {
      // Initial page num setup
	if ($page == 0){$page = 1;}
        $prev = $page - 1;	
	$next = $page + 1;							
	$lastpage = ceil($total_pages/$limit);		
	$LastPagem1 = $lastpage - 1;
	$paginate = '';
	if($lastpage > 1)
	{	
            $paginate .= "<div class=paginate>";
            // Previous
            if ($page > 1){
                $paginate.= link_to('<<','@permalink?nucleo='.$nucleo.'&secciones='.$secciones.'&subseccion=page&permalink='.$prev);
            }else{
                $paginate.= "<span class=disabled><<</span>";	                        
            }
            // Pages	
            if ($lastpage < 7 + ($stages * 2))	// Not enough pages to breaking it up
            {	
                for ($counter = 1; $counter <= $lastpage; $counter++)
                {
                    if ($counter == $page){
                        $paginate.= "<span class=current>$counter</span>";
                    }else{
                        $paginate.= link_to($counter,'@permalink?nucleo='.$nucleo.'&secciones='.$secciones.'&subseccion=page&permalink='.$counter);
                    }				
                }
            }elseif($lastpage > 5 + ($stages * 2)){
                // Beginning only hide later pages
                if($page < 1 + ($stages * 2))		
                {
                    for ($counter = 1; $counter < 4 + ($stages * 2); $counter++)
                    {
                        if ($counter == $page){
                            $paginate.= "<span class=current>$counter</span>";
                        }else{
                            $paginate.= link_to($counter,'@permalink?nucleo='.$nucleo.'&secciones='.$secciones.'&subseccion=page&permalink='.$counter);
                        }				
                    }
                    $paginate.= "...";
                    $paginate.= link_to($LastPagem1,'@permalink?nucleo='.$nucleo.'&secciones='.$secciones.'&subseccion=page&permalink='.$LastPagem1);
                    $paginate.= link_to($lastpage,'@permalink?nucleo='.$nucleo.'&secciones='.$secciones.'&subseccion=page&permalink='.$lastpage);
                }elseif($lastpage - ($stages * 2) > $page && $page > ($stages * 2)){   
                    // Middle hide some front and some back                        
                    $paginate.= link_to('1','@permalink?nucleo='.$nucleo.'&secciones='.$secciones.'&subseccion=page&permalink=1');    
                    $paginate.= link_to('2','@permalink?nucleo='.$nucleo.'&secciones='.$secciones.'&subseccion=page&permalink=2');    
                    $paginate.= "...";
                    for ($counter = $page - $stages; $counter <= $page + $stages; $counter++)
                    {
                        if ($counter == $page){
                            $paginate.= "<span class=current>$counter</span>";
                        }else{
                            $paginate.= link_to($counter,'@permalink?nucleo='.$nucleo.'&secciones='.$secciones.'&subseccion=page&permalink='.$counter);
                        }					
                    }
                    $paginate.= "...";
                    $paginate.= link_to($LastPagem1,'@permalink?nucleo='.$nucleo.'&secciones='.$secciones.'&subseccion=page&permalink='.$LastPagem1);
                    $paginate.= link_to($lastpage,'@permalink?nucleo='.$nucleo.'&secciones='.$secciones.'&subseccion=page&permalink='.$lastpage);
                }else{
                    // End only hide early pages
                    $paginate.= link_to('1','@permalink?nucleo='.$nucleo.'&secciones='.$secciones.'&subseccion=page&permalink=1');    
                    $paginate.= link_to('2','@permalink?nucleo='.$nucleo.'&secciones='.$secciones.'&subseccion=page&permalink=2');  
                    $paginate.= "...";
                    for ($counter = $lastpage - (2 + ($stages * 2)); $counter <= $lastpage; $counter++)
                    {
                        if ($counter == $page){
                            $paginate.= "<span class=current>$counter</span>";
                        }else{
                            $paginate.= link_to($counter,'@permalink?nucleo='.$nucleo.'&secciones='.$secciones.'&subseccion=page&permalink='.$counter);
                        }					
                    }
                }
            }
            // Next
            if ($page < $counter - 1){ 
                $paginate.= link_to('>>','@permalink?nucleo='.$nucleo.'&secciones='.$secciones.'&subseccion=page&permalink='.$next);
            }else{
                $paginate.= "<span class=disabled>>></span>";
            }

            $paginate.= "<span class=total >Página <b>".$page."</b> of <b>".$total_pages."</b></span>";	
            $paginate.= "</div>";	
     }
     return $paginate;
  }
  /**
   * Generador para Paginador Ajax
   * @param integer $cur_page
   * @param integer $no_of_paginations
   * @return string
   */
  public function generatePaginator($cur_page, $no_of_paginations, $tipoCarga = "loadData")
  {
    $previous_btn = true;
    $next_btn = true;
    $first_btn = true;
    $last_btn = true;  

    if ($cur_page >= 7) {
        $start_loop = $cur_page - 3;
        if ($no_of_paginations > $cur_page + 3)
            $end_loop = $cur_page + 3;
        else if ($cur_page <= $no_of_paginations && $cur_page > $no_of_paginations - 6) {
            $start_loop = $no_of_paginations - 6;
            $end_loop = $no_of_paginations;
        } else {
            $end_loop = $no_of_paginations;
        }
    } else {
        $start_loop = 1;
        if ($no_of_paginations > 7)
            $end_loop = 7;
        else    
            $end_loop = $no_of_paginations;
    }
    $this->paginator .= '<div class="pagination"><ul>';

    // FOR ENABLING THE FIRST BUTTON
    if ($first_btn && $cur_page > 1) {
        $this->paginator .= '<li p="1" class="active" onclick="javascript:'.$tipoCarga.'(1);"><<</li>';
    } else if ($first_btn) {
        $this->paginator .= '<li p="1" class="inactive"><<</li>';
    }

    // FOR ENABLING THE PREVIOUS BUTTON
    if ($previous_btn && $cur_page > 1) {
        $pre = $cur_page - 1;
        $this->paginator .= '<li p="'.$pre.'" class="active" onclick="javascript:'.$tipoCarga.'('.$pre.');"><</li>';
    } else if ($previous_btn) {
        $this->paginator .= '<li class="inactive"><</li>';
    }
    for ($i = $start_loop; $i <= $end_loop; $i++) {

        if ($cur_page == $i)
            $this->paginator .= '<li p="'.$i.'" style="color:#fff;background-color:#518dc2;" class="active" onclick="javascript:'.$tipoCarga.'('.$i.');">'.$i.'</li>';
        else
            $this->paginator .= '<li p='.$i.' class="active" onclick="javascript:'.$tipoCarga.'('.$i.');" >'.$i.'</li>';
    }

    // TO ENABLE THE NEXT BUTTON
    if ($next_btn && $cur_page < $no_of_paginations) {
        $nex = $cur_page + 1;
        $this->paginator .= '<li p="'.$nex.'" class="active" onclick="javascript:'.$tipoCarga.'('.$nex.');">></li>';
    } else if ($next_btn) {
        $this->paginator .= '<li class="inactive">></li>';
    }

    // TO ENABLE THE END BUTTON
    if ($last_btn && $cur_page < $no_of_paginations) {
        $this->paginator .= '<li p="'.$no_of_paginations.'" class="active"  onclick="javascript:'.$tipoCarga.'('.$no_of_paginations.');">>></li>';
    } else if ($last_btn) {
        $this->paginator .= '<li p="'.$no_of_paginations.'" class="inactive">>></li>';
    }
    //$goto = '<input type="text" class"goto" size="1" style="margin-top:-1px;margin-left:60px"/><input type="button" id="go_btn" class"go_button" value="Go" />';
    $total_string = '<span class="total" a="'.$no_of_paginations.'">Página <b> '. $cur_page .' </b> de <b> '.$no_of_paginations.' </b></span>';
    //$this->paginator = $this->paginator . "</ul>" . $total_string . "</div>";  // Content for pagination
    return $this->paginator;
  }

  public function diasMes($mes, $ano)
  {
    if(is_callable("cal_days_in_month"))
    { 
       $datos =  cal_days_in_month(CAL_GREGORIAN, $mes, $ano);
       $valores = $datos;   
       return $valores;
    }else{ 
       // Lo hacemos a mi manera. 
       return date("d",mktime(0,0,0,$mes_atual+1,0,$anio));
    } 
  }
  
  function consulta_mes($mes_atual)
  {
    switch($mes_atual)
    {
        case 1:{ $mes_letra = 'Janeiro'; return $mes_letra; break;}
        case 2:{ $mes_letra = 'Fevereiro'; return $mes_letra; break;}
        case 3:{ $mes_letra = 'Março'; return $mes_letra; break;}
        case 4:{ $mes_letra = 'Abril'; return $mes_letra; break;}
        case 5:{ $mes_letra = 'Maio'; return $mes_letra; break;}
        case 6:{ $mes_letra = 'Junho'; return $mes_letra; break;}
        case 7:{ $mes_letra = 'Julho'; return $mes_letra; break;}
        case 8:{ $mes_letra = 'Agosto'; return $mes_letra; break;}
        case 9:{ $mes_letra = 'Setembro'; return $mes_letra; break;}
        case 10:{ $mes_letra = 'Outubro'; return $mes_letra; break;}
        case 11:{ $mes_letra = 'Novembro'; return $mes_letra; break;}
        case 12:{ $mes_letra = 'Dezembro'; return $mes_letra; break;}
    }
  }
  
}

?>