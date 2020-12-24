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


    $.ajax({//create an ajax request to display.php
        type: "GET",
        url: "gallery.php",
        dataType: "html", //expect html to be returned                
        success: function (response) {
            $("#container").html(response);
            //alert(response);
            console.log("ajax works");
        }
    });


    //random light color palette generator for the well wishes note
    random = "hsl(" + Math.random() * 360 + ", 100%, 90%)";
    $(".note").css("background-color", random);
});
