function toggleNavbar(collapseID) {
    document.getElementById(collapseID).classList.toggle("hidden");
    document.getElementById(collapseID).classList.toggle("block");
}

document.getElementById('year').innerHTML = new Date().getFullYear();


AOS.init({
    delay: 200,
    duration: 1200,
    once: false,
})