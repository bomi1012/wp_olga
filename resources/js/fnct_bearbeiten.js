function Bearbeitung(link, div, seite, erzieher) {
    $('.navi').addClass('a');
    $('#' + seite + '_' + div).removeClass('a');
    unclicable = div;
    $('li.last').remove();
    $('li.erzieher').remove();
    $('#ul_' + seite).append("\<li class='erzieher'><span id='" + erzieher + "' class='navi a' onClick='reply(this.id)'>" + erzieher + "</span></li>\n\
        <li class='last' id='li_" + div + "'>" + link + "</li>");
    $('.c1').hide();
    $('#text_' + div).show();
}


