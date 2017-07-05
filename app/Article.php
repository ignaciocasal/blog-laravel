<?php

namespace App;

use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Article extends Model
{
    use Sluggable;
    use SluggableScopeHelpers;

    protected $table = 'articles';
    protected $fillable = ['title','content','category_id','user_id'];



    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    /**
     * Get the category that owns the article.
     */
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    /**
     * Get the user that owns the article.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the images for the article.
     */
    public function images()
    {
        return $this->hasMany('App\Image');
    }
    /**
     * The tags that belong to the article.
     */
    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    public function scopeSearch($query, $title){
        return $query->where('title', 'LIKE', '%'.$title.'%' );
    }

}
