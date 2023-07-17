let thisPage = 1;
let limit = 4;
let list = document.querySelectorAll(".akademik__content .akademik__item");

function loadItem() {
    let beginGet = limit * (thisPage - 1);
    let endGet = limit * thisPage - 1;
    list.forEach((item, key) => {
        if (key >= beginGet && key <= endGet) {
            item.style.display = "block";
        } else {
            item.style.display = "none";
        }
    });
    pagination();
}
loadItem();

function pagination() {
    let count = Math.ceil(list.length / limit);
    document.querySelector(".pagination").innerHTML = "";

    if (thisPage != 1) {
        let prev = document.createElement("a");
        prev.innerText = "PREV";
        prev.setAttribute("onclick", "changePage(" + (thisPage - 1) + ")");
        prev.setAttribute("href", "#akademik");
        document.querySelector(".pagination").appendChild(prev);
    }

    for (i = 1; i <= count; i++) {
        let newPage = document.createElement("a");
        newPage.innerText = i;
        if (i == thisPage) {
            newPage.classList.add("active");
        }
        newPage.setAttribute("onclick", "changePage(" + i + ")");
        newPage.setAttribute("href", "#akademik");
        document.querySelector(".pagination").appendChild(newPage);
    }

    if (thisPage != count) {
        let next = document.createElement("a");
        next.innerText = "NEXT";
        next.setAttribute("onclick", "changePage(" + (thisPage + 1) + ")");
        next.setAttribute("href", "#akademik");
        document.querySelector(".pagination").appendChild(next);
    }
}

function changePage(i) {
    thisPage = i;
    loadItem();
}
