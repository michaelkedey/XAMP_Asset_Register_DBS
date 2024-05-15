// JavaScript
document.getElementById("searchInput").addEventListener("input", function() {
    // Get search query
    var query = this.value.toLowerCase();
    // Get table rows
    var rows = document.querySelectorAll("#dataTable tbody tr");
    // Iterate over rows and hide those that don't match search query
    rows.forEach(function(row) {
      var name = row.cells[0].textContent.toLowerCase();
      var location = row.cells[1].textContent.toLowerCase();
      if (name.includes(query) || location.includes(query)) {
        row.style.display = "";
      } else {
        row.style.display = "none";
      }
    });
  });
  

  // Sorting functionality for the "Name" column
document.getElementById("sortByName").addEventListener("click", function() {
    var table = document.getElementById("dataTable");
    var tbody = table.querySelector("tbody");
    var rows = Array.from(tbody.querySelectorAll("tr"));
    rows.sort((a, b) => {
        var nameA = a.cells[0].textContent.toUpperCase();
        var nameB = b.cells[0].textContent.toUpperCase();
        if (nameA < nameB) return -1;
        if (nameA > nameB) return 1;
        return 0;
    });
    rows.forEach(row => tbody.appendChild(row));
});
  // Sorting functionality can be implemented similarly, attaching event listeners to sorting elements and writing JavaScript functions to sort the table data.
  