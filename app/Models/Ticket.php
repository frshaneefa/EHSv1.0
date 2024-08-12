<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject', // Add 'subject' to the fillable array
        'equipment',
        'quantity',
        'part_no',
        'remarks',
        'report_description',
        'service_details',
        'attachments',
        'user_id', // Add 'user_id' to the fillable array
        'status',
        'type',          // Add this line
        'severity',
        'agensi_tid',
    ];

    public function agensi()
    {
        return $this->belongsTo(Agensi::class, 'agensi_tid');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
