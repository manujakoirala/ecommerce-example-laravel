<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Category;

class CategoryController extends BackendBaseController
{
    protected $base_route='backend.category.';
    protected $module='Category';
    protected $base_view='backend.category.';

    public function __construct(){
        $this->model=new Category();

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data['records'] = $this->model->all();
        return view($this->__loadDataToView($this->base_view.'index'), compact('data'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->__loadDataToView($this->base_view.'create'));
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
            $request->validate([
                'title'=>'required',
                'slug'=>'required'
            ]);
            $request->request->add(['created_by'=>auth()->user()->id]);
            $record=$this->model->create($request->all());
            if($record){
                request()->session()->flash('success',$this->module."created sucessfully");
            }else{
                request()->session()->flash('error', $this->module."cannot be created");
            }
          }
          catch (\Exception $exception){
              $request->session()->flash('error','Error'.$exception->getMessage());
         }
          return redirect()->route($this->base_route.'index');
      }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = $this->model->find($id);
        return view($this->__loadDataToView($this->base_view.'show'),compact('data'));
    }
//     public function show($id)
//     {
//         $data['record'] = $this->model->find($id);
//         if(!$data['record']){
//         request()->session()->flash('error',"Error: Invalid Request");
//         return redirect()->route($this->base_route.'index');
//     }else{

//     return view($this->__loadDataToView($this->base_view.'edit'),compact('data'));
// }
//     }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
public function edit($id){
        $data['record'] = $this->model->find($id);
        if(!$data['record']){
        request()->session()->flash('error',"Error: Invalid Request");
        return redirect()->route($this->base_route.'index');
        }
        else{

         return view($this->__loadDataToView($this->base_view.'edit'),compact('data'));
}
}

    // {
    //     try
    //     {
    //         $tag = Tag::find($id);
    //         if(!$tag)
    //         {
    //            request()->session()->flash('error','Error:Invalid Request');
    //            return redirect()->route('backend.tag.index');
    //         }
    //     }
    //     catch(Exception $exception)
    //     {
    //        request()->session()->flash('error','Error:'.$exception->getMessage());
    //     }
    //     return view('backend.tag.edit',compact('tag'));
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
        $request->validate([
            'title'=>'required',
            'slug'=>'required',


        ]);
        $data['record']=$this->model->find($id);
        if(!$data['record']){
            request()->session()->flash('error',"Error:Invalid Request");
            return redirect()->route($this->base_route.'index');
        }
        $request->request->add(['updated_by'=>auth()->user->id]);
        $record=$data['record']->update($request->all());
        if($record){
            request()->session()->flash('success',$this->module."Updated");
        }else{
            request()->session()->flash('error', $this->module."updation Failed");
        }
    }

        catch(\Exception $exception){
            request()->session()->flash('error',"Error: ".$exception->getMessage());
        }
        return redirect()->route($this->base_route.'index');
   }

    // {
    //     try
    //    {
    //        $tag = Tag::find($id);
    //        if(!$tag)
    //        {
    //           request()->session()->flash('error','Error:Invalid Request');
    //           return redirect()->route('backend.tag.index');
    //        }
    //        if($tag->update($request->all()))
    //        {
    //         request()->session()->flash('success','Updated');

    //        }else
    //        {
    //         request()->session()->flash('error','Updated failed');
    //        }

    //      }
    //    catch(Exception $exception)
    //    {
        //   request()->session()->flash('error','Error:'.$exception->getMessage());
    //    }
    //    return redirect()->route('backend.tag.index');
    // }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
 public function destroy($id)
    {
        $data['record'] = $this->model->find($id);
if(!$data['record']){
request()->session()->flash('error',"Error: Invalid Request");
return redirect()->route($this->base_route.'index');
}
if($data['record']->delete()){
    request()->session()->flash('success',"Success:Request Successful");
    return redirect()->route($this->base_route.'index');
}else{
    request()->session()->flash('error',"Not deleted");
}
return redirect()->route($this->base_route.'index');
}
//         try
//        {
//            $data['record'] = Tag::find($id);
//            if($tag->delete())
//            {
//               request()->session()->flash('success','Employee Deleted Successfully!!');
//            }
//            else
//            {
//             request()->session()->flash('error','Employee Deleted Failed');
//            }

//        }
//        catch(Exception $exception)
//        {
//           request()->session()->flash('error','Error:'.$exception->getMessage());
//        }
//        return redirect()->route('backend.tag.index');
//     }
// }
   public function trash()
    {

            $data['records'] = Category::onlyTrashed()->get();
            // dd($data);
            return view($this->__loadDataToView($this->base_view.'trash'), compact('data'));


    }
    public function restore(Request $request, $id)
    {
        try{

        $data['record']=$this->model->onlyTrashed()->where('id',$id)->first();

        if(!$data['record']){
            request()->session()->flash('error',"Error:Invalid Request");
            return redirect()->route($this->base_route.'index');
        }
        if($data['record']){
            $data['record']->restore();
            request()->session()->flash('success',$this->module."Updated");
        }else{
            request()->session()->flash('error', $this->module."updation Failed");
        }
    }

        catch(\Exception $exception){
            request()->session()->flash('error',"Error: ".$exception->getMessage());
        }
        return redirect()->route($this->base_route.'index');
   }
   public function permanentDelete($id)
    {
        $data['record'] = $this->model->onlyTrashed()->where('id',"$id")->first();
if(!$data['record']){
request()->session()->flash('error',"Error: Invalid Request");
return redirect()->route($this->base_route.'index');
}
if($data['record']->forceDelete()){
    request()->session()->flash('success',"Success:Request Successful");
    return redirect()->route($this->base_route.'index');
}else{
    request()->session()->flash('error',"Not deleted");
}
return redirect()->route($this->base_route.'index');
}

}
