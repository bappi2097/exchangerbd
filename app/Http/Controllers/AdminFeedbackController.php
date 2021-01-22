<?php

namespace App\Http\Controllers;

use App\feedback;
use Illuminate\Http\Request;

class AdminFeedbackController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feedbacks = feedback::where("status", "!=", 0)->orderBy("status")->orderBy("index")->get();
        return view('admin.feedback-list', compact("feedbacks"));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $feedback)
    {
        $data = $this->validate($request, [
            'index' => 'required',
        ]);
        $data['status'] = 2;
        if (feedback::where('id', $feedback)->update($data)) {
            return redirect(route('admin.feedback.index'))->with(notification('success', 'Successfully Approved'));
        } else {
            return redirect(route('admin.feedback.index'))->with(notification('error', 'Something went wrong!'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (feedback::where('id', $id)->update(['status' => 3])) {
            return redirect(route('admin.feedback.index'))->with(notification('success', 'Successfully Rejected'));
        } else {
            return redirect(route('admin.feedback.index'))->with(notification('error', 'Something went wrong!'));
        }
    }
}
