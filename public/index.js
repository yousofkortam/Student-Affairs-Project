document.querySelectorAll('.card-icon').forEach(icon => {
  icon.addEventListener('click', function() {
    this.classList.toggle('active');
  });
})