function toggleShow(element) {
    console.log(element.style);
    if (element.style.display === "") {
        element.style.display = "block";
    } else if (element.style.display === "block") {
        element.style.display = "none";
    } else {
        element.style.display = "block";
    }
    
}

function toggleShowFlex(element) {
    console.log(element.style);
    if (element.style.display === "") {
        element.style.display = "flex";
    } else if (element.style.display === "flex") {
        element.style.display = "none";
    } else {
        element.style.display = "flex";
    }
    
}