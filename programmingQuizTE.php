/*====================================
Main page - contains menu and form
======================================= */

<html>
	<head>
		<link rel="stylesheet" type="text/css" media="all" href="programmingQuizTE.css">
		<script src="js/jquery-1.8.3.min.js"></script>
		<script type="text/javascript" src="programmingQuizTE.js"></script>
	</head>
	<body>
		<nav>
			<ul>
				<?php
				$links = Navigation::get_links(false,0);
				foreach($links as $link){
					echo "<li><a href='".$link['url']."'>".$link['name']."</a>";
					$inner_links = Navigation::get_links(false,$link['id']);
					if($inner_links){
						echo "<ul>";
						foreach($inner_links as $inner_link){
							echo "<li><a href='".$inner_link['url']."'>".$inner_link['name']."</a></li>";
						}
						echo "</ul>";
					}
					echo "</li>";
				}
				?>
			</ul>
		</nav>
		<form>
			<div class="box">
				Remove Navigation:
				<br>
				<select id="remove-id">
					<?php
					$links = Navigation::get_links(true);
					foreach($links as $link){
						echo "<option value='".$link['id']."'>".$link['name']."</option>";
					}
					?>
				</select>
				<button onclick='removeNavigation(); return false;'>Remove</button>
			</div>
			<div class="box">
				Add Navigation:
				<br>
				<label for='add-name'>Name:</label>
				<input type="text" name="name" id='add-name'>
				<label for='add-url'>URL:</label>
				<input type="text" name="name" id='add-url'>
				<label for='add-parent'>Parent:</label>
				<select id="add-parent-id">
					<?php
					$links = Navigation::get_links(false,0);
					foreach($links as $link){
						echo "<option value='".$link['id']."'>".$link['name']."</option>";
					}
					?>
				</select>
				<button onclick='addNavigation(); return false;'>Add</button>
			</div>
		</form>
	</body>
</html>
