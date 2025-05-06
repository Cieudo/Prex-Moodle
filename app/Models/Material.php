<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $fillable = ['module_id', 'file_path', 'type'];

    public function module()
    {
        return $this->belongsTo(Module::class);
    }
}

