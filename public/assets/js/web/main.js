/*=============== SHOW MENU ===============*/
const navMenu = document.getElementById("nav"),
    navToggle = document.getElementById("nav__toggle"),
    navClose = document.getElementById("nav__close");

/*===== MENU SHOW =====*/
/* Validate if constant exists */
if (navToggle) {
    navToggle.addEventListener("click", () => {
        navMenu.classList.add("show-menu");
    });
}

/*===== MENU HIDDEN =====*/
/* Validate if constant exists */
if (navClose) {
    navClose.addEventListener("click", () => {
        navMenu.classList.remove("show-menu");
    });
}

/*=============== REMOVE MENU MOBILE ===============*/
const navLink = document.querySelectorAll(".nav__link");

function linkAction() {
    const navMenu = document.getElementById("nav__menu");
    // When we click on each nav__link, we remove the show-menu class
    navMenu.classList.remove("show-menu");
}
navLink.forEach((n) => n.addEventListener("click", linkAction));

/*=============== CHANGE BACKGROUND HEADER ===============*/
function scrollHeader() {
    const header = document.getElementById("header");
    // When the scroll is greater than 80 viewport height, add the scroll-header class to the header tag
    if (this.scrollY >= 80) header.classList.add("scroll-header");
    else header.classList.remove("scroll-header");
}
window.addEventListener("scroll", scrollHeader);

/*=============== SHOW SCROLL UP ===============*/
function scrollUp() {
    const scrollUp = document.getElementById("scrollup");
    // When the scroll is higher than 400 viewport height, add the show-scroll class to the a tag with the scroll-top class
    if (this.scrollY >= 400) scrollUp.classList.add("show-scroll");
    else scrollUp.classList.remove("show-scroll");
}
window.addEventListener("scroll", scrollUp);

/*=============== SCROLL REVEAL ANIMATION ===============*/

/*=============== PRELOADER ===============*/
let preloader = document.getElementById("preloader");

function loader() {
    console.log("sdasda");
    setTimeout(function () {
        preloader.remove();
    }, 1500);
}

loader();

// Get all elements with class="closebtn"
var close = document.getElementsByClassName("closebtn");
var i;

// Loop through all close buttons
for (i = 0; i < close.length; i++) {
    // When someone clicks on a close button
    close[i].onclick = function () {
        // Get the parent of <span class="closebtn"> (<div class="alert">)
        var div = this.parentElement;

        // Set the opacity of div to 0 (transparent)
        div.style.opacity = "0";

        // Hide the div after 600ms (the same amount of milliseconds it takes to fade out)
        setTimeout(function () {
            div.style.display = "none";
        }, 600);
    };
}

// MODAL SHEET //
function showSheet(sheet) {
    // Select DOM elements
    console.log("." + sheet);
    const bottomSheet = document.querySelector("." + sheet);
    const sheetOverlay = bottomSheet.querySelector(
        "." + sheet + " .sheet__overlay"
    );
    const sheetContainer = bottomSheet.querySelector(
        "." + sheet + " .sheet__container"
    );
    const dragIcon = bottomSheet.querySelector("." + sheet + " .drag-icon");

    // Global variables for tracking drag events
    let isDragging = false,
        startY,
        startHeight;

    // Show the bottom sheet, hide body vertical scrollbar, and call updateSheetHeight
    const showBottomSheet = () => {
        bottomSheet.classList.add("show");
        document.body.style.overflowY = "hidden";
        document.getElementsByTagName("html")[0].style.overflowY = "hidden";
        updateSheetHeight(50);
    };

    const updateSheetHeight = (height) => {
        sheetContainer.style.height = `${height}vh`; //updates the height of the sheet content
        // Toggles the fullscreen class to bottomSheet if the height is equal to 100
        bottomSheet.classList.toggle("fullscreen", height === 100);
    };

    // Hide the bottom sheet and show body vertical scrollbar
    const hideBottomSheet = () => {
        bottomSheet.classList.remove("show");
        document.body.style.overflowY = "auto";
        document.getElementsByTagName("html")[0].style.overflowY = "unset";
    };

    // Sets initial drag position, sheetContainer height and add dragging class to the bottom sheet
    const dragStart = (e) => {
        isDragging = true;
        startY = e.pageY || e.touches?.[0].pageY;
        startHeight = parseInt(sheetContainer.style.height);
        bottomSheet.classList.add("dragging");
    };

    // Calculates the new height for the sheet content and call the updateSheetHeight function
    const dragging = (e) => {
        if (!isDragging) return;
        const delta = startY - (e.pageY || e.touches?.[0].pageY);
        const newHeight = startHeight + (delta / window.innerHeight) * 100;
        updateSheetHeight(newHeight);
    };

    // Determines whether to hide, set to fullscreen, or set to default
    // height based on the current height of the sheet content
    const dragStop = () => {
        isDragging = false;
        bottomSheet.classList.remove("dragging");
        const sheetHeight = parseInt(sheetContainer.style.height);
        sheetHeight < 25
            ? hideBottomSheet()
            : sheetHeight > 75
            ? updateSheetHeight(100)
            : updateSheetHeight(50);
    };

    dragIcon.addEventListener("mousedown", dragStart);
    document.addEventListener("mousemove", dragging);
    document.addEventListener("mouseup", dragStop);

    dragIcon.addEventListener("touchstart", dragStart);
    document.addEventListener("touchmove", dragging);
    document.addEventListener("touchend", dragStop);

    sheetOverlay.addEventListener("click", hideBottomSheet);
    showBottomSheet();
}
