 <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" type="text/css" href="./css/custom.css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
 --><!------ Include the above in your HEAD tag -------->

<div class="container">
    <div class="row">
        <div class="col">
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                    ×</button>
                <span class="glyphicon glyphicon-hand-right"></span> <strong>Danger Message</strong>
                <hr class="message-inner-separator">
                <p>
                    Change a few things up and try submitting again.</p>
            </div>
        </div>
    </div>
</div>

<script>
    $(".close").on('click', function(){
        $(".alert").hide(1000);
    });
</script>