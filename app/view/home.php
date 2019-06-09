<?php
require APPROOT . '/view/inc/header.php';
?>
<style>
#capture{
    width : 380px;
}
#photos{
}
#canvas{
    margin-top : 90px;
}
#fond{
    margin-top : 90px;
}
#imgback{
    
    width : 500px;
    height : 150px;
}
</style>
<div id="all" class="container-fluid">
    <div class="row">
        <div id="camera" class="col-md-4">
            <video id="video" width="500" height="500"></video>
            <center>
                <button id="capture" type="button" class="btn btn-dark">Photo</button>
            </center>
        </div>
        <div id="fond" class="col-md-3">
            <table>
                <tr>
                    <td>
                        <img id="imgback" src="<?php echo URLROOT?>public/img/fcb.jpg" alt="">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input name="select" type="radio"> Fc barcelone
                    </td>
                </tr>
                <tr>
                    <td>
                        <img id="imgback" src="<?php echo URLROOT?>public/img/rma.png" alt="">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input name="select" type="radio"> Real madrid
                    </td>
                </tr>
            </table>
        </div>
        <div class="col-md-1">
        </div>
        <div id="photos" class="col-md-3">
            <canvas id="canvas" width="450" height="410"></canvas>
            <br>
            <center>
                <button type="button" class="btn btn-dark">Save</button>
                <button type="button" class="btn btn-light">Delete</button>
            </center>
        </div>
        <div class="col-md-1">
        </div>
    </div>
</div>
<script src="<?php echo URLROOT?>public/js/home.js"></script>
</body>
</html>