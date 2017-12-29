$(document).ready(function() {

    var licznik_sprawdz_slowo = 0;
    var licznik_fiszka = 0;
    var obecne_slowo = "pl";
    var dobre_odpowiedzi = 0;
    var zle_odpowiedzi = 0;
    var liczba_fiszek = $("#liczba-fiszek").text();

    $("#slowo p").text($("#form-wyslij-fiszki input:eq(0)").val());

    $("#odwroc-fiszke").click(function() {
        if (obecne_slowo == "pl") {
            $("#fiszka-pokaz-odpowiedz").css("display", "none");
            $("#fiszka-wiem-nie-wiem").css("display", "block");

            obecne_slowo = "eng";
        }
        else {
            $("#fiszka-pokaz-odpowiedz").css("display", "block");
            $("#fiszka-wiem-nie-wiem").css("display", "none");

            obecne_slowo = "pl";
            licznik_sprawdz_slowo++;
        }

        if (licznik_sprawdz_slowo > liczba_fiszek - 1) {
            $("#komunikat-koniec-rundy").append("<p>Liczba dobrych odpowiedzi: " + dobre_odpowiedzi + "</p><p>Liczba zlych odpowiedzi: " + zle_odpowiedzi + "</p>");
            $("#slowo").css("display", "none");
            $("#odwroc-fiszke").css("display", "none");
            $("#przycisk-wyslij-fiszki").css("display", "inline");
        }

        licznik_fiszka++;
        $("#slowo p").text($("#form-wyslij-fiszki input:eq(" + licznik_fiszka + ")").val());
    });

    pasek_czerwony = 0;
    pasek_zielony = 0;

    $("#wiem-przycisk").click(function() {
        pasek_zielony += 100 / liczba_fiszek;
        $("#pasek-dobra-odpowiedz").css("width", pasek_zielony + "%");
        dobre_odpowiedzi++;
    });

    $("#nie-wiem-przycisk").click(function() {
        pasek_czerwony += 100 / liczba_fiszek;
        $("#pasek-zla-odpowiedz").css("width", pasek_czerwony + "%");
        $("#slowo p").text($("#form-wyslij-fiszki input:eq(" + licznik_fiszka + ")").attr("name", ""));
        zle_odpowiedzi++;
    });

    var licznik = 0;

    $("#dodaj-slowo").click(function() {
        licznik++;

        if (licznik > 9) {
            $("#za-duzo").css("display", "block");
            return;
        }

        $("#dodaj-slowo").before("<br><input class='form-control' type='text' name='pl-" + licznik + "' placeholder='Słowo w języku polskim'> <input class='form-control' type='text' name='eng-" + licznik + "' placeholder='Słowo w języku obcym'>&nbsp;");
    });

    $("#kurs-slowa").on("click", "tbody tr", function () {
        id = $(this).attr("id").split("-").pop();

        if ($(this).hasClass("success")) {
            $(this).toggleClass("success");

            $("[name=" + id + "]").attr("disabled", "disabled");
        }
        else {
            $(this).toggleClass("success");

            $("[name=" + id + "]").removeAttr("disabled");
        }
    });
});
