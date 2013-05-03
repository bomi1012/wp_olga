$(document).ready(function(){
    allgemein = "Allgemein";
    allgemeinDiv = "allgemein";
    erfahrung = "meine Erfahrung";
    erfahrungDiv = "erfahrung";
        
    $('li').removeClass("last");
    $('#ul_about').append("<li class='last' id='li_"+allgemeinDiv+"'>"+ allgemein +"</li>");
    $('.navi').addClass('a');
    $('#about_'+allgemeinDiv).removeClass('a');
    $('#text_'+erfahrungDiv).hide();
    unclicable = allgemeinDiv;
})
// Bei Click auf "meine erfahrung"
$('#about_erfahrung').bind("click", {
    click:"erfahrung"
}, about);
$('#about_allgemein').bind("click", {
    click:"allgemein"
}, about);
    
    
function about(event){  
    if(event.data.click == erfahrungDiv){   
        if(unclicable != erfahrungDiv){                
            Bearbeitung(erfahrung, erfahrungDiv, "about");
        }
    } else if(event.data.click == allgemeinDiv){
        if(unclicable != allgemeinDiv){
            Bearbeitung(allgemein, allgemeinDiv, "about");
        }
    }         
}