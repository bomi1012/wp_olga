<div class="article_text">
    <h2 class="non-top-h2"><?php echo Constans::GAST_BOOK?>:</h2>
    <p>
        <img class="icon" src="<?php echo Constans::ICON_PATCH ?>check.png" alt="check" style="width: 16px;">
        <span id="gaestebuch_lesen" class="navi"><?php echo Constans::GAST_BOOK?> lesen</span><br>   
        <img class="icon" src="<?php echo Constans::ICON_PATCH ?>check.png" alt="check" style="width: 16px;">
        <span id="gaestebuch_erstellen" class="navi">Kommentar eintragen</span> 

    </p>
    
    
   
    <!--http://www.plugolabs.com/twitter-bootstrap-button-generator/--> 
</div>
<script type="text/javascript">
$(document).ready(function(){
    write = "Kommentar hinzuf&uuml;gen";
    writeDiv = "erstellen";
    read = "G&auml;stebuch lesen";
    readDiv = "lesen";
        
    $('li').removeClass("last");
    $('#ul_gaestebuch').append("<li class='last' id='li_"+readDiv+"'>"+ read +"</li>");
    $('.navi').addClass('a');
    $('#gaestebuch_'+ readDiv).removeClass('a');
    $('#text_'+ writeDiv).hide();
    unclicable = readDiv;
})
// Bei Click auf "meine erfahrung"
$('#gaestebuch_erstellen').bind("click", {
    click:"erstellen"
}, gaestebuch);
$('#gaestebuch_lesen').bind("click", {
    click:"lesen"
}, gaestebuch);
    
    
function gaestebuch(event){  
    if(event.data.click == readDiv){   
        if(unclicable != readDiv){                
            Bearbeitung(read, readDiv, "gaestebuch");
        }
    } else if(event.data.click == writeDiv){
        if(unclicable != writeDiv){
            $("#id_Name").addClass("test");
            $("#id_Name").attr("test123");
            Bearbeitung(write, writeDiv, "gaestebuch");
            $("#id_Name").focus();
        }
    }         
}

</script>
<script type="text/javascript" src="resources/js/fnct_bearbeiten.js"></script>
