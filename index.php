<!DOCTYPE html>
<html>
<head>
	<title>Ajax Form Submission</title>
	<!-- Latest compiled and minified CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
	<!-- Minified JQuery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<!-- Zebra Dialog CSS -->
	<link rel="stylesheet" href="assets/css/classic/zebra_dialog.css" type="text/css">
	<!-- Zebra Dialog JavaScript -->
	<script type="text/javascript" src="assets/js/zebra_dialog.min.js"></script>
	<!-- RSA ID Validator -->
	<script type="text/javascript" src="assets/js/jquery.rsa_id_validator.js"></script>
</head>
<body>
	<div class="container">
		<div class="row">
			<h2 class="text-left">Ajax Form Submission</h2>
			<form id="ajax_form" method="post" novalidate>
				<div class="mb-3">
					<label for="first_name" class="col-sm-5 form-label">Name</label>
					<div class="col-sm-7">
						<input type="text" name="first_name" class="form-control" id="first_name" placeholder="Name" required />
						<div class="invalid-feedback">Please enter a valid First Name.</div>
					</div>
				</div>
				<div class="mb-3">
					<label for="last_name" class="col-sm-5 form-label">Surname</label>
					<div class="col-sm-7">
						<input type="text" name="last_name" class="form-control" id="last_name" placeholder="Surname" required />
						<div class="invalid-feedback">Please enter a valid Last Name.</div>
					</div>
				</div>
				<div class="mb-3">
					<label for="zaid" class="col-sm-5 form-label">South African ID</label>
					<div class="col-sm-7">
						<input type="number" name="zaid" class="form-control" id="zaid" placeholder="South African ID" required />
						<div class="invalid-feedback">Please enter a valid South African ID.</div>
						<div id="valid"></div>
					</div>
				</div>
				<div class="mb-3">
					<label for="age" class="col-sm-5 form-label">Age</label>
					<div class="col-sm-4">
						<input type="number" name="age" class="form-control" id="age" placeholder="Age" required disabled/> </div>
				</div>
				<div class="mb-3">
					<label for="dob" class="col-sm-5 form-label">Date of Birth</label>
					<div class="col-sm-4">
						<input type="text" name="dob" class="form-control" id="dob" placeholder="Date of Birth" required disabled/> </div>
				</div>
				<input type="button" id="submit" class="btn btn-primary col-md-2 col-md-offset-10" value="submit" /> </form>
		</div>
	</div>
	<script>
	$(document).ready(function() {
		//Validate ID and extract values
		$('#zaid').rsa_id_validator({
			displayValid: [true, "<font color='#00CC00'>ID No Valid</font>", "<font color='#FF0000'>ID No Invalid</font>"], //Display Validation Results
			displayDate: [true, ""], //Displays Date of Birth
			displayAge: [true, ""], //Displays Age
			displayValid_id: "valid",
			displayDate_id: "dob", // Controls where Date of Birth result is displayed
			displayAge_id: "age", // Controls where Age result is displayed
		});
		$("#submit").click(function() {
			var formData = {
				first_name: $("#first_name").val(),
				last_name: $("#last_name").val(),
				zaid: $("#zaid").val(),
				age: $("#age").val(),
				dob: $("#dob").val(),
			};
			$.ajax({
				type: "POST",
				url: "action/add.php",
				data: formData,
				dataType: "json",
				encode: true,
			}).done(function(data) {
				if(Boolean(data.success) == true) {
					$.Zebra_Dialog(data.message, {
						'type': 'confirmation',
						'title': 'Success!'
					});
					$("#ajax_form").reset();					
				} else if(Boolean(data.success) == false) {
					$.Zebra_Dialog(data.error, {
						'type': 'error',
						'title': 'Error! '
					});
				} else {
					$.Zebra_Dialog('Please fill in all the details', {
						'type': 'error',
						'title': 'Error!'
					});
				}
			});
			event.preventDefault();
		});
	});
	</script>
</body>
</html>