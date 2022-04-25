<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Result;
use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $title = trans('main.results');
        $results = Test::all()->load('user');
        $results = $results->where('user_id', '=', auth()->id());
        return view('admin.tests.results', compact('title', 'results'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Result $result
     * @return Response
     */
    public function show($id)
    {
        $title = trans('main.results');
        $test = Test::find($id)->load('user');
        $results = Result::where('test_id', $id)
            ->with('question')
            ->with('question.options')
            ->with('question.topic')
            ->get();

        return view('admin.tests.show', compact('title', 'test', 'results'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Result $result
     * @return Response
     */
    public function edit(Result $result)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Result $result
     * @return Response
     */
    public function update(Request $request, Result $result)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Result $result
     * @return Response
     */
    public function destroy(Result $result)
    {
        //
    }
}
