<?php include('../includes/header.php'); 
include('../database/create_trip.php');
?>
<section class="full_section main_body">
	<div class="main_body__inner">
		<div class="main_body_title">
			<h2>Add Trips</h2>
			<p>Add trip information to add to the database</p>
		</div>
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
			<div class="form_row">
				<label for="trip_name">Trip Name</label>
				<input type="text" name="trip_name" autocomplete="tripname" id="trip_name">
			</div>
		</form>
	</div>
	<div class="main_body__inner">
	<ol class="itinerary_ol">
	<li>
	<span class="itinerary_day">Day - 1</span>
	<h3 class="itinerary_title">Title of the day</h3>
	<span class="itinerary_text">Itinerary Description of the day</span>
	</li>
	</ol>
	</div>
</section>





<?php include('../includes/footer.php'); ?>