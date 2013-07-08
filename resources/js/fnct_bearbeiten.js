function Bearbeitung(link, div, seite){
    $('.navi').addClass('a');
    $('#' + seite + '_' + div).removeClass('a');
    unclicable = div;
    $('li.last').remove();
    $('#ul_' + seite).append("<li class='last' id='li_" + div + "'>" + link + "</li>");
    $('.c1').hide();
    $('#text_' + div).show();
}