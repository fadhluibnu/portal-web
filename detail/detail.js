$(window).scroll(function () {
  var wScroll = $(this).scrollTop();

  if (wScroll < 50) {
    $(".navbarDetail").removeClass("border");
  }

  if (wScroll < $(".diskusiDetail").offset().top) {
    $(".deskripsi").addClass("bg-light");
    $(".diskusi").removeClass("bg-light");
    $(".navbarDetail").addClass("border");
  }

  if (wScroll > $(".diskusiDetail").offset().top - 10) {
    $(".deskripsi").removeClass("bg-light");
    $(".diskusi").addClass("bg-light");
    $(".navbarDetail").addClass("border");
  }
});
