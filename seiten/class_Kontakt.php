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
    
     public function formSenden($post) {
        $kid_firstname = $post["kid_firstname"];
        $kid_lastname = $post["kid_lastname"];
        $kid_tt = $post["kid_tt"];
        $kid_mm = $post["kid_mm"];
        $kid_yy = $post["kid_yy"];
        if ($post["kid_g"] == "m") {
            $kid_g = "Junge";
        } else {
            $kid_g = "Mädchen";
        }
        
        $father = $post["father"];
        $father_work = $post["father_work"];
        $mother = $post["mother"];
        $mother_work = $post["mother_work"];
        if (empty($post["parent_tel"])) {
            $parent_tel = "nicht eingetragen";
        } else {
            $parent_tel = $post["parent_tel"];
        }
        
        $parent_email = $post["parent_email"];

        $start = $post["start"];
        $end = $post["end"];
        $time = $post["time"];
        
        $days = "";
        if (!empty($post["check_mon"]) == true){
            $days .= "<p>Montag: von " . $post["from_mon"] ." bis " . $post["to_mon"] . "</p>";
        } 
        if (!empty($post["check_tue"]) == true){
            $days .= "<p>Dienstag: von " . $post["from_tue"] ." bis " . $post["to_tue"] . "</p>";  
        }        
        if (!empty($post["check_wed"]) == true){
            $days .= "<p>Mittwoch: von " . $post["from_wed"] ." bis " . $post["to_wed"] . "</p>";
        } 
        if (!empty($post["check_thu"]) == true){
            $days .= "<p>Donnerstag: von " . $post["from_thu"] ." bis " . $post["to_thu"] . "</p>";  
        }
        if (!empty($post["check_fri"]) == true){
            $days .= "<p>Donnerstag: von " . $post["from_fri"] ." bis " . $post["to_fri"] . "</p>";  
        }
        
        $additional_message =  nl2br($post["additional_message"]);
        
        $to = $this->_myEmail;
        $subject = "tagesmutter-landau.de: Angfragebogen";
        $message = "<body>
			Liebe Olga, du hast einen Anfragebogen für die Kinderbetreuung bekommen <br /> 
                        Folgende Information: <br /> 
                        <div style='margin-left:30px;'>
                        <p><span style='color:green;'>Kind:</span> $kid_firstname $kid_lastname geboren am $kid_tt.$kid_mm.$kid_yy ($kid_g)</p>
                        <p><span style='color:green;'>Vater:</span> $father ($father_work)</p>                        
                        <p><span style='color:green;'>Mutter:</span> $mother ($mother_work)</p>
                        <p><span style='color:green;'>Email:</span> $parent_email</p>
                        <p><span style='color:green;'>Telefonnummer:</span> $parent_tel</p>
                        <hr>
                        <p>Aufname: $start</p>
                        <p>Beendigung: $end</p>
                        <p>Öffnungzeit: $time</p>
                        <hr>                        
                        $days                    
                        <hr>
                        $additional_message
                        </div>
                    </body>";
        $header = 'MIME-Version: 1.1' . "\r\n";
        $header .= 'Content-type: text/html; charset=utf-8' . "\r\n";
        $header .= 'From: tagesmutter-landau.de' . "\r\n";
        mail($to, $subject, $message, $header);
        return true;
    }
}

?>
