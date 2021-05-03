window.onload = function () {
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

/*
function showPosition(position) {
    fetch('https://eu1.locationiq.com/v1/reverse.php?key=pk.2aaa45b75aab4c4d8a85def3455e7590&lat=' + position.coords.latitude + '&' + 'lon=' + position.coords.longitude + '&format=json')
        .then(response => response.json())
        .then(function (data) {
            //console.log(data);
            document.getElementById('location-search').value = (data.address.town || data.address.city) + ', ' + data.address.country;
        });
}*/