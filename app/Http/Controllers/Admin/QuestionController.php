<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\QuestionOption;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $title = trans('main.questions');
        $questions = Question::all();

        return view('admin.questions.index', compact('title', 'questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $title = trans('admin.add_question');
        $topics = Topic::all();
        $options = [
            'option1' => 'option #1',
            'option2' => 'option #2',
            'option3' => 'option #3',
            'option4' => 'option #4',
        ];

        return view('admin.questions.create', compact('title', 'topics', 'options'));
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
            'topic_id' => 'required',
            'question_ar' => 'required',
            'question_en' => 'required',
            'description' => 'required',
            'option1' => 'required',
            'option2' => 'required',
            'option3' => 'required',
            'option4' => 'required',
            'correct_option' => 'required',
        ];
        $validate_msg = [
            'topic_id.required' => 'يجب اختيار الموضوع',
            'question_ar.required' => 'يجب كتابه السؤال العربي',
            'question_en.required' => 'يجب كتابه السؤال انجليزي',
            'description.required' => 'يجب كتابه وصف السؤال',
            'option1.required' => 'يجب كتابه الاختيار الأول',
            'option2.required' => 'يجب كتابه الاختيار الثاني',
            'option3.required' => 'يجب كتابه الاختيار الثالث',
            'option4.required' => 'يجب كتابه الاختيار الرابع',
            'correct_option.required' => 'يجب اختيار الاجابه الصحيحة',
        ];
        $data = $this->validate($request, $rules, $validate_msg);

        try {
            $question = Question::create($request->all());

            foreach ($request->input() as $key => $value) {
                if (strpos($key, 'option') !== false && $value != '') {
                    $status = $request->input('correct_option') == $key ? 1 : 0;
                    QuestionOption::create([
                        'option' => $value,
                        'point' => $status,
                        'question_id' => $question->id,
                    ]);
                }
            }

            toastr()->success(trans('messages.success'));
            return redirect(adminUrl('questions'));

        } catch (Exception $e) {
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Question $question
     * @return Response
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Question $question
     * @return Response
     */
    public function edit($id)
    {
        $title = trans('admin.edit_question');
        $topics = Topic::all();
        $question = Question::findOrFail($id);

        return view('admin.questions.edit', compact('title', 'topics', 'question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Question $question
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'topic_id' => 'required',
            'question_ar' => 'required',
            'question_en' => 'required',
            'description' => 'required',
        ];
        $validate_msg = [
            'topic_id.required' => 'يجب اختيار الموضوع',
            'question_ar.required' => 'يجب كتابه السؤال العربي',
            'question_en.required' => 'يجب كتابه السؤال انجليزي',
            'description.required' => 'يجب كتابه وصف السؤال',
        ];
        $data = $this->validate($request, $rules, $validate_msg);

        try {
            $question = Question::findOrFail($id);
            $question->update($data);

            toastr()->success(trans('messages.update'));
            return redirect(adminUrl('questions'));

        } catch (Exception $e) {
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Question $question
     * @return Response
     */
    public function destroy(Request $request)
    {
        Question::findOrFail($request->id)->delete();

        toastr()->success(trans('messages.delete'));
        return redirect(adminUrl('questions'));
    }
}
