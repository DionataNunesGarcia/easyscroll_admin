<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Cake\Network\Exception\InternalErrorException;
use Cake\Utility\Text;

/**
 *
 *  Upload Component
 *
 */
class UploadComponent extends Component {

    public $max_files = 3;

    public function send($data) {
        if (!empty($data)) {
            if (count($data) > $this->max_files) {
                throw new InternalErrorException("Error ao fazer upload, o maximo de arquivos são{$this->max_files}", 1);
            }

            foreach ($data as $file) {
                $filename = $file['name'];
                $file_tmp_name = $file['tmp_name'];
                $dir = WWW_ROOT . 'img' . DS . 'upload';
                $allowed = array('png', 'jpg', 'jpeg', 'pdf', 'PDF', 'doc');
                if (!in_array(substr(strrchr($filename, '.'), 1), $allowed)) {
                    throw new InternalErrorException("Error Processing Request", 1);
                } else if (\is_uploaded_file($file_tmp_name)) {
                    move_uploaded_file($file_tmp_name, $dir . DS . Text::uuid() . '-' . $filename);
                }
            }
        }
    }

}
