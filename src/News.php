<?php

namespace jwwisniewski\Jigsaw\News;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use jwwisniewski\Jigsaw\Core\Instance;
use jwwisniewski\Jigsaw\Core\Traits\MultiLangSupport;

class News extends Model
{
    use SoftDeletes, MultiLangSupport;

    protected $casts = [
        'title' => 'array',
        'url' => 'array',
        'keywords' => 'array',
        'description' => 'array',
        'contents' => 'array',
    ];

    protected $multiLang = ['title', 'url', 'keywords', 'description', 'contents'];
    protected $fillable = ['instance_id', 'title', 'url', 'keywords', 'description', 'contents'];

    public function instance()
    {
        return $this->belongsTo(Instance::class, 'instance_id');
    }
}
