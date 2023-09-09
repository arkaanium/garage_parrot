$(document).ready(function() {
    document.getElementById("items").innerHTML = "Chargement en cours...";
    getCatalog();
});

function getCatalog() {
    kmMin = document.getElementById('kmMin').value;
    kmMax = document.getElementById('kmMax').value;
    priceMin = document.getElementById('priceMin').value;
    priceMax = document.getElementById('priceMax').value;
    yearMin = document.getElementById('yearMin').value;
    yearMax = document.getElementById('yearMax').value;
    $.ajax({
        url: ("ajax/catalog.php?kmMin="+kmMin+"&kmMax="+kmMax+"&priceMin="+priceMin+"&priceMax="+priceMax+"&yearMin="+yearMin+"&yearMax="+yearMax),
        type: "GET",
        success: function(result) {
          document.getElementById("items").innerHTML = result;
        }
    });
}

function resetFilters() {
    document.getElementById('filters').reset();
    getCatalog();
}