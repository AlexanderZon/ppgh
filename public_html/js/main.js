/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Muestra las opciones Edit - Delete - Entre otras de los listados de los diferentes modulos
 */
var tmpStyle;

function overRow(item)
{
    $(".row-actions_" + item).show();
    /*tmpStyle = $("#row_style_" + item).attr('class');
    $("#row_style_" + item).attr('class','bgList');*/
}
/**
 * Oculta las opciones Edit - Delete - Entre otras de los listados de los diferentes modulos
 */
function outRow(item)
{    
    $(".row-actions_" + item).hide();
    /*$("#row_style_" + item).attr('class',tmpStyle);*/
}
/**
 * Muestra los privilegios
 */
function viewInfoSection()
{
    $(".informationSection").show();
    $("#viewInfoSection").hide();
    $("#noViewInfoSection").show();
}

function noViewInfoSection()
{
    $(".informationSection").hide();
    $("#viewInfoSection").show();
    $("#noViewInfoSection").hide();
}


/**
 * Muestra los privilegios
 */
function showPrivileges(item)
{
    $(".permissions_" + item).show();
    $("#displayPrivActive_" + item).hide();
    $("#displayPrivDesactive_" + item).show();
}
/**
 * Oculta los privilegios
 */
function hidePrivileges(item)
{
    $(".permissions_" + item).hide();
    $("#displayPrivActive_" + item).show();
    $("#displayPrivDesactive_" + item).hide();
}
/**
 * Oculta el mensaje de actualizacion de privilegios
 */
function fadeMessage(secuence)
{
    $("#message_" + secuence).hide();

}

function fadeMessageSimple(secuence)
{
    $("#message").hide();

}
/**
 * Ajax para registrar los nuevos permisos
 */
function submitPermissions(module,priv,profile)
{
    // Detecto el status del check, checked o unchecked
    var checkSelected = $("#chk_" + module + "_" + priv + ":checked").val();
    var privPpal = 0;
    if(!checkSelected){
        checkSelected = 0;
    }
    // Si el privilegio seleccionado es distinto de 1(View), lo activo
    if(priv != 1)
        {
            $("#chk_" + module + "_1").attr('checked',true);
            privPpal = 1; // Me indica que en la accion debo agregar otra permisologia con id_privelege = 1
        }
    // Si el privilegio seleccionado es igual a 1(View) y lo estoy desactivando, entonces desactivo el resto
    if(priv == 1 && checkSelected !=1)
        {
            $("#chk_" + module + "_2").attr('checked',false);
            $("#chk_" + module + "_3").attr('checked',false);
            $("#chk_" + module + "_4").attr('checked',false);
        }
    // Ajax para guardar los cambios de permisologia
    $(function(){
        $.ajax({
          type: "POST",
          url: "lxprofile/changePrivileges?id_module=" + module + "&id_privilege=" + priv + "&id_profile=" + profile + "&status=" + checkSelected + "&privPpal=" + privPpal,
          dataType: "script",
          beforeSend: function(objeto){
                $("#message_" + module).html("Wait ...");
          },
          success: function(msg){
                $("#message_" + module).animate({width:150, height:10}, "slow");
                $("#message_" + module).html('<div>Saved &nbsp;&nbsp;&nbsp; <a href="#" onclick="fadeMessage(' + module + ' );">Hide</a></div>');                
          },
          error: function(objeto, quepaso, otroobj){
                $("#message_" + module).animate({width:150, height:10}, "slow");
                $("#message_" + module).html('<div>Error. Please update browser&nbsp;&nbsp;&nbsp; <a href="#" onclick="fadeMessage(' + module + ' );">Hide</a></div>');
          }

        });
    });
}


