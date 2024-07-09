<?php
get_header();
?>

<h1>ERROR 404: Page Not Found</h1>

<script>
   setTimeout(function() {
      // Redirect to main page after 10 seconds of being on the 404 page
      window.location.href = '/';
   }, 10000);
</script>

<?php
get_footer();
