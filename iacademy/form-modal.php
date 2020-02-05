<?php
if (isset($_GET['error_empty']) && $_GET['error_empty'] === 'Please fill out all fields, especially your fullname, email and phone number'){
    $invalid = "is-invalid";
    $invalid_empty_Msg = "<div class=\"invalid-feedback d-block text-danger\" style=\"font-size:large; \"> ".$_GET['error_empty']."</div>";
    $input = array("inputFname"=>"First Name", "inputLname"=>"Last Name", "inputEmail"=>"Email Address", "inputPhone"=>"Phone Number");
} else{
    $input = array("inputFname"=>"First Name", "inputLname"=>"Last Name", "inputEmail"=>"Email Address", "inputPhone"=>"Phone Number");
    $invalid_empty_Msg = "To get started on your enrollment, fill the form below.";
}
if (isset($_GET['fname_invalid'])){
    $invalid= "is-invalid";
    $invalid_fname_Msg = "<div class=\"invalid-feedback d-block text-danger\"> ".$_GET['fname_invalid']."</div>";
}
if (isset($_GET['lname_invalid'])){
    $invalid= "is-invalid";
    $invalid_lname_Msg = "<div class=\"invalid-feedback d-block text-danger\"> ".$_GET['lname_invalid']."</div>";
}
if (isset($_GET['phone_invalid'])){
    $invalid= "is-invalid";
    $invalid_phone_Msg = "<div class=\"invalid-feedback d-block text-danger\"> ".$_GET['phone_invalid']."</div>";
}
if (isset($_GET['email_invalid'])){
    $invalid= "is-invalid";
    $invalid_email_Msg = "<div class=\"invalid-feedback d-block text-danger\"> ".$_GET['email_invalid']."</div>";
}
if (isset($_GET['email_exist'])){
    $invalid= "is-invalid";
    $invalid_email_Msg = "<div class=\"invalid-feedback d-block text-danger\"> ".$_GET['email_exist']."</div>";
}
?>
<!-- Modal -->
<div class="modal fade m-auto" id="formmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <!--<h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>-->
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

          <!-- enroll Section -->
          <section id="enroll" class="enroll-section">
              <div class="container-fluid">
                  <div class="container">
                      <div class="formBox">
                          <form class="js-scroll-trigger" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                              <div class="row mb-lg-5">
                                  <div class="col-sm-12">
                                      <h2 class="mx-auto mb-lg-5">Enrollment Form</h2>
                                      <h5 class="card-text lead mb-lg-5">
                                          To enroll for any course at iAcademy, all you need to do is fill out our online entry form. If you need assistance or you are unsure of which course that is right for you, fill out our enquiry form here <span><a href="http://ibrandafrica.one/contact" target="_blank">Click to enquire</a></span> and we’ll get in touch with you.
                                      </h5>
                                      <p class="text-muted"><?php echo $invalid_empty_Msg; ?></p>
                                  </div>
                              </div>
