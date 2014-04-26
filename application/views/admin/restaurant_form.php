<div>
	<section>
		<h2>Restaurant toevoegen</h2>

			<form action="/admin/restaurants/save" method="post" accept-charset="utf-8" enctype="multipart/form-data">
				<input type="text" name="name" placeholder="Naam"/><?php if ($errors['name'] != ''){ echo $errors['name']; } ?>
				<input type="text" name="address" placeholder="Straat + huisnummer"/><?php if ($errors['address'] != ''){ echo $errors['address']; } ?>
				<input type="text" name="city" placeholder="Stad"/><?php if ($errors['city'] != ''){ echo $errors['city']; } ?>
				<input type="text" name="country" placeholder="Land"/><?php if ($errors['country'] != ''){ echo $errors['country']; } ?>
				<input type="text" name="phone" placeholder="Telefoonnummer"/><?php if ($errors['phone'] != ''){ echo $errors['phone']."<br/>"; } ?>

				<label for="description">Beschrijving</label>
				<textarea name="description"></textarea><?php if ($errors['description'] != ''){ echo $errors['description']."<br/>"; } ?>

				<label for="image">Foto</label>
				<input type="file" name="image"><?php if ($errors['image'] != ''){ echo $errors['image']."<br/>"; } ?>

				<input type="submit" value="Toevoegen"/>

		</form>
	</section>
</div>
