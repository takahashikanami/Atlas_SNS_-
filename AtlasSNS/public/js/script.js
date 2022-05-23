jQuery(function ($) {
  $('#accordionMenu').on('click', function () {
    $('.userContent').slideToggle(200);
    /*矢印の向きを変更*/
    $('.userMenu').toggleClass('open', 200);
  });
});

let modalMenu = false;

//HTMLからの引数から投稿IDを取得
let editModal = function (id) {
  //.editModal-投稿IDと一致するものを定数に格納
  let checkForm = document.querySelector('.editModal-' + id);
  scrollTo(0, 0);
  if (modalMenu === false) {
    checkForm.style.display = "flex";
    modalMenu = true;
  }
  else if (modalMenu === true) {
    checkForm.style.display = "none";
    modalMenu = false;
  }
}
