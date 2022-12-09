<?php
/*
	* header which contains 
	- logo
	- search panel
	- drob down menu form db
	- buttons for logout and reserved books
*/

//useus the category class
//creating the array of categoryis to display in drob down menu
	include ('../../domain/enteties/category.php');
	$categoryArr = array();
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8 without a BOM">
  <title>CodePen - Responsive Navbar</title>
  <link rel="stylesheet" href="style.css">

</head>
<body>

	<div class="navbar">
	
		<div class="logo">
			<a href="../home/wellcome.php">
				<h2>LIBRARY</h2>
			</a>
		</div>

		<?php 
		//getting the list of categoryies form db
		//fill the category array
			require_once('../../data/session_connection.php');
			require_once('../../data/db_connection.php');
			
			$sql = "SELECT * FROM Library.Categories";
			$result = $con->query($sql);
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					$id = $row["CategoryID"];
					$name = $row["CategoryDescription"];
					$category = new Category("$id", "$name");
					array_push($categoryArr, $category);
				}
			} else {
				echo "0 results";
			}
		?>

		<!--form for searching-->
		<form class ="search_form" action="../home/wellcome.php" method="POST">
			<select name="category" id="categories" value="Select category">
				<optgroup label="Categories">
				<option disabled selected value> -- Select an categoty -- </option>

				<?php 
					for($i = 0; $i < count($categoryArr); $i++) {
						echo '<option value="' . $categoryArr[$i]->categoryID . '">'. $categoryArr[$i]->name . '</option>';
					}
				?>
				</optgroup>
			</select>
				<input type="text" placeholder="Search by name or author" name="search">
				<button type="submit"></button>
		</form>
  		
		<div class = "button_container">
        	<div class="right">
				<button><a href="../reserved/reserved.php">Reserved books</a></button>
	    	</div>
        	<div class="right">
		    	<button><a href="../logout/logout.php?logout">Logout</a></button>
	    	</div>
    	</div>
	</div>
</body>
</html>
