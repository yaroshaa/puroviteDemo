<?php
namespace App\Repositories;


use App\Models\Faq;
use App\Repositories\Interfaces\BlogRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class FaqRepository
{

    /**
     *
     */
    public function getQuestions(): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        return Faq::where('answered' , true)->where('status',true)->orderBy('created_at', 'DESC')->paginate(25);
    }


    public function storeQuestion(Request $request)
    {
        $question = Faq::create([
            'user_id' => $request->input('userId') ,
            'question' => $request->input('question'),
        ]);

        return isset($question->id);
    }


    public function updateQuestion(Request $request)
    {
        $faqId = $request->input('faq_id');
        Faq::find($faqId)->update([
            'answer' => $request->input('answer'),
            'answered' => true,
            'status' => $request->input('status')
        ]);

        return 'ok';
    }

    public function deleteQuestion($id)
    {
        Faq::find($id)->delete();

        return 'ok';
    }
}
