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
      $("#on").on("click" , function () {
        $("#on").hide()
        $("#frist").attr("value" , "1000")
        $("#frist").attr("disabled" , false)
        $("#off").show()
      })

      $("#off").on("click" , function () {
        $("#off").hide()
        $("#frist").attr("disabled" , true)
        $("#frist").attr("value" , "")
        $("#on").show()
      })

      $("#on1").on("click" , function () {
        $("#on1").hide()
        $("#second").attr("value" , "100")
        $("#second").attr("disabled" , false)
        $("#off1").show()
      })

      $("#off1").on("click" , function () {
        $("#off1").hide()
        $("#second").attr("disabled" , true)
        $("#second").attr("value" , "")
        $("#on1").show()
      })
      $("#cpc").attr("value" , "25")
      $(".iconProfile a").click(function (e) {
        (e).preventDefault()
        $(this).addClass("active").siblings().removeClass("active")
        $("#" + $(this).data("show")).show().siblings().hide()
      })
      $(".iconProfiles a").click(function (e) {
        (e).preventDefault()
        $(this).addClass("active").siblings().removeClass("active")
        $("#" + $(this).data("show")).show().siblings().hide()
      })

      $(".country").select2({
        placeholder: "Select a country",
        allowClear: true
    });
    $("#navbar-toggler").on("click" , function () {
      $(".navTop").toggleClass("active")
    })

})
