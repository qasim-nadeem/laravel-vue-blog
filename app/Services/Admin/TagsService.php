<?php


namespace App\Services\Admin;

use App\Models\Tag;

class TagsService
{
    public function createTag($name)
    {
        return Tag::create(['tagName' => $name]);
    }
}
