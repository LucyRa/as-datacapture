// Stop the form from resubmitting the data to the database when the page is refreshed.

if (window.history.replaceState) {
    window.history.replaceState( null, null, window.location.href );
}

//Re-draw the google chart as the screen is resized
$(window).resize(function() {
    drawChart();
});