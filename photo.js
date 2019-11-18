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
       //pic = canvas.toDataURL('image/png');
       //console.log(pic);
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
})();

