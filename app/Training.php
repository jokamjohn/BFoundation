<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Training extends Model
{
    protected $fillable = ['title', 'description',
        'location', 'date', 'phoneNumber', 'contactName',
        'organisation', 'categoryId', 'slug', 'venue'];

    protected $dates = [
        'created_at',
        'updated_at',
        'date',
        'deleted_at'
    ];

    /**Get the user who added the training.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function trainer()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class,'categoryId');
    }

    /**
     * Create a conversation slug.
     *
     * @param  string $title
     * @return string
     */
    public function makeSlugFromTitle($title)
    {
        $slug = Str::slug($title);

        $count = Job::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();

        return $count ? "{$slug}-{$count}" : $slug;
    }

    public function post($command)
    {
        $this->title = $command->title;
        $this->slug = $this->makeSlugFromTitle($command->title);
        $this->phoneNumber = $command->phoneNumber;
        $this->contactName = $command->contactName;
        $this->venue = $command->venue;
        $this->location = $command->location;
        $this->description = $command->description;
        $this->date = $command->date;
        $this->organisation = $command->organisation;
        $this->categoryId = $command->categoryId;
        $this->save();

        return $this;
    }


}