function submitPermissionsUser(module,iduser)
{
    // Detecto el status del check, checked o unchecked
    var checkSelected = $('input[name=chk_' + module + ']').is(':checked');
    var privPpal = 0;
    if(!checkSelected){
        checkSelected = 0;
    }else{
        checkSelected = 1;
    }
    // Ajax para guardar los cambios de permisologia del usuario
    $(function(){
        $.ajax({
          type: "POST",
          url: "lxuserpermission/changePermissionUser?id_module=" + module + "&id_user=" + iduser + "&status=" + checkSelected,
          dataType: "script",
          beforeSend: function(objeto){
                $("#message_" + module).html("Wait ...");
          },
          success: function(msg){
                $("#message_" + module).animate({width:150, height:10}, "slow");
                $("#message_" + module).html('<div>Dados armazenados &nbsp;&nbsp;&nbsp; <a href="#" onclick="fadeMessage(' + module + ' );">Ocultar</a></div>');                
          },
          error: function(objeto, quepaso, otroobj){
                $("#message_" + module).animate({width:150, height:10}, "slow");
                $("#message_" + module).html('<div>Error. Por favor, atualize navegador&nbsp;&nbsp;&nbsp; <a href="#" onclick="fadeMessage(' + module + ' );">Ocultar</a></div>');
          }

        });
    });
}

function setValPermissionModule(type, module){
    alert(type);
    $("#val-perm-" + module).val(type);
    var permSelect = $("#val-perm-" + module).val();
    if(permSelect == 3)
    {
        $("#chk_" + module + "_1").attr('checked',false);            
        $("#chk_" + module + "_2").attr('checked',false);            
    }   
    // Ajax para guardar los cambios de permisologia del usuario
    $(function(){
        $.ajax({
          type: "POST",
          url: "updateTypeUser?id_module=" + module + "&type=" + type,
          dataType: "script",
          beforeSend: function(objeto){
                $("#message_" + module).show();
                $("#message_" + module).html("Processamento ...");
          },
          success: function(msg){
                //$("#message_" + module).animate({width:150, height:10}, "slow");
                $("#message_" + module).html('Privilégio atualizado&nbsp;&nbsp;&nbsp; <a href="javascript:void(0);" onclick="fadeMessage(' + module + ' );"><image src="/images/delete.png" border="0" style="position: relative;top: 3px;" /> </a>');                
          },
          error: function(objeto, quepaso, otroobj){
                //$("#message_" + module).animate({width:150, height:10}, "slow");
                $("#message_" + module).hide();                
                $("#message_" + module).html('Error. Por favor, atualize navegador&nbsp;&nbsp;&nbsp; <a href="javascript:void(0);" onclick="fadeMessage(' + module + ' );">Ocultar</a>');
          }

        });
    });
}

function submitPermissionsPessoa(module, priv, tipoPermiso)
{
    //var tipoPermiso = $("#val-perm-" + module).val();
    var tipoPermiso = tipoPermiso;
    // Detecto el status del check, checked o unchecked
    var checkSelected = $("#chk_" + module + "_" + priv + "_" + tipoPermiso + ":checked").val();
    
    if(!tipoPermiso)
    {
        $("#message_" + module).show();
        $("#message_" + module).html('Selecione privilégio &nbsp; <a href="javascript:void(0);" onclick="fadeMessage(' + module + ' );"><image src="/images/delete.png" border="0" style="position: relative;top: 3px;" /> </a>');
        //restauro el valor del check a su estado actual
        if(checkSelected)
        {
            $("#chk_" + module + "_" + priv).attr('checked',false);            
        }else{
            $("#chk_" + module + "_" + priv).attr('checked',true);
        }
    }else{
        var privPpal = 0;
        if(!checkSelected){
            checkSelected = 0;
        }
        
        // Si el privilegio seleccionado es distinto de 1(View), lo activo
        if(priv != 1 && tipoPermiso == 1)
            {
                $("#chk_" + module + "_1_1").attr('checked',true);
                privPpal = 1; // Me indica que en la accion debo agregar otra permisologia con id_privelege = 1
            }
        if(priv != 1 && tipoPermiso == 2)
            {
                $("#chk_" + module + "_1_2").attr('checked',true);
                privPpal = 1; // Me indica que en la accion debo agregar otra permisologia con id_privelege = 1
            }
        // Si el privilegio seleccionado es igual a 1(View) con VISION GENERal y lo estoy desactivando, entonces desactivo el resto
        if(priv == 1 && tipoPermiso == 1 && checkSelected !=1)
            {
                $("#chk_" + module + "_2_1").attr('checked',false);            
            }
        // Si el privilegio seleccionado es igual a 1(View) CON VISIO PROPIA y lo estoy desactivando, entonces desactivo el resto
        if(priv == 1 && tipoPermiso == 2 && checkSelected !=1)
            {
                $("#chk_" + module + "_2_2").attr('checked',false);            
            }
            
        //return false;
        // Ajax para guardar los cambios de permisologia del usuario
        $(function(){
            $.ajax({
              type: "POST",
              url: "permisos/changePermissionUserByPessoa?id_module=" + module + "&id_privilege=" + priv + "&status=" + checkSelected + "&privPpal=" + privPpal + "&type=" + tipoPermiso,
              dataType: "script",
              beforeSend: function(objeto){
                    $("#message_" + module).show();
                    $("#message_" + module).html("Processamento ...");
              },
              success: function(msg){
                    $("#message_" + module).html('Dados armazenados &nbsp;&nbsp;&nbsp;');
                    $("#message_" + module).delay(550).fadeOut("slow");
              },
              error: function(objeto, quepaso, otroobj){
                    //$("#message_" + module).animate({width:150, height:10}, "slow");
                    $("#message_" + module).hide();                
                    $("#message_" + module).html('Error. Por favor, atualize navegador&nbsp;&nbsp;&nbsp; <a href="javascript:void(0);" onclick="fadeMessage(' + module + ' );">Ocultar</a>');
              }

            });
        });
    }    
}

