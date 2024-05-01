const visitedPages = window.visitedPages;
const pageSize = window.pageSize;
const visitedPagesBody = document.getElementById('visitedPagesBody');
const showMoreBtn = document.getElementById('btnShowMore');

if (pageSize < visitedPages.length) {
    showMoreBtn.classList.replace('d-none', 'd-flex');

    let currentPage = 1;
    showMoreBtn.addEventListener('click', showMorePages);

    function showMorePages() {
        const startIndex = currentPage * pageSize;
        const endIndex = (currentPage + 1) * pageSize;
        currentPage++;

        showPagesInRange(startIndex, endIndex);
        hideShowMoreButtonIfEndReached(endIndex);
    }

    function showPagesInRange(startIndex, endIndex) {
        for (let i = startIndex; i < endIndex && i < visitedPages.length; i++) {
            const tr = createTableRow(visitedPages[i]);
            appendTableRow(tr);
        }
    }

    function createTableRow(page) {
        const tr = document.createElement('tr');
        tr.innerHTML = `
            <td>${page.name}</td>
            <td>${page.timestamp}</td>
        `;
        return tr;
    }

    function appendTableRow(tr) {
        visitedPagesBody.appendChild(tr);
    }

    function hideShowMoreButtonIfEndReached(endIndex) {
        if (endIndex >= visitedPages.length)
            hideShowMoreButton();
    }

    function hideShowMoreButton() {
        showMoreBtn.remove();
    }
}
