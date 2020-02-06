<footer class="footer footer-black  footer-white ">
    <div class="container-fluid">
        <div class="row">
            <nav class="footer-nav">
                <ul>
                    <li>
                        <a href="https://www.ibrandacademy.com" target="_blank">iAcademy</a>
                    </li>
                </ul>
            </nav>
            <div class="credits ml-auto">
              <span class="copyright">
                ©
                <script>
                  document.write(new Date().getFullYear())
                </script>, Powered By <i class="fa fa-heart heart"></i> iBrand Africa Group
              </span>
            </div>
        </div>
    </div>
</footer>
</div>
</div>

<!--CONFIG-->
<script type='text/javascript' src='../config.js'></script>
<!--   Core JS Files   -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="./assets/js/core/jquery.min.js"></script>
<script src="./assets/js/core/popper.min.js"></script>
<script src="./assets/js/core/bootstrap.min.js"></script>
<script src="./assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<!-- Chart JS -->
<script src="./assets/js/plugins/chartjs.min.js"></script>
<!--  Notifications Plugin    -->
<script src="./assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="./assets/js/paper-dashboard.min.js?v=2.0.0" type="text/javascript"></script>
<script src="./assets/js/jquery.inputFileText.js"></script>
<!-- IAcademy Dashboard DEMO methods, don't include it in your project! -->
<script src="./assets/demo/demo.js"></script>
<script>
    const sk_key = config.PAYSTACK_SECRET_KEY;
    const dashboard = document.URL.indexOf("/dashboard") >= 0;
    const registered = document.URL.indexOf("/registered") >= 0;
    const task = document.URL.indexOf("/task") >= 0;
    const profile = document.URL.indexOf("/profile") >= 0;

    const dashboard_nav = document.querySelector('ul li.dashboard');
    const registered_nav = document.querySelector('ul li.registered');
    const task_nav = document.querySelector('ul li.task');
    const profile_nav = document.querySelector('ul li.profile');

    const title_el = document.querySelector("title");

    if(dashboard){
        title_el.innerHTML = "IAcademy | Dashboard";
        dashboard_nav.classList.add('active');
    }
    if(registered){
        title_el.innerHTML = "IAcademy | Candidates";
        registered_nav.classList.add('active');
    }
    if(task){
        title_el.innerHTML = "IAcademy | Tasks";
        task_nav.classList.add('active');
    }
    if(profile){
        title_el.innerHTML = "IAcademy | Profile";
        profile_nav.classList.add('active');
    }
    setInterval("my_function();",5000);

    function my_function(){
        $('#logs').load(document.URL +  ' #logs');
        // window.location = location.href;
    }

    $(document).ready(function() {
        $('#fileToUpload').inputFileText({
            text: 'Change Course Image'
        });
        $('#fileToUploadAdd').inputFileText({
            text: 'Add Course Image'
        });
        // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
        demo.initChartsPages();
    });

    $(document).ready(function() {
        let max_fields      = 5; //maximum input boxes allowed
        let wrapper   		= $(".input_fields_wrap"); //Fields wrapper
        let add_button      = $(".add_field_button"); //Add button ID
        let wrapper2   		= $(".input_fields_wrap_2"); //Fields wrapper
        let add_button2     = $(".add_field_button_2"); //Add button ID

        let x = 1; //initlal text box count
        $(add_button).click(function(e){ //on add input button click
            e.preventDefault();
            if(x < max_fields){ //max input box allowed
                x++; //text box increment
                $(wrapper).append('<div class="form-row"><div class="form-group col"><div class="form-group"><input class="form-control" type="text" name="heading[]" placeholder="heading"/></div></div> <div class="form-group col"><div class="form-group"><input class="form-control" type="text" name="body[]" placeholder="body"/></div></div><a href="#" class="remove_field"><i class="nc-icon nc-simple-remove"></i></a></div>'); //add input box
            }
        });

        $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
            e.preventDefault(); $(this).parent('div').remove(); x--;
        });

        // add course outline

        $(add_button2).click(function(e){ //on add input button click
            e.preventDefault();
            if(x < max_fields){ //max input box allowed
                x++; //text box increment
                $(wrapper2).append('<div class="form-row"><div class="form-group col"><div class="form-group"><input class="form-control" type="text" name="heading2[]" placeholder="heading"/></div></div> <div class="form-group col"><div class="form-group"><input class="form-control" type="text" name="body2[]" placeholder="body"/></div></div><a href="#" class="remove_field"><i class="nc-icon nc-simple-remove"></i></a></div>'); //add input box
            }
        });

        $(wrapper2).on("click",".remove_field", function(e){ //user click on remove text
            e.preventDefault(); $(this).parent('div').remove(); x--;
        })
    });
