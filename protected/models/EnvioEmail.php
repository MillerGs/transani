<?php
Yii::import('application.extensions.phpmailer.JPhpMailer');
class EnvioEmail {
    public function enaviar(array $address, array $to, $subject,$type, $contrasenia = null, $email = null) {
        $mail = new JPhpMailer();
        $mail->IsSMTP();
        $mail->Host = 'localhost';
        $mail->SetFrom($address[0], $address[1]);
        $mail->Subject = "Notificacion | ".$subject;
        switch ($type) {
            case 'olvideContrasenia':
                    $mail->MsgHTML($this->olvideContrasenia($contrasenia, $email));
                break;
            case 'nuevoRegistro':
                    $mail->MsgHTML($this->nuevoRegistro($contrasenia, $email));
                break;
        }
        $mail->AddAddress($to[0], $to[1]);
        $mail->send();
    }
    
    public function olvideContrasenia($contrasenia, $email){
        $message = '<body marginheight="0" marginwidth="0" topmargin="0" leftmargin="0" style="height: 100% !important; margin: 0; padding: 0; width: 100% !important;min-width: 100%;">
    <style type="text/css">
        body{height:100%;margin:0;padding:0;}
        .blk_img_dd_wrap{background: #f5f5f7;padding: 40px 0;}
        .blk_img_drop{border: 2px dashed #e6e6e8;border-radius: 6px;color: #9ca8af;margin: 0 auto;overflow: hidden;padding: 10px;position: relative;max-width: 210px;}
        .blk_img_drop_icon{background: url("/images/icn/img-block-dd.png") no-repeat top;display: inline-block;float: left;height: 65px;margin-right: 10px;width: 65px;}
        .blk_img_txt_wrap { float: left; max-width: 135px; }
        .blk_img_drop_txt{font-size: 22px;font-weight: bold;line-height: 26px;margin: 5px 0; }
        .blk_img_drop_link{font-size: 13px;margin: 0;}
        .blk_img_drop_link a{color: #16a7e0;cursor: pointer;font-weight: 600;margin-left: 5px;text-decoration: underline;text-transform: lowercase;}
        .blk_img_drop_link a:hover{color: #72c2a1;}
        .blk_img_drop_txt.no-dd {display: none;}
        .blk_img_drop_link.no-dd span{display: none;}
        .blk_img_drop_link.no-dd a{ font-size: 14px; display: inline-block; margin-left: 0; padding: 0;}
        .ie8 .blk_img_drop_link.no-dd a { padding-top: 20px; }
        .blk_vid_dd_wrap{ background: #f5f5f7; padding: 40px 0; }
        .blk_vid_dd{ border: 2px solid #e6e6e8; border-radius: 6px; display: inline-block; padding: 10px 12px; }
        .blk_vid_txt{ color: #16a7e0; cursor: pointer; font-size: 20px; font-weight: 600; line-height: 40px; text-decoration: underline; }
        .blk_vid_txt:before{ background: url("/images/icn/editor-video-play.png") no-repeat center; border: 4px solid #9ca8af; border-radius: 8px; content: ""; display: inline-block; float: left; height: 39px; width: 39px; margin-right: 10px; }
        @media screen { @media (min-width: 0px) {
                            .blk_img_drop_icon{
                                background-image: url("/images/icn/img-block-dd.svg");
                                background-size: 65px 65px;
                            }
                        }
        }
    </style>


    <table width="100%" cellspacing="0" cellpadding="0" border="0" name="bmeMainBody" bgcolor="#e6e6e8" style="background-color: rgb(230, 230, 232);"><tbody><tr><td width="100%" valign="top" align="center">    
                    <table cellspacing="0" cellpadding="0" border="0" name="bmeMainColumnParentTable"><tbody><tr><td name="bmeMainColumnParent">     
                                    <table name="bmeMainColumn" class="bmeHolder" style="max-width: 600px; overflow: visible;" cellspacing="0" cellpadding="0" border="0" align="center">  <tbody><tr><td width="100%" class="blk_container bmeHolder" name="bmePreHeader" valign="top" align="center" bgcolor="#e6e6e8" style="color: rgb(102, 102, 102); border: 0px none transparent; background-color: rgb(230, 230, 232);"></td></tr><tr><td width="100%" class="bmeHolder" valign="top" align="center" name="bmeMainContentParent" style="border-color: rgb(128, 128, 128); border-radius: 5px; border-collapse: separate; border-spacing: 0px;">    
                                                    <table name="bmeMainContent" style="border-radius: 5px; border-collapse: separate;border-spacing: 0px; overflow: hidden;" width="100%" cellspacing="0" cellpadding="0" border="0" align="center"><tbody><tr><td width="100%" class="blk_container bmeHolder" name="bmeHeader" valign="top" align="center" bgcolor="#ffffff" style="border: 0px none transparent; background-color: rgb(255, 255, 255);"><div id="dv_2" class="blk_wrapper">    
                                                                        <table class="blk" name="blk_image" width="600" border="0" cellpadding="0" cellspacing="0"><tbody><tr><td>    
                                                                                        <table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="bmeImage" style="padding: 20px; border-collapse: collapse;" align="center"><img src="https://images.benchmarkemail.com/client649211/image3310954.jpg" class="mobile-img-large" width="560" alt="" style="max-width: 951px; display: block; width: 560px;" border="0"></td></tr></tbody>    
                                                                                        </table></td></tr></tbody>    
                                                                        </table></div>
                                                                </td></tr> <tr><td width="100%">     
                                                                    <table width="100%" class="bmeHolder" cellspacing="0" cellpadding="0" border="0" align="center"> <tbody><tr> <td width="100%" valign="top" name="bmeBody" align="center" bgcolor="#ffffff" style="color: rgb(56, 56, 56); border: 0px none transparent; background-color: rgb(255, 255, 255);">     <div>    
                                                                                        <table class="blk_parent1" cellspacing="0" cellpadding="0" style="max-width: 600px;" width="600" align="center"><tbody><tr><td width="30%" valign="top" align="center" class="tdPart">      
                                                                                                        <table cellspacing="0" cellpadding="0" border="0" width="100%" class="blk_parent" align="left" style="float:left;"><tbody><tr><td valign="top" class="blk_container" name="bmeColumn1" bgcolor="" style="color: rgb(56, 56, 56); border: 0px none transparent;"><div id="dv_3" class="blk_wrapper">    
                                                                                                                            <table class="blk" name="blk_image" width="180" border="0" cellpadding="0" cellspacing="0"><tbody><tr><td>    
                                                                                                                                            <table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="bmeImage" style="padding: 20px; border-collapse: collapse;" align="center"><img src="https://images.benchmarkemail.com/client649211/image3310956.jpg" width="140" alt="" style="max-width: 273px; display: block; width: 140px;" border="0"></td></tr></tbody>    
                                                                                                                                            </table></td></tr></tbody>    
                                                                                                                            </table></div>

                                                                                                                        <div id="dv_5" class="blk_wrapper">    
                                                                                                                            <table class="blk" name="blk_text" width="180" border="0" cellpadding="0" cellspacing="0"><tbody><tr><td>    
                                                                                                                                            <table cellpadding="0" cellspacing="0" border="0" width="100%" class="bmeContainerRow"><tbody><tr><td class="tdPart" valign="top" align="center">    
                                                                                                                                                            <table name="tblText" style="float:left;" align="left" border="0" cellpadding="0" cellspacing="0" width="180"><tbody><tr><td name="tblCell" style="padding: 10px 20px; font-size: 14px; font-weight: normal; font-family: Arial, Helvetica, sans-serif; color: rgb(56, 56, 56); text-align: left;" align="left" valign="top"><div style="line-height: 150%;"><span>Emisi&oacute;n de giros con entrega inmediata, gracias a la interconexi&oacute;n inform&aacute;tica de nuestros terminales y con tarifas muy competentes. Todas nuestras unidades cuentan con equipos GPS siendo monitoreadas en forma permanente.</span></div></td></tr></tbody>    
                                                                                                                                                            </table></td></tr></tbody>    
                                                                                                                                            </table></td></tr></tbody>    
                                                                                                                            </table></div>
                                                                                                                    </td></tr></tbody>    
                                                                                                        </table> </td><td class="tdPart" valign="top" align="center" width="70%">     
                                                                                                        <table cellspacing="0" cellpadding="0" border="0" width="100%" class="blk_parent" align="right" style="float:right;"><tbody><tr><td valign="top" class="blk_container" name="bmeColumn2" bgcolor="" style="color: rgb(56, 56, 56); border: 0px none transparent;"><div id="dv_6" class="blk_wrapper">    
                                                                                                                            <table class="blk" name="blk_text" width="420" border="0" cellpadding="0" cellspacing="0"><tbody><tr><td>    
                                                                                                                                            <table cellpadding="0" cellspacing="0" border="0" width="100%" class="bmeContainerRow"><tbody><tr><td class="tdPart" valign="top" align="center">    
                                                                                                                                                            <table name="tblText" style="float:left;" align="left" border="0" cellpadding="0" cellspacing="0" width="420"><tbody><tr><td name="tblCell" style="padding: 20px; font-size: 30px; font-weight: normal; font-family: Arial, Helvetica, sans-serif; color: rgb(56, 56, 56); text-align: left;" align="left" valign="top"><div style="line-height: 150%;"><strong>Notificaci&oacute;n</strong></div></td></tr></tbody>    
                                                                                                                                                            </table></td></tr></tbody>    
                                                                                                                                            </table></td></tr></tbody>    
                                                                                                                            </table></div>
                                                                                                                        <div id="dv_7" class="blk_wrapper">    
                                                                                                                            <table class="blk" name="blk_text" width="420" border="0" cellpadding="0" cellspacing="0"><tbody><tr><td>    
                                                                                                                                            <table cellpadding="0" cellspacing="0" border="0" width="100%" class="bmeContainerRow"><tbody><tr><td class="tdPart" valign="top" align="center">    
                                                                                                                                                            <table name="tblText" style="float:left;" align="left" border="0" cellpadding="0" cellspacing="0" width="420"><tbody><tr><td name="tblCell" style="padding: 10px 20px; font-size: 14px; font-weight: normal; font-family: Arial, Helvetica, sans-serif; color: rgb(56, 56, 56); text-align: left;" align="left" valign="top"><div style="line-height: 150%;">
                                                                                                                                                                                  
                                                                                                                                                                                Estimado usuario usted ha solicitado un cambio de contrase&ntilde;a, por lo que hemos enviado este email con su nueva contrase&ntilde;a.    
                                                                                                                                                                                <br>    
                                                                                                                                                                                <br>Su nueva contrase&ntilde;a es: <strong>'.$contrasenia.'</strong>
                                                                                                                                                                                <br>    
                                                                                                                                                                                <br>Y su usuario es: <strong>'.$email.'</strong>
                                                                                                                                                                                <br>    
                                                                                                                                                                                <br>Por favor clic en el boton para iniciar sesi&oacute;n</div></td></tr></tbody> 
                                                                                                                                                            </table></td></tr></tbody>    
                                                                                                                                            </table></td></tr></tbody>    
                                                                                                                            </table></div>
                                                                                                                        <div id="dv_9" class="blk_wrapper">    
                                                                                                                            <table class="blk" name="blk_button" width="420" border="0" cellpadding="0" cellspacing="0"><tbody><tr><td width="20"></td><td align="center">    
                                                                                                                                            <table width="100%" cellspacing="0" cellpadding="0" border="0" class="tblContainer"><tbody><tr><td height="10"></td></tr><tr><td align="left">    
                                                                                                                                                            <table cellspacing="0" cellpadding="0" border="0" align="left" class="bmeButton" style="border-collapse: separate;"><tbody><tr><td class="bmeButtonText" style="border-collapse:seperate;border-radius:5px; border-width:0; border-style:none; border-color:transparent;background-color:#72C2A1; text-align: center;padding-top:20px;padding-bottom:20px; padding-left:40px; padding-right:40px;font-weight:bold;"><span style="font-family:Arial, Verdana; font-size:14px;color:#FFFFFF;">    
                                                                                                                                                                                <a target="_blank" style="color:#FFFFFF;text-decoration:none;" href="http://benchemail.bmetrack.com/c/l?u=64E22E1&amp;e=9AFA23&amp;c=9E7FB&amp;t=1&amp;l=4A20DE54&amp;email=zUgkcqEM4Q0ZprbOroL9zo9nNPuw6lIV&amp;seq=1">Bot&oacute;n</a></span></td></tr></tbody>    
                                                                                                                                                            </table></td></tr><tr><td height="10"></td></tr></tbody>    
                                                                                                                                            </table></td><td width="20"></td></tr></tbody>    
                                                                                                                            </table></div><div id="dv_8" class="blk_wrapper">    
                                                                                                                            <table class="blk" name="blk_text" width="420" border="0" cellpadding="0" cellspacing="0"><tbody><tr><td>    
                                                                                                                                            <table cellpadding="0" cellspacing="0" border="0" width="100%" class="bmeContainerRow"><tbody><tr><td class="tdPart" valign="top" align="center">    
                                                                                                                                                            <table name="tblText" style="float:left;" align="left" border="0" cellpadding="0" cellspacing="0" width="420"><tbody><tr><td name="tblCell" style="padding: 10px 20px; font-size: 14px; font-weight: normal; font-family: Arial, Helvetica, sans-serif; color: rgb(56, 56, 56); text-align: left;" align="left" valign="top"><div style="line-height: 150%;">Si usted no ha solicitado esta operaci&oacute;n p&oacute;ngase en contacto con nosotros a <span><strong>info@transani.esy.es</strong> para atenderle.</span></div></td></tr></tbody>    
                                                                                                                                                            </table></td></tr></tbody>    
                                                                                                                                            </table></td></tr></tbody>    
                                                                                                                            </table></div>

                                                                                                                    </td></tr></tbody>    
                                                                                                        </table></td></tr></tbody>    
                                                                                        </table></div> </td> </tr></tbody>    
                                                                    </table> </td></tr><tr><td width="100%" class="blk_container bmeHolder" name="bmePreFooter" valign="top" align="center" bgcolor="#ffffff" style="border: 0px none transparent; background-color: rgb(255, 255, 255);"><div id="dv_10" class="blk_wrapper">    
                                                                        <table cellspacing="0" cellpadding="0" border="0" name="blk_divider" width="600" class="blk"><tbody><tr><td style="padding-top:10px; padding-bottom:10px;padding-left:20px;padding-right:20px;" class="tblCellMain">    
                                                                                        <table width="100%" cellspacing="0" cellpadding="0" border="0" style="border-top-width: 1px; border-top-color: rgb(225, 225, 225); border-top-style: solid; min-width: 1px;" class="tblLine"><tbody><tr><td><span></span></td></tr></tbody>    
                                                                                        </table></td></tr></tbody>    
                                                                        </table></div>
                                                                    <div id="dv_11" class="blk_wrapper">    
                                                                        <table cellspacing="0" cellpadding="0" border="0" style="" name="blk_social_follow" width="600" class="blk"><tbody><tr><td style="padding:0px 0px 10px 0px;" class="tblCellMain">    
                                                                                        <table width="100%" cellspacing="0" cellpadding="0" border="0" style="float:left;" align="left" class="tblContainer"><tbody><tr><td class="tdItemContainer" style="padding: 0px 20px;">    
                                                                                                        <table cellspacing="0" cellpadding="0" border="0" style="table-layout: auto;"><tbody><tr><td valign="top"><!--[if gte mso 6]></td><td align="left" valign="top"><![endif]-->    
                                                                                                                        <table cellspacing="0" cellpadding="0" border="0" align="left" style="float: left; display: block;" type="facebook" class="bmeFollowItem"><tbody><tr><td width="24" style="padding-right:5px;padding-top:5px;height:30px;" class="bmeFollowItemIcon" align="left">    
                                                                                                                                        <a target="_blank" style="display: inline-block;background-color: rgb(53, 91, 161);border-radius: 0px;border-style: none; border-width: 0px; border-color: transparent;" href="http://benchemail.bmetrack.com/c/l?u=64E22E2&amp;e=9AFA23&amp;c=9E7FB&amp;t=1&amp;l=4A20DE54&amp;email=zUgkcqEM4Q0ZprbOroL9zo9nNPuw6lIV&amp;seq=1"><img width="24" border="0" height="24" alt="Facebook" src="https://ui.benchmarkemail.com/images/editor/socialicons/fb_btn.png" style="max-width: 57px; display:block;"></a></td></tr></tbody>    
                                                                                                                        </table><!--[if gte mso 6]></td><td align="left" valign="top"><![endif]-->    
                                                                                                                        <table cellspacing="0" cellpadding="0" border="0" align="left" style="float: left; display: block;" type="googleplus" class="bmeFollowItem"><tbody><tr><td width="24" style="padding-right:5px;padding-top:5px;height:30px;" class="bmeFollowItemIcon" align="left">    
                                                                                                                                        <a target="_blank" style="display: inline-block;background-color: rgb(214, 73, 46);border-radius: 0px;border-style: none; border-width: 0px; border-color: transparent;" href="http://benchemail.bmetrack.com/c/l?u=64E22E3&amp;e=9AFA23&amp;c=9E7FB&amp;t=1&amp;l=4A20DE54&amp;email=zUgkcqEM4Q0ZprbOroL9zo9nNPuw6lIV&amp;seq=1"><img width="24" border="0" height="24" alt="Google Plus" src="https://ui.benchmarkemail.com/images/editor/socialicons/gp_btn.png" style="max-width: 57px; display:block;"></a></td></tr></tbody>    
                                                                                                                        </table><!--[if gte mso 6]></td><td align="left" valign="top"><![endif]-->    
                                                                                                                        <table cellspacing="0" cellpadding="0" border="0" align="left" style="float: left; display: block;" type="twitter" class="bmeFollowItem"><tbody><tr><td width="24" style="padding-right:5px;padding-top:5px;height:30px;" class="bmeFollowItemIcon" align="left">    
                                                                                                                                        <a target="_blank" style="display: inline-block;background-color: rgb(50, 203, 255);border-radius: 0px;border-style: none; border-width: 0px; border-color: transparent;" href="http://benchemail.bmetrack.com/c/l?u=64E22E4&amp;e=9AFA23&amp;c=9E7FB&amp;t=1&amp;l=4A20DE54&amp;email=zUgkcqEM4Q0ZprbOroL9zo9nNPuw6lIV&amp;seq=1"><img width="24" border="0" height="24" alt="Twitter" src="https://ui.benchmarkemail.com/images/editor/socialicons/tw_btn.png" style="max-width: 57px; display:block;"></a></td></tr></tbody>    
                                                                                                                        </table></td></tr></tbody>    
                                                                                                        </table></td></tr></tbody>    
                                                                                        </table></td></tr></tbody>    
                                                                        </table></div>
                                                                </td></tr> </tbody>    
                                                    </table></td></tr><tr><td width="100%" class="blk_container bmeHolder" name="bmeFooter" valign="top" align="center" bgcolor="#e6e6e8" style="color: rgb(102, 102, 102); border: 0px none transparent; background-color: rgb(230, 230, 232);"><div id="dv_13" class="blk_wrapper">    
                                                        <table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_footer" style=""><tbody><tr><td name="tblCell" style="padding:20px;" valign="top" align="left">    
                                                                        </td></tr></tbody>    
                                                        </table></div></td></tr></tbody>    
                                    </table></td></tr></tbody>    
                    </table></td></tr></tbody>    
    </table>    
    <!-- /Test Path -->    

    <img src="https://benchemail.bmetrack.com/c/o?e=9AFA23&amp;c=9E7FB&amp;t=1&amp;l=4A20DE54&amp;email=zUgkcqEM4Q0ZprbOroL9zo9nNPuw6lIV&amp;relid=" alt="" border="0" style="display:none;" height="1" width="1">


</body>';
        return $message;
    }
    public function nuevoRegistro($contrasenia, $email){
        $message = '<body marginheight="0" marginwidth="0" topmargin="0" leftmargin="0" style="height: 100% !important; margin: 0; padding: 0; width: 100% !important;min-width: 100%;">
    <style type="text/css">
        body{height:100%;margin:0;padding:0;}
        .blk_img_dd_wrap{background: #f5f5f7;padding: 40px 0;}
        .blk_img_drop{border: 2px dashed #e6e6e8;border-radius: 6px;color: #9ca8af;margin: 0 auto;overflow: hidden;padding: 10px;position: relative;max-width: 210px;}
        .blk_img_drop_icon{background: url("/images/icn/img-block-dd.png") no-repeat top;display: inline-block;float: left;height: 65px;margin-right: 10px;width: 65px;}
        .blk_img_txt_wrap { float: left; max-width: 135px; }
        .blk_img_drop_txt{font-size: 22px;font-weight: bold;line-height: 26px;margin: 5px 0; }
        .blk_img_drop_link{font-size: 13px;margin: 0;}
        .blk_img_drop_link a{color: #16a7e0;cursor: pointer;font-weight: 600;margin-left: 5px;text-decoration: underline;text-transform: lowercase;}
        .blk_img_drop_link a:hover{color: #72c2a1;}
        .blk_img_drop_txt.no-dd {display: none;}
        .blk_img_drop_link.no-dd span{display: none;}
        .blk_img_drop_link.no-dd a{ font-size: 14px; display: inline-block; margin-left: 0; padding: 0;}
        .ie8 .blk_img_drop_link.no-dd a { padding-top: 20px; }
        .blk_vid_dd_wrap{ background: #f5f5f7; padding: 40px 0; }
        .blk_vid_dd{ border: 2px solid #e6e6e8; border-radius: 6px; display: inline-block; padding: 10px 12px; }
        .blk_vid_txt{ color: #16a7e0; cursor: pointer; font-size: 20px; font-weight: 600; line-height: 40px; text-decoration: underline; }
        .blk_vid_txt:before{ background: url("/images/icn/editor-video-play.png") no-repeat center; border: 4px solid #9ca8af; border-radius: 8px; content: ""; display: inline-block; float: left; height: 39px; width: 39px; margin-right: 10px; }
        @media screen { @media (min-width: 0px) {
                            .blk_img_drop_icon{
                                background-image: url("/images/icn/img-block-dd.svg");
                                background-size: 65px 65px;
                            }
                        }
        }
    </style>


    <table width="100%" cellspacing="0" cellpadding="0" border="0" name="bmeMainBody" bgcolor="#e6e6e8" style="background-color: rgb(230, 230, 232);"><tbody><tr><td width="100%" valign="top" align="center">    
                    <table cellspacing="0" cellpadding="0" border="0" name="bmeMainColumnParentTable"><tbody><tr><td name="bmeMainColumnParent">     
                                    <table name="bmeMainColumn" class="bmeHolder" style="max-width: 600px; overflow: visible;" cellspacing="0" cellpadding="0" border="0" align="center">  <tbody><tr><td width="100%" class="blk_container bmeHolder" name="bmePreHeader" valign="top" align="center" bgcolor="#e6e6e8" style="color: rgb(102, 102, 102); border: 0px none transparent; background-color: rgb(230, 230, 232);"></td></tr><tr><td width="100%" class="bmeHolder" valign="top" align="center" name="bmeMainContentParent" style="border-color: rgb(128, 128, 128); border-radius: 5px; border-collapse: separate; border-spacing: 0px;">    
                                                    <table name="bmeMainContent" style="border-radius: 5px; border-collapse: separate;border-spacing: 0px; overflow: hidden;" width="100%" cellspacing="0" cellpadding="0" border="0" align="center"><tbody><tr><td width="100%" class="blk_container bmeHolder" name="bmeHeader" valign="top" align="center" bgcolor="#ffffff" style="border: 0px none transparent; background-color: rgb(255, 255, 255);"><div id="dv_2" class="blk_wrapper">    
                                                                        <table class="blk" name="blk_image" width="600" border="0" cellpadding="0" cellspacing="0"><tbody><tr><td>    
                                                                                        <table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="bmeImage" style="padding: 20px; border-collapse: collapse;" align="center"><img src="https://images.benchmarkemail.com/client649211/image3310954.jpg" class="mobile-img-large" width="560" alt="" style="max-width: 951px; display: block; width: 560px;" border="0"></td></tr></tbody>    
                                                                                        </table></td></tr></tbody>    
                                                                        </table></div>
                                                                </td></tr> <tr><td width="100%">     
                                                                    <table width="100%" class="bmeHolder" cellspacing="0" cellpadding="0" border="0" align="center"> <tbody><tr> <td width="100%" valign="top" name="bmeBody" align="center" bgcolor="#ffffff" style="color: rgb(56, 56, 56); border: 0px none transparent; background-color: rgb(255, 255, 255);">     <div>    
                                                                                        <table class="blk_parent1" cellspacing="0" cellpadding="0" style="max-width: 600px;" width="600" align="center"><tbody><tr><td width="30%" valign="top" align="center" class="tdPart">      
                                                                                                        <table cellspacing="0" cellpadding="0" border="0" width="100%" class="blk_parent" align="left" style="float:left;"><tbody><tr><td valign="top" class="blk_container" name="bmeColumn1" bgcolor="" style="color: rgb(56, 56, 56); border: 0px none transparent;"><div id="dv_3" class="blk_wrapper">    
                                                                                                                            <table class="blk" name="blk_image" width="180" border="0" cellpadding="0" cellspacing="0"><tbody><tr><td>    
                                                                                                                                            <table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="bmeImage" style="padding: 20px; border-collapse: collapse;" align="center"><img src="https://images.benchmarkemail.com/client649211/image3310956.jpg" width="140" alt="" style="max-width: 273px; display: block; width: 140px;" border="0"></td></tr></tbody>    
                                                                                                                                            </table></td></tr></tbody>    
                                                                                                                            </table></div>

                                                                                                                        <div id="dv_5" class="blk_wrapper">    
                                                                                                                            <table class="blk" name="blk_text" width="180" border="0" cellpadding="0" cellspacing="0"><tbody><tr><td>    
                                                                                                                                            <table cellpadding="0" cellspacing="0" border="0" width="100%" class="bmeContainerRow"><tbody><tr><td class="tdPart" valign="top" align="center">    
                                                                                                                                                            <table name="tblText" style="float:left;" align="left" border="0" cellpadding="0" cellspacing="0" width="180"><tbody><tr><td name="tblCell" style="padding: 10px 20px; font-size: 14px; font-weight: normal; font-family: Arial, Helvetica, sans-serif; color: rgb(56, 56, 56); text-align: left;" align="left" valign="top"><div style="line-height: 150%;"><span>Emisi&oacute;n de giros con entrega inmediata, gracias a la interconexi&oacute;n inform&aacute;tica de nuestros terminales y con tarifas muy competentes. Todas nuestras unidades cuentan con equipos GPS siendo monitoreadas en forma permanente.</span></div></td></tr></tbody>    
                                                                                                                                                            </table></td></tr></tbody>    
                                                                                                                                            </table></td></tr></tbody>    
                                                                                                                            </table></div>
                                                                                                                    </td></tr></tbody>    
                                                                                                        </table> </td><td class="tdPart" valign="top" align="center" width="70%">     
                                                                                                        <table cellspacing="0" cellpadding="0" border="0" width="100%" class="blk_parent" align="right" style="float:right;"><tbody><tr><td valign="top" class="blk_container" name="bmeColumn2" bgcolor="" style="color: rgb(56, 56, 56); border: 0px none transparent;"><div id="dv_6" class="blk_wrapper">    
                                                                                                                            <table class="blk" name="blk_text" width="420" border="0" cellpadding="0" cellspacing="0"><tbody><tr><td>    
                                                                                                                                            <table cellpadding="0" cellspacing="0" border="0" width="100%" class="bmeContainerRow"><tbody><tr><td class="tdPart" valign="top" align="center">    
                                                                                                                                                            <table name="tblText" style="float:left;" align="left" border="0" cellpadding="0" cellspacing="0" width="420"><tbody><tr><td name="tblCell" style="padding: 20px; font-size: 30px; font-weight: normal; font-family: Arial, Helvetica, sans-serif; color: rgb(56, 56, 56); text-align: left;" align="left" valign="top"><div style="line-height: 150%;"><strong>Notificaci&oacute;n</strong></div></td></tr></tbody>    
                                                                                                                                                            </table></td></tr></tbody>    
                                                                                                                                            </table></td></tr></tbody>    
                                                                                                                            </table></div>
                                                                                                                        <div id="dv_7" class="blk_wrapper">    
                                                                                                                            <table class="blk" name="blk_text" width="420" border="0" cellpadding="0" cellspacing="0"><tbody><tr><td>    
                                                                                                                                            <table cellpadding="0" cellspacing="0" border="0" width="100%" class="bmeContainerRow"><tbody><tr><td class="tdPart" valign="top" align="center">    
                                                                                                                                                            <table name="tblText" style="float:left;" align="left" border="0" cellpadding="0" cellspacing="0" width="420"><tbody><tr><td name="tblCell" style="padding: 10px 20px; font-size: 14px; font-weight: normal; font-family: Arial, Helvetica, sans-serif; color: rgb(56, 56, 56); text-align: left;" align="left" valign="top"><div style="line-height: 150%;">
                                                                                                                                                                                Estimado usuario usted ha sido registrado en nuestra p&aacute;gina.    
                                                                                                                                                                                <br>    
                                                                                                                                                                                <br>Su correo es: <strong>'.$email.'</strong>
                                                                                                                                                                                <br>    
                                                                                                                                                                                <br>Su nueva contrase&ntilde;a es: <strong>'.$contrasenia.'</strong>
                                                                                                                                                                                <br>    
                                                                                                                                                                                <br>Por favor clic en el boton para iniciar sesi&oacute;n</div></td></tr></tbody>  
                                                                                                                                                            </table></td></tr></tbody>    
                                                                                                                                            </table></td></tr></tbody>    
                                                                                                                            </table></div>
                                                                                                                        <div id="dv_9" class="blk_wrapper">    
                                                                                                                            <table class="blk" name="blk_button" width="420" border="0" cellpadding="0" cellspacing="0"><tbody><tr><td width="20"></td><td align="center">    
                                                                                                                                            <table width="100%" cellspacing="0" cellpadding="0" border="0" class="tblContainer"><tbody><tr><td height="10"></td></tr><tr><td align="left">    
                                                                                                                                                            <table cellspacing="0" cellpadding="0" border="0" align="left" class="bmeButton" style="border-collapse: separate;"><tbody><tr><td class="bmeButtonText" style="border-collapse:seperate;border-radius:5px; border-width:0; border-style:none; border-color:transparent;background-color:#72C2A1; text-align: center;padding-top:20px;padding-bottom:20px; padding-left:40px; padding-right:40px;font-weight:bold;"><span style="font-family:Arial, Verdana; font-size:14px;color:#FFFFFF;">    
                                                                                                                                                                                <a target="_blank" style="color:#FFFFFF;text-decoration:none;" href="http://benchemail.bmetrack.com/c/l?u=64E22E1&amp;e=9AFA23&amp;c=9E7FB&amp;t=1&amp;l=4A20DE54&amp;email=zUgkcqEM4Q0ZprbOroL9zo9nNPuw6lIV&amp;seq=1">Bot&oacute;n</a></span></td></tr></tbody>    
                                                                                                                                                            </table></td></tr><tr><td height="10"></td></tr></tbody>    
                                                                                                                                            </table></td><td width="20"></td></tr></tbody>    
                                                                                                                            </table></div><div id="dv_8" class="blk_wrapper">    
                                                                                                                            <table class="blk" name="blk_text" width="420" border="0" cellpadding="0" cellspacing="0"><tbody><tr><td>    
                                                                                                                                            <table cellpadding="0" cellspacing="0" border="0" width="100%" class="bmeContainerRow"><tbody><tr><td class="tdPart" valign="top" align="center">    
                                                                                                                                                            <table name="tblText" style="float:left;" align="left" border="0" cellpadding="0" cellspacing="0" width="420"><tbody><tr><td name="tblCell" style="padding: 10px 20px; font-size: 14px; font-weight: normal; font-family: Arial, Helvetica, sans-serif; color: rgb(56, 56, 56); text-align: left;" align="left" valign="top"><div style="line-height: 150%;">Si usted no ha solicitado esta operaci&oacute;n p&oacute;ngase en contacto con nosotros a <span><strong>info@transani.esy.es</strong> para atenderle.</span></div></td></tr></tbody>    
                                                                                                                                                            </table></td></tr></tbody>    
                                                                                                                                            </table></td></tr></tbody>    
                                                                                                                            </table></div>

                                                                                                                    </td></tr></tbody>    
                                                                                                        </table></td></tr></tbody>    
                                                                                        </table></div> </td> </tr></tbody>    
                                                                    </table> </td></tr><tr><td width="100%" class="blk_container bmeHolder" name="bmePreFooter" valign="top" align="center" bgcolor="#ffffff" style="border: 0px none transparent; background-color: rgb(255, 255, 255);"><div id="dv_10" class="blk_wrapper">    
                                                                        <table cellspacing="0" cellpadding="0" border="0" name="blk_divider" width="600" class="blk"><tbody><tr><td style="padding-top:10px; padding-bottom:10px;padding-left:20px;padding-right:20px;" class="tblCellMain">    
                                                                                        <table width="100%" cellspacing="0" cellpadding="0" border="0" style="border-top-width: 1px; border-top-color: rgb(225, 225, 225); border-top-style: solid; min-width: 1px;" class="tblLine"><tbody><tr><td><span></span></td></tr></tbody>    
                                                                                        </table></td></tr></tbody>    
                                                                        </table></div>
                                                                    <div id="dv_11" class="blk_wrapper">    
                                                                        <table cellspacing="0" cellpadding="0" border="0" style="" name="blk_social_follow" width="600" class="blk"><tbody><tr><td style="padding:0px 0px 10px 0px;" class="tblCellMain">    
                                                                                        <table width="100%" cellspacing="0" cellpadding="0" border="0" style="float:left;" align="left" class="tblContainer"><tbody><tr><td class="tdItemContainer" style="padding: 0px 20px;">    
                                                                                                        <table cellspacing="0" cellpadding="0" border="0" style="table-layout: auto;"><tbody><tr><td valign="top"><!--[if gte mso 6]></td><td align="left" valign="top"><![endif]-->    
                                                                                                                        <table cellspacing="0" cellpadding="0" border="0" align="left" style="float: left; display: block;" type="facebook" class="bmeFollowItem"><tbody><tr><td width="24" style="padding-right:5px;padding-top:5px;height:30px;" class="bmeFollowItemIcon" align="left">    
                                                                                                                                        <a target="_blank" style="display: inline-block;background-color: rgb(53, 91, 161);border-radius: 0px;border-style: none; border-width: 0px; border-color: transparent;" href="http://benchemail.bmetrack.com/c/l?u=64E22E2&amp;e=9AFA23&amp;c=9E7FB&amp;t=1&amp;l=4A20DE54&amp;email=zUgkcqEM4Q0ZprbOroL9zo9nNPuw6lIV&amp;seq=1"><img width="24" border="0" height="24" alt="Facebook" src="https://ui.benchmarkemail.com/images/editor/socialicons/fb_btn.png" style="max-width: 57px; display:block;"></a></td></tr></tbody>    
                                                                                                                        </table><!--[if gte mso 6]></td><td align="left" valign="top"><![endif]-->    
                                                                                                                        <table cellspacing="0" cellpadding="0" border="0" align="left" style="float: left; display: block;" type="googleplus" class="bmeFollowItem"><tbody><tr><td width="24" style="padding-right:5px;padding-top:5px;height:30px;" class="bmeFollowItemIcon" align="left">    
                                                                                                                                        <a target="_blank" style="display: inline-block;background-color: rgb(214, 73, 46);border-radius: 0px;border-style: none; border-width: 0px; border-color: transparent;" href="http://benchemail.bmetrack.com/c/l?u=64E22E3&amp;e=9AFA23&amp;c=9E7FB&amp;t=1&amp;l=4A20DE54&amp;email=zUgkcqEM4Q0ZprbOroL9zo9nNPuw6lIV&amp;seq=1"><img width="24" border="0" height="24" alt="Google Plus" src="https://ui.benchmarkemail.com/images/editor/socialicons/gp_btn.png" style="max-width: 57px; display:block;"></a></td></tr></tbody>    
                                                                                                                        </table><!--[if gte mso 6]></td><td align="left" valign="top"><![endif]-->    
                                                                                                                        <table cellspacing="0" cellpadding="0" border="0" align="left" style="float: left; display: block;" type="twitter" class="bmeFollowItem"><tbody><tr><td width="24" style="padding-right:5px;padding-top:5px;height:30px;" class="bmeFollowItemIcon" align="left">    
                                                                                                                                        <a target="_blank" style="display: inline-block;background-color: rgb(50, 203, 255);border-radius: 0px;border-style: none; border-width: 0px; border-color: transparent;" href="http://benchemail.bmetrack.com/c/l?u=64E22E4&amp;e=9AFA23&amp;c=9E7FB&amp;t=1&amp;l=4A20DE54&amp;email=zUgkcqEM4Q0ZprbOroL9zo9nNPuw6lIV&amp;seq=1"><img width="24" border="0" height="24" alt="Twitter" src="https://ui.benchmarkemail.com/images/editor/socialicons/tw_btn.png" style="max-width: 57px; display:block;"></a></td></tr></tbody>    
                                                                                                                        </table></td></tr></tbody>    
                                                                                                        </table></td></tr></tbody>    
                                                                                        </table></td></tr></tbody>    
                                                                        </table></div>
                                                                </td></tr> </tbody>    
                                                    </table></td></tr><tr><td width="100%" class="blk_container bmeHolder" name="bmeFooter" valign="top" align="center" bgcolor="#e6e6e8" style="color: rgb(102, 102, 102); border: 0px none transparent; background-color: rgb(230, 230, 232);"><div id="dv_13" class="blk_wrapper">    
                                                        <table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_footer" style=""><tbody><tr><td name="tblCell" style="padding:20px;" valign="top" align="left">    
                                                                        </td></tr></tbody>    
                                                        </table></div></td></tr></tbody>    
                                    </table></td></tr></tbody>    
                    </table></td></tr></tbody>    
    </table>    
    <!-- /Test Path -->    

    <img src="https://benchemail.bmetrack.com/c/o?e=9AFA23&amp;c=9E7FB&amp;t=1&amp;l=4A20DE54&amp;email=zUgkcqEM4Q0ZprbOroL9zo9nNPuw6lIV&amp;relid=" alt="" border="0" style="display:none;" height="1" width="1">


</body>';
        return $message;
    }
}
