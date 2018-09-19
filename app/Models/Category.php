<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\CategoryRequest;
use Storage;
use Image;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'name',
      'slug',
      'description',
      'image',
      'post_count',
      'image'
    ];



    /**
     * Get the route key for the model.
     */
    public function getRouteKeyName(): string
    {
        if (request()->expectsJson()) {
            return 'id';
        }

        return 'slug';
    }

    /**
     * Return the comment's post
     */
    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function setSlugAttribute($value) 
    {
        $this->attributes['slug'] = Str::slug( mb_substr($this->name, 0, 40), '-');
    }

    public function createImage(CategoryRequest $request)
    {
        if ($request->hasFile('featured_image'))
        {
            if ($this->image)
            {
                Storage::disk('local_category')->delete($this->image);
            }
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('/images/category/' . $filename);
            Image::make($image)->resize(1920, 500)->save($location);

            return $this->update(['image' => $filename]);
        }
    }

    public function deleteImage()
    {
        return Storage::disk('local_category')->delete($this->image);
    }
}