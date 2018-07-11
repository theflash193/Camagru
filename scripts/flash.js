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

function postFile() {
    let input = document.getElementById('avatar');

    let xhr = new XMLHttpRequest();
    new FormData(input.value);
    // xhr.open("POST", "/camagru/getFile.php");
    // xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    // oReq.send(new FormData(input.value));
}

// Array()
// document.getElementsByClassName