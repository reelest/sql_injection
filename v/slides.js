const slides = [
    "intro",
    // 1. Logically incorrect sql injection
    "0",
    "1",
    "2",
    "3",
    "4",
    "5",
    "6",
    "7",
    "8",
    "9"
];
let m = slides.indexOf(/\/v\/(.*).html/.exec(location.pathname)[1]);

//Body Styling
document.body.style.width = "100vw";
code.style.width = "100%";
code.style.wordBreak = "break-word";
code.style.lineHeight = "2em";
document.body.style.padding = "16px";
document.body.style.boxSizing = "border-box";
code.style.boxSizing = "border-box";
code.style.margin = "0";
document.body.style.margin="0";

// Prev and Next Buttons
document.body.innerHTML += `</br>
    <button id='prev' style='background:white;border:none;font-size:100px;float:left;display:block;color:red;opacity:0.1;'>&lt;</button>
    <i>Page ${m}</i>
    <button id='next' style='background:white;border:none;font-size:100px;float:right;display:block;color:green;opacity:0.1'>&gt;</button>`;
next.onclick = function () {
if (m == 0) prev.style.display = "none";
if (m == slides.length-1) next.style.display = "none";
    open(`/v/${slides[1 + m]}.html`,'_self');
};
prev.onclick = function () {
    open(`/v/${slides[-1 + m]}.html`,'_self');
};

//Highlighting
document.head.innerHTML += `
<style>
.p{
    color: ff20d0;
}

.r{
    color: red;
    background: #dddddd;
    border-bottom: 1px solid black;
}

.o{
    color: orange;
}
</style>
`;
