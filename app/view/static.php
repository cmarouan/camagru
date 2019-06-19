<?php
require APPROOT . '/view/inc/header.php';
?>
    <div class="w-50 px-3 py-3 pt-md-4 pb-md-4 mx-auto text-center" style="margin-top: 2%">
        <h1 class="display-9 font-weight-bold">Camagru statistics</h1>
    </div>
    <div class="container text-center">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-10 pb-4 d-block m-auto">
                <div class="pricing-item" style="box-shadow: 0px 0px 30px -7px rgba(0,0,0,0.29);">
                    <div class="pt-4 pb-3" style="letter-spacing: 2px">
                        <h4>likes on your photos</h4>
                    </div>
                    <div class="pricing-price pb-1 text-primary color-primary-text ">
                        <h1 style="font-weight: 1000; font-size: 3.5em;">
                            <span style="font-size: 20px;">#</span><?php echo $data['like']?>
                        </h1>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-10 pb-4 d-block m-auto">
                <div class="pricing-item" style="box-shadow: 0px 0px 30px -7px rgba(0,0,0,0.29);">
                    <div class="pt-4 pb-3" style="letter-spacing: 2px">
                        <h4>comments on your photos</h4>
                    </div>
                    <div class="pricing-price pb-1 text-primary color-primary-text ">
                        <h1 style="font-weight: 1000; font-size: 3.5em;">
                            <span style="font-size: 20px;">#</span><?php echo $data['cmp']?>
                        </h1>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-10 pb-4 d-block m-auto">
                <div class="pricing-item" style="box-shadow: 0px 0px 30px -7px rgba(0,0,0,0.29);">
                    <div class="pt-4 pb-3" style="letter-spacing: 2px">
                        <h4>your photos</h4>
                    </div>
                    <div class="pricing-price pb-1 text-primary color-primary-text ">
                        <h1 style="font-weight: 1000; font-size: 3.5em;">
                            <span style="font-size: 20px;">#</span><?php echo $data['photo']?>
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
require APPROOT . '/view/inc/footer.php';
?>