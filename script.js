document.getElementById("searchInput").addEventListener("input", function() {
    let input = this.value.trim();
    if (input.length > 2) {
        let xhr = new XMLHttpRequest();
        xhr.open("GET", "./php/public/index.php?query=" + input, true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                let response = JSON.parse(xhr.responseText);
                // Display filtered results
                displayResults(response);
            }
        };
        xhr.send();
    }
});

function displayResults(results) {
    let resultsContainer = document.getElementById("results");
    resultsContainer.innerHTML = "";
    results.forEach(function(result) {
        let resultDiv = document.createElement("div");
        resultDiv.textContent = result.name;
        resultsContainer.appendChild(resultDiv);
    });
}
