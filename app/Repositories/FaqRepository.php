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
            ->with('blog')
            ->get()
            ->toArray();
    }



    public function storePost(Request $request)
    {
        $post = Blog::create();
        $blogContent = BlogContent::create([
            'blog_id' => $post->id,
            'language_id' => $request->input('language_id'),
            'name' => $request->input('name'),
            'content' => $request->input('content'),
            'meta_keys' => $request->input('meta_keys'),
            'meta_description' => $request->input('meta_description'),
            'image' => $request->input('image'),
            'status' => true
        ]);

        return isset($blogContent->id);
    }


    public function updatePost(Request $request, $id)
    {
        $blogId = $request->input('blog_id');
        Blog::find($blogId)->update([
            'status' => (boolean)$request->input('status')
        ]);

        BlogContent::find($id)->update([
            'blog_id' => $request->input('blog_id'),
            'name' => $request->input('name'),
            'content' => $request->input('content'),
            'meta_keys' => $request->input('meta_keys'),
            'meta_description' => $request->input('meta_description'),
            'image' => $request->input('image')
        ]);

        return 'ok';
    }

    public function deletePost(Request $request, $id)
    {
        Blog::find($id)->delete();

        return 'ok';
    }
}
