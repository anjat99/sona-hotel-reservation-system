<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminMenu;
use App\Models\Menu;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MenuController extends BackendController
{

    public function index()
    {
        $this->data["menus"] = Menu::paginate(4);
        return view("admin.pages.menu.index", $this->data);
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
    public function store(Request $request)
    {
        try{
            $menu = new Menu();
            $menu->name = $request->name;
            $menu->url = $request->url;
            $menu->order = $request->order;

            $result = $menu->save();

            if($result)
                return response(['message' => 'Navlink is created successfully'], Response::HTTP_CREATED);
            else
                return response(['message'=> 'Server Error'], Response::HTTP_INTERNAL_SERVER_ERROR);

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
        $this->data["menu"] = Menu::find($id);
        return view('admin.pages.menu.edit', $this->data);
    }

    public function update(Request $request, $id)
    {

        try{
//            $data = $request->all();
//
//            @dd($data);

            $menu = Menu::find($id);
            $menu->name = $request->tbName;
            $menu->url = $request->tbUrl;
            $menu->order = $request->tbOrder;

            $menu->save();

            return redirect()->route('menus.index', $menu->id)->with('successUpdateMenu', 'Navlink edited successfully!');

        }catch (\Exception $e){
            return redirect()->route('menus.edit', $menu->id )->with('errorUpdateMenu', $e->getMessage());
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
