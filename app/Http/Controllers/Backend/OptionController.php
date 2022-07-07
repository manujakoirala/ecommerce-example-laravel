<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Option;

class OptionController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
            $data = Option::all();
            return view('backend.option.index', compact('data'));
        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.option.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $option=Option::create($request->all());
            if($option){
                $request->session()->flash('success','option added successfuly');
            }else{
                $request->session()->flash('error','option addition failed');
            }
         }
         catch (\Exception $exception){
             $request->session()->flash('error','Error'.$exception->getMessage());
         }
         return redirect()->route('backend.option.index');
     }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $option = Option::find($id);
        return view('backend.option.show',compact('option'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try
        {
            $option = Option::find($id);
            if(!$option)
            {
               request()->session()->flash('error','Error:Invalid Request');
               return redirect()->route('backend.option.index');
            }
        }
        catch(Exception $exception)
        {
           request()->session()->flash('error','Error:'.$exception->getMessage());
        }
        return view('backend.option.edit',compact('option'));
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
        try
       {
           $option = Option::find($id);
           if(!$option)
           {
              request()->session()->flash('error','Error:Invalid Request');
              return redirect()->route('backend.option.index');
           }
           if($option->update($request->all()))
           {
            request()->session()->flash('success','Updated');
            
           }else
           {
            request()->session()->flash('error','Updated failed');
           }

         }
       catch(Exception $exception)
       {
          request()->session()->flash('error','Error:'.$exception->getMessage());
       }
       return redirect()->route('backend.option.index');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try
       {
           $option = Option::find($id);
           if($option->delete())
           {
              request()->session()->flash('success','option Deleted Successfully!!');
           }
           else
           {
            request()->session()->flash('error','option Deleted Failed');
           }

       }
       catch(Exception $exception)
       {
          request()->session()->flash('error','Error:'.$exception->getMessage());
       }
       return redirect()->route('backend.option.index');
    }
}
