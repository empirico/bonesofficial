<?php
$image_filename = 'upload/images/' . $_GET['path'];
$content_types  = array('gif' => 'image/gif', 'jpg' => 'image/jpeg', 'jpeg' => 'image/jpeg', 'png' => 'image/png');
$output_format  = strtolower(preg_replace('/.*\.([[:alnum:]]+)$/', '\\1', $image_filename));
$mime_type      = @$content_types[$output_format];
if (!is_file($image_filename)) {
    $matches         = array();
    $requested_width = null;
    if (preg_match('/.*\/([0-9]{1,4})_[^\/]*$/', $image_filename, $matches)) $requested_width = $matches[1];
    if ($requested_width > 0) {
        $real_image_filename   = preg_replace('/(.*\/)([0-9]{1,4}_)([^\/]*)$/', '\\1\\3', $image_filename);
        list($orig_w, $orig_h) = getimagesize($real_image_filename);
        $new_w                 = $requested_width;
        $new_h                 = round($orig_h * $new_w / $orig_w);
        $new_img               = imagecreatetruecolor($new_w, $new_h);
        imagesavealpha($new_img, true);
        if     ($mime_type == 'image/gif')  $orig_img = imagecreatefromgif($real_image_filename);
        elseif ($mime_type == 'image/jpeg') $orig_img = imagecreatefromjpeg($real_image_filename);
        elseif ($mime_type == 'image/png')  $orig_img = imagecreatefrompng($real_image_filename);
        imagecopyresampled($new_img, $orig_img, 0, 0, 0, 0, $new_w, $new_h, $orig_w, $orig_h);
        if     ($mime_type == 'image/gif')  imagegif($new_img, $image_filename);
        elseif ($mime_type == 'image/jpeg') imagejpeg($new_img, $image_filename,90);
        elseif ($mime_type == 'image/png')  imagepng($new_img, $image_filename,1);
    }
}
if ($mime_type && is_file($image_filename)) {
    header("Content-type: $mime_type");
    readfile($image_filename);
}
