for (let element of document.getElementsByTagName("code")) {
    element.onclick = function () {
        a = document.createElement("textarea");
        a.value = element.innerText;
        element.appendChild(a);
        a.focus();
        a.select();
        document.execCommand("copy");
        element.removeChild(a);
    };
}
