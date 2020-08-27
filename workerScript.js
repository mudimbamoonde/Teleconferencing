/**
 * Created by MudimbaSoftware on 07/27/2018.
 */
$(document).ready(function () {
//   alert("Help is Trigaered");

messages();
    function messages() {
        $.ajax({
            url: "aloneaction.php",
            method: "POST",
            data: {fetchMessage: 1},
            success: function (data) {
                $("#messages").html(data);
            }
        });

    }


//Login Settings
    $("#loginpotter").click( function (event) {
        event.preventDefault();
        var username = $("#username").val();
        var password = $("#password").val();

        // var htmlc = "<a href='' class='alert alert-danger'>Wrong password/ username</a>";
        // alert("Your user name: " + username+" password is:"+ password);
        // $("#message").html(htmlc);

        $.ajax({
            url:"aloneaction.php",
            method:"POST",
            data:{loginUser:1,username:username,password:password},
            success:function(data) {
                if (data == "lecturer") {
                    window.location.href = "lecturer/index.php";
                }else if(data =="student"){
                    window.location.href = "index.php";
                }else if(data == "System Admin"){
                    window.location.href = "admin/index.php";
                } else {
                    $("#messagePost").html(data);
                    window.location.href = "lecturer/index.php";
                }
            }
        });

    });

    $("#ExamRegistration").click(function (event) {
        event.preventDefault();
        var examCentre = $("#examCentre").val();
        var sin = $("#sin").val();
        var username = $("#username").val();

        var CourseName = [];

        $(':checkbox:checked').each(function(i){
            CourseName[i] = $(this).val();

            // alert(programName[i]);
        });
        if(CourseName.length === 0) //tell you if the array is empty
        {
            alert("Please Select atleast one checkbox");
        } else {
         $.ajax({
             url:"aloneaction.php",
             method:"POST",
             data:{examRegistration:1,examCentre:examCentre,sin:sin,courseName:CourseName},
             success:function (data) {
                 $("#messageExam").html(data);
             }
         });
        }
    });



    //End of body
});
