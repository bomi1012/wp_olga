$(document).ready(function(){
    allgemein = "&Uuml;ber mich";
    allgemeinOlga = "allgemein_olga";
    allgemeinHermann = "allgemein_hermann";
    allgemeinAll = "allgemein_all"
    erfahrung = "meine Erfahrung";
    erfahrungOlga = "erfahrung_olga";
    erfahrungHermann = "erfahrung_hermann";
        
//    $('li').removeClass("last");
//    $('#ul_about').append("\
//            <li class='erzieher'><span id='Olga' class='navi a' onClick='reply(this.id)'>Olga</span></li>\n\
//            <li class='last' id='li_"+allgemeinOlga+"'>"+ allgemein +"</li>");
    $('.navi').addClass('a');
    $('#about_'+allgemeinAll).removeClass('a');
    $('#text_'+erfahrungOlga).hide();
    $('#text_'+allgemeinHermann).hide();
    $('#text_'+erfahrungHermann).hide();
    $('#text_'+allgemeinOlga).hide();
    $('#photo_hermann').hide();
    $('#photo_olga').hide();
    unclicable = allgemeinAll;
});
// Bei Click auf "meine erfahrung"
$('#about_erfahrung_olga').bind("click", {
    click:"erfahrung_olga"
}, about);
$('#about_allgemein_olga').bind("click", {
    click:"allgemein_olga"
}, about);
$('#about_erfahrung_hermann').bind("click", {
    click:"erfahrung_hermann"
}, about);
$('#about_allgemein_hermann').bind("click", {
    click:"allgemein_hermann"
}, about);

/**
 * Sehe fnct_bearbeiten
 */
function reply(clicked_id) {
    if (clicked_id === "Hermann") {
       Bearbeitung(allgemein, allgemeinHermann, "about", "Hermann"); 
    } else if (clicked_id === "Olga") {
        Bearbeitung(allgemein, allgemeinHermann, "about", "Olga"); 
    }
}
  
function about(event){  
    if(event.data.click == erfahrungOlga){   
        if(unclicable != erfahrungOlga){                
            Bearbeitung(erfahrung, erfahrungOlga, "about", "Olga");
            $('#photo_hermann').hide();
            $('#photo_all').hide();
            $('#photo_olga').show();
        }
    } else if(event.data.click == allgemeinOlga){
        if(unclicable != allgemeinOlga){
            Bearbeitung(allgemein, allgemeinOlga, "about", "Olga");
            $('#photo_hermann').hide();
            $('#photo_all').hide();
            $('#photo_olga').show();
        }
    } else if(event.data.click == erfahrungHermann){   
        if(unclicable != erfahrungHermann){                
            Bearbeitung(erfahrung, erfahrungHermann, "about", "Hermann");
            $('#photo_hermann').show();
            $('#photo_all').hide();
            $('#photo_olga').hide();
        }
    } else if(event.data.click == allgemeinHermann){
        if(unclicable != allgemeinHermann) {
            Bearbeitung(allgemein, allgemeinHermann, "about", "Hermann");
            $('#photo_hermann').show();
            $('#photo_all').hide();
            $('#photo_olga').hide();
        }
    }       
}