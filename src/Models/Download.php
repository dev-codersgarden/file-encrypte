<?php 

namespace Codersgarden\FileEncrypte\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Download extends Model
{  

     use HasFactory;

    protected $fillable = ['file', 'ulid'];

    public function downloadable()
    {
        return $this->morphTo('downloadable');
    }

}