
	<section class="contain">
		<h2>Restaurant wijzigen</h2>

			<form action="/admin/restaurants/editsave" method="post" accept-charset="utf-8" enctype="multipart/form-data">
				<input type="hidden" name="restaurantid" value="<?php echo $query->restaurantid; ?>"/>
				<input type="text" name="name" placeholder="Naam" value="<?php echo $query->name; ?>" required/><?php if ($errors['name'] != ''){ echo $errors['name']; } ?>
				<input type="text" name="address" placeholder="Straat + huisnummer" value="<?php echo $query->address; ?>" required/><?php if ($errors['address'] != ''){ echo $errors['address']; } ?>
				<input type="text" name="city" placeholder="Stad" value="<?php echo $query->city; ?>" required/><?php if ($errors['city'] != ''){ echo $errors['city']; } ?>
				<input type="text" name="country" placeholder="Land" value="<?php echo $query->country; ?>" required/><?php if ($errors['country'] != ''){ echo $errors['country']; } ?>
				<input type="text" name="phone" placeholder="Telefoonnummer" value="<?php echo $query->phone;?>" required/><?php if ($errors['phone'] != ''){ echo $errors['phone']."<br/>"; } ?>

				<label for="description">Beschrijving</label>
				<textarea name="description" required><?php echo $query->description; ?></textarea><?php if ($errors['description'] != ''){ echo $errors['description']."<br/>"; } ?>

				<label for="image">Foto</label>
				<input type="hidden" name="imageUrl" value="<?php echo $query->image; ?>"/>
				<br/><img src="<?php echo site_url('../upload/restaurants/'.$query->image.''); ?>" class="fotoEdit" alt="<?php echo $query->image; ?>">
				<input type="file" name="image"><?php if ($errors['image'] != ''){ echo $errors['image']."<br/>"; } ?>

				<input type="submit" value="Opslaan"/>

		</form>
	</section>