</script>
<script>
    function SelectText(element) {
        let doc = document,
            text = element,
            range, selection;
        if (doc.body.createTextRange) {
            range = document.body.createTextRange();
            range.moveToElementText(text);
            range.select();
        } else if (window.getSelection) {
            selection = window.getSelection();
            range = document.createRange();
            range.selectNodeContents(text);
            selection.removeAllRanges();
            selection.addRange(range);
        }
    }
    window.onload = function() {
        let iconsWrapper = document.getElementById('icons-wrapper'),
            listItems = iconsWrapper.getElementsByTagName('li');
        for (let i = 0; i < listItems.length; i++) {
            listItems[i].onclick = function fun(event) {
                let selectedTagName = event.target.tagName.toLowerCase();
                if (selectedTagName == 'p' || selectedTagName == 'em') {
                    SelectText(event.target);
                } else if (selectedTagName == 'input') {
                    event.target.setSelectionRange(0, event.target.value.length);
                }
            }

            let beforeContentChar = window.getComputedStyle(listItems[i].getElementsByTagName('i')[0], '::before').getPropertyValue('content').replace(/'/g, "").replace(/"/g, ""),
                beforeContent = beforeContentChar.charCodeAt(0).toString(16);
            let beforeContentElement = document.createElement("em");
            beforeContentElement.textContent = "\\" + beforeContent;
            listItems[i].appendChild(beforeContentElement);

            //create input element to copy/paste chart
            let charCharac = document.createElement('input');
            charCharac.setAttribute('type', 'text');
            charCharac.setAttribute('maxlength', '1');
            charCharac.setAttribute('readonly', 'true');
            charCharac.setAttribute('value', beforeContentChar);
            listItems[i].appendChild(charCharac);
        }
    }
</script>
<script>
    //################# CHECK URL PARAM FUNCTION ##################
    function queryParameters () {
        let result = {};
        let params = window.location.search.split(/\?|\&/);
        params.forEach( function(it) {
            if (it) {
                let param = it.split("=");
                result[param[0]] = param[1];
            }
        });
        return result;
    }
    if (queryParameters().add === "true"){
        // $("#editpages-info-tab")[0].click();
        $('#addCourseModal').modal('show');
    }

    if (queryParameters().edit_id){
        $('#editCourseModal').modal('show');
        document.write('<?php createCourseid();?>');
    }


    // for success or error messages

    if (queryParameters().success === "courseCreated"){
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'New course added successfully!',
            showConfirmButton: false,
            timer: 3000
        })
    }
    if (queryParameters().success === "courseUpdated"){
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Update was successfully!',
            showConfirmButton: false,
            timer: 3000
        })
    }
    if (queryParameters().success === "deleted"){
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Deleted successfully!',
            showConfirmButton: false,
            timer: 3000
        })
    }
    if (queryParameters().error === "couldnotCreate"){
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'There was an error, please check your connection!',
            showConfirmButton: false,
            timer: 3000
        })
    }
    if (queryParameters().error === "notdeleted"){
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'Something went wrong while deleting! please check your connection and try again.',
            showConfirmButton: false,
            timer: 3000
        })
    }

</script>
</body>

</html>