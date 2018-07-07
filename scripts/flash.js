var close = document.getElementsByClassName("closebtn");
var i;

for (i = 0; i < close.length; i++) {
    close[i].onclick = function(){
        var div = this.parentElement;
        div.style.opacity = "0";
        setTimeout(function(){ div.style.display = "none"; }, 600);
    }
}

function flashAlert(message) {
    let alert = document.getElementById("alert");
    let span = document.createElement("span");
    let div = document.createElement("div");

    span.className = "closebtn";
    div.innerHTML = "<strong>Danger!</strong> " + message;
    alert.appendChild(span);
    alert.appendChild(div);
}

// Array()
// document.getElementsByClassName