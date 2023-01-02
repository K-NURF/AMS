<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

  <!-- <button class="dropdown-btn">Announcements
    <i class="fa fa-caret-down"></i>
  </button> -->
  <!-- <div class="dropdown-container"> -->
    <a href="/staff_announcements">General Announcements</a>
    <a href="/dept_announcements">Departmental Announcements</a>
  <!-- </div> -->







</div>

<div id="main">
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; menu</span>
</div>

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