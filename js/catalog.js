$(document).ready(function() {
    document.getElementById("items").innerHTML = "Chargement en cours...";
    getCatalog();
});

function getCatalog() {
    kmMin = document.getElementById('kmMin').value;
    kmMax = document.getElementById('kmMin').value;
    priceMin = document.getElementById('kmMin').value;
    priceMax = document.getElementById('kmMin').value;
    yearMin = document.getElementById('kmMin').value;
    yearMax = document.getElementById('kmMin').value;
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