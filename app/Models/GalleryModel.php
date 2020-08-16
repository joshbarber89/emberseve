<?php namespace App\Models;

use CodeIgniter\Model;

class GalleriesModel extends Model{
  protected $table = 'galleries';

  protected function beforeInsert(array $data){
    $data['data']['created_at'] = date('Y-m-d H:i:s');
    return $data;
  }

  protected function beforeUpdate(array $data){
    $data['data']['updated_at'] = date('Y-m-d H:i:s');
    return $data;
  }

}
