<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AdminSponsorRequest;
use App\Models\Category;
use App\Models\Sponsor;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
use Laracasts\Flash\Flash;

class AdminSponsorController extends Controller
{

    public function __construct()
    {
        $this->middleware('isAdmin');
    }

    public function index()
    {
        $sponsors = Sponsor::paginate(10);
        return view('admin.sponsors.index', compact('sponsors'));
    }

    public function create()
    {
        $categories = Category::pluck('title', 'id');
        return view('admin.sponsors.create', compact('categories'));
    }

    public function store(AdminSponsorRequest $request)
    {
        $this->createFolder();
        $sponsor = $request->except(['_token', 'thumbnail']);
        $sponsor = $this->getFile($sponsor);
        Sponsor::create($sponsor);
        return redirect('admin/sponsors/view');
    }

    public function edit(Request $request, $id)
    {
        $categories = Category::pluck('title', 'id');
        $sponsor = Sponsor::findorFail($id);
        return view('admin.sponsors.edit', compact('sponsor', 'categories'));
    }

    public function update(AdminSponsorRequest $request, $id)
    {
        $sponsor = Sponsor::findorFail($id);
        $input = Input::only('title','description','category_id');

        $this->updateFile($sponsor);
        $sponsor->update($input);
         return redirect('admin/sponsors/view');
    }

    public function destroy(Request $request, $id)
    {
        $sponsor = Sponsor::findorFail($id);
        File::delete(public_path(). $sponsor->thumbnail);
        $sponsor->delete();
        return redirect()->back();
    }

    // Sponsor Image
    public function getFile($sponsor)
    {
        $folder = '/assets/admin/images/sponsors/';
        if (Input::hasfile('thumbnail')) {
            $thumbnail = $this->inputFile($folder);
            $sponsor = array_merge($sponsor, $thumbnail);
            return $sponsor;
        }
        return $sponsor;
    }

    public function updateFile($sponsor)
    {
        $folder = '/assets/admin/images/sponsors/';
        if (Input::hasfile('thumbnail')) {
            File::delete(public_path().$sponsor->thumbnail);
            $thumbnail = $this->inputFile($folder);
            $sponsor->update($thumbnail);
        };
    }

    public function inputFile($folder)
    {
        $thumbnail = Input::file('thumbnail');
        $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
        $path = public_path($folder . $filename);
        Image::make($thumbnail->getRealPath())->resize('400', '200')->save($path);
        $thumbnail = ['thumbnail' => $folder . $filename];
        return $thumbnail;
    }

    public function createFolder()
    {
        $path = 'assets/admin/images/sponsors';
        if (!file_exists($path)) File::makeDirectory($path, 0775, true, true);
    }

}
