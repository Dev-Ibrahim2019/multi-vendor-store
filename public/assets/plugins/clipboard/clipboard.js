function setTooltip(data, message) {
  $(data).tooltip('hide')
      .attr('data-bs-original-title', message)
      .tooltip('show');
}

function hideTooltip(data) {
  setTimeout(function() {
      $(data).tooltip('hide');
  }, 2000);
}

// Clipboard
var clipboard = new ClipboardJS('.clipboard-icon');


clipboard.on('success', function(e) {

  // Get all "navbar-burger" elements
  const $clipboard = document.querySelectorAll('.clipboard-icon');

  // Check if there are any navbar burgers
  if ($clipboard.length > 0) {

      // Add a click event on each of them
      $clipboard.forEach(el => {
          el.addEventListener('click', () => {
              setTooltip(el, 'Copied!');
              hideTooltip(el);
          });
      });
  }
});

clipboard.on('error', function(e) {
  setTooltip('Failed!');
  hideTooltip();

});