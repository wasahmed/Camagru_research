const video = document.getElementById('video');
const canvas = document.getElementById('edit');
const snap = document.getElementById('snap');
const apply = document.getElementById('apply');
const s1 = document.getElementById('s1');
const s2 = document.getElementById('s2');
const s3 = document.getElementById('s3');


feed();

var context = canvas.getContext('2d');
snap.addEventListener("click", function () {
    context.drawImage(video, 0, 0, 416, 300);
});

function feed() {

    var constrains = {
        video: { width: 416, height: 300 }
    };
    navigator.mediaDevices.getUserMedia(constrains).then(stream => {
        video.srcObject = stream;
    });
}
apply.addEventListener("click", function() {
    var x = document.getElementById('stickers').value;
    if (x == "s1")
        context.drawImage(s1, 50, 50, 80, 80);
    else if (x == "s2")
        context.drawImage(s2, 80, 20, 80, 80);
    else if (x == "s3")
        context.drawImage(s3, 20, 80, 80, 80);
    else
        context.drawImage(video, 0, 0, 416, 300);
})
var save = document.getElementById("save");

save.addEventListener("click", function () {

    var data = "img=" + canvas.toDataURL();
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            alert("success");
            location.reload();
        }
    };
    xhttp.open("POST", "cam.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(data);

});
