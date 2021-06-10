function showDetails(e) {
    var icon = e.target;
    var details = document.querySelector('.transaction-details[data-id="' + icon.dataset.id + '"]');

    if (icon.src == window.location.origin + "/images/icons/icon_expand.svg") {
        details.classList.remove("hidden");
        icon.src = window.location.origin + "/images/icons/icon_collapse.svg";
    } else {
        details.classList.add("hidden");
        icon.src = "/images/icons/icon_expand.svg";
    }
}