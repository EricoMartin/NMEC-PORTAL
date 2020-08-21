<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notice;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notices = Notice::where('link', '#')->paginate(5);
        view('inc.notice', compact('notices', $notices));
        return view('pages.shownotice', compact('notices', $notices));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('notice.index');
    }

    public function showNotice($id){
        $notices = Notice::find($id);
        return view('pages.viewnotice', compact('notices', $notices));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'body'=> 'required'
        ]);

        $notice = new Notice();
        $notice->body = $request->body;
        $notice->link = $request->link;
        $notice->save();

        return redirect()->back()->with('success', 'New Notice Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $notices = Notice::all();
        return view('pages.shownotice', compact('notices', $notices));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $notice = Notice::find($id);
        //dd($notice);
        return view('pages.editnotice', compact('notice', $notice));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'body'=> 'required'
        ]);
        $notice = Notice::find($id);
        $notice->body = $request->body;
        $notice->link = $request->link;
        $notice->save();
        return redirect('/notice/'.$notice->id)->with('success', 'Notice updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $notice = Notice::find($id);
        $notice->delete();
        $notices = Notice::all();
        return view('pages.shownotice')->with(['success' => 'Notice Deleted!', 'notices' => $notices]);
    }
}
