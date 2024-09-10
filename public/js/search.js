document.addEventListener('DOMContentLoaded', function() {
    var searchInput = document.getElementById('searchInput');
    var table = document.getElementById('dataTable');
    var tableRows = table.querySelectorAll('tbody tr');

    searchInput.addEventListener('input', function() {
        var searchValue = searchInput.value.toLowerCase();

        tableRows.forEach(function(row) {
            var cells = row.getElementsByTagName('td');
            var rowContainsSearchValue = Array.from(cells).some(function(cell) {
                return cell.textContent.toLowerCase().includes(searchValue);
            });

            row.style.display = rowContainsSearchValue ? '' : 'none';
        });
    });
});