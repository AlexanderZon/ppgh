<?php
/**
 * sendMail PHP 
 * @package AMSN
 * @author Henry Vallenilla <henryvallenilla@gmail.com>
 *
 */
class sendMail
{
    static function mailContato($request)
    {
        $nome            = $request->getParameter('nome');
        $email      = $request->getParameter('email');
        $telefone     = $request->getParameter('telefone');
        $assunto    = $request->getParameter('assunto');
        $mensaje   = $request->getParameter('mensagem');
        $global = new globalFunctions();
        $mensagem = $global->headerMail();
        $mensagem.= '           
            <tr>
                <td style="font-family:ArialHelvetica,sans-serif;margin:0px;font-size:14px">
                     <h2 style="font-size:19px;font-family:Arial,Helvetica,sans-serif;color:#333333">
                         Contato
                     </h2>
                 </td>
            </tr>
            <tr>
                <td style="font-family:Arial,Helvetica,sans-serif;margin:0px;font-size:14px">
                    Segue as informa&ccedil;&otilde;es abaixo: <br /><br />
                    <ul style="margin-top:0px;padding:5px 0px 0px 15px;line-height:22px">
                        <li style="margin-left:15px">
                              Nome:&nbsp;
                              <strong style="color:#333">'.$nome.'</strong>
                        </li>
                        <li style="margin-left:15px">
                              Email:&nbsp;<strong style="color:#333;">'.$email.'</strong></li>
                        </li>
                        <li style="margin-left:15px">
                              Telefone:&nbsp;
                              <strong style="color:#333;">'.$telefone.'</strong>
                        </li>
                        <li style="margin-left:15px">
                              Assunto:&nbsp;
                              <strong style="color:#333;">'.$assunto.'</strong>
                        </li>
                        <li style="margin-left:15px">
                              Comentarios:&nbsp;
                              <strong style="color:#333;">'.nl2br($mensaje).'.</strong>
                        </li>
                    </ul>
                </td>
            </tr>
        ';
        $mensagem.= $global->footerMail();
        $emailsender = 'coordpgh@usp.br';
        
        if(PHP_OS == "Linux") 
        {
            $quebra_linha = "\n"; //Se for Linux
        }elseif(PHP_OS == "WINNT"){
            $quebra_linha = "\r\n"; // Se for Windows
        }
        $headers = "MIME-Version: 1.1".$quebra_linha;
        $headers .= "Content-type: text/html; charset=iso-8859-1".$quebra_linha;
        $headers .= "From: ".$emailsender.$quebra_linha;
        $headers .= "Return-Path: " . $emailsender . $quebra_linha;
        if(mail(sfConfig::get('app_email_contato'), "Formulario de Contato", $mensagem, $headers, "-r". $emailsender))
        {
            return true;
        }else{
            return false;
        }
    }
    
    static function mailSolicitud($form, $lang)
    {
        $id       = $form->getValue('id_solicitud_tipo');
        $tipo_solicitud = SolicitudTipoI18nPeer::getNomeSolicitud($id, $lang);
        $subject = 'PPGH - Solicitações On-line - '.$tipo_solicitud['nome'];
        $nome       = $form->getValue('nome_completo');
        $email      = $form->getValue('email');
        $global = new globalFunctions();
        $mensagem = $global->headerMail();
        $mensagem.= '           
            <tr>
                <td style="font-family:ArialHelvetica,sans-serif;margin:0px;font-size:14px">
                     <h2 style="font-size:19px;font-family:Arial,Helvetica,sans-serif;color:#333333; text-transform: uppercase;">
                         SOLICITAÇÕES ON-LINE '.$tipo_solicitud['nome'].'
                     </h2>
                 </td>
            </tr>
            <tr>
                <td style="font-family:Arial,Helvetica,sans-serif;margin:0px;font-size:14px">
                    <strong>Prezado(a) '.$nome.'</strong><br /><br />                        
                     Esta é uma mensagem automática. Solicitamos, por favor, não responder este e-mail.   <br /><br />
                     Sua solicitação foi recebida com sucesso em nosso sistema. Em breve entraremos em contato.
                </td>
            </tr>
        ';
        $mensagem.= $global->footerMail();
        $mensagemAdm = $global->headerMail();
        $mensagemAdm.= '           
            <tr>
                <td style="font-family:ArialHelvetica,sans-serif;margin:0px;font-size:14px">
                     <h2 style="font-size:19px;font-family:Arial,Helvetica,sans-serif;color:#333333; text-transform: uppercase;">
                         SOLICITAÇÕES ON-LINE '.$tipo_solicitud['nome'].'
                     </h2>
                 </td>
            </tr>
            <tr>
                <td style="font-family:Arial,Helvetica,sans-serif;margin:0px;font-size:14px">
                    <strong>Prezado Administrador do sistema da PPHG</strong><br /><br />                        
                     '.$nome.' realizou uma solicitação on-line de '.$tipo_solicitud['nome'].',    <br />
                     Por favor, realizar a verificação das informações no     
                     <a href="http://www.ppgh.fflch.usp.br/backend.php">http://www.ppgh.fflch.usp.br/backend.php</a>
                </td>
            </tr>
        ';
        $mensagemAdm.= $global->footerMail();
        // Mensaje Administrador
        
        $emailsender = 'coordpgh@usp.br';
        
        if(PHP_OS == "Linux") 
        {
            $quebra_linha = "\n"; //Se for Linux
        }elseif(PHP_OS == "WINNT"){
            $quebra_linha = "\r\n"; // Se for Windows
        }
        $headers = "MIME-Version: 1.1".$quebra_linha;
        $headers .= "Content-type: text/html; charset=iso-8859-1".$quebra_linha;
        $headers .= "From: ".$emailsender.$quebra_linha;
        $headers .= "Return-Path: " . $emailsender . $quebra_linha;
        mail('henryvallenilla@gmail.com', $subject, $mensagemAdm, $headers, "-r". $emailsender);
        if(mail($email, $subject, $mensagem, $headers, "-r". $emailsender))
        {
            return true;
        }else{
            return false;
        }
    }
}

?>