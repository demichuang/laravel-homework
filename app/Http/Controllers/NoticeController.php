<?php

namespace App\Http\Controllers;

use App\Notice\Information;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notices = Information::all();

        return view('notice/index', compact('notices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $msg = '';
        $noticeData = [
            'name' => '',
            'datetime' => '',
            'content' => '',
        ];
        $notice = (object) $noticeData;

        return view('notice/create', compact('notice', 'msg')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->activity_time !== date('Y-m-d H:i:s', strtotime($request->activity_time))) {
            $msg = 'date error';
            $noticeData = [
                'name' => $request->acativity_name,
                'datetime' => $request->activity_time,
                'content' => $request->activity_content,
            ];
            $notice = (object) $noticeData;
            
            return view('notice/create', compact('notice', 'msg'));   
        }

        DB::beginTransaction();
        try { 
            $information = new Information();
            $information->name = $request->acativity_name;
            $information->datetime = $request->activity_time;
            $information->content = $request->activity_content;
            $information->save();
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
        }

        return redirect("notice");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return 'show';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $msg = '';
        $notice = Information::find($id);

        return view('notice/edit', compact('notice', 'msg'));
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
        if ($request->activity_time !== date('Y-m-d H:i:s', strtotime($request->activity_time))) {
            $msg = 'date error';
            $noticeData = [
                'id' => $id,
                'name' => $request->acativity_name,
                'datetime' => $request->activity_time,
                'content' => $request->activity_content,
            ];
            $notice = (object) $noticeData;

            return view('notice/edit', compact('notice', 'msg'));   
        }

        DB::beginTransaction();
        try { 
            $information = Information::find($id);
            $information->name = $request->acativity_name;
            $information->datetime = $request->activity_time;
            $information->content = $request->activity_content;
            $information->save();
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
        }

        return redirect("notice");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try { 
            Information::find($id)->delete();
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
        }

        return redirect("notice");
    }
}
