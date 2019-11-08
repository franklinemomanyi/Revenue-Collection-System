<?php
$bid=$_GET['bid'];

require('../../conn.php');

$suspend=mysqli_query($conn,"UPDATE USER 
	SET STATUS='1' 
	WHERE USERID='$bid'
	");

if ($suspend==true) {
?>
<script type="text/javascript">
//parent.alert("Suspended!");
window.top.location.reload();
</script>
<?php
}


?>