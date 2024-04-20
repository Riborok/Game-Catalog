/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!***********************************************!*\
  !*** ./resources/js/page-js/visited-pages.js ***!
  \***********************************************/
var visitedPages = window.visitedPages;
var pageSize = window.pageSize;
var visitedPagesBody = document.getElementById('visitedPagesBody');
var showMoreBtn = document.getElementById('btnShowMore');
if (pageSize < visitedPages.length) {
  var showMorePages = function showMorePages() {
    var startIndex = currentPage * pageSize;
    var endIndex = (currentPage + 1) * pageSize;
    currentPage++;
    showPagesInRange(startIndex, endIndex);
    hideShowMoreButtonIfEndReached(endIndex);
  };
  var showPagesInRange = function showPagesInRange(startIndex, endIndex) {
    for (var i = startIndex; i < endIndex && i < visitedPages.length; i++) {
      var tr = createTableRow(visitedPages[i]);
      appendTableRow(tr);
    }
  };
  var createTableRow = function createTableRow(page) {
    var tr = document.createElement('tr');
    tr.innerHTML = "\n            <td>".concat(page.name, "</td>\n            <td>").concat(page.timestamp, "</td>\n        ");
    return tr;
  };
  var appendTableRow = function appendTableRow(tr) {
    visitedPagesBody.appendChild(tr);
  };
  var hideShowMoreButtonIfEndReached = function hideShowMoreButtonIfEndReached(endIndex) {
    if (endIndex >= visitedPages.length) hideShowMoreButton();
  };
  var hideShowMoreButton = function hideShowMoreButton() {
    showMoreBtn.remove();
  };
  showMoreBtn.classList.replace('d-none', 'd-flex');
  var currentPage = 1;
  showMoreBtn.addEventListener('click', showMorePages);
}
/******/ })()
;