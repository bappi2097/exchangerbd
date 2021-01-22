<?php

namespace App\Http\Controllers;

use App\feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function show(feedback $feedback)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function edit(feedback $feedback)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $feedback = Auth::user()->feedback;
        $data = $this->validate($request, [
            'rating' => 'required',
            'comment' => ['nullable', 'string', 'max:1024']
        ]);
        if ($feedback->rating == $data['rating'] && $feedback->comment == $data['comment']) {
            return back()->with(notification('info', "Looks like you haven't changed anything!"));
        }
        $data['status'] = 1;
        if ($feedback->update($data)) {
            return back()->with(notification('success', 'Successfully Update Feedback'));
        } else {
            return back()->with(notification('error', 'Something Wrong!'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function destroy(feedback $feedback)
    {
        //
    }
}
