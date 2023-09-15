<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('upload_file')) {
    function upload_file($name, $path, $encryptName = true, $allowed_types = 'gif|jpg|png|jpeg|doc|docx|pdf|xls|xlsx', $maxSize = 5)
    {
        $CI = &get_instance();
        $CI->load->library('upload');
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $realName = $_FILES[$name]['name'];
        $_FILES[$name]['name'] = $_FILES[$name]['name'];
        $config = array(
            'upload_path'   => "$path",
            'allowed_types' => $allowed_types,
            'encrypt_name'  => $encryptName,
            'max_size' => $maxSize * 1000
        );
        $CI->upload->initialize($config);
        if ($CI->upload->do_upload($name)) {
            return [
                'path' => $path . '/' . $CI->upload->data("file_name"),
                'path_min' => $path,
                'real_name' => $realName,
                'name' => $CI->upload->data("file_name"),
                'type' => $CI->upload->data("file_type"),
                'size' => $CI->upload->data("file_size"),
                'ext' => $CI->upload->data("file_ext"),
            ];
        } else {
            // return false;
            return $CI->upload->display_errors();
            // exit;
        }
    }
}
