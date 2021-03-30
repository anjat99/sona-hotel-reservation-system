<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\StoreTypeRoomRequest;
use App\Models\AvailabilityType;
use App\Models\Type;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TypeController extends BackendController
{

    public function index()
    {
        $this->data['roomTypes'] = Type::with('availabilityType')->paginate(4);
        return view("admin.pages.types.index",$this->data);
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


    public function store(StoreTypeRoomRequest $request)
    {
        try{
            $type = new Type();
            $type->name = $request->type;
            $type->capacity = $request->capacity;

            $type->save();

            $lastInsertedId = $type->id;
            $atype = new AvailabilityType();
            $atype->quantity = $request->quantity;
            $atype->type_id = $lastInsertedId;

            $saved = $atype->save();
            $result = $saved;

            if($result)
                return response(['message' => 'Type is created successfully'], Response::HTTP_CREATED);
            else
                return response(['message'=> 'Data is Invalid'], Response::HTTP_UNPROCESSABLE_ENTITY);

        }catch (\Exception $e){
            \Log::error($e->getMessage());
            return response(['message'=>$e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
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
        $this->data["type"] = Type::with('availabilityType')->find($id);
        return view('admin.pages.types.edit', $this->data);
    }


    public function update(StoreTypeRoomRequest $request, $id)
    {

        try{
//            $data = $request->all();
//
//            @dd($data);

            $type = Type::find($id);
            $type->name = $request->type;
            $type->capacity = $request->capacity;

            $type->save();
            $type->availabilityType()->update(['quantity'=> $request->quantity]);



            return redirect()->route('types.index', $type->id)->with('successUpdateType', 'Type of room edited successfully!');

        }catch (\Exception $e){
            return redirect()->route('types.edit', $type->id )->with('errorUpdateType', $e->getMessage());
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
