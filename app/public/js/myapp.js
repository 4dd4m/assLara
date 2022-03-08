/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*******************************!*\
  !*** ./resources/js/myapp.js ***!
  \*******************************/
//handling of the new form buttons 
var buttons = document.getElementsByClassName('newForm'); //bind an event listener to them

var _loop = function _loop(i) {
  buttons[i].addEventListener('click', function () {
    var targetDiv = buttons[i].getAttribute('data-name');
    var selector = "#" + targetDiv + "_form";
    var editForm = $(selector);

    if (editForm.css('display') == "none") {
      $(editForm).slideDown("slow", function () {});
      $(editForm).fadeIn("slow", function () {
        editForm.css('display', 'block');
      });
    } else {
      $(editForm).slideUp("slow", function () {});
      $(editForm).fadeOut("slow", function () {
        editForm.css('display', 'hidden');
      });
    }
  });
};

for (var i = 0; i < buttons.length; i++) {
  _loop(i);
}
/******/ })()
;