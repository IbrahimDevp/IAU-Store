<?php include('includes/header.php');?>
<section>
	<h2 class="big_title"> Contact Us </h2>
	<div class="big_border_box">
      <form method="POST" action="mailto: IAU-PHONE-STORE@gmail.com" enctype="multipart/form-data">
          <p><input type = "text" class="big_input" name = "name" required placeholder="Full name...">  </p>
          <p><input type = "email" class="big_input" name = "email" required placeholder="Email..."> </p>
          <p><input type = "tel" class="big_input" name = "phone" required placeholder="Phone: (05########)"  pattern="[0]{1}[5]{1}[0-9]{8}"> </p>
          <p><input type = "text" class="big_input" name = "Subject" placeholder="Subject..."> </p>
          <p><textarea type = "textarea" class="contact_textarea" name = "textarea" placeholder="Message..."></textarea> </p>
		  <p>
		  <input type="submit" class = "big_button" value="send" />
		  </p>
      </form>
      <h1>Reach Us</h1>
        <a href="mailto: IAU-PHONE-STORE@gmail.com"><b>IAU-PHONE-STORE@gmail.Com</b></a>
        <h3>Tel: 0138888888</h3>
		  <div id="googleMap"></div>

			<script>
			function myMap() {
			var mapProp= {
			  center:new google.maps.LatLng(26.39511,50.19561),
			  zoom:18,
			  mapTypeId: "satellite"
			};
			var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
			
			var marker = new google.maps.Marker({
				position: new google.maps.LatLng(26.39511, 50.19561),
				map: map,
				label: {text: "CCSIT", color: "white",fontSize: "16px",fontWeight: "bold"},
				animation: google.maps.Animation.BOUNCE
				});
			}
			</script>

			<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBdRKsRjmjmj8ksAiXP6ZpNe_Uc7UPg81g&callback=myMap"></script>
	</div>
</section>
<?php include('includes/footer.php');?>