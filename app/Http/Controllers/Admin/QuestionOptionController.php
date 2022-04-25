<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\QuestionOption;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class QuestionOptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $title = trans('main.questions_options');
        $options = QuestionOption::all();
        $questions = Question::all();

        return view('admin.options.index', compact('title', 'options', 'questions'));
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
        $rules = [
            'question_id' => 'required',
            'option' => 'required',
            'point' => 'required|integer',
        ];
        $validate_msg = [
            'question_id.required' => 'يجب اختيار السؤال',
            'option.required' => 'يجب كتابه الاجابه',
            'point.required' => 'يجب كتابه درجه الاجابه ( 0 , 1 )',
        ];
        $data = $this->validate($request, $rules, $validate_msg);

        try {
            QuestionOption::create($request->all());

            toastr()->success(trans('messages.success'));
            return back();

        } catch (Exception $e) {
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param QuestionOption $questionOption
     * @return Response
     */
    public function show(QuestionOption $questionOption)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param QuestionOption $questionOption
     * @return Response
     */
    public function edit(QuestionOption $questionOption)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param QuestionOption $questionOption
     * @return Response
     */
    public function update(Request $request)
    {
        $rules = [
            'question_id' => 'required',
            'option' => 'required',
            'point' => 'required|integer',
        ];
        $validate_msg = [
            'question_id.required' => 'يجب اختيار السؤال',
            'option.required' => 'يجب كتابه الاجابه',
            'point.required' => 'يجب كتابه درجه الاجابه ( 0 , 1 )',
        ];
        $data = $this->validate($request, $rules, $validate_msg);

        try {
            $option = QuestionOption::findOrFail($request->id);
            $option->update($request->all());

            toastr()->success(trans('messages.update'));
            return back();

        } catch (Exception $e) {
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param QuestionOption $questionOption
     * @return Response
     */
    public function destroy(Request $request)
    {
        QuestionOption::findOrFail($request->id)->delete();

        toastr()->success(trans('messages.delete'));
        return back();
    }
}
