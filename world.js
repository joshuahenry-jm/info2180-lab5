window.onload = function () {
  const lookupBtn = document.getElementById("lookup-count");
  const resultDiv = document.getElementById("result");

  lookupBtn.addEventListener("click", function () {
    const country = document.getElementById("country").value;

    // Fetch data from world.php
    fetch("world.php?country=" + country)
      .then(response => response.text())
      .then(data => {
        resultDiv.innerHTML = data;   // Output results to the page
      })
      .catch(error => {
        resultDiv.innerHTML = "<p>Error fetching data.</p>";
        console.error(error);
      });
  });
};
