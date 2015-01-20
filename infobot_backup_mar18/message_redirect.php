<?php



require_once("error_display.php");

$bounce_back = $_GET['bounce_back'];

$bounce_back_decoded = str_replace("[MyAmp]", "&", $bounce_back); 


?>


<script>
    top.location.href="<?php echo $bounce_back_decoded; ?>";
</script>


