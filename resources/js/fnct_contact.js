$(document).ready(function () {
//    CHECKBOY
    $('input#check-mon').click(function () {
        doCheckBoxDays(this, 'mon');
    });
    $('input#check-tue').click(function () {
        doCheckBoxDays(this, 'tue');
    });
    $('input#check-wed').click(function () {
        doCheckBoxDays(this, 'wed');
    });
    $('input#check-thu').click(function () {
        doCheckBoxDays(this, 'thu');
    });
    $('input#check-fri').click(function () {
        doCheckBoxDays(this, 'fri');
    });

//      TIME
    $('span#full_mon').click(function () {
        fillAutomaticaly('mon');
    });
    $('span#full_tue').click(function () {
        fillAutomaticaly('tue');
    });
    $('span#full_wed').click(function () {
        fillAutomaticaly('wed');
    });
    $('span#full_thu').click(function () {
        fillAutomaticaly('thu');
    });
    $('span#full_fri').click(function () {
        fillAutomaticaly('fri');
    });
});

function doCheckBoxDays(obj, day) {
    var element = document.getElementById("root_" + day);
    if ($(obj).is(':checked')) {
        element.style.visibility = "visible";
    } else {
        element.style.visibility = "hidden";
    }
}

function fillAutomaticaly(day) {
    document.getElementById("from-" + day).value = '7';
    document.getElementById("to-" + day).value = '17';
    document.getElementById("check-" + day).checked = true;
}
function choose(event) {
    var value = event.options[event.selectedIndex].value;
    if (value === "c1_kontakt_form") {
        $("#contact-form").hide();
        $("#angebot-form").show();
    } else {
        $("#contact-form").show();
        $("#angebot-form").hide();
    }
}
