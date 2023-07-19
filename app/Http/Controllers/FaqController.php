<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Repositories\FaqRepository;
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
           $data = $this->faqRepository->getQuestions();

           return view('faq/faqList')->with([
            'title' => 'FAQ',
            'meta_keys' => 'faq',
            'meta_description' => 'faq',
            'data' => $data
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'userId' => ['required'],
            'question' => ['required'],
        ]);

        $newQuestion = $this->faqRepository->storeQuestion($request);

        if (!$newQuestion)
        {
            return view()->with(['error' => 'New Question not added']);
        } else {

        }

        return redirect()->route('faq');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $question = $this->faqRepository->updateQuestion($request);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
    }
}
