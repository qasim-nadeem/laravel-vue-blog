<?php


namespace App\Services\Admin;

use App\Models\Tag;

class TagsService
{
    public function createTag($name)
    {
        return Tag::create(['tagName' => $name]);
    }

    public function editTag($name, $id)
    {
        $tag = Tag::where('id',$id)->first()->update(['tagName' => $name]);
        return $tag;
    }

    public function removeTag($id)
    {
        $tag = Tag::find($id);
        $tag->delete();
        return true;
    }
}
