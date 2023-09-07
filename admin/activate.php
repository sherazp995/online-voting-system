<?php 
	include 'includes/session.php';

	if(isset($_POST['id'])){
		$id = $_POST['id'];
        $activate = $_POST['activate'];
		if($activate == 'true') {
			settype($activate, "boolean");
		}
        $sql = "UPDATE voters SET active = '$activate' WHERE id = '$id'";
		$conn->query($sql);

		echo json_encode($activate);
	}
?>