<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;
    protected $fillable = ['action'];

    public static function log($action)
    {
        $log = new Log();
        $log->action = $action;
        $log->save();
    }
}
