function selectedSection() {
    if (document.getElementById("card").checked) {
        document.getElementById("cardSection").style.display = "inline";
        document.getElementById("startDate").removeAttribute("required");
        document.getElementById("endDate").removeAttribute("required");
        document.getElementById("priceSub").removeAttribute("required");
        document.getElementById("placeSub").removeAttribute("required");
        document.getElementById("gymNameSub").removeAttribute("required");
    }
    else {
        document.getElementById("cardSection").style.display = "none";

    }
    if (document.getElementById("subscription").checked) {
        document.getElementById("subscriptionSection").style.display = "inline";
        document.getElementById("count").removeAttribute("required");
        document.getElementById("validity").removeAttribute("required");
        document.getElementById("priceCard").removeAttribute("required");
        document.getElementById("placeCard").removeAttribute("required");
        document.getElementById("gymNameCard").removeAttribute("required");
    }
    else {
        document.getElementById("subscriptionSection").style.display = "none";

    }
}