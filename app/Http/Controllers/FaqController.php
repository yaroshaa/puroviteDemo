<?php

namespace App\Http\Controllers;

use App\Jobs\NewFaqJob;
use App\Models\User;
use App\Repositories\FaqRepository;
use Auth;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    private FaqRepository $faqRepository;

    public function __construct(FaqRepository $faqRepository)
    {
        $this->faqRepository = $faqRepository;
    }
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {

           if(Auth::user() && Auth::user()->hasRole('admin')) {
               $data = $this->faqRepository->getQuestionsForAdmin();
           } else {
               $data = $this->faqRepository->getQuestions();
           }


           return view('faq/faqList')->with([
            'title' => 'FAQ',
            'meta_keys' => 'faq',
            'meta_description' => 'faq',
            'data' => ['data' => $data]
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'userId' => ['required'],
            'question' => ['required'],
        ]);

        $newQuestion = $this->faqRepository->storeQuestion($request);

        $user = User::find($request->input('userId'));

        $data = [
            'user_id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'question' => $request->input('question'),
            'createdAt' => $newQuestion->created_at,

        ];

        NewFaqJob::dispatch($data);

        if (!$newQuestion)
        {
            return view()->with(['error' => 'New Question not added']);
        } else {
            return redirect()->route('faq');
        }


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $this->faqRepository->updateQuestion($request);
        return redirect()->route('faq');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(int $id)
    {
        $this->faqRepository->deleteQuestion($id);
        return redirect()->route('faq');
    }
}
