<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Tdatum;
use App\Http\Requests\TdatumRequest;
use App\Imports\TdataImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class TdatasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $tdatas= Tdatum::query()->when(request()->query('name'), function ($query) {
            $query->where('name', 'like', '%'.request()->query('name').'%');
        })->when(request()->query('certificate_num'), function ($query) {
            $query->where('certificate_num', 'like', '%'.request()->query('certificate_num').'%');
        })->paginate(50);
        return view('tdatas.index', ['tdatas'=>$tdatas]);
    }

    public function excel()
    {
        return view('tdatas.excel');
    }

    public function excelUpload(Request $request)
    {

        $request->validate([
            'file' => 'required|mimes:xlsx,csv,xls'
        ]);

        // ini_set('upload_max_filesize', '100M');
        // return $request->file('file');
        $data = Excel::import(new TdataImport, $request->file('file')->store('files'));

        // return $data->toCollection();

        return to_route('tdatas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('tdatas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  TdatumRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(TdatumRequest $request)
    {
        Tdatum::create($request->validated());
        return to_route('tdatas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $tdatum = Tdatum::findOrFail($id);
        return view('tdatas.show',['tdatum'=>$tdatum]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $tdatum = Tdatum::findOrFail($id);
        return view('tdatas.edit',['tdatum'=>$tdatum]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  TdatumRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(TdatumRequest $request, $id)
    {
        $tdatum = Tdatum::findOrFail($id);
        $tdatum->name = $request->name;
        $tdatum->certificate_num = $request->certificate_num;
        $tdatum->serial = $request->input('serial');
		$tdatum->num = $request->input('num');
		$tdatum->document_type = $request->input('document_type');
		$tdatum->date = $request->input('date');
		$tdatum->coach_name = $request->input('coach_name');
		$tdatum->nation = $request->input('nation');
		$tdatum->notes = $request->input('notes');
        $tdatum->save();

        return to_route('tdatas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $tdatum = Tdatum::findOrFail($id);
        $tdatum->delete();

        return to_route('tdatas.index');
    }
}
