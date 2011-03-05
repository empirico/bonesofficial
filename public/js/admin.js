//TEST

function confirm_delete_photo(photoId,albumId) {
	
	if (window.confirm('Sei si curo di voler cancellare la foto?')) {
		window.location.href="/admin/" + lang + "/album/delete-photo/albumId/" + albumId + "/photoId/" + photoId; 
		return false;
	}
	return false;
	
}
