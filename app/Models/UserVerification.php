<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class UserVerification extends Pivot
{
    use HasFactory;

    protected $table = 'user_task_verification';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'verified_at' => 'datetime',
        'verified' => 'boolean',
    ];

    /**
     * Get presentation for verified attribute
     *
     * @param mixed $value
     * @return string
     */
    public function getVerifiedAttribute($value)
    {
        return $value ? 'Yes' : 'No';
    }

    /**
     * Set the value for verified attribute
     *
     * @param mixed $value
     * @return void
     */
    public function setVerifiedAttribute($value)
    {
        $this->attributes['verified'] = $value == 'Yes' ? 1 : 0;
    }

    /**
     * The trainer who verified this task was carried out.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function trainer()
    {
        return $this->belongsTo(User::class, 'trainer_id');
    }

    /**
     * The staff who supervised this task was carried out.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function staff()
    {
        return $this->belongsTo(User::class, 'staff_id');
    }

    /**
     * The user who verified this task.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * The location where the this task was verified.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    /**
     * The verification for the task.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function verification()
    {
        return $this->belongsTo(Verification::class);
    }

    /**
     * The task for which the user verified.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function task()
    {
        return $this->belongsTo(Task::class);
    }
}
