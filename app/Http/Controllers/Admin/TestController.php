<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\QuestionOption;
use App\Models\Result;
use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $title = trans('main.tests');
        $questions = Question::inRandomOrder()->limit(10)->get();
        foreach ($questions as $question) {
            $question->options = QuestionOption::where('question_id', $question->id)->inRandomOrder()->get();
        }
        return view('admin.tests.index', compact('title', 'questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $result = 0;
        $test = Test::create([
            'user_id' => auth()->user()->id,
            'result' => $result,
        ]);

        foreach ($request->input('questions', []) as $key => $question) {
            $status = 0;
            if ($request->input('answers.' . $question) != null &&
                QuestionOption::find($request->input('answers.' . $question))->point) {
                $status = 1;
                $result++;
            }
            Result::create([
                'user_id' => auth()->user()->id,
                'test_id' => $test->id,
                'question_id' => $question,
                'option_id' => $request->input('answers.' . $question),
                'point' => $status,
            ]);
        }

        $test->update(['result' => $result]);

        toastr()->success(trans('messages.success'));
        return redirect()->route('results.show', [$test->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param Test $test
     * @return Response
     */
    public function show(Test $test)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Test $test
     * @return Response
     */
    public function edit(Test $test)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Test $test
     * @return Response
     */
    public function update(Request $request, Test $test)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Test $test
     * @return Response
     */
    public function destroy(Test $test)
    {
        //
    }
}
