<footer>
<div class="container">
        <div class="row" style="height: 220px">
            <div class="col-12">
<?php
echo "<p>Copyright &copy; " . date("Y") . " ADALT Agency</p>";
?>          </div>
      </div>
</div>
</footer>
<script>
jQuery(document).ready(function($){
  // Get current path and find target link
  var path = window.location.pathname.split("/").pop();
  
  // Account for home page with empty path
  if ( path == '' ) {
    path = 'index.php';
  }
      
  var target = $('nav a[href="'+path+'"]');
  // Add active class to target link
  target.addClass('active');
});
</script>
</body>
</html>