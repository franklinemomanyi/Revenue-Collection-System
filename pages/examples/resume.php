<?php
$bid=$_GET['bid'];

require('../../conn.php');

$suspend=mysqli_query($conn,"UPDATE BUSINESS 
	SET STAGE='1' 
	WHERE BUSSID='$bid'
	");

if ($suspend==true) {
?>
<script type="text/javascript">
//parent.alert("Resume!");
window.top.location.reload();
</script>
<?php
}


?>