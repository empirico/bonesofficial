<?php

class Bones_Utils_Filter {

    public static function slug_me($value) {
// Lowercase the string
        $value = strtolower($value);

// Generate slug by removing unwanted (other than alphanumeric and dash [-]) characters from the string
        $value = preg_replace('/[^a-z0-9-]/i', '-', $value);
        $value = preg_replace('/-[-]*/', '-', $value);
        $value = preg_replace('/-$/', '', $value);
        $value = preg_replace('/^-/', '', $value);

        return $value;
    }

    public static function clean_filename($value) {

        $value = strtolower($value);
        $value = preg_replace('/[^a-z0-9-\.]/i', '-', $value);
        $value = preg_replace('/-[-]*/', '-', $value);
        $value = preg_replace('/-$/', '', $value);
        $value = preg_replace('/^-/', '', $value);
        return $value;
    }

    public static function extract_img_sources($html) {

        $images = array();
        if (empty($html)) return $images;
        preg_match_all('/(img|src)\=(\"|\')[^\"\'\>]+/i', $html, $media);
        $data = preg_replace('/(img|src)(\"|\'|\=\"|\=\')(.*)/i', "$3", $media[0]);
        foreach ($data as $url) {
            $info = pathinfo($url);
            if (isset($info['extension'])) {
                if (($info['extension'] == 'jpg') || ($info['extension'] == 'jpeg') || ($info['extension'] == 'gif') || ($info['extension'] == 'png')) {
                  array_push($images, $url);
                }
            }
        }
        return array_reverse($images);
    }

}