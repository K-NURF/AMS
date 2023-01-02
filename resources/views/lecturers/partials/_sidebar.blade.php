    <!-- The sidebar -->
    <div class="sidenav">
        <button class="dropdown-btn">Classes & Attendance
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-container">
            <a href="/my_classes">All My Classes</a>
            <a href="/past_classes">Past Class Sessions</a>

        </div>
        <a href="/timetable">My Timetable</a>
        <a href="/lec_announcements">Announcements</a>




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