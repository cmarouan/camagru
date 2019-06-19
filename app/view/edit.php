<?php
require APPROOT . '/view/inc/header.php';
?>
    <div class="w-50 px-3 py-3 pt-md-4 pb-md-4 mx-auto text-center">
        <h1 class="display-9 font-weight-bold">Camagru edit</h1>
    </div>
    <div class="container text-center">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-10 pb-4 d-block m-auto">
            <div class="pricing-item" style="box-shadow: 0px 0px 30px -7px rgba(0,0,0,0.29);">
                <div class="pt-4 pb-3" style="letter-spacing: 2px">
                    <h4>Email and Username</h4>
                </div>
                <form action="<?php echo URLROOT; ?>edit/editInfo" method="post">
                <div class="pricing-description">
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <input type="email" class="form-control" value="<?php echo $_SESSION['user_email']?>" id="mail" name="mail" placeholder="New mail">
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                        <div class="row" style="margin-top : 2%">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="username" id="username" value="<?php echo $_SESSION['username']?>" placeholder="New username">
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                </div>
                <br>
                <div class="pricing-button pb-4">
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <div style="color : red">
                                <?php echo $data['err']; ?>
                            </div>
                            <br>
                            <button class="btn btn-md btn-primary w-75" type="submit"> Edit </button>
                        </div>
                        <div class="col-md-2"></div>
                    </div>

                </div>
                </form>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-10 pb-4 d-block m-auto">
            <div class="pricing-item" style="box-shadow: 0px 0px 30px -7px rgba(0,0,0,0.29);">
                <div class="pt-4 pb-3" style="letter-spacing: 2px">
                    <h4>Password</h4>
                </div>
                <form action="<?php echo URLROOT; ?>edit/editPass" method="post">
                <div class="pricing-description">
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <input type="password" class="form-control" id="pass" name="pass" placeholder="New password" required>
                        </div>ok than
                        <div class="col-md-2"></div>
                    </div>
                    <div class="row" style="margin-top : 2%">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <input type="password" class="form-control" id="newPass" name="newPass" placeholder="Confirm new password" required>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                </div>
                <br>
                <div class="pricing-button pb-4">
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <div style="color : red">
                                <?php echo $data['err_2']; ?>
                            </div>
                            <br>
                            <button class="btn btn-md btn-primary w-75" type="submit"> Edit </button>
                        </div>
                        <div class="col-md-2"></div>
                    </div>

                </div>
                </form>
            </div>
        </div>
    </div>
<?php
require APPROOT . '/view/inc/footer.php';
?>