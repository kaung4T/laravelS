<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Notifications\Notifiable;

class Product extends Model
{
    //
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'user_id',
        'user_id_2',
        'description',
        'name2',
    ];

    /***
     * one to one
     */
    // public function user_one() : BelongsTo {
    //     return $this->belongsTo(User::class, 'user_id', 'id');
    // }

    /***
     * one to many
     */
    public function user() : BelongsTo {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /***
     * many to many
     */
    public function user_many() : BelongsToMany {
        return $this->belongsToMany(User::class, 'product_user', 'product_id', 'user_id')->withTimestamps();
    }
}
