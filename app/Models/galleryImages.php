<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class galleryImages extends Model
{
    use HasFactory;


    public function gallery()
    {
        return $this->belongsTo(Gallery::class);
    }
}
