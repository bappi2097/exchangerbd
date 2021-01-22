<?php

namespace App\Http\Controllers;

use App\Notice;
use Illuminate\Http\Request;

class AdminNoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notices = Notice::all();
        return view("admin.notice.notice", compact('notices'));
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
        $data = $this->validate($request, [
            'title' => 'required|string',
            'content' => 'required|string',
            'is_active' => 'nullable',
        ]);
        $data['is_active'] = !empty($data['is_active']) ? true : false;
        $data = Notice::create($data);
        if (!empty($data->id)) {
            return back()->with(notification('success', 'Successfully Notice Added'));
        } else {
            return back()->with(notification('error', 'Something Went Wrong!'));
        }
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
    public function update(Request $request)
    {
        $id = $this->validate($request, [
            'id' => 'required|numeric'
        ]);
        $data = $this->validate($request, [
            'title' => 'required|string',
            'content' => 'required|string',
            'is_active' => 'nullable',
        ]);
        $data['is_active'] = !empty($data['is_active']) ? true : false;
        $notice = Notice::find($id['id']);
        if ($notice->update($data)) {
            return back()->with(notification('success', 'Successfully Wallet Account Updated'));
        } else {
            return back()->with(notification('error', 'Something Went Wrong!'));
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
        if (Notice::where('id', $id)->delete()) {
            return back()->with(notification('success', 'Successfully Deleted'));
        } else {
            return back()->with(notification('error', 'Something Went Wrong'));
        }
    }
}
