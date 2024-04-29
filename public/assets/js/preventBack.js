window.addEventListener("pageshow", function (event) {
    var historyTraversal =
        event.persisted ||
        (typeof window.performance != "undefined" &&
            window.performance.navigation.type === 2);
    if (historyTraversal) {
        // Page is being loaded from cache
        // Redirect to the login page
        window.location.reload(); // Refresh the page
    }
});
