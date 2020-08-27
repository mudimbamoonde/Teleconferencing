/**
 * Created by MudimbaSoftware on 08/20/2018.
 */
$("document").ready(function () {

    $("#saveSchool").click(function (event) {
        event.preventDefault();
        var schname = $("#schname").val();
        //alert(schname);
        $.ajax({
            url:"action.php",
            method:"POST",
            data:{addSchool:1,schname:schname},
            success:function (data) {
                $("#SchoolMessage").html(data);
                fetchSchool();
                countSchools();
            }
        });
    });
    //fetch school
    fetchSchool();
    function fetchSchool() {
        $.ajax({
            url:"action.php",
            method:"POST",
            data:{fetchSchool:1},
            success:function (data) {
                $("#fetchSchool").html(data);

            }
        });

    }

    //deleteSchool
    $("body").delegate("#delSchool","click",function (event) {
       event.preventDefault();
       var deleteID = $(this).attr("deleteSchool");
       // alert(deleteID);

        $.ajax({
            url:"action.php",
            method:"POST",
            data:{deleteSchool:1,deleteID:deleteID},
            success:function (data) {
                $("#SchoolMessage").html(data);
                fetchSchool();
                countSchools();
            }
        });

    });
    //deleteSchool
    $("body").delegate("#saveEditSchool","click",function (event) {
       event.preventDefault();
       var editID = $(this).attr("editSchool");
       var schname = $("#schname-"+editID).val();
       // var s = getElementByName("Editschname");
      //alert(editID+" "+schname);

        $.ajax({
            url:"action.php",
            method:"POST",
            data:{editSchool:1,schname:schname,SchooleditID:editID},
            success:function (data) {
                $("#SchoolMessage").html(data);
                fetchSchool();

            }
        });

     });
//count schools
    countSchools();
    function countSchools() {
        $.ajax({
            url:"action.php",
            method:"POST",
            data:{countSchool:1},
            success:function (data) {
                $("#countPrograms").html(data);
                fetchSchool();
            }

        });
    }

    //Programs configuration
    //view program
    sch();
    function sch() {
        $.ajax({
            url:"action.php",
            method:"POST",
            data:{schools:1},
            success:function (data) {
                $("#schools").html(data);
            }
        });
    }

    //send values
    $("#saveProgram").click(function (event) {
        event.preventDefault();
        var programName = $("#progName").val();
        var school = $("#schools").val();
        var shortName = $("#shortName").val();
        // alert(shortName);
       $.ajax({
           url:"action.php",
           method:"POST",
           data:{saveProgram:1,programName:programName,school:school,shortName:shortName},
           success:function (data) {
               $("#ProgMessage").html(data);
               fetchProgram();
               countSchools();

           }
       });
    });

    //fetchProgram
    fetchProgram();
    function fetchProgram() {
        $.ajax({
            url:"action.php",
            method:"POST",
            data:{fetchProgram:1},
            success:function (data) {
                $("#fetchProgram").html(data);
            }
        });
    }
    //delete Program
    $("body").delegate("#delProgram","click",function (event) {
        event.preventDefault();
        var deleteID = $(this).attr("deleteProgram");

        // alert(deleteID);

        $.ajax({
            url:"action.php",
            method:"POST",
            data:{deleteProgram:1,deletePID:deleteID},
            success:function(data) {
                $("#ProgMessage").html(data);
                fetchProgram();

            }
        });

    });


    //fetchSemester
    fetchSemester();
    function fetchSemester() {
        $.ajax({
            url:"action.php",
            method:"POST",
            data:{fetchSemester:1},
            success:function (data) {
                $("#fetchSemester").html(data);
            }
        });
    }

    //save Semester
    $("#saveSemester").click(function (event) {
        event.preventDefault();
        var semester = $("#semesterValue").val();
        // alert(semester);
        $.ajax({
            url:"action",
            method:"POST",
            data:{saveSemester:1,semester:semester},
            success:function (data) {
                $("#semesterMessage").html(data);
                fetchSemester();
            }
        });
    });

    //Course
    fetchSes();
    function fetchSes() {
        $.ajax({
            url:"action.php",
            method:"POST",
            data:{fetchSes:1},
            success:function (data) {
                $("#semesters").html(data);
            }
        });
    }

    //save Course
    $("#saveCourse").click(function (event) {
        event.preventDefault();
        var CourseName = $("#CourseName").val();
        var CourseCode = $("#CourseCode").val();
        var year = $("#year").val();
        var semester = $("#semesters").val();
        // alert(semester);
        $.ajax({
            url:"action",
            method:"POST",
            data:{saveCourse:1,courseName:CourseName,courseCode:CourseCode,year:year,semester:semester},
            success:function (data) {
                $("#CourseMessage").html(data);
                   fetchCourse();
                Countcourses();
            }
        });
    });
//fetchCourse
    fetchCourse();
    function fetchCourse() {
        $.ajax({
            url:"action.php",
            method:"POST",
            data:{fetchCourse:1},
            success:function (data) {
                $("#fetchCourse").html(data);

            }
        });

    }

    //Countcourses
    Countcourses();
    function Countcourses() {
        $.ajax({
            url:"action.php",
            method:"POST",
            data:{Countcourses:1},
            success:function (data) {
                $("#Countcourses").html(data);
                fetchCourse();
            }
            //Countcourses
        });
    }
    //Assign Single Course to a program
    prgromHint();
    function prgromHint() {
        $.ajax({
            url:"action.php",
            method:"POST",
            data:{prgromHint:1},
            success:function (data) {
                $("#prgromHint").html(data);
            }
        });
    }

    //programsDisplay
    programsDisplay();
    function programsDisplay() {
        $.ajax({
            url:"action.php",
            method:"POST",
            data:{programsDisplay:1},
            success:function (data) {
                $("#programsDisplay").html(data);
            }
        });
    }
    //get Program
    $("body").delegate("#assignCourseID","click",function (event) {
        var programName =$(this).attr("programName");
        var prid =$(this).attr("prid");

        
       // var name =  prompt("Please enter your name");
       // alert(name);
        //confirm("Are you sure you want to assign courese");
        //alert(programName+ " is the program Selected and its ID is "+ prid);
        $.ajax({
            url:"action.php",
            method:"POST",
            data:{courseAssign:1,programName:programName,prid:prid},
            success:function (data) {
                $("#assgprog").html(data);

            }
        });
    });

    //Bulk Assign
    bulkCourse();
    function bulkCourse() {
        $.ajax({
            url:"action.php",
            method:"POST",
            data:{BulkCourse:1},
            success:function (data) {
                $("#BulkCourses").html(data);

            }
        });
    }
    //bulk
    $("body").delegate("#saveCourses","click",function (event) {

        var CourseName = [];
        var cNane = $("#proName").val();
        var programName = $("#selectTerm").val();

        $(':checkbox:checked').each(function(i){
            CourseName[i] = $(this).val();

           // alert(programName[i]);
        });
        if(CourseName.length === 0) //tell you if the array is empty
        {
            alert("Please Select atleast one checkbox");
        } else {

            $.ajax({
                url: "action.php",
                method: "POST",
                data: {BulkcourseAssign:1,CourseName:CourseName,programName:programName,cNane:cNane},
                success: function (data) {
                    $("#fame").html(data);
                    // for(var i=0; i<programName.length; i++)
                    // {
                    //     $("#fame").html(programName[i]);
                    // }

                }
            });
        }
    });

    //Program
    bulkP();
    function bulkP() {
        $.ajax({
            url:"action.php",
            method:"POST",
            data:{Bulkp:1},
            success:function (data) {
                $("#selectTerm").html(data);

            }
        });
    }

    //saveAssign single Program Assign
    $("#saveAssign").click(function (event) {
        var ProgramName = $("#ProgramNameAssin").val();
        var programID= $("#programID").val();
        var CourseName = $("#courseNameAssign").val();
        // alert(CourseName +" "+ ProgramName );
        $.ajax({
            url:"action.php",
            method:"POST",
            data:{saveAssignSingle:1,ProgramName:ProgramName,CourseName:CourseName,programID:programID},
            success:function (data) {
                $("#AssignMessage").html(data);

            }
        });

    });

    /**
     * Student management section*/
    $("#saveStudent").click(function (event) {
        event.preventDefault();
        var firstname = $("#fname").val();
        var lastname = $("#lname").val();
        var  othername= $("#oname").val();
        var  dateofbirth= $("#dob").val();
        var  gender= $("#gender").val();
        var  nrc1= $("#nrc1").val();
        var  nrc2= $("#nrc2").val();
        var  program_study= $("#program_study").val();
        var  phyaddress= $("#phyaddress").val();
        var  modeofstudy= $("#modeofstudy").val();
        var  email= $("#email").val();
        var  phone= $("#phone").val();
        var nrc = nrc1+"/"+ nrc2+"/" + 1;
       //alert(modeofstudy);
        $.ajax({
            url:"action.php",
            method:"POST",
            data:{addStudent:1,firstname:firstname,lastname:lastname,othername:othername,
                dateofbirth:dateofbirth,gender:gender,nrc:nrc,programStudy:program_study,address:phyaddress,
                studymode:modeofstudy, email:email,phone:phone},
            success:function (data) {
                $("#StudentMessage").html(data);
                countStudent();
            }
        });

    });
    //Edit student
    $("#editStudent").click(function (event) {
        event.preventDefault();
        var firstname = $("#fname").val();
        var lastname = $("#lname").val();
        var  othername= $("#oname").val();
        var  dateofbirth= $("#dob").val();
        var  gender= $("#gender").val();
        var  nrc1= $("#nrc1").val();
        var  nrc2= $("#nrc2").val();
        var  program_study= $("#program_study").val();
        var  phyaddress= $("#phyaddress").val();
        var  modeofstudy= $("#modeofstudy").val();
        var  email= $("#email").val();
        var  phone= $("#phone").val();
        var  programCode= $("#programCode").val();
        var  internalID= $("#internalID").val();
        var nrc = nrc1+"/"+ nrc2+"/" + 1;
       // alert(programCode);
        $.ajax({
            url:"action.php",
            method:"POST",
            data:{EditStudent:1,firstname:firstname,lastname:lastname,othername:othername,
                dateofbirth:dateofbirth,gender:gender,nrc:nrc,programStudy:program_study,address:phyaddress,
                studymode:modeofstudy, email:email,phone:phone,programCode:programCode,internalID:internalID},
            success:function (data) {
                $("#StudentMessage").html(data);
                countStudent();
            }
        });

    });

    //*
    // Search students**/
    //onkeyup="showstudent(this.value)


    /**/
    //countStudents
    countStudent();
    function countStudent() {
        $.ajax({
            url:"action.php",
            method:"POST",
            data:{countStudents:1},
            success:function (data) {
                $("#countStudent").html(data);
            }
        });
    }

    countUsers();
    function countUsers() {
        $.ajax({
            url:"action.php",
            method:"POST",
            data:{countUsers:1},
            success:function(data) {
                $("#countUsers").html(data);
            }
        });
    }

    fetchStudent();
    function fetchStudent() {
        $.ajax({
            url:"action.php",
            method:"POST",
            data:{fetchStudent:1},
            success:function (data) {
                $("#timelineStudents").html(data);
            }
        });
    }
    //ManageStudents
    ManageStudents();
    function ManageStudents() {
        $.ajax({
            url:"action.php",
            method:"POST",
            data:{ManageStudents:1},
            success:function (data) {
                $("#ManageStudents").html(data);
            }
        });
    }

    //approve application
    $("body").delegate("#approve","click",function (event) {
        event.preventDefault();
    var studentID = $(this).attr("student_id");
    var StudentfieldID = $(this).attr("studentFID");
    var status = $(this).attr("status");
    var date_enroll = $(this).attr("date_enroll");
    var programName = $(this).attr("programName");
    var programCode = $(this).attr("programCode");

   // alert("Student ID-> "+studentID+" " + "\n Field ID-> "+StudentfieldID+" "+ "\nStatus->"+status + " \n"+ date_enroll)
    //student_id='$studentID' studentFID='$st_id'
    //     status='$status'  date_enroll='$doe'
        $.ajax({
            url:"action.php",
            method:"POST",
            data:{approveApplication:1,studentID:studentID,StudentfieldID:StudentfieldID,status:status,
                date_enroll:date_enroll,programName:programName,programCode:programCode},
            success:function (data) {
                $("#StudentApprovedMessage").html(data);
                fetchStudent();
            }
        });
    });


    //Reject application
    $("body").delegate("#rejectLearner","click",function (event) {
        event.preventDefault();
    var rejectFID = $(this).attr("rejectFID");

    /* rejectLearner rejectFID rejectID*/

    // alert(rejectFID);
        if(confirm("Are you sure?")) {
            $.ajax({
                url: "action.php",
                method: "POST",
                data: {rejectApplication: 1, rejectFID: rejectFID},
                success: function (data) {
                    $("#StudentApprovedMessage").html(data);
                    fetchStudent();
                }
            });
        }

    });


    /**
     * Danger zone Adminstrator at work
     * */
    $("#saveAdmin").click(function (event) {
        event.preventDefault();
        var firstname = $("#fname").val();
        var lastname = $("#lname").val();
        var  username= $("#username").val();
        var  accesslevel= $("#role").val();
        var  gender= $("#gender").val();
        var  nrc1= $("#nrc1").val();
        var  nrc2= $("#nrc2").val();
        var  phyaddress= $("#phyaddress").val();
        var  email= $("#email").val();
        var  phone= $("#phone").val();
        var nrc = nrc1+"/"+ nrc2+"/" + 1;
       // alert(nrc);
        $.ajax({
            url:"action.php",
            method:"POST",
            data:{saveAdmin:1,firstname:firstname,lastname:lastname,username:username,
                gender:gender,nrc:nrc,address:phyaddress,
                email:email,phone:phone,accesslevel:accesslevel},
            success:function (data) {
                $("#adminMessage").html(data);
            }
        });
    });

    ManageAdmin();
    function ManageAdmin() {
        $.ajax({
            url:"action.php",
            method:"POST",
            data:{fetchAdmin:1},
            success:function (data) {
                $("#ManageAdmin").html(data);
            }
        });
    } 
    
    managelecturer();
    function managelecturer() {
        $.ajax({
            url:"action.php",
            method:"POST",
            data:{fetchlecturer:1},
            success:function (data) {
                $("#managelecturer").html(data);
            }
        });
    }
//actvatestudents
    actvatestudents();
    function actvatestudents() {
        $.ajax({
            url:"action.php",
            method:"POST",
            data:{actvatestudents:1},
            success:function (data) {
                $("#actvatestudents").html(data);
            }
        });
    }
//create Account

    $("body").delegate("#createAccounts","click",function(event) {
       event.preventDefault();
        // internalID= '$st_id' nrc='$nrc' name='$fname $lname' email='$email' id='createAccounts'
        var internalID = $(this).attr("internalID");
        var nrc = $(this).attr("nrc");
        var name = $(this).attr("name");
        var email = $(this).attr("email");

        // alert(name);
        $.ajax({
            url:"action.php",
            method:"POST",
            data:{createAccountStudent:1,name:name,nrc:nrc,email:email,internalID:internalID},
            success:function (data) {
                $("#messageActivation").html(data);
            }
        });

    }); 
    
    $("body").delegate("#course_assign","click",function(event) {
       event.preventDefault();
        // internalID= '$st_id' nrc='$nrc' name='$fname $lname' email='$email' id='createAccounts'

        var courseID =$("#CourseName").val();
        var lecturername = $("#lecturer").val();
    

        // alert(lecturername);
        $.ajax({
            url:"action.php",
            method:"POST",
            data:{LecturerassignCourse:1,courseID:courseID,lecturername:lecturername},
            success:function (data) {
                // alert(data);
                $("#CourseMessage").html(data);
            }
        });

    });

    ///user_id='$id' nrc='$snrc' name='$fname $lname' email='$email' id='createAccountAdmin'
    $("body").delegate("#createAccountAdmin","click",function(event) {
       event.preventDefault();
        // internalID= '$st_id' nrc='$nrc' name='$fname $lname' email='$email' id='createAccounts'
        var user_id = $(this).attr("user_id");
        var nrc = $(this).attr("nrc");
        var name = $(this).attr("name");
        var email = $(this).attr("email");
        var accessLevel = $(this).attr("accessLevel");
        var username = $(this).attr("username");

        // alert(name);
        $.ajax({
            url:"action.php",
            method:"POST",
            data:{createAccountAdmin:1,username:username,name:name,nrc:nrc,email:email,accessLevel:accessLevel,user_id:user_id},
            success:function (data) {
                $("#adminUser").html(data);
            }
        });
    });

    //message
    messages();
    function messages() {
        $.ajax({
            url:"action.php",
            method:"POST",
            data:{message:1},
            success:function (data) {
                $("#message").html(data);
            }
        });
    }

    ///*****/
    // assignSemester
    $("#assignSemester").click(function (event){
        event.preventDefault();

        var studentID =$("#sin").val();
        var semesterID = $("#semester_id").val();
        //alert(semesterID);
        $.ajax({
            url:"action.php",
            method:"POST",
            data:{assignSemester:1,studentID:studentID,semesterID:semesterID},
            success:function (data) {
                $("#assignMessage").html(data);
            }
        });
    });

    //assignCo

/**
 *
 * PAYMENTS MANAGEMENT
 * */

viewPayment();
function viewPayment() {
    //  id 	student_id 	semester_id 	paid 	paymentType 	paymentimg
    // 	BatchNumber 	Narration 	due 	balance 	date_updated
    $.ajax({
        url:"action.php",
        method:"POST",
        data:{viewPayments:1},
        success:function (data) {
            $("#Paymenttudents").html(data);
        }
    });
}
    approvepaymenttudents();
function approvepaymenttudents() {
    //  id 	student_id 	semester_id 	paid 	paymentType 	paymentimg
    // 	BatchNumber 	Narration 	due 	balance 	date_updated
    $.ajax({
        url:"action.php",
        method:"POST",
        data:{approvepaymenttudents:1},
        success:function (data) {
            $("#approvepaymenttudents").html(data);
        }
    });
}


//approvePayment='$BatchNumber' id='approveP'
    $("Body").delegate("#approveP","click",function (event) {
       var approveID = $(this).attr("approvePayment");
       // alert(approveID + " Payment Approved!");
        if (confirm("Are you sure?")){
            // alert(approveID + " Payment Approved!");

            $.ajax({
                url:"action.php",
                method:"POST",
                data:{makeApprovePayment:1,approveID:approveID},
                success:function (data) {
                    $("#StudentApprovedPayment").html(data);
                }
            });

        }else{
            alert(approveID + " Payment Cancelled!");
        }

    });

//Exam
    ///Exametudents
    Exametudents();
    function Exametudents() {
        $.ajax({
            url:"action.php",
            method:"POST",
            data:{examStudent:1},
            success:function (data) {
                $("#Exametudents").html(data);
            }
        });
    }


    //End of Body
});