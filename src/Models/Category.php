<?php

namespace DevDojo\Chatter\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\WebsiteId;
class Category extends Model
{
    use WebsiteId;
    protected $table = 'chatter_categories';
    public $timestamps = true;
    public $with = 'parents';

    public function discussions()
    {
        return $this->hasMany(Models::className(Discussion::class),'chatter_category_id');
    }

    public function parents()
    {
        return $this->hasMany(Models::classname(self::class), 'parent_id')->orderBy('order', 'asc');
    }
}
