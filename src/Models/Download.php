<?php 

namespace Codersgarden\FileEncrypt\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Download extends Model
{  

     use HasFactory;

    protected $fillable = ['file', 'ulid','mimetype'];

    public function downloadable()
    {
        return $this->morphTo('downloadable');
    }

}