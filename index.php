<?php
    require_once 'vendor/autoload.php';
        //send the mail.
        if ($file = fopen("data/temp.txt", "r")) {
            while(!feof($file)) {
        
                $line = fgets($file);    
                
                $m = new PHPMailer;

                $m->isSMTP();

                $m->SMTPAuth = true;

                //$m->SMTPDebug = 1;

                $m->Host = 'smtp.gmail.com';

                $m->Username = 'arpit.engghelp@gmail.com';

                $m->Password = 'Arpit@9835673415';

                $m->SMTPSecure = 'ssl';

                $m->Port = 465;

                $m->From = 'arpit.engghelp@gmail.com';

                $m->FromName = 'Arpit Anand';

                $m->addReplyTo('arpit.engghelp@gmail.com' , 'Reply Address');

                $m->isHTML(true);

                $m->addAttachment('files/ArpitAnand.pdf' , 'Resume Arpit Anand');//if not found wont send. size cause delay.

                //if want to send more file duplicate above line.

                $m->Subject = 'Internship/job';

                $m->Body = '<h2><strong>Check the mail</strong></h2>';//Try to use separate file.

                $m->AltBody = 'Alt Body';//Always Plain text
                
                $m->addAddress($line);

                if($m->send()){
                
                    echo 'Message Sent ' . $line;
                    echo '<br/>';
                }else{
                    echo 'Problem '.$line;
                }
    }

    fclose($file);
}
?>