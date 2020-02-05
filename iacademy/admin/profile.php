<?php
require("./assets/admin_menu.php");
if(!$_SESSION['admin_session']){
    header("Location: index");
}
?>
    <div class="content">
        <div class="row">
            <div class="col-md-4">
                <div class="card card-user">
                    <div class="image">
                        <img src="./assets/img/damir-bosnjak.jpg" alt="...">
                    </div>
                    <div class="card-body">
                        <div class="author">
                            <a href="#">
                                <img class="avatar border-gray" src="./assets/img/<?php echo $_SESSION['username']?>.png" alt="...">
                                <h5 class="title"><?php echo $_SESSION['username']?></h5>
                            </a>
                        </div>
                        <p class="description text-center">
                            <?php echo $_SESSION['adminEmail']?>
                        </p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Administrators</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled team-members">
                        <?php
                        $adminSql = "SELECT * FROM admin";
                        $result = $conn->query($adminSql);
                        if ($result->num_rows > 0) {
                            // output data of each row
                            while($adminRow = $result->fetch_assoc()) {
                                echo '
                                <li>
                                    <div class="row">
                                        <div class="col-md-2 col-2">
                                            <div class="avatar">
                                                <img src="./assets/img/'.$adminRow['username'].'.png" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                                            </div>
                                        </div>
                                        <div class="col-md-7 col-7">
                                            '.$adminRow['username'].'
                                            <br />
                                            <span class="text-muted">
                                              <small>'.$adminRow['role'].'</small>
                                            </span>
                                        </div>
                                        <div class="col-md-3 col-3 text-right">
                                            <btn class="btn btn-sm btn-outline-success btn-round btn-icon"><i class="fa fa-envelope"></i></btn>
                                        </div>
                                    </div>
                                </li>
                                ';
                            }
                        }?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card card-user">
                    <div class="card-header">
                        <h5 class="card-title">Edit Profile</h5>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="row">
                                <div class="col-md-5 pr-1">
                                    <div class="form-group">
                                        <label>Company (disabled)</label>
                                        <input type="text" class="form-control" disabled="" placeholder="Company" value="<?php echo $company;?>">
                                    </div>
                                </div>
                                <div class="col-md-3 px-1">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" class="form-control" placeholder="Username" value="<?php echo $_SESSION['username']?>">
                                    </div>
                                </div>
                                <div class="col-md-4 pl-1">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email Address</label>
                                        <input type="email" class="form-control" placeholder="<?php echo $_SESSION['adminEmail']?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 pr-1">
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input type="text" class="form-control" placeholder="Company" value="" disabled>
                                    </div>
                                </div>
                                <div class="col-md-6 pl-1">
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input type="text" class="form-control" placeholder="Last Name" value="" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>About Me</label>
                                        <textarea class="form-control textarea disabled"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="update ml-auto mr-auto">
                                    <button type="submit" class="btn btn-primary btn-round disabled">Update Profile</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
require("./assets/footer.php");
?>