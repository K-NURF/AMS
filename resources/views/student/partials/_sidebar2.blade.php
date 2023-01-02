<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="/student_announcement">Announcements</a>
    <button class="dropdown-btn">Coursework
        <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-container">
        <a href="#">Assignments</a>
        <a href="#">Classwork</a>
        <a href="/timetable">My Timetable</a>
        <a href="/registeredunits">Registered Units</a>
        <a href="/availableunits">Register for Units</a>
    </div>
    
    <button class="dropdown-btn">Progress
        <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-container">
        <a href="#">My grades</a>
        <a href="#">My Report</a>

    </div>


    <a href="/reg_grad">Register for Graduation</a>








</div>

<a href="/student_announcement">Announcements</a>
    <a href="/reg_grad">Register for Craduation</a>
    <a href="/post_grade">lec post grade</a>
    
    

<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
        document.getElementById("main").style.marginLeft = "250px";
        document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        document.getElementById("main").style.marginLeft = "0";
        document.body.style.backgroundColor = "white";
    }
</script>

<script>
    //* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
    var dropdown = document.getElementsByClassName("dropdown-btn");
    var i;

    for (i = 0; i < dropdown.length; i++) {
        dropdown[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var dropdownContent = this.nextElementSibling;
            if (dropdownContent.style.display === "block") {
                dropdownContent.style.display = "none";
            } else {
                dropdownContent.style.display = "block";
            }
        });
    }
</script>