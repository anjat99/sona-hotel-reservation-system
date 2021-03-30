<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Http\Request;

class TestimonialsController extends BackendController
{

    public function index()
    {
        $this->data['testimonials'] = Testimonial::with('user')->orderByDesc('created_at')->paginate(3);
        return view('admin.pages.testimonials.index', $this->data);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->data["testimonial"] = Testimonial::with('user')->with('user.role')->find($id);
        return view("admin.pages.testimonials.testimonial-details",$this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
            $testimonial = Testimonial::find($id);
            $user = User::find($testimonial->user_id);

            $testimonial->delete();
//            session()->put('user',$user);

            return redirect()->back()->with('successDeleteTest', 'Testimonial deleted successfully!');

        }catch (\Exception $ex) {
            return redirect()->back()->with('successDeleteTest', $ex->getMessage());
        }
    }
}
