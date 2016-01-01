<?php

class Kontakt {

    private $_myEmail = "kb_rotkaeppchen@freenet.de";

    public function __construct() {
        
    }

    public function NachrichtSenden($anrede, $name, $email, $nachricht) {
        $nachricht = nl2br($nachricht);
        $to = $this->_myEmail;
        $subject = "tagesmutter-landau.de: Nachricht";
        $message = "<body>
			Liebe Olga, du hast eine Nachricht von $anrede $name bekommen <br /> 
                        Email: <a href='mailto:$email'>$email</a>
                            <br />
                        <hr>
                        Nachricht:
                        <p>
                            $nachricht
			</p> 
                    </body>";
        $header = 'MIME-Version: 1.1' . "\r\n";
        $header .= 'Content-type: text/html; charset=utf-8' . "\r\n";
        $header .= 'From: tagesmutter-landau.de' . "\r\n";
        mail($to, $subject, $message, $header);
        return true;
    }
}

?>
