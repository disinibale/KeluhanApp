<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RepairResult extends Model
{
    use HasFactory;

    protected $fillable = [
        'repairements_id', 'finish_date', 'result'
    ];

    public function repairement()
    {
        return $this->belongsTo(Repairements::class, 'repairements_id');
    }
}