<!--                              active-input-->
                              <div class="row">
                                  <div class="col-sm-6">
                                      <div class="inputBox">
                                          <div>Selected Course</div>
                                          <input type="text" class="input" value="<?php echo $_SESSION['course_name'];?>" disabled>
                                          <input type="hidden" name="course" value="<?php echo $_SESSION['course_name'];?>">
                                          <input type="hidden" name="amount" value="<?php echo $_SESSION['course_amount'];?>">
                                      </div>
                                  </div>

                                  <div class="col-sm-6">
                                      <div class="inputBox ">
                                          <div>Course Type</div>
                                          <select class="input" name="course_type" value="<?php echo $_GET['course_type']?>">
                                              <option>Accelerated</option>
                                              <option>Full Time</option>
                                              <option>Weekend</option>
                                          </select>
                                      </div>
                                  </div>

                                  <div class="col-sm-6">
                                      <div class="inputBox">
                                          <div class="inputText 1"><?php echo $input['inputFname'];?></div>
                                          <input type="text" name="fname" class="input <?php echo $invalid?>" value="<?php echo $_GET['fname']?>">
                                          <?php echo $invalid_fname_Msg;?>
                                      </div>
                                  </div>

                                  <div class="col-sm-6">
                                      <div class="inputBox">
                                          <div class="inputText 2"><?php echo $input['inputLname'];?></div>
                                          <input type="text" name="lname" class="input <?php echo $invalid?>" value="<?php echo $_GET['lname']?>">
                                          <?php echo $invalid_lname_Msg;?>
                                      </div>
                                  </div>
                              </div>

                              <div class="row">
                                  <div class="col-sm-6">
                                      <div class="inputBox">
                                          <div class="inputText 3"><?php echo $input['inputEmail'];?></div>
                                          <input type="text" name="email" class="input <?php echo $invalid;?>" value="<?php echo $_GET['email']?>">
                                          <?php echo $invalid_email_Msg;?>
                                      </div>
                                  </div>

                                  <div class="col-sm-6">
                                      <div class="inputBox">
                                          <div class="inputText 4"><?php echo $input['inputPhone'];?></div>
                                          <input type="text" name="phone" class="input <?php echo $invalid?>" value="<?php echo $_GET['phone']?>">
                                          <?php echo $invalid_phone_Msg;?>
                                      </div>
                                  </div>
                              </div>
                              <div class="form-row">
                                  <div class="col-sm-6">
                                      <div class="inputBox">
                                          <div class="inputText 5">Country of Residence</div>
                                          <input type="text" name="country" class="input" value="<?php echo $_GET['country']?>">
                                      </div>
                                  </div>

                                  <div class="col-sm-2">
                                      <div class="inputBox">
                                          <div class="inputText 6">Nationality</div>
                                          <input type="text" name="nationality" class="input" value="<?php echo $_GET['nationality']?>">
                                      </div>
                                  </div>

                                  <div class="col-sm-4">
                                      <div class="inputBox">
                                          <div>State</div>
                                          <select class="input" name="state" value="<?php echo $_GET['state']?>">
                                              <option>Abia State</option>
                                              <option>Adamawa State</option>
                                              <option>Akwa Ibom State</option>
                                              <option>Anambra State </option>
                                              <option>Bauchi State</option>
                                              <option>Bayelsa State</option>
                                              <option>Benue State</option>
                                              <option>Borno State</option>
                                              <option>Cross River State</option>
                                              <option>Delta State</option>
                                              <option>Ebonyi State</option>
                                              <option>Edo State</option>
                                              <option>Ekiti State </option>
                                              <option>Enugu State</option>
                                              <option>Gombe State</option>
                                              <option>Imo State</option>
                                              <option>Jigawa State</option>
                                              <option>Kaduna State</option>
                                              <option>Kano State</option>
                                              <option>Katsina State</option>
                                              <option>Kebbi State</option>
                                              <option>Kogi State </option>
                                              <option>Kwara State</option>
                                              <option>Lagos State</option>
                                              <option>Nasarawa State  Lafia</option>
                                              <option>Niger State</option>
                                              <option>Ogun State</option>
                                              <option>Ondo State</option>
                                              <option>Osun State</option>
                                              <option>Oyo State</option>
                                              <option>Plateau State</option>
                                              <option>Rivers State </option>
                                              <option>Sokoto State</option>
                                              <option>Taraba State</option>
                                              <option>Yobe State</option>
                                              <option>Zamfara State</option>
                                          </select>
                                      </div>
                                  </div>
                              </div>

                              <div class="row">
                                  <div class="col-sm-6">
                                      <div class="inputBox">
                                          <div>How did you hear about us?</div>
                                          <select class="input" name="about" value="<?php echo $_GET['about']?>">
                                              <option>Facebook</option>
                                              <option>Instagram</option>
                                              <option>Youtube</option>
                                              <option>Blog</option>
                                              <option>Google</option>
                                              <option>Billboard</option>
                                              <option>Magazine</option>
                                              <option>News Paper</option>
                                              <option>A Friend</option>
                                              <option>Other</option>
                                          </select>
                                      </div>
                                  </div>


                                  <div class="col-sm-6">
                                      <div class="inputBox">
                                          <div>When do you want to take your training?</div>
                                          <select class="input" name="start-date" value="<?php echo $_GET['start-date']?>">
                                              <option>This Month</option>
                                              <option>Next Month</option>
                                          </select>
                                      </div>
                                  </div>
                              </div>

                              <div class="row">
                                  <div class="col-sm-12">
                                      <input type="submit" name="enrollment_submit_btn" class="button btn-primary btn btn-lg btn-block border-0" value="Continue">
                                  </div>
                              </div>
                          </form>

                      </div>
                  </div>
              </div>
          </section>

      </div>
    </div>
  </div>
</div>