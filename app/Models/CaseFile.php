<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CaseFile extends Model
{
    protected $fillable = ['title', 'description', 'user_id', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function evidences()
    {
        return $this->hasMany(Evidence::class, 'case_id');
    }
}
