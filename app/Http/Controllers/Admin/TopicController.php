<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Topic;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $title = trans('main.topics');
        $topics = Topic::all();
        return view('admin.topics.index', compact('title', 'topics'));
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
        $rules = ['name_ar' => 'required', 'name_en' => 'required'];
        $validate_msg = [
            'name_ar.required' => 'يجب كتابه اسم القسم عربي',
            'name_en.required' => 'يجب كتابه اسم القسم انجليزي',
        ];
        $data = $this->validate($request, $rules, $validate_msg);

        try {
            $data['name_ar'] = $request->name_ar;
            $data['name_en'] = $request->name_en;
            Topic::create($data);

            toastr()->success(trans('messages.success'));
            return back();

        } catch (Exception $e) {
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Topic $topic
     * @return Response
     */
    public function show(Topic $topic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Topic $topic
     * @return Response
     */
    public function edit(Topic $topic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Topic $topic
     * @return Response
     */
    public function update(Request $request)
    {
        $rules = ['name_ar' => 'required', 'name_en' => 'required'];
        $validate_msg = [
            'name_ar.required' => 'يجب كتابه اسم القسم عربي',
            'name_en.required' => 'يجب كتابه اسم القسم انجليزي',
        ];
        $data = $this->validate($request, $rules, $validate_msg);

        try {
            $data['name_ar'] = $request->name_ar;
            $data['name_en'] = $request->name_en;
            $topic = Topic::findOrFail($request->id);
            $topic->update($data);

            toastr()->success(trans('messages.update'));
            return back();

        } catch (Exception $e) {
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Topic $topic
     * @return Response
     */
    public function destroy(Request $request)
    {
        Topic::findOrFail($request->id)->delete();
        toastr()->error(trans('messages.delete'));
        return back();
    }
}
