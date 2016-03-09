<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\SpeakerFormRequest;
use App\Models\Speaker;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
use File;

class AdminSpeakerController extends Controller
{

    public function __construct()
    {
        $this->middleware('isAdmin');
    }

    public function index()
    {
        $speakers = $this->getSpeakers();
        return view('admin.speakers.index', compact('speakers'));
    }

    public function create()
    {
        return view('admin.speakers.create');
    }

    public function edit(Request $requests, $slug)
    {
        $speaker = $this->findSpeaker($slug);
        return view('admin.speakers.edit', compact('speaker'));
    }

    public function update(SpeakerFormRequest $request, $slug)
    {
        $speaker = $this->findSpeaker($slug);
        $input = Input::only('full_name','slug','organisation','job_title','bio');
        $this->updateFile($speaker);
        $speaker->update($input);
        return redirect()->back();
    }

    public function store(SpeakerFormRequest $request)
    {
        $speaker = $request->except(['_token', 'thumbnail']);
        $speaker = $this->getFile($speaker);
        Speaker::create($speaker);
        return redirect('admin/speakers');
    }

    public function destroy(Request $request)
    {
        $speaker = $this->findSpeaker($request->slug);
        File::delete(public_path(). $speaker->thumbnail);
        $speaker->delete();
        return redirect('/admin/speakers');
    }

    public function getSpeakers()
    {
        $speakers = Speaker::all();
        return $speakers;
    }

    public function findSpeaker($slug)
    {
        $speaker = Speaker::whereSlug($slug)->first();
        return $speaker;
    }

    // Speaker Image
    public function getFile($speaker)
    {
        $this->createFolder();
        $folder = '/assets/admin/images/speakers/';
        if (Input::hasfile('thumbnail')) {
            $thumbnail = $this->inputFile($folder);
            $speaker = array_merge($speaker, $thumbnail);
            return $speaker;
        }
        return $speaker;
    }

    public function updateFile($speaker)
    {
        $folder = '/assets/admin/images/speakers/';
        if (Input::hasfile('thumbnail')) {
            File::delete(public_path() . $speaker->thumbnail);
            $thumbnail = $this->inputFile($folder);
            $speaker->update($thumbnail);
        };
    }

    public function inputFile($folder)
    {
        $thumbnail = Input::file('thumbnail');
        $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
        $path = public_path($folder . $filename);
        Image::make($thumbnail->getRealPath())->resize('254', '254')->save($path);
        $thumbnail = ['thumbnail' => $folder . $filename];
        return $thumbnail;
    }

    public function createFolder()
    {
        $path = 'assets/admin/images/speakers';
        if (!file_exists($path)) File::makeDirectory($path, 0775, true, true);
    }
}
