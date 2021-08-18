<?php if(count($errors) > 0): ?>
    <!-- check for errors -->
    <div class="alert alert-danger">
        <?php foreach ($errors as $error): ?>
            <li class="list-unstyled">  <?php echo $error; ?> </li>
         <?php endforeach; ?>
    </div>
                
<?php endif; ?>
