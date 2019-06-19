<?php
require APPROOT . '/view/inc/header.php';
?>
    <style>
        .hh {
            position: relative;
        }
        .overlay {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            height: 400px;
            width: 400px;
            opacity: 0;
            transition: .5s ease;
        }

        .hh:hover .overlay {
            opacity: 1;
        }

        .text {
            color: white;
            font-size: 20px;
            position: absolute;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            text-align: center;
        }
        #delete_img{
           width: 50px;
            height: 50px;
        }
    </style>
<div id="all" class="container-fluid">
    <?php
        //print_r($data);
    ?>
    <div class="row">
        <div class="w-50 px-3 py-3 pt-md-4 pb-md-4 mx-auto text-center">
            <h1 class="display-9 font-weight-bold" style="font-family: cursive;">Choose stickers</h1>
        </div>
    </div>
    <form name="form">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-10 pb-4 d-block m-auto text-center">
                <img id="design" style="width: 100px; height: 100px;" src="<?php echo URLROOT?>public/img/design.png" alt="">
                <br>
                <input type="radio" value="design" name="stickers" checked> Happy
            </div>
            <div class="col-lg-4 col-md-6 col-sm-10 pb-4 d-block m-auto text-center">
                <img id="lunette"  style="width: 100px; height: 100px;" src="<?php echo URLROOT?>public/img/lunette.png" alt="">
                <br>
                <input type="radio" value="lunette" name="stickers"> Arrogant
            </div>
            <div class="col-lg-4 col-md-6 col-sm-10 pb-4 d-block m-auto text-center">
                <img id="twitter" style="width: 100px; height: 100px;"  src="<?php echo URLROOT?>public/img/twitter.png" alt="">
                <br>
                <input type="radio" value="twitter" name="stickers"> 1337
            </div>
        </div>

    <div style="margin-top: 5%;" class="row">
        <div class="col-md-1">
        </div>
        <div id="main" style="display:block;" class="col-md-6 col-lg-4 text-center">
            <video id="video" style="width: 100%"></video>
            <button id="capture" type="button" onclick="setTimeout('document.location.reload(true);', 500);" style="margin-top: 1%" class="btn btn-primary" disabled>Photo</button>
            <br>
            <br>
            <br>
            <input type="file" id="loadIMG" onchange="upload_to_server(); setTimeout('document.location.reload(true);', 500);"><br>
        </div>
        <div class="col-md-2">
        </div>
        <div id="side" class="col-md-4">
            <canvas id="canvas" width="350" height="310" hidden>
            </canvas>
            <div id="divHidden" class="row" style="margin-top: 1%;" hidden>
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <img id="photoPic" style="height: 400px; width: 400px;"  alt="The screen capture will appear in this box.">
                </div>
                <div class="col-md-2"></div>
            </div>
            <?php  foreach ((array) $data as $d) {  ?>
            <div class="row" style="margin-top: 1%;">
                <div class="col-md-2"></div>
                <div class="hh col-md-8">
                    <?php $imageData = base64_encode(file_get_contents($d->image_link));
                    $src = 'data: image/jpeg;base64,'.$imageData;
                    echo '<img style="height: 400px; class="image" width: 400px;"  src="' . $src . '">'; ?>
                    <div class="overlay">
                        <div class="text">
                            <a href="<?php echo URLROOT . 'camera/deleteImg/' . $d->image_id?>">
                                <img id="delete_img" src="http://www.free-icons-download.net/images/red-delete-button-icon-38154.png">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
            <?php } ?>
        </div>
    </div>
    </form>
</div>

<script src="<?php echo URLROOT?>public/js/home.js"></script>
<?php
require APPROOT . '/view/inc/footer.php';
?>