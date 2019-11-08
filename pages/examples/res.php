<?php
$bid=$_GET['bid'];

require('../../conn.php');

$suspend=mysqli_query($conn,"UPDATE USER 
	SET STATUS='0' 
	WHERE USERID='$bid'
	");

if ($suspend==true) {
?>
<script type="text/javascript">
//parent.alert("Suspension Lifted!");
window.top.location.reload();
</script>
<?php
}


?>