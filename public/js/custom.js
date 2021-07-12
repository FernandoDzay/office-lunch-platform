$(".submit-button").click(function(e) {
    e.preventDefault();
    var current = $(this);
    current.toggleClass("is_active");
    setTimeout(function() {
        current.parent().submit();
    }, 1000);
    
})

if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
}
