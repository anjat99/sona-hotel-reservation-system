<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\StoreRoomServiceRequest;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends BackendController
{

    public function index()
    {
        $this->data["roomServices"] = Service::paginate(4);
        return view("admin.pages.room-services.index",$this->data);
    }


    public function create()
    {

    }


    public function store(StoreRoomServiceRequest $request)
    {
        try {
            $service = new Service();
            $service->name = $request->name;


            $service->save();

            return redirect()->route('services.index')->with('successAddService', 'Room service added successfully!');


        }catch (\Exception $e){
            \Log::error($e->getMessage());
            return redirect()->route('services.index')->with('errorAddService', 'An error occurred during insert room service!');
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


    public function edit($id)
    {
        $this->data["service"] = Service::find($id);
        return view('admin.pages.room-services.edit', $this->data);
    }


    public function update(StoreRoomServiceRequest $request, $id)
    {
        try{
            $service = Service::find($id);
            $service->name = $request->name;

            $service->save();

            return redirect()->route('services.index', $service->id)->with('successEditService', 'Room service edited successfully!');

        }catch (\Exception $e){
            return redirect()->route('services.index', $service->id )->with('errorEditService', $e->getMessage());
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
        //
    }
}
