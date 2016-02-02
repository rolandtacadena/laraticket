<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket extends Model
{

    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tickets';

    /**
     * Implement SoftDeletes
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'user_id',
        'backlog_id',
        'description',
        'type',
        'priority',
        'status',
        'dev_loe',
    ];

    /**
     * List of the available types
     *
     * @var array
     */
    protected $types = [
        'bug',
        'task',
    ];

    /**
     * List of the available priorities
     *
     * @var array
     */
    protected $priorities = [
        'high',
        'medium',
        'low'
    ];

    /**
     * Return the available types
     *
     * @return array
     */
    public function displayTypes()
    {
        return $this->types;
    }

    /**
     * Return the available priorities
     *
     * @return array
     */
    public function displayPriorities()
    {
        return $this->priorities;
    }

    /**
     * A Ticket belongs to a User
     * returns the User of the Ticket
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Returns the Backlog that the Ticket belongs to
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function backlog()
    {
        return $this->belongsTo(Backlog::class);
    }

    /**
     * Returns the Comments of the Ticket
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
