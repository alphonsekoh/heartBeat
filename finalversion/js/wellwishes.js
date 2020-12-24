$(document).ready(function () {
    $(window).scroll(function () {
        $(".slideanim").each(function () {
            var pos = $(this).offset().top;

            var winTop = $(window).scrollTop();
            if (pos < winTop + 600) {
                $(this).addClass("slide");
            }
        });
    });

    //random light color palette generator for the well wishes note
    random = "hsl(" + Math.random() * 360 + ", 100%, 90%)";
    $(".note").css("background-color", random);
});



