(function(){
    var video = document.getElementById('video');
    var canvas = document.getElementById('canvas');
    var context = canvas.getContext('2d');
    var photo = document.getElementById('photoPic');
    var vendorUrl = window.URL || window.webkitURL;
    var name = 'none';
    var img2 = new Image;
    navigator.getMedia = navigator.getUserMedia ||
                         navigator.webkitGetUserMedia ||
                         navigator.mozGetUserMedia ||
                         navigator.msGetUserMedia;
    navigator.getMedia({
        video: true,
        audio: false
    },
    function(stream){
        video.srcObject = stream;
        video.play();
        document.getElementById('capture').disabled = false;
        document.getElementById('capture').addEventListener('click', function(){
            var radios = document.getElementsByName('stickers');
            for (var i = 0, length = radios.length; i < length; i++)
            {
                if (radios[i].checked)
                {
                    name = radios[i].value;
                    break;
                }
            }
            if (name != 'none')
            {
                context.drawImage(video, 0, 0, 400, 300);
                var data = canvas.toDataURL('image/png');
                photo.setAttribute('src', data);
                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'camera/take_pic');
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function() {
                    if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
                        console.log(this.responseText);
                    }
                }
                xhr.send('img=' + encodeURIComponent(data) + '&filter=' + name);
            }
            else {
                alert("Choose a sticker");
                document.getElementById('capture').disabled = true;
            }
        })
    },
    function(error){
        console.log(error);
    });
})();

function upload_to_server() {
    var file    = document.querySelector('input[type=file]').files[0];
    var reader  = new FileReader();
    var name = 'none';
    reader.onloadend = function () {
        var radios = document.getElementsByName('stickers');
        for (var i = 0, length = radios.length; i < length; i++) {
            if (radios[i].checked) {
                name = radios[i].value;
                break;
            }
        }
        if (name != 'none')
        {
            var data = this.result;
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'camera/upload_image');
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
                    console.log(this.responseText);
                }
            }
            xhr.send('img=' + encodeURIComponent(data) + '&filter=' + name);
        }
    }
    if (file) {
        reader.readAsDataURL(file);
    }
}

