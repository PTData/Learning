<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Article extends Model
{
    protected $fillable= [
        'title',
        'body',
        'publish_at'
    ];
    /* Torna datas do publish_at em Carbon */
    protected $dates = ['publish_at'];
    
    //scopeName
    public function scopePublishit($query) {
        $query->where('publish_at', '<=', Carbon::now());
    }

    public function scopeUnPublishit($query) {
        $query->where('publish_at', '>', Carbon::now());
    }

    // setNameAttribute
    public function setPublishAtAttributes($date) {
        $this->attributes['publish_at'] = Carbon::creatFormFormat('Y-m-d', $date);
       // $this->attributes['publish_at'] = Carbon::parse($date);
    }
    
    /**
     * An Article is owned by a user
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * $article->user();
     */
    public function user() {
        return $this->belongsTo('App\User');
    }
    
    //$user = App\User::where('name', 'Pedro Data')->first();
    //$articles = $user->articles;
}
