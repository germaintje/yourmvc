<?php include 'header.php'; ?>
<?php
while($row = $contacts->fetch(PDO::FETCH_ASSOC)) {
	var_dump($row);
}
?>

<?php include 'footer.php'; ?>
