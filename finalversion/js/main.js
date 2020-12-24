/*This file contains the javascript events of the home page of the website*/

$(document).ready(function () {
    ActivateMenu();
    wrapper();
    scroll_top();
    console.log("ready!");
});


/*This function toggles the nav menu active/inactive status as
 *different pages are selected.*/
function ActivateMenu()
{
    var current_page_URL = location.href;
    $(".navbar-nav a").each(function ()
    {
        var target_URL = $(this).prop("href");
        if (target_URL === current_page_URL)
        {
            $('.navbar-nav a').parents('li, ul').removeClass('active');
            $(this).parent('li').addClass('active');
            return false;
        }
    });
}
;

function wrapper() {
    let wrapper = document.getElementById('wrapper');
    let topLayer = wrapper.querySelector('.top');
    let handle = wrapper.querySelector('.handle');
    let skew = 100;
    let delta = 0;

    if (wrapper.className.indexOf('skewed') !== -1) {
        skew = 1000;
    }

    wrapper.addEventListener('mousemove', function (e) {
        delta = (e.clientX - window.innerWidth / 2) * 0.5;

        handle.style.left = e.clientX + delta + 'px';

        topLayer.style.width = e.clientX + skew + delta + 'px';
    });
}
;

function scroll_top() {
    $(window).scroll(function () {
        $(".slideanim").each(function () {
            var pos = $(this).offset().top;

            var winTop = $(window).scrollTop();
            if (pos < winTop + 600) {
                $(this).addClass("slide");
            }
        });
    });
}


function validate() {
    var $valid = true;
    document.getElementById("user_info").innerHTML = "";
    document.getElementById("password_info").innerHTML = "";

    var userName = document.getElementById("user_name").value;
    var password = document.getElementById("password").value;
    if (userName == "")
    {
        document.getElementById("user_info").innerHTML = "required";
        $valid = false;
    }
    if (password == "")
    {
        document.getElementById("password_info").innerHTML = "required";
        $valid = false;
    }
    return $valid;
}

/* Function to disable all keypresses except for numerical values
 * Especially useful for entering fundraising and donation values*/
function validate(evt) {
    var theEvent = evt || window.event;

    if (theEvent.type === 'paste') {
        key = event.clipboardData.getData('text/plain');
    } else {
        var key = theEvent.keyCode || theEvent.which;
        key = String.fromCharCode(key);
    }
    var regex = /[0-9]|\./;
    if (!regex.test(key)) {
        theEvent.returnValue = false;
        if (theEvent.preventDefault)
            theEvent.preventDefault();
    }
}
