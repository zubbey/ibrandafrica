    <!--================ Modal Start ===============-->
<!-- Button trigger modal -->
<!--
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  Launch demo modal
</button>
-->

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <!--<h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>-->
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php require_once'enroll-form.php'; ?>
      </div>
      <div class="modal-footer">
<!--<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
        <button type="button" class="primary-btn2 text-uppercase enroll rounded-0 text-white" data-dismiss="modal">Exit</button>
      </div>
    </div>
  </div>
</div>
    <!--==================== Modal End ================-->