function submitPermissionsPessoaSimple(module, priv)
{
    // Detecto el status del check, checked o unchecked
    var checkSelected = $("#chk_" + module + "_" + priv + ":checked").val();
    var privPpal = 0;
    if(!checkSelected){
        checkSelected = 0;
    }
    // Si el privilegio seleccionado es distinto de 1(View), lo activo
    if(priv != 1)
        {
            $("#chk_" + module + "_1").attr('checked',true);
            privPpal = 1; // Me indica que en la accion debo agregar otra permisologia con id_privelege = 1
        }
    // Si el privilegio seleccionado es igual a 1(View) y lo estoy desactivando, entonces desactivo el resto
    if(priv == 1 && checkSelected !=1)
        {
            $("#chk_" + module + "_2").attr('checked',false);            
        }
    
    // Ajax para guardar los cambios de permisologia del usuario
    $(function(){
        $.ajax({
          type: "POST",
          url: "permisos/changePermissionUser?id_module=" + module + "&id_privilege=" + priv + "&status=" + checkSelected + "&privPpal=" + privPpal,
          dataType: "script",
          beforeSend: function(objeto){
                $("#message_" + module).show();
                $("#message_" + module).html("Processamento ...");
          },
          success: function(msg){
                $("#message_" + module).html('Dados armazenados &nbsp;&nbsp;&nbsp; ');                
                $("#message_" + module).delay(550).fadeOut("slow");
          },
          error: function(objeto, quepaso, otroobj){
                $("#message_" + module).hide();                
                $("#message_" + module).html('Error. Por favor, atualize navegador&nbsp;&nbsp;&nbsp; <a href="javascript:void(0);" onclick="fadeMessage(' + module + ' );">Ocultar</a>');
          }

        });
    });
    
}

function changeCategoryInNuclueByNews(idnucleo, idnews)
{
    // Detecto el status del check, checked o unchecked
    var category = $("#category").val();
    var url = 'http://'+location.hostname+'/backend_dev.php/';
    // Ajax para guardar los cambios de permisologia del usuario
    $(function(){
        $.ajax({
          type: "POST",
          url: url +"news/changeCategoryInNuclueByNews?id_news=" + idnews + "&id_nucleo=" + idnucleo + "&category=" + category,
          dataType: "script",
          beforeSend: function(objeto){
                $("#message").html("Wait ...");
          },
          success: function(msg){
                $("#message").animate({width:400, height:10}, "slow");
                $("#message").html('<div class="msn_ready">Dados armazenados</div>');       
                
          },
          error: function(objeto, quepaso, otroobj){
                $("#message").animate({width:400, height:10}, "slow");
                $("#message").html('<div class="msn_error">Error. Por favor, atualize navegador&nbsp;</div>');
          }
        });
    });
}

