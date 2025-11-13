document.addEventListener("DOMContentLoaded", () => {
  const searchButton = document.getElementById("search");
  const searchField = document.getElementById("searchField");
  const resultDiv = document.getElementById("result");

  searchButton.addEventListener("click", () => {
    const query = searchField.value.trim(); // user input
    const sanitizedQuery = encodeURIComponent(query); // prevent injection

    fetch(`superheroes.php?query=${sanitizedQuery}`)
      .then(response => response.text())
      .then(data => {
        // Display the result (HTML returned by PHP)
        resultDiv.innerHTML = data;
      })
      .catch(error => {
        console.error("Error fetching data:", error);
        resultDiv.innerHTML = "<p style='color:red;'>Something went wrong.</p>";
      });
  });
});
