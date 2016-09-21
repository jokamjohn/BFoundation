<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Job extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title', 'phoneNumber', 'contactName', 'positions', 'location', 'description', 'deadline', 'slug'
    ];

    protected $dates = [
        'created_at', 'updated_at', 'deadline'
    ];

    /**Get the category of this job.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
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

    /**Get the Jobs posted by this employer.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function employer()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function post($command)
    {
        $this->title = $command->title;
        $this->slug = $this->makeSlugFromTitle($command->title);
        $this->phoneNumber = $command->phoneNumber;
        $this->contactName = $command->contactName;
        $this->positions = $command->positions;
        $this->location = $command->location;
        $this->description = $command->description;
        $this->deadline = $command->deadline;
        $this->category_id = $command->categoryId;
        $this->save();

        return $this;
    }
}
