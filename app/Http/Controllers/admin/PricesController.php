<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\StorePriceRequest;
use App\Models\Price;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PricesController extends BackendController
{


    public function index()
    {
        $this->data["prices"] = Price::orderBy('price')->paginate(4);
        return view('admin.pages.prices.index', $this->data);
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
    public function store(StorePriceRequest $request)
    {
        try{
            $price = new Price();
            $price->price = $request->price;

            $result = $price->save();

            if($result)
                return response(['message' => 'Price is created successfully'], Response::HTTP_CREATED);
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data["prices"] = Price::find($id);
        return view('admin.pages.prices.edit', $this->data);
    }


    public function update(StorePriceRequest $request, $id)
    {
        try{

            $price = Price::where('price', '=', $request->price)->first();
//            @dd($price);
            if ($price === null) {
                $price = Price::find($id);
                $price->price = $request->price;
                $price->save();
                return redirect()->route('prices.index')->with('successUpdatePrice', 'Value of price edited successfully!');
            }else{
                return redirect()->route('prices.edit', $id)->with('warning', 'This value already exists!');
            }


        }catch (\Exception $e){
            return redirect()->route('prices.edit', $id)->with('errors', $e->getMessage());
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
