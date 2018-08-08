    <!-- Menu Partial -->
    <nav id="sidebar-wrapper">
        <ul id="sidebar_menu" class="sidebar-nav">
           <li class="sidebar-brand"><a id="menu-toggle" href="#"><b>Menu</b><i class="fa fa-bars" aria-hidden="true"></i></a></li>
        </ul>
        <ul class="sidebar-nav" id="sidebar">
          <li class="menu <?php if(page_name =='item'){echo 'active';}?>"><a href="index.php">Material</a></li>
          <li class="menu <?php if(page_name =='monster'){echo 'active';}?>"><a href="#">Monster</a></li>
          <li class="menu <?php if(page_name =='treasure'){echo 'active';}?>"><a href="#">Treasure</a></li>
          <li class="menu <?php if(page_name =='synthesis'){echo 'active';}?>"><a href="#">Synthesis</a></li>
          <li class="menu <?php if(page_name =='jobs'){echo 'active';}?>"><a href="jobs.php">Jobs Info</a></li>
          <li class="menu <?php if(page_name =='market'){echo 'active';}?>"><a href="#">Market</a></li>
          <li class="menu <?php if(page_name =='board'){echo 'active';}?>"><a href="#">Guess Board</a></li>
        </ul>
     </nav>