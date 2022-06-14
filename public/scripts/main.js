$(document).ready(function() {
    $("#navbar").click(function() {
        if ($(".navbar").is(":hidden"))
            $(".navbar").show(250);
        else
            $(".navbar").hide(250);
        $("#navbar").toggleClass("rotate-180");
    });
    $(".card-works").find("img").click(function() {
        var src = $(this).attr("src");
        $("body").append("<div class='popup'>"+
        "<div class='popup-content'>"+
            "<img src='"+src+"' id='rotate-img' class='w-100'>"+
            "<p class='image-info'>Нажмите на картинку, чтобы повернуть её.</p>"+
            "<i class='bi bi-x-lg close-popup'></i>"+
        "</div>"+
        "</div>");
        $(".popup").css("display", "flex").hide().fadeIn(300);
        if (screen.width < 800)
            $("#rotate-img").click(function () {
                $(this).toggleClass("w-100").toggleClass("rotate-90").toggleClass("w-250");
            });
        $(".close-popup").click(function () {
            $(".popup").fadeOut(300);
            setTimeout(function () {
                $(".popup").remove();
            }, 300);
        });
    });
    $('[data-bs-toggle="popover"]').popover({
        placement: 'bottom'
    });
});
