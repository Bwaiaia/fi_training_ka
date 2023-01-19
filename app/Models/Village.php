<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\Console\Helper\Table;

class Village extends Model
{
    use HasFactory;

    protected $table = 'villages';
    protected $fillable = ['village_name', 'village_description', 'island_id', 'uuid'];

    public function island(){

        return $this->belongsTo(Island::class);
    }

}
