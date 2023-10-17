$(document).ready(function () {
    $(".navTopLink li .nav-link").click(function () {
        $(this)
          .addClass("active")
          .parent()
          .siblings()
          .find("a")
          .removeClass("active");
      });
    $(".iconHomeNav .iconHome a").click(function () {
        $(this).addClass("active")
        .parent()
        .siblings()
        .find("a")
        .removeClass("active");
    })
    $("body").css({
        paddingTop: $(".navTop").innerHeight(),
        paddingLeft : $(".slideBar").innerWidth(),
    });
    (function typier() {
        var typier = $(".typierEffect").data("typier"),
        typierLength = typier.length,
        n = 0;
        var typierEffect = setInterval(() => {
            $(".typierEffect").each(function () {
                $(this).html($(this).html() + typier[n])
                n+=1

                if (n >= typierLength) {
                clearInterval(typierEffect)
            }
            })
            
        }, 500)
    }())
    $(window).scroll(function () {
        if ($(window).scrollTop() > 250) {
          $(".fa-angle-up").show();
        } else {
          $(".fa-angle-up").fadeOut();
        }
      });
      $(".fa-angle-up").click(function () {
        scroll({
          top: 0,
          left: 0,
          behavior: "smooth",
        });
      });
      $("#navbar-toggler").on("click" , function () {
        $("header .navTop").toggleClass("active")
      })
})

