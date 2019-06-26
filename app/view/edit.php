<?php
require APPROOT . '/view/inc/header.php';
?>
    <div class="text-center">
        <h1 class="font-weight-bold">Camagru edit</h1>
    </div>
    <div class="container text-center">
    <div class="row">
        <div class="col-lg-6">
            <div class="pricing-item" style="box-shadow: 0px 0px 30px -7px rgba(0,0,0,0.29);">
                <div class="pt-4 pb-3" style="letter-spacing: 2px">
                    <h4>Email and Username</h4>
                </div>
                <form action="<?php echo URLROOT; ?>edit/editInfo" method="post">
                <div>
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
        <div class="col-lg-6">
            <div class="pricing-item" style="box-shadow: 0px 0px 30px -7px rgba(0,0,0,0.29);">
                <div class="pt-4 pb-3" style="letter-spacing: 2px">
                    <h4>Password</h4>
                </div>
                <form action="<?php echo URLROOT; ?>edit/editPass" method="post">
                <div>
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <input type="password" class="form-control" id="pass" name="pass" placeholder="New password" required>
                        </div>
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
        <div class="col-lg-6 m-auto">
            <div class="pricing-item" style="box-shadow: 0px 0px 30px -7px rgba(0,0,0,0.29);">
                <div class="pt-4 pb-3" style="letter-spacing: 2px">
                    <h4>Email notification</h4>
                </div>
                <form action="<?php echo URLROOT; ?>edit/activeComment" method="post">
                <div class="pb-4">
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <br>
                            <button class="btn btn-md btn-primary w-75" type="submit"><span><?php 
                                if ($_SESSION['active_comment'] == 1)
                                    echo "Click to desactive";
                                else
                                    echo "Click to active";
                            ?></span></button>
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