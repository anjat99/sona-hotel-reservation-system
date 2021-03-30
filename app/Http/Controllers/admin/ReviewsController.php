<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\UserReview;
use Illuminate\Http\Request;

class ReviewsController extends BackendController
{
    public function index()
    {
        $this->data['reviews'] = Review::with('user')->with('rooms')->orderByDesc('created_at')->paginate(3);
        return view("admin.pages.reviews.index",$this->data);
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
        $this->data["review"] = Review::with('user')->with('rooms')->find($id);
        return view("admin.pages.reviews.review-details",$this->data);
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
            $review = Review::find($id);

//            @dd($review->rooms);
            $room = $review->rooms()->first()->name;
            $review->rooms()->detach();
            $review->delete();


            return redirect()->back()->with('success', 'Review from' . ' '. $review->user->email .'  for room' . ' '. $room . 'deleted successfully!');

        }catch (\Exception $ex) {
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }
}
