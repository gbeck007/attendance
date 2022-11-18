<?php
    require 'vendor/autoload.php';

    class SendEmail{

        public static function SendMail($to,$subject,$content){
            $key = ''; 

            $email = new \SendGrid\Mail\Mail();
            $email->setFrom("GlassfordBeckford@gmail.com"," Glassford Beckford");
            $email->setSubject($subject);
            $email->addto($to);
            $email->addContent("text/plain", $content);
                            

            $sendgrid = new \SendGrid($key);
            

            try{
                $response = $sendgrid->send($email);

            }catch(Exeption $e){
                echo 'Email exception Caught : '.$e->getMessage() ."\n";
                return false;

            }
        }

    }

?>