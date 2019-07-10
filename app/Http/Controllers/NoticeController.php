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
        return view('notice/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
        $notice = Information::find($id);

        return view('notice/edit', compact('notice'));;
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
