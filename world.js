window.onload = function () {
  const lookupCountryBtn = document.getElementById("lookup-count");
  const lookupCitiesBtn = document.getElementById("lookup-cities");
  const resultDiv = document.getElementById("result");

  lookupCountryBtn.addEventListener("click", function () {
    const country = document.getElementById("country").value;

    fetch("world.php?country=" + country + "&lookup=country")
      .then((response) => response.text())
      .then((data) => {
        resultDiv.innerHTML = data;
      })
      .catch((err) => (resultDiv.innerHTML = "<p>Error fetching data.</p>"));
  });

  lookupCitiesBtn.addEventListener("click", function () {
    const country = document.getElementById("country").value;

    fetch("world.php?country=" + country + "&lookup=cities")
      .then((response) => response.text())
      .then((data) => {
        resultDiv.innerHTML = data;
      })
      .catch((err) => (resultDiv.innerHTML = "<p>Error fetching data.</p>"));
  });
};
