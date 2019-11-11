(function(){
    var video = document.getElementById('vid'),
    canvas = document.getElementById('canvas'),
    context = canvas.getContext('2d'),
    data = canvas.toDataURL('image/png'),
    photo = document.getElementById('pic');
    if(navigator.mediaDevices && navigator.mediaDevices.getUserMedia)
    {
        navigator.mediaDevices.getUserMedia({ video: true }).then(function(stream)
        {
            video.srcObject = stream;
            video.play();
        });
    }

    document.getElementById('capture').addEventListener('click', function()
    {
        context.drawImage(video, 0, 0, 400, 300);
        //manipulate



        photo.setAttribute('src', canvas.toDataURL('image/png'));
    });

    document.getElementById('save').addEventListener('click', function()
    {
        document.write('hello');
    });
})();

