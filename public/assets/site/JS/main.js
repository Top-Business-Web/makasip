$(document).ready(function () {
  $(".navTopLink li a:not(:last)").click(function () {
    $(this)
      .addClass("active")
      .parent()
      .siblings()
      .find("a")
      .removeClass("active");
    $("body , html").animate(
      {
        scrollTop: $("#" + $(this).data("scroll")).offset().top - 200,
      },
      100
    );
  });
  $(".linkSocial .mainButton3").on("click", function (e) {
    e.preventDefault();
    $(this).addClass("active").siblings().removeClass("active");
    $("#" + $(this).data("show"))
      .fadeIn(500)
      .siblings()
      .hide();
    console.log($("#" + $(this).data("show")));
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

  $(window).scroll(function () {
    if ($(window).scrollTop() >= 66) {
      $("body").css("paddingTop", $("header .nav2").innerHeight());
      $("header .nav2").addClass("active");
      $("header .navTop").addClass("active");
      $(".LogoNav2").addClass("active");
      $(".ButtonsHeaderRE").addClass("active");
    } else {
      $("body").css("paddingTop", 0);
      $("header .nav2").removeClass("active");
      $("header .navTop").removeClass("active");
      $(".LogoNav2").removeClass("active");
      $(".ButtonsHeaderRE").removeClass("active");
    }
  });
  $(window).on("load", function () {
    $("#email").focus();
  });
  $(".MobileNav .showLoginRight").on("click", function (e) {
    e.preventDefault();
    $(".LoginRight").animate(
      {
        right: 0,
      },
      500
    );
  });
  $(".fa-xmark").on("click", function (e) {
    $(".LoginRight").animate(
      {
        right: -350,
      },
      500
    );
  });
  console.log($("#password").val())
  function changePassword() {
    
    $(".eye").on("click" , function () {
      if ($(".toggleSvg").attr("data-text") == "show") {
        $("#password").attr("type" , "text")
        $(".toggleSvg").attr("data-text" , "hide")
        $(".toggleSvg").addClass("fa-eye")
        $(".eye").addClass("active")
      }else{
        $("#password").attr("type" , "password")
        $(".toggleSvg").attr("data-text" , "show")
        $(".toggleSvg").addClass("fa-eye-slash")
        $(".eye").removeClass("active")
      }
    })
    $(".eye2").on("click" , function () {
      if ($(".toggleSvg2").attr("data-text") == "show") {
        $("#password2").attr("type" , "text")
        $(".toggleSvg2").attr("data-text" , "hide")
        $(".toggleSvg2").addClass("fa-eye")
        $(".eye2").addClass("active")
      }else{
        $("#password2").attr("type" , "password")
        $(".toggleSvg2").attr("data-text" , "show")
        $(".toggleSvg2").addClass("fa-eye-slash")
        $(".eye2").removeClass("active")
      }
    })
  }
  changePassword();
  $(".siadeButton").click(function () {
    $(".massage").animate({
      left: 0,

    } , function () {
      $(this).delay(2000).fadeOut()
    })
  })
  
});



