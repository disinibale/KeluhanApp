<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technicians extends Model
{
    use HasFactory;

    protected $table = 'technicians';
    protected $primaryKey = 'id';

    protected $fillable = [
        'fullname',
        'email',
        'phone',
        'address'
    ];

    public function repairements()
    {
        return $this->hasMany(Repairements::class);
    }
}
