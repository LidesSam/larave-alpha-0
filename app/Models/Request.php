<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;
    protected $fillable = ['email', 'message', 'state_id', 'type_id', 'turndate',"hash"];

    public function state()
    {
        return $this->belongsTo(RequestState::class, 'state_id');
    }

    public function type()
    {
        return $this->belongsTo(RequestType::class, 'type_id');
    }
}
