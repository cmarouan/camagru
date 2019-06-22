<?php
require APPROOT . '/view/inc/header.php';
?>

<form method="post" action="<?php echo URLROOT . 'about/comment/' . $data['image']->image_id?>">

    <div id="all" class="container-fluid">
        <div class="text-center pb-3">
            <h1 class="text-center">About photo</h1>
        </div>
        <div id="photos">
            <div class="row">
                <div class="col-md-4">
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <?php $imageData = base64_encode(file_get_contents($data['image']->image_link));
                        $src = 'data: image/png;base64,'.$imageData;
                        echo '<img class="card-img-top" src="' . $src . '">'; ?>
                        <div class="card-body">
                            <h5 class="card-title border-bottom pb-3"><a href="<?php echo URLROOT . 'friends'?>" style = "margin-left: 2%" class="btn btn-sm btn-danger">Back </a> <?php echo $_SESSION['username']?> <p class="float-right" style="color: dodgerblue;"> <small><?php echo $data['image']->image_date?></small> </p></h5>
                            <div class="form-group purple-border">
                                <textarea class="form-control" name="cmt" id="exampleFormControlTextarea4" rows="3" required></textarea>
                            </div>
                            <a href="<?php echo URLROOT . 'about/like/' . $data['image']->image_id?>" style = "margin-left: 2%" class="btn btn-sm btn-primary float-right">like (<?php echo $data['like']?>) </a>
                            <button type="submit" style="margin-left: 2%" class="btn btn-sm btn-dark float-right">comment (<?php echo $data['cmt']?>)</button>
                            <span style="margin-top:3%;color: dodgerblue;" class="float-right"><small><?php echo $data['aboutLike']?></small></span>
                            <br> <br>
                            <div>
                                <?php  foreach ($data['comment'] as $i) {  ?>
                                    <p class="card-text"> <span style="font-family: cursive;"><?php echo $i->username?> : </span> <?php echo $i->comments?> (<small style="color: dodgerblue; "><?php echo $i->image_date?></small>)</p>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                </div>
            </div>
        </div>
    </div>
</form>
<?php
require APPROOT . '/view/inc/footer.php';
?>