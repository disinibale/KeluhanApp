<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repairements extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'complaints_id',
        'technicians_id',
        'date',
        'actions'
    ];

    public function complain()
    {
        return $this->belongsTo(Complaints::class, 'complaints_id');
    }

    public function technician()
    {
        return $this->belongsTo(Technicians::class, 'technicians_id');
    }

    public function result()
    {
        return $this->hasOne(RepairResult::class);
    }
}
