<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    use HasFactory;

    public $data;
    public $message;
    public $status;

    public $fillable = [
        'data',
        'message',
        'status'
    ];

    public function __construct($data, $message, $status)
    {
        $this->data = $data;
        $this->message = $message;
        $this->status = $status;
    }
}
