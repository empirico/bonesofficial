//TEST

function confirm_delete_photo(photoId,albumId) {

	if (window.confirm('Sei si curo di voler cancellare la foto?')) {
		window.location.href="/admin/" + lang + "/album/delete-photo/albumId/" + albumId + "/photoId/" + photoId;
		return false;
	}
	return false;

}

function confirmDelete(form_id) {

	if (window.confirm('Confirm delete')) { $(id).submit();}
}

$(document).ready( function() {
    $('.input_calendar').datepicker({ dateFormat: 'yy-mm-dd' });
});