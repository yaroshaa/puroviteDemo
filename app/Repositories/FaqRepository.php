<?php
namespace App\Repositories;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqRepository
{

    public function getQuestions(): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        return Faq::where('answered' , true)->where('status',true)->orderBy('created_at', 'DESC')->paginate(25);
    }

    public function getQuestionsForAdmin(): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        return Faq::orderBy('created_at', 'DESC')->paginate(25);
    }

    public function storeQuestion(Request $request)
    {
        //        return isset($question->id);
        return Faq::create([
            'user_id' => $request->input('userId') ,
            'question' => $request->input('question'),
        ]);
    }

    public function updateQuestion(Request $request)
    {
        $faqId = $request->input('faqId');
        Faq::find($faqId)->update([
            'answer' => $request->input('answer'),
            'answered' => true,
            'status' => $request->input('status') ?? 0
        ]);

        return 'ok';
    }

    public function deleteQuestion($id)
    {
        Faq::find($id)->delete();

        return 'ok';
    }
}
