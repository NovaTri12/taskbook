<div class="back">


    <div class="div-center">


        <div class="content">


            <h3>Login</h3>
            <hr />
            <form action="<?= BASEURL; ?>/login/doLogin" method="post">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" id="username" placeholder="Username">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                </div>
                <div class="row">
                    <div>
                        <?php Flasher::flash(); ?>
                    </div>
                </div>
                <button type="submit" name="submit" value="submit" class="btn btn-primary">Login</button>

            </form>

        </div>


        </span>
    </div>