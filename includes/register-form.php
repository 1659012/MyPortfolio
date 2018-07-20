<div class="main-body" style="display:none">
<div class="main-content form-container">
<div class="row">
    <div class="col-md-4">
        <img class="personal-img" src="images/user-images/Personal-Icon.png" alt="">
    </div>

    <!-- login -->
    <div class="col-md-8">
        <h3 class="form-title">Login to your account</h3>
        <form class="form" id="login-form" action="login.php" method="post">

            <div class="form-group">
                <label for="name">User Name</label>
                <input type="text" class="form-control" id="login-id" placeholder="" name="uid">
            </div>

            <div class="form-group">
                <label for="pw1">Password</label>
                <input type="password" class="form-control" id="login-pw" placeholder="" name="pw">
            </div>

            <button type="submit" name="create_account" class="btn btn-primary">Login</button>

            <p id="login-info" style="display:inline; margin-left:20px"></p>
        </form>
    </div>
</div>
    <!-- end row -->
    <!-- create user -->
    <div class="row">
        <div class="col-md-4">

        </div>
        <!--  -->
        <div class="col-md-8">
            <h3 class="form-title">Don't have an account? Create a new account here :)</h3>
            <form class="form" id="register-form" action="#" method="post">
                <div class="form-group">
                <label for="create-name">Name <span class="error-message"></span></label>
                <input type="text" class="form-control" id="create-name" placeholder="Your name here" name="name">
                </div>
                <div class="form-group">
                 <label for="create-uid">User Name <span class="error-message"></span></label>
                <input type="text" class="form-control" id="create-uid" placeholder="Your username to login" name="uid">
                </div>
                <div class="form-group">
                <label for="create-pw1">Password <span class="error-message"></span></label>
                <input type="password" class="form-control" id="create-pw1" placeholder="" name="pw1">
                </div>
                <div class="form-group">
                <label for="create-pw2">Confirm Password <span class="error-message"></span></label>
                <input type="password" class="form-control" id="create-pw2" placeholder="" name="pw2">
                </div>
                <div class="form-group">
                <label for="create-email">Email <span class="error-message"></span></label>
                <input type="email" class="form-control" id="create-email" placeholder="example@gmail.com" name="email">
                </div>
                <button type="submit" name="create_account" class="btn btn-success">Create Account</button>
                <p id="form-message" style="display:inline;font-size:12px;color:#d44950;"></p>
            </form>
        </div>
    </div>
</div>
</div>
