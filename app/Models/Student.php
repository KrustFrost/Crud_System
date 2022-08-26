<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Student extends Model
{
    use HasFactory;
    protected $table = 'Orders';
    protected $fillable = [
        'pizza',
        'user_id',
        'total_cost',
        'ordered_by',
        'quantity_pizza',
    ];
    public function belonguser(){
        return $this->belongsTo(User::class, 'user_id');
    }
    
}
