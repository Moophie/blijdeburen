function getLocation() {
    alert("hello");
    var geolng = document.querySelector(".geolng");
    var geolat = document.querySelector(".geolat");
    
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(changePosition);
        } else {
            x.innerHTML = "Geolocation is not supported by this browser.";
        }

    function changePosition(position) {
        geolng.value = position.coords.longitude;
        geolat.value = position.coords.latitude;
    }
}