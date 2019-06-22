<?php
require APPROOT . '/view/inc/header.php';
?>
    <div id="all" class="container-fluid">
        <div class="text-center">
            <h1 class="text-center" style="font-family: cursive;">Your photo</h1>
        </div>
        <div id="photos">
            <?php  foreach ((array) $data as $d) {  ?>
                <div class="row" style="margin-top: 1%;">
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-4">
                        <div class="card">

                            <div class="row" style="margin-top: 1%;">
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <?php $imageData = base64_encode(file_get_contents($d->image_link));
                                    $src = 'data: image/png;base64,'.$imageData;
                                    echo '<img class="card-img-top" style="width : 100%;" src="' . $src . '">'; ?>
                                </div>
                                <div class="col-md-2"></div>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title border-bottom pb-3"><?php echo $_SESSION['username'] ?> <a href="<?php echo URLROOT . 'about/' . $d->image_id?>" class="float-right btn btn-sm btn-primary">About this photo</a></h5>
                                <div class="form-group purple-border">
                                    <a class="text-dark float-center" style="font-family: cursive;">Camagru</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
<?php
require APPROOT . '/view/inc/footer.php';
?>