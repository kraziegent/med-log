<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Task extends Model
{
    use HasFactory;
    use Sluggable;

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    /**
     * The skill this task is part of.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function skill()
    {
        return $this->belongsTo(Skill::class);
    }

    /**
     * Get all required verifications for the task
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function verifications()
    {
        return $this->belongsToMany(Verification::class, 'user_task_verification')->using(UserVerification::class)->withPivot([
            'user_id',
            'staff_id',
            'trainer_id',
            'location_id',
            'verified_at',
            'verified',
            'competency_rating',
            'verifier_comment',
            'staff_comment'
        ]);
    }

    /**
     * Get a verification for a user for this task
     *
     * @param User $user
     * @return Verification
     */
    public function userVerifications(User $user)
    {
        return Cache::remember("user-{$user->id}-task-{$this->id}-verifications", 60*5, function () use($user) {
            return $this->verifications()->where('user_id', $user->id)->get();
        });
    }
}
