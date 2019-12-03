<?php

namespace App\Http\Controllers;

use App\Feedback;
use App\Http\Requests\FeedbackRequest;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function viewForm(Request $request)
    {
        return view('welcome');
    }

    public function checkForm(FeedbackRequest $request)
    {
        $feedback = new Feedback([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message
        ]);
        $feedback->save();
        dump($feedback);
    }


    public function index()
    {
        $feedbacks = Feedback::orderBy('id', 'desc')
            ->paginate(10);
        return view('feedback.index')->with('feedbacks', $feedbacks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('feedback.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'message' => 'required'
        ]);

        Feedback::create($request->all());

        return Redirect::to('feedback')
            ->with('success', 'Greate! Feedback created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $where = array('id' => $id);
        $data = Feedback::where($where)->first();

        return view('feedback.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'message' => 'required'
        ]);

        $update = ['name' => $request->name, 'email' => $request->email, 'phone' => $request->phone, 'message' => $request->message];
        Feedback::where('id', $id)->update($update);

        return Redirect::to('feedback')
            ->with('success', 'Great! Product updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Feedback::where('id',$id)->delete();

        return Redirect::to('feedback')->with('success','Product deleted successfully');
    }
}
