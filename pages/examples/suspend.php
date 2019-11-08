<?php
$bid=$_GET['bid'];

require('../../conn.php');

$suspend=mysqli_query($conn,"UPDATE BUSINESS 
	SET STAGE='0' 
	WHERE BUSSID='$bid'
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