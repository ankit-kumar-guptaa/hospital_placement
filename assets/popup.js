function selectCountry(country, code) {
    fetch('save_country.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: 'country=' + encodeURIComponent(country) + '&code=' + encodeURIComponent(code)
    }).then(response => response.text())
      .then(data => {
          if (data === "Success") {
              window.location.href = "index.php"; // Redirect to main page
          } else {
              alert("Error saving country. Please try again.");
          }
      }).catch(error => {
          console.error('Error:', error);
          alert("An error occurred. Please try again.");
      });
}