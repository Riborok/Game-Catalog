/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!********************************************!*\
  !*** ./resources/js/page-js/send-email.js ***!
  \********************************************/
var receiverSelect = document.getElementById('receiver');
var sendToAllCheckbox = document.getElementById('send-to-all');
sendToAllCheckbox.addEventListener('change', function () {
  if (this.checked) {
    var optionAllUsers = document.createElement('option');
    optionAllUsers.value = 'all';
    optionAllUsers.text = 'All Users';
    receiverSelect.appendChild(optionAllUsers);
    receiverSelect.selectedIndex = receiverSelect.options.length - 1;
  } else receiverSelect.remove(receiverSelect.options.length - 1);
  receiverSelect.disabled = this.checked;
});
/******/ })()
;