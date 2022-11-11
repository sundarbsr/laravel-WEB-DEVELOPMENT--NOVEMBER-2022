<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emp extends Model
{
    use HasFactory;
    protected $fillable = [
        'department', 'salary','target','projectid'
    ];

    public function projects()
    {

        return $this->belongsTo(Project::class,'projectid');

    }
}
