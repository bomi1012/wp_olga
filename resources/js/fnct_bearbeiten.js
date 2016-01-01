function Bearbeitung(link, div, seite, vorLast) {
    $('.navi').addClass('a');
    $('#' + seite + '_' + div).removeClass('a');
    unclicable = div;
    $('li.last').remove();
    $('li.erzieher').remove();
    $('li.about').remove();
    if(vorLast != null) {
    $('#ul_' + seite).append("\<li class='about'><a href='about.php'>\u00dcber uns</a></li><li class='erzieher'><span id='" + vorLast + "' class='navi a' onClick='reply(this.id)'>" + vorLast + "</span></li>\n\
        <li class='last' id='li_" + div + "'>" + link + "</li>");
    } else {
      $('#ul_' + seite).append("<li class='last' id='li_" + div + "'>" + link + "</li>");  
    }
    $('.c1').hide();
    $('#text_' + div).show();
}


