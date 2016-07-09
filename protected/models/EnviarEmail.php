<?php

/* * *****************************************************************************
 * Proyecto realizado por Miller Gómez
 * Para soporte escribe a contacto@millergomez.com
 * Visita nuestra web http://www.millergomez.com
 * **************************************************************************** */
Yii::import('application.extensions.phpmailer.JPhpMailer');

class EnviarEmail {
    public function enviar($from, array $to, $subjet, $message) {
        $mail = new JPhpMailer;
        $mail->IsSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->Username = "pescobalmerino@gmail.com";
        $mail->Password = "denegado1824";
        $mail->Port = 465;
        $mail->Subject = $subjet;
        $mail->MsgHTML($message);
        $mail->SetFrom($from);
        $mail->AddAddress($to[0], $to[1]);
        $mail->Send();
    }
}
