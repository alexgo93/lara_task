<?php

namespace App\Http\Controllers;

use App\Feedback;
use App\Http\Requests\FeedbackRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class FeedbackController extends Controller
{
    /**
     * View form
     *
     * @return Response
     */
    public function viewForm()
    {
        return view('welcome');
    }

    /**
     * Save form in database
     *
     * @param FeedbackRequest $request
     *
     * @return RedirectResponse
     */
    public function saveForm(FeedbackRequest $request): RedirectResponse
    {
        $feedback = new Feedback([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message
        ]);
        $feedback->save();
        return Redirect::to('/')
            ->with('success', 'Greate! Feedback created successfully.');
    }


    /**
     * @return View
     */
    public function index(): View
    {
        $feedbacks = Feedback::all();
        return view('feedback.index')->with('feedbacks', $feedbacks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(): Response
    {
        return view('welcome');
    }

    /**
     * Display the specified resource.
     *
     * @param integer $id
     *
     * @return View
     */
    public function show(int $id): View
    {
        $feedback = Feedback::where(['id' => $id])->first();
        $feedback->status = 'viewed';
        $feedback->save();
        return view('feedback.view', $feedback);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return View
     */
    public function edit(int $id): View
    {
        $feedback = Feedback::where(['id' => $id])->first();

        return view('feedback.edit', $feedback);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param integer $id
     *
     * @return RedirectResponse
     */
    public function update(Request $request, int $id): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'message' => 'required'
        ]);

        $update = ['name' => $request->name, 'email' => $request->email, 'phone' => $request->phone, 'message' => $request->message, 'status' => 'viewed'];
        Feedback::where('id', $id)->update($update);

        return Redirect::to('feedbacks')
            ->with('success', 'Great! Product updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param integer $id
     *
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        Feedback::where(['id' => $id])->delete();

        return Redirect::to('feedbacks')->with('success', 'Product deleted successfully');
    }
}
