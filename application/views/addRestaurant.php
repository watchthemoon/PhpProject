<div id="rightside">

	<section id="signup">

		<h2>Restaurant toevoegen</h2>

		<form action="/addRestaurant/save/" method="post" autocomplete="off">

			<input type="text" name="name" placeholder="Naam"/><?php if ($errors['name'] != ''){ echo $errors['name']; } ?>
			<input type="text" name="address" placeholder="Straat + huisnummer"/><?php if ($errors['address'] != ''){ echo $errors['address']; } ?>
			<input type="text" name="city" placeholder="Stad"/><?php if ($errors['city'] != ''){ echo $errors['city']; } ?>
			<input type="text" name="country" placeholder="Land"/><?php if ($errors['country'] != ''){ echo $errors['country']; } ?>
			<input type="text" name="phone" placeholder="Telefoonnummer"/><?php if ($errors['phone'] != ''){ echo $errors['phone']."<br/>"; } ?>
			<label for="description">Beschrijving</label>
			<textarea name="description"></textarea><?php if ($errors['description'] != ''){ echo $errors['description']."<br/>"; } ?>
			<label for="image">Foto</label>
			<input type="file" name="image">

			<input type="submit" value="Toevoegen"/>

		</form>

	</section>

</div>
