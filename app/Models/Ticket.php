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
        'closed_at',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'verified_at' => 'datetime',
        'resolved_at' => 'datetime',
        'closed_at' => 'datetime',
    ];

    public function agensi()
    {
        return $this->belongsTo(Agensi::class, 'agensi_tid');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function assignedStaff() {
        return $this->belongsTo(User::class, 'assigned_staff_id'); // Assuming the foreign key is assigned_staff_id
    }
}
