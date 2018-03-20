<?php

namespace Lesorub\Http\Controllers;

use Lesorub\Feedback;
use Illuminate\Http\Request;
use Lesorub\FeedbackPhoto;
use Lesorub\Http\Requests\FeedbackRequest;
use Illuminate\Support\Facades\Storage;

class FeedbackController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('feedbacks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Lesorub\Http\Requests\FeedbackRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FeedbackRequest $request)
    {
        $feedback = Feedback::create($request->all());

        if ($request->author_image) {
            $filename = $request->author_image->store('public/authors');
            $feedback->author_photo = $filename;
            $feedback->save();
        }

        foreach ($request->photos as $photo) {

            $filename = $photo->store('public/feedbacks');

            FeedbackPhoto::create([
                'feedback_id' => $feedback->id,
                'filename' => $filename
            ]);

        }

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Lesorub\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function show(Feedback $feedback)
    {
        $feedbackPhotos = FeedbackPhoto::all()->where('feedback_id', $feedback->id);

        $filenames = [];

        foreach ($feedbackPhotos as $photo) {
            $filename = substr($photo->filename, strpos($photo->filename, '/'));
            $url = asset("storage" . $filename);
            array_push($filenames, $url);

        }

        $feedback->photos = $filenames;

        return response(compact('feedback'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Lesorub\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function edit(Feedback $feedback)
    {
        return view('feedbacks.edit', compact('feedback'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Lesorub\Http\Requests\FeedbackRequest $request
     * @param  \Lesorub\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function update(FeedbackRequest $request, Feedback $feedback)
    {
        $feedback->update($request->all());

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Lesorub\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function destroy(Feedback $feedback)
    {
        $photos = FeedbackPhoto::all()->where('feedback_id', $feedback->id);

        foreach ($photos as $photo) {
            Storage::delete($photo->filename);
        }

        if (!strstr($feedback->author_photo, 'default.png')) {
            Storage::delete($feedback->author_photo);
        }
        $feedback->delete();

        return redirect('/');
    }
}