function uploadItem(moduleAction)
{
    var url = 'http://'+location.hostname+'/backend_dev.php/';
    var urlUpload = url + moduleAction;
    var btnUpload=$('#upload_image');
    var status=$('#mimeError');
    new AjaxUpload(btnUpload, {
    action: urlUpload,
    name: 'uploadfile',
    dataType: 'html',
    onSubmit: function(file,ext){
    //if there is an error
    if (! (ext && /^(jpg|png|jpeg|gif)$/.test(ext))){
        status.show();
        status.animate({opacity: 5000}, 0)
        status.animate({opacity: 0}, 7000);
        return false;
    }
    $('#preLoad').show();
    btnUpload.css("display","none");
    $('#msg_upload').css("display","none");
    $('#wait').css("display","");
    $('#wait').html("&nbsp;&nbsp;Wait until the upload image...");
    },
    onComplete: function(file, response){
    $('#preLoad').hide();
    //Add uploaded file to list
    $('#image_poster').append(response);
    $('#preLoad').remove().appendTo("#image_poster");
    $('#no_foto').fadeOut('');
    btnUpload.css("display","");
    $('#wait').css("display","none");
    $('#msg_upload').css("display","");
    }
    });
}

function mostrarEstrato(){
  if($('#paises').val() == 13){
    $('#estrato').show();
  }else{
    $('#estrato').hide();
  }
}

function mostrar_ocultar_zonas(){
  if($('#paises').val() == 9 || $('#paises').val() == 13){
    $('.js_zonas').show();
  }else{
    $('.js_zonas').hide();
  }
}

function flecha_mostrar_contenido(id, num){
  $('#'+id).show();
  $('#flecha_arriba_'+num).show();
  $('#flecha_abajo_'+num).hide();
}

function flecha_ocultar_contenido(id, num){
  $('#'+id).hide();
  $('#flecha_arriba_'+num).hide();
  $('#flecha_abajo_'+num).show();
}


/**
 * Selecciona la zona unica de la ciudad seleccionada anteriormente
 */
function selectZonaUnica(){
  //if($('#ciudades').select().val() != '')
  //{
    $('#zonas > option').each(function(){
      if($(this).text() == 'Unica')
      {
        $('#zonas').select().val($(this).val());
      }
    });
  //}
}


function verificaSelOtras(lin, item){
  if($('#'+item).select().val() == '-1'){
    $('#sug_'+lin).show();
  }else{
    $('#sug_'+ lin).hide();
    $('#sug_'+(lin+1)).hide();
    $('#sug_'+(lin+2)).hide();
  }
}


function muestraCambioDolar(id)
{
  if($('#id_tipo_moneda').select().val() == 2)
  {
    $('#'+id).show();
  }else{
    $('#'+id).hide();
  }
}

function focusPrimerCampo(){
  $(':input:text:visible:enabled:first').focus();
}

//Funcion que se encarga de llamar al constructor del boton para upload de archivo
function uploadImage(moduleAction)
{
  var url = 'http://'+location.hostname+'/backend.php/';
  var urlUpload  = url + moduleAction;
  var btnUpload  = $('#boton_agregar');
  var status     = $('#mimeError');
  var fileUpload = $('#fileUpload');
  var errorFileSize = $("#sizeError");
  new AjaxUpload(btnUpload,
  {
    action: urlUpload,
    name: 'uploadfile',
    dataType: 'html',
    onSubmit: function(file,ext){
      //Se ocultan los mensajes de error
      fileUpload.hide();
      status.hide();
      errorFileSize.hide();

      $('#preLoad').show();
      //if there is an error
      if(!(ext && /^(jpg|JPG|png|PNG|jpeg|JPEG|gif|GIF)$/.test(ext))){
        status.show();
        status.animate({
          opacity: 5000
        }, 0)
        status.animate({
          opacity: 0
        }, 7000);
        $('#preLoad').hide();
        return false;
      }

      btnUpload.css("display","none");
      $('#wait').css("display","");
      $('#wait').html("&nbsp;&nbsp;Espere mientras la imagen se carga...");
      return true;
    },
    onComplete: function(file, response){
      //Si hay error en el tamaño de la imagen se muestra el error
      $('#preLoad').hide();
      if(!response){
      /*errorFileSize.show();
        errorFileSize.animate({opacity: 5000}, 0)
        errorFileSize.animate({opacity: 0}, 7000);*/
      }else{
        $('#contenedorFotos').append(response);
        fileUpload.show();
        //Add uploaded file to list
        $('#preLoad').remove().appendTo("#contenedorFotos");
      }
      //$('#no_foto').fadeOut('');
      btnUpload.css("display","");
      $('#wait').css("display","none");
    }
  });
}

