$(document).ready(function() {
    $("#sprawdz_slowo").click(function() {
        if (($("#slowo_polskie").css("display")) != "none") {
            zamien_slowo("polskie");
        }
        else {
            zamien_slowo("obce");
        }
    });
    
    function zamien_slowo($obecne_slowo) {
        if ($obecne_slowo == "polskie") {
            $("#slowo_polskie").css("display", "none");
            $("#slowo_obce").css("display", "block");
        }
        else {
            $("#slowo_polskie").css("display", "block");
            $("#slowo_obce").css("display", "none");
        }
    }
    
    $("#sprawdz_slowo").click(function() {
        $("#pokaz_odpowiedz").css("display", "none");
        $("#wiem_nie_wiem").css("display", "block");
    });
    
    var licznik = 0;

    $("#dodaj-slowo").click(function() {
        licznik++;

        if (licznik > 9) {
            $("#za-duzo").css("display", "block");
            return;
        }

        $("#dodaj-slowo").before("<br><input type='text' class='form-control' id='pl-" + licznik + "' placeholder='Słowo w języku polskim'> <input type='text' class='form-control' id='eng-" + licznik + "' placeholder='Słowo w języku obcym'>&nbsp;");
    });

    $("#kurs-slowa").on("click", "tbody tr", function () {
        $(this).toggleClass("success");
    });
});
