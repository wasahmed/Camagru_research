(function(){
    var video = document.getElementById('vid'),
    canvas = document.getElementById('canvas'),
    context = canvas.getContext('2d'),
    // data = canvas.toDataURL('image/png'),
    photo = document.getElementById('pic');
    if(navigator.mediaDevices && navigator.mediaDevices.getUserMedia)
    {
        navigator.mediaDevices.getUserMedia({ video: true, audio: false }).then(function(stream)
        {
            video.srcObject = stream;
            video.play();
        });
    }

    document.getElementById('capture').addEventListener('click', function()
    {
        context.drawImage(video, 0, 0, 400, 300);
        photo.setAttribute('src', canvas.toDataURL('image/png'));

    });

    document.getElementById('save').addEventListener('click', function(e)
    {
       var image = canvas.toDataURL('image/png');
       var xhttp = new XMLHttpRequest();
       xhttp.onreadystatechange = function(){
           if (this.readyState == 4 && this.status == 200){
               alert(this.responseText);
           }
       }
       xhttp.open("post", "cam.php",false);
       xhttp.send(image);
    });
    // function setPicture(select){
    //     var DD = document.getElementById('dropdown');
    //     var value = DD.options[DD.selectedIndex].value;
    //     img1.src = value;
    //   }
    function stickers(path) {
        var sticker = new Image();
        var width = video.offsetWidth, height = video.offsetHeight;
        sticker.src = path;
        if (canvas) {
            contxt = canvas.getContext('2d');
            contxt.drawImage(sticker, 0, 0, 200, 300);
            pic.value = canvas.toDataURL('image/png');
            if (!(document.getElementById("img"))) {
                var elem = document.createElement("img");
                elem.setAttribute("src", sticker.src);
                document.getElementById("stickers").appendChild(elem);
            }
        }
    };
})();

