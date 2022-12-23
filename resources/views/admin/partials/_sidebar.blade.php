    <!-- The sidebar -->
    <div class="sidenav">
        <button class="dropdown-btn">Students
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-container">
            <a href="/applicants">New Applicants</a>
            <a href="/all_students">All Students</a>
        </div>
        <a href="#">Lecturers</a>
        <a href="#">Staff</a>
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