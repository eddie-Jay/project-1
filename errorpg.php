<?php  if (count($pgerrors) > 0) : ?>
  <div class="error">
  	<?php foreach ($pgerrors as $error) : ?>
  	  <p><?php echo $error ?></p>
  	<?php endforeach ?>
  </div>
<?php  endif ?>
