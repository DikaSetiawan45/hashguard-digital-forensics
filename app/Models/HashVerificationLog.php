<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HashVerificationLog extends Model
{
    protected $fillable = [
        'evidence_id', 'user_id', 'old_md5', 'new_md5', 
        'old_sha256', 'new_sha256', 'result'
    ];

    public function evidence()
    {
        return $this->belongsTo(Evidence::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
