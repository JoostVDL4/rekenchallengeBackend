<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekenVragen extends Model
{
    use HasFactory;

    protected $table = 'reken_vragen';


    protected $primaryKey = 'vraag_id';


    protected $fillable = ['vraag', 'antwoord', 'niveau'];
}
