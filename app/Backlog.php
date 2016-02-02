<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Backlog extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'backlogs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];

    /**
     * Returns Tickets for the Backlog - Polymorphic Relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
