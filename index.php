<?php
	require('connection.php');
	include('country.php');
	// session_start();
?>

<html>
<head>
	<meta charset="UTF-8">
	<title>2nd Intermediate</title>
	<link rel="stylesheet" type="text/css" href="world.css">
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
	<script>
	$(document).ready(function(){

		$('#country_form').submit(function()
		{
			//post
			//from the attr form
			//serialize it
			//function(data)
			//what to do//
			///json
			$.post
			(
				$(this).attr('action'),
				$(this).serialize(),
				function(response)
				{
					// console.log(response);
					 $('#results').empty();
					 $('#results').append('<h4>Country Information</h4>');
					 $('#results').append('<p>Country: ' + response['Name'] + '</p>');
					 $('#results').append('<p>Continent: ' + response['Continent'] + '</p>');
					 $('#results').append('<p>Region: ' + response['Region'] + '</p>');
					 $('#results').append('<p>Population: ' + response['Population'] + '</p>');
					 $('#results').append('<p>LifeExpectancy: ' + response['LifeExpectancy'] + '</p>');
					 $('#results').append('<p>GovernmentForm: ' + response['GovernmentForm'] + '</p>');

				},
				"json"
			);
			return false; 

		});
	});
	</script>
</head>
	<body>
		<form id ="country_form" action="process.php" method="post">
			<label>Select Country:</label>
			<?php

				$dropdown_country = new Country();
				$dropdown_names = $dropdown_country->get_names();

			?>
			<select name="this_country"> <!-- name is key -->
				<?php
					foreach ($dropdown_names as $dropdown_name)
						//before we had just dropdown name, and it returned just "name"
					{
						echo "<option>".$dropdown_name['Name']."</option>"; // value is next to option or something.
					}
				?>
			</select>
			<input type="submit" class="btn btn-info" name="dropdown" value="Submit">
			<!--want this at the end of select, so it's after the dropdown -->
		</form>

		<h1 id="underline">Country Information</h1>
		<div id="results">
			<!--this is where countries is going to be when the json runs-->
		</div>

	</body>
</html