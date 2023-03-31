<?php
namespace App\Repositories;


use App\Models\Blog;
use App\Models\BlogContent;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class BlogRepository implements Interfaces\BlogRepositoryInterface
{
    /**
     * @param int $languageId
     */
    public function getPosts(int $languageId)
    {
        return Blog::with(['content' => function ($query) use ($languageId) {
            $query->where('language_id' , $languageId);
        }])->where('status' , true)->orderBy('created_at', 'DESC')->paginate(25);

    }


    /**
     * @param int $id
     * @param int $languageId
     * @return array
     */
    public function getPost(int $id, int $languageId)
    {
        return BlogContent::where('language_id' , $languageId)
            ->where('blog_id', $id)
            ->get()->toArray();
    }

    public function storePost(Request $request)
    {
        return 'ok';
    }


    public function updatePost(int $id)
    {
        return 'ok';
    }

}
