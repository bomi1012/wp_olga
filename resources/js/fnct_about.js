$(document).ready(function(){
    allgemein = "Über mich";
    allgemeinOlga = "allgemein_olga";
    allgemeinHermann = "allgemein_hermann";
    erfahrung = "meine Erfahrung";
    erfahrungOlga = "erfahrung_olga";
    erfahrungHermann = "erfahrung_hermann";
        
    $('li').removeClass("last");
    $('#ul_about').append("\
            <li class='erzieher'><span id='Olga' class='navi a' onClick='reply(this.id)'>Olga</span></li>\n\
            <li class='last' id='li_"+allgemeinOlga+"'>"+ allgemein +"</li>");
    $('.navi').addClass('a');
    $('#about_'+allgemeinOlga).removeClass('a');
    $('#text_'+erfahrungOlga).hide();
    $('#text_'+allgemeinHermann).hide();
    $('#text_'+erfahrungHermann).hide();
    unclicable = allgemeinOlga;
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
        }
    } else if(event.data.click == allgemeinOlga){
        if(unclicable != allgemeinOlga){
            Bearbeitung(allgemein, allgemeinOlga, "about", "Olga");
        }
    } else if(event.data.click == erfahrungHermann){   
        if(unclicable != erfahrungHermann){                
            Bearbeitung(erfahrung, erfahrungHermann, "about", "Hermann");
        }
    } else if(event.data.click == allgemeinHermann){
        if(unclicable != allgemeinHermann) {
            Bearbeitung(allgemein, allgemeinHermann, "about", "Hermann");
        }
    }       
}