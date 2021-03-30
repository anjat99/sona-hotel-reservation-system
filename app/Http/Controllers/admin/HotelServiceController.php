<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\StoreHotelServiceRequest;
use App\Http\Requests\admin\UpdateHotelServiceRequest;
use App\Models\HotelService;
use Illuminate\Http\Request;

class HotelServiceController extends BackendController
{

    public function index()
    {
        $this->data["hotelServices"] = HotelService::paginate(3);
        return view("admin.pages.hotel-service.index",$this->data);
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
    public function store(StoreHotelServiceRequest $request)
    {
        try {
            $hotelService = new HotelService();
            $hotelService->title = $request->title;
            $hotelService->description = $request->description;

            $hotelService->img = HotelService::uploadImage($request->image);
            $hotelService->save();

            return redirect()->route('hotel-services.index')->with('successAddHService', 'Hotel service added successfully!');


        }catch (\Exception $e){
            \Log::error($e->getMessage());
            return redirect()->route('hotel-services.index')->with('errorAddHService', $e->getMessage());
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
        $this->data["hotelService"] = HotelService::find($id);
        return view('admin.pages.hotel-service.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHotelServiceRequest $request, $id)
    {
        try{
            $hotelService = HotelService::find($id);
            if($hotelService->title !== $request->title)
            {
                $exists = HotelService::where('title',$request->title)->exists();
                if($exists)
                    return redirect()->back()->with('warningEditHService','There is already an service with this title!');
                $hotelService->title = $request->title;
            }

//            $hotelService->title = $request->title;
            $hotelService->description = $request->description;

            if($request->has('image')){
                $hotelService->img = HotelService::uploadImage($request->image);
                HotelService::deleteImage($hotelService->img);

                $hotelService->img = HotelService::uploadImage($request->image);
                $hotelService->save();
            }

            $hotelService->save();

            return redirect()->route('hotel-services.index', $hotelService->id)->with('successEditHService', 'Hotel service edited successfully!');

        }catch (\Exception $e){
            return redirect()->route('hotel-services.index', $hotelService->id )->with('errorEditHService', $e->getMessage());
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
        try {
            $service = HotelService::find($id);
            $service->delete();

            return redirect()->back()->with('success', 'Hotel Service with name:' . ' '. $service->title .' deleted successfully!');

        }catch (\Exception $ex) {
            return redirect()->back()->with('errorDeleteHService', $ex->getMessage());
        }
    }
}
