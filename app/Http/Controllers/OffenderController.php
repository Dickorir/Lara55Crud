<?php

namespace App\Http\Controllers;

use App\Offender;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OffenderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offenders = Offender::orderBy('created_at')->paginate(10);
//        dd($offenders);
        return view('offenders.index', compact('offenders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('offenders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'doc_no' => 'required',
            'name' => 'required',
            'gender' => 'required',
            'citizenship' => 'required',
            'race' => 'required',
            'age_variance' => 'required',
            'dob' => 'required',
            'marital_status' => 'required',
            'hair_color' => 'required',
            'eye_color' => 'required',
            'height' => 'required',
            'weight' => 'required',
            'religion' => 'required',
            'education' => 'required',
            'residence' => 'required',
            'cluster' => 'required',
            'special_need' => 'required',
        ]);
        $dob = Carbon::parse($request->dob)->toDateString();
        $request->request->add(['dob' => $dob]); //add request
        $offender = Offender::create($request->all());
//        dd($offender);
        return redirect()->route('offender.index')->with('success','Article created successfully');
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
            $offender= Offender::where('id',$id)->first();
//        dd($offender);
        return view('offenders.edit', compact('offender'));
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
        $offender = Offender::where('id', $id)->first();
//        dd($offender);
        $dob = Carbon::parse($request->dob)->toDateString();
        $request->request->add(['dob' => $dob]); //add request

        $offender->update($request->all());
//        dd($admin);
        if ($offender->id) {
            return redirect('offender')->with('success', trans('Offender updated'));
        } else {
            return redirect('offender')->withInput()->with('error', trans('Offender not updated'));
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
        $offender = Offender::destroy($id);
//        dd($admin);
        if ($offender) {
            return redirect('offender')->with('success', trans('Offender Deleted'));
        } else {
            return redirect('offender')->withInput()->with('error', trans('Offender not deleted'));
        }
    }
}
