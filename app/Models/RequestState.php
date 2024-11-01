<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestState extends Model
{
    use HasFactory;

    // Define the table associated with the model
    protected $table = 'request_state';

    // Optionally, define the primary key if it's not the default 'id'
    protected $primaryKey = 'id';

    // Specify if the primary key is auto-incrementing
    public $incrementing = true;

    // Specify if the primary key is an integer
    protected $keyType = 'int';

    // Disable timestamps if not used
    public $timestamps = false;
}
