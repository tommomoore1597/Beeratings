<?php 
    //Check if message is to be displayed
    if(isset($_SESSION['message'])):  ?>
    <div class="alert mb-0 alert-success">
            <li class="list-unstyled">  <?php echo $_SESSION['message']; ?> </li>
            
          <?php
          unset($_SESSION['message']);
          ?>
    </div>

  <?php endif; ?>