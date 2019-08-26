<!-- begin login -->
        <div class="login login-with-news-feed">
            <!-- begin news-feed -->
            <div class="news-feed">
                <div class="news-image">
                    <img src="<?php echo BASE_URL?>img/login-bg/bg-10.jpg" data-id="login-cover-image" width="400" alt="" />
                </div>

            </div>
            <!-- end news-feed -->
            <!-- begin right-content -->
            <div class="right-content">
                <!-- begin login-header -->
                <div class="login-header">
                    <div class="brand">
                        <span class="logo"></span>MySchoolie Admin
                    </div>
                    <div class="icon">
                        <i class="fa fa-sign-in"></i>
                    </div>
                </div>
                <!-- end login-header -->
                <!-- begin login-content -->
                <div class="login-content">
                <?php echo $this->Form->create("login", array("class"=>"margin-bottom-0", "url"=>"/users/login")); ?>
                        <div class="form-group m-b-15">
                            <input type="text" class="form-control input-lg" placeholder="Email Address" required name = "mobile" />
                        </div>
                        <div class="form-group m-b-15">
                            <input type="password" class="form-control input-lg" placeholder="Password" required name = "password" />
                        </div>

                        <div class="login-buttons">
                            <button type="submit" class="btn btn-success btn-block btn-lg">Sign me in</button>
                        </div>

                        <hr />
                        <p class="text-center">
                            &copy; MySchoolie. All Right Reserved 2017 <?php // pr($response); ?>

                        </p>
                    <?php echo $this->Form->end(); ?>
                    <div class="text-center"><a href="https://play.google.com/store/apps/details?id=com.myschoolie.parents1"><img src="<?php echo BASE_URL?>img/Google_Play_parent.png" alt="Parents app image" height="80"/></a></div><br/>
                    <div class="text-center"><a href="https://play.google.com/store/apps/details?id=com.myschoolie.teachers1"><img src="<?php echo BASE_URL?>img/Google_Play_teacher.png" alt="Staffs app image" height="80"/></a></div>
                </div>
                <!-- end login-content -->

                <p class="text-center">
                    
                </p>
            </div>
            <!-- end right-container -->
        </div>
        <!-- end login -->