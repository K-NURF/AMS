<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-l text-gray-800 leading-tight h-4">
            ADMINISTRATOR
        </h2>
    </x-slot>

    <!-- The sidebar -->
    <div class="sidenav">
        <button class="dropdown-btn">Students
          <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-container">
          <a href="/student_applicants">New Applicants</a>
          <a href="/all_students">All Students</a>
        </div>
        <a href="#">Lecturers</a>
        <a href="#">Staff</a>
      </div>
  
  <!-- Page content -->
  <div class="content">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    You're logged in!
                </div>
            </div>
        </div>
    </div>
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

</x-app-layout>
