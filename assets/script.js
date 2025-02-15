  // Show loader on page change
  document.querySelectorAll('a').forEach(link => {
    link.addEventListener('click', () => {
        document.querySelector('.overlay').style.display = 'block';
        document.querySelector('.loader').style.display = 'block';
    });
});