<?php

namespace App\Models;

use App\Concern\Likeable;
use App\Scopes\PostedScope;
use App\Models\Favorite;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Image;
use Storage;
class Post extends Model
{
    use Likeable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'author_id',
        'title',
        'category_id',
        'content',
        'short_content',
        'keywords',
        'meta_title',
        'meta_description',
        'rating',
        'posted_at',
        'slug',
        'thumbnail_id',
        'published'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'posted_at'
    ];

    /**
     * The "booting" method of the model.
     */
    protected static function boot(): void
    {
        parent::boot();
        static::addGlobalScope(new PostedScope);
    }

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
     * Scope a query to search posts
     */
    public function scopeSearch(Builder $query, ?string $search)
    {
        if ($search) {
            return $query->where('title', 'LIKE', "%{$search}%");
        }
    }

    /**
     * Scope a query to order posts by latest posted
     */
    public function scopeLatest(Builder $query): Builder
    {
        return $query->orderBy('posted_at', 'desc');
    }

    /**
     * Scope a query to only include posts posted last month.
     */
    public function scopeLastMonth(Builder $query, int $limit = 5): Builder
    {
        return $query->whereBetween('posted_at', [carbon('1 month ago'), now()])
                     ->latest()
                     ->limit($limit);
    }

    
    /**
     * 
     */
    public function viewsByAuthor()
    {
        return $this->groupBy('author_id')
                    ->selectRaw('sum(view_count) as sum, author_id')
                    ->pluck('sum','author_id')
                    ->toArray();
    }

    public function postByAuthor()
    {
        return $this->groupBy('author_id')
                    ->selectRaw('count(id) as count, author_id')
                    ->pluck('count','author_id')
                    ->toArray();
    }

    /**
     * Scope a query to only include posts posted last week.
     */
    public function scopeLastWeek(Builder $query): Builder
    {
        return $query->whereBetween('posted_at', [carbon('1 week ago'), now()])
                     ->latest();
    }

    /**
     * Return the post's author
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    /**
     * Return the post's thumbnail
     */
    public function thumbnail(): BelongsTo
    {
        return $this->belongsTo(Media::class);
    }

    /**
     * Return the post's comments
     */
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * return the excerpt of the post content
     */
    public function excerpt(int $length = 50): string
    {
        return str_limit($this->content, $length);
    }

    /**
     * return true if the post has a thumbnail
     */
    public function hasThumbnail(): bool
    {
        return filled($this->thumbnail_id);
    }

    public function tag()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function favorited() {
        return (bool) Favorite::where('user_id', Auth::id()) ->where('post_id', $this->id) ->first();
    }

    public function rating()
    {
        return $this->belongsToMany(Rating::class); 
    }

    public function favor()
    {
        return $this->belongsToMany(User::class, 'favorites', 'post_id', 'user_id');
    }

    public function createImage(Request $request)
    {
        if ($request->hasFile('featured_image'))
        {
            if ($this->image)
            {
                Storage::delete($this->image);
            }
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = storage_path('/images/post/' . $filename);
            Image::make($image)->fit(1920, 500)->save($location);
            $this->image = $filename;
            $this->update(['image']);
        }

        if ($request->hasFile('featured_image_preview'))
        {
            if ($this->image_preview)
            {
                Storage::delete($this->image_preview);
            }
            $imagePre = $request->file('featured_image_preview');
            $filenamePre = time() . '_preview' . '.' . $imagePre->getClientOriginalExtension();
            $locationPre = storage_path('/images/post/' . $filenamePre);
            Image::make($imagePre)->fit(600, 600)->save($locationPre);
            $this->image_preview = $filenamePre;
            $this->update(['image_preview']);
        }
    }

    public function createTag(Request $request)
    {   
        if ($request->input('tags'))
        {
            $keywords_array = explode(',' , $request->input('tags'));
            if (count($keywords_array))
            {
                foreach($keywords_array as $keyword)
                {
                    $keyword=trim($keyword);
                    $tags = Tag::select('name')->where('name', [$keyword])->get();
                    if (!($tags->toArray())) 
                    {
                        DB::insert('insert into `tags` (`id`, `name`) values (?, ?)', array(NULL, $keyword));
                    }
                }
                foreach($keywords_array as $keyword)
                {
                    $keyword=trim($keyword);
                    $tags = Tag::select('id')->where('name', [$keyword])->get();
                    $this->tag()->attach($tags);
                }   
            }
        }
    }

    public function deleteImage()
    {
        return Storage::delete($this->image);
    }

    public function deleteImagePreview()
    {
        return Storage::delete($this->image_preview);
    }

    public function upRating(Request $request): String
    {
        session_start();
        if(!isset($_SESSION['hasrating']))
        {  
            $_SESSION['hasrating'] = array();
        }
        if(!in_array($this->id, $_SESSION['hasrating'])) 
        {
            $this->rating()->attach($request->rating);
            $this->p_rating = $this->rating->avg('value');
            $this->update(['p_rating']);
            array_push($_SESSION['hasrating'], $this->id);      
        }   
        return session_write_close();    
    }
}
 