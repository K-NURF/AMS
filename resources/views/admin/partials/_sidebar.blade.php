    <!-- The sidebar -->
    <div class="sidenav">
        <button class="dropdown-btn">Announcements
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-container">
            <a href="/admin_announce">Make Announcement</a>
            <a href="/staffAnnounce">Make Staff Announcement</a>
            <a href="/view_announcements">View Announcements</a>
        </div>

        <button class="dropdown-btn">Classes & Units
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-container">
            <a href="/allunits">All Classes</a>
            <a href="/create_class">Create Class</a>
        </div>

        <button class="dropdown-btn">Lecturers
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-container">
          {{-- <!--  <a href="{{ route('lec.index') }}">All Lecturers</a> --> --}}
            <a href="/addlecform">Register Lecturer</a>

        </div>

        <button class="dropdown-btn">Students
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-container">
            <a href="/applicants">New Applicants</a>
            <a href="/all_students">All Students</a>
            <a href="/addstudentform">Register Student</a>
            <a href="/appliedGrad">Graduation Applicants</a>
            <a href="/graduate">Graduants</a>
            
        </div>

        <button class="dropdown-btn">Staff
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-container">
            <a href="/staffapplicants">Staff Applicants</a>
            <a href="/Allstaff">All Staff</a>
            <a href="/addstaffform">Register Staff</a>
        </div>





        <a href="/timetable">General Timetable</a>



    </div>

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