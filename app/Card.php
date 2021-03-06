<?php

namespace App;

use App\Lists;

use Illuminate\Database\Eloquent\Model;

class Card extends Model {

    protected $table = 'cards';

    protected $fillable = [
        'name', 'lists_id', 'description',
    ];



    public function list ()
    {
        return $this->belongsTo(Lists::class);
    }

}
