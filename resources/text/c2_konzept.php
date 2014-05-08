<div class="article_text">
    
     <br />    
<div id="photo_olga">
    <a class="fancybox" rel="group" href="<?php echo Constans::IMAGE_PATCH ?>tm_photo_1b.jpg">
        <img class="curved" src="<?php echo Constans::IMAGE_PATCH ?>tm_photo_1a.jpg" 
             alt="<?php echo Constans::KW_ROTKAEPPCHEN ?>">
    </a>

    <a title="Ich und meine Kinder (Gabriel und Evelin)" class="fancybox" rel="group" href="<?php echo Constans::IMAGE_PATCH ?>tm_photo_2b.jpg">
        <img class="curved" src="<?php echo Constans::IMAGE_PATCH ?>tm_photo_2a.jpg" alt="<?php echo Constans::KW_ROTKAEPPCHEN ?>"></a>
   </div>
 <br />
    
    <h2 class="non-top-h2"><?php echo Constans::CONCEPT ?>:</h2>
    <p>
        <img class="icon" src="<?php echo Constans::ICON_PATCH ?>check.png" alt="check" style="width: 16px;">
        <span id="konzept_vorwort" class="navi"><?php echo Constans::KW_VORWORT ?></span><br>
        <img class="icon" src="<?php echo Constans::ICON_PATCH ?>check.png" alt="check" style="width: 16px;">
        <span id="konzept_rahmenbedingungen" class="navi"><?php echo Constans::KW_RAHMENBEDINGUNGEN ?></span><br>
        <img class="icon" src="<?php echo Constans::ICON_PATCH ?>check.png" alt="check" style="width: 16px;">
        <span id="konzept_auf_zu" class="navi"><?php echo Constans::KW_AUF_ZU ?></span><br>   
        <img class="icon" src="<?php echo Constans::ICON_PATCH ?>check.png" alt="check" style="width: 16px;">
        <span id="konzept_ziele" class="navi"><?php echo Constans::KW_ZIELE ?></span><br> 
        <img class="icon" src="<?php echo Constans::ICON_PATCH ?>check.png" alt="check" style="width: 16px;">
        <span id="konzept_schwerpunkte" class="navi"><?php echo Constans::KW_SCHWERPUNKTE ?></span><br>          
        <img class="icon" src="<?php echo Constans::ICON_PATCH ?>check.png" alt="check" style="width: 16px;">
        <span id="konzept_eingewoehnung" class="navi"><?php echo Constans::KW_EINGEWOEHNUNG?></span><br> 
        <img class="icon" src="<?php echo Constans::ICON_PATCH ?>check.png" alt="check" style="width: 16px;">
        <span id="konzept_spiele" class="navi"><?php echo Constans::KW_SPIELE ?></span><br> 
        <img class="icon" src="<?php echo Constans::ICON_PATCH ?>check.png" alt="check" style="width: 16px;">
        <span id="konzept_tag" class="navi"><?php echo Constans::KW_TAG_MITTAGESSEN?></span><br> 
        <img class="icon" src="<?php echo Constans::ICON_PATCH ?>check.png" alt="check" style="width: 16px;">
        <span id="konzept_eltern" class="navi"><?php echo Constans::KW_ARBEIT_MIT_ELTERN?></span><br> 
        <img class="icon" src="<?php echo Constans::ICON_PATCH ?>check.png" alt="check" style="width: 16px;">
        <span id="konzept_institut" class="navi"><?php echo Constans::KW_ARBEIT_MIT_INSTITUT?></span><br>          
        <img class="icon" src="<?php echo Constans::ICON_PATCH ?>check.png" alt="check" style="width: 16px;">
        <span id="konzept_bezahlung" class="navi"><?php echo Constans::KW_BEZAHLUNG?></span><br> 
    </p>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        vorwort = "Vorwort";
        vorwortDiv = "vorwort";
        rahmenbedingungen = "Rahmenbedingungen";
        rahmenbedingungenDiv = "rahmenbedingungen";
        auf_zu = "&Ouml;ffnungs- und Schlie&szlig;zeiten";
        auf_zuDiv = "auf_zu";
        ziele = "Unsere Ziele";
        zieleDiv = "ziele";
        schwerpunkte = "P&auml;dagogische Schwerpunkte";
        schwerpunkteDiv = "schwerpunkte";
        eingewoehnung = "Eingew&ouml;hnung";
        eingewoehnungDiv = "eingewoehnung";
        spiele = "Spiele und sonstige Aktivit&auml;ten";
        spieleDiv = "spiele";
        tag = "Tagesablauf und Mittagessen";
        tagDiv = "tag";
        eltern = "Zusammenarbeit mit den Eltern";
        elternDiv = "eltern";
        institut = "Arbeit mit anderen Institutionen";
        institutDiv = "institut";
        bezahlung = "Bezahlung";
        bezahlungDiv = "bezahlung";
        
        $('li').removeClass("last");
        $('#ul_konzept').append("<li class='last' id='li_"+vorwortDiv+"'>"+ vorwort +"</li>");
        $('.navi').addClass('a');
        $('#konzept_'+vorwortDiv).removeClass('a');
        $('.c1').hide();
        $('#text_'+vorwortDiv).show();
        unclicable = vorwortDiv;
    })
    // Bei Click auf "meine erfahrung"
    $('#konzept_vorwort').bind("click", {
        click:"vorwort"
    }, konzept);
    $('#konzept_rahmenbedingungen').bind("click", {
        click:"rahmenbedingungen"
    }, konzept);
    $('#konzept_auf_zu').bind("click", {
        click:"auf_zu"
    }, konzept);
    $('#konzept_ziele').bind("click", {
        click:"ziele"
    }, konzept);
    $('#konzept_schwerpunkte').bind("click", {
        click:"schwerpunkte"
    }, konzept);
    $('#konzept_spiele').bind("click", {
        click:"spiele"
    }, konzept);
    $('#konzept_tag').bind("click", {
        click:"tag"
    }, konzept); 
    $('#konzept_eltern').bind("click", {
        click:"eltern"
    }, konzept);  
    $('#konzept_institut').bind("click", {
        click:"institut"
    }, konzept);  
    $('#konzept_eingewoehnung').bind("click", {
        click:"eingewoehnung"
    }, konzept);  
    $('#konzept_bezahlung').bind("click", {
        click:"bezahlung"
    }, konzept);
    
    function konzept(event){  
        if(event.data.click == vorwortDiv){   
            if(unclicable != vorwortDiv){                
                Bearbeitung(vorwort, vorwortDiv,"konzept");
            }
        } else if(event.data.click == rahmenbedingungenDiv){
            if(unclicable != rahmenbedingungenDiv){
                Bearbeitung(rahmenbedingungen, rahmenbedingungenDiv,"konzept");
            }
        } else if(event.data.click == auf_zuDiv){
            if(unclicable != auf_zuDiv){
                Bearbeitung(auf_zu, auf_zuDiv,"konzept");
            }
        } else if(event.data.click == zieleDiv){
            if(unclicable != zieleDiv){
                Bearbeitung(ziele, zieleDiv,"konzept");
            }
        } else if(event.data.click == schwerpunkteDiv){
            if(unclicable != schwerpunkteDiv){
                Bearbeitung(schwerpunkte, schwerpunkteDiv,"konzept");
            }
        } else if(event.data.click == spieleDiv){
            if(unclicable != spieleDiv){
                Bearbeitung(spiele, spieleDiv,"konzept");
            }
        } else if(event.data.click == tagDiv){
            if(unclicable != tagDiv){
                Bearbeitung(tag, tagDiv,"konzept");
            }
        } else if(event.data.click == elternDiv){
            if(unclicable != elternDiv){
                Bearbeitung(eltern, elternDiv,"konzept");
            }
        }else if(event.data.click == institutDiv){
            if(unclicable != institutDiv){
                Bearbeitung(institut, institutDiv,"konzept");
            }
        }else if(event.data.click == eingewoehnungDiv){
            if(unclicable != eingewoehnungDiv){
                Bearbeitung(eingewoehnung, eingewoehnungDiv,"konzept");
            }
        }else if(event.data.click == bezahlungDiv){
            if(unclicable != bezahlungDiv){
                Bearbeitung(bezahlung, bezahlungDiv,"konzept");
            }
        }
    }
</script>


<script type="text/javascript" src="resources/js/fnct_bearbeiten.js"></script>