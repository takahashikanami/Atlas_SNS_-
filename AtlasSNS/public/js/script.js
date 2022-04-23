jQuery(function ($) {
  $('#accordionMenu').on('click', function () {
    $('.userContent').slideToggle(200);
    /*矢印の向きを変更*/
    $('.userMenu').toggleClass('open', 200);
  });
});
