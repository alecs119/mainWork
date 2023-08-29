let input = document.querySelectorAll("input");

input.forEach(elem => {
    elem.classList.add("input__input");
    elem.classList.remove("inputtext");
});

let inputtextarea = document.querySelectorAll("textarea");

inputtextarea.forEach(element => {
    element.classList.add("input__input");
    element.classList.remove("inputtextarea");
});