function disableFormFields(){
  $('input, select, textarea').attr('disabled', 'disabled');
}

function filtraProducto(id_tipo, id_linea, id_caracteristica)
{
    var url_fun = 'http://'+location.hostname+'/frontend_dev.php';
    
    $.ajax
    ({
        type: "POST",
        url:  url_fun + "/ajax/filtraProductos",
        data: "id_tipo=" + id_tipo + "&id_linea=" + id_linea + "&id_caracteristica=" + id_caracteristica,
        beforeSend: function(objeto){
            $("#productos-filtro").html("<img src='/images/loading.gif' border='0' /> ");
        },
        success: function(msg){            
            $("#productos-filtro").html(msg);
        }
    });    
    
}

function cargaRespostas(idnot)
{
    var url_fun = 'http://'+location.hostname+'/backend_dev.php';
    $.ajax
    ({
        type: "GET",
        url:  url_fun + "/notificacion/listaRespostas?id_notificacion=" + idnot,
        beforeSend: function(objeto){
            $("#list-comentarios-" + idnot).html("<img src='/images/loading.gif' border='0' /> ");
        },
        success: function(msg){
            $("#list-comentarios-" + idnot).html(msg);
        }
    });    
}

function totalRespostas(idnot)
{
    var url_fun = 'http://'+location.hostname+'/backend_dev.php';
    $.ajax
    ({
        type: "GET",
        url:  url_fun + "/notificacion/totalRespostas?id_notificacion=" + idnot,
        beforeSend: function(objeto){
            //$("#tot-" + idnot).html("");
        },
        success: function(msg){
            $("#tot-" + idnot).html(msg);
            if(msg > 0)
                {
                    $("#toogle-" + idnot).show();
                }else{
                    $("#toogle-" + idnot).hide();
                }
        }
    });    
}

function deleteComentario(idresp, idnot)
{
    var url_fun = 'http://'+location.hostname+'/backend_dev.php';
    $.ajax
    ({
        type: "GET",
        url:  url_fun + "/notificacion/deleteResposta?id_resposta=" + idresp,
        beforeSend: function(objeto){
            $("#resposta-" + idresp).html('Comentario Deletado');
        },
        success: function(msg){
            $("#resposta-" + idresp).html('');
            $("#resposta-" + idresp).hide();
            totalRespostas(idnot);
        }
    });    
}

function abreFormResposta()
{
    //$("#form-comentarios-<?php echo $Notificaciones->getIdNotificacion() ?>').show();
}

/**
 * Devuelve la url base.
 * ej: http://proyecto.com/app_env.php/
 */
function getBaseUrl()
{
    url_from   = String(window.location.href);    
    buscarEnv  = /_dev.php/;
    buscarApp  = /backend/;
    enviroment = (buscarEnv.test(url_from)) ? '_dev'    : '';
    aplication = (buscarApp.test(url_from)) ? 'backend' : 'frontend';
    url        = 'http://'+location.hostname+'/'+aplication+enviroment+'.php/';

    return url;
}


/**
 * Retorna el valor de un parametro
 */
function getParameter(varName)
{
    url_from  = String(window.location.href);
    url_from  = url_from.replace(getBaseUrl(), "");
    variables = url_from.split ("/");
    for (i = 0; i < variables.length; i++)
    {
        if(variables[i] == varName)
        {
            return variables[i+1];
        }
    }
    return false;
}