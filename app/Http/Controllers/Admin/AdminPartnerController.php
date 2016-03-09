<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminPartnerRequest;
use App\Http\Requests;
use App\Models\Partner;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;

class AdminPartnerController extends Controller
{

    public function __construct()
    {
        $this->middleware('isAdmin');
    }

    public function index()
    {
        $partners = Partner::all();
        return view('admin.partners.index', compact('partners'));
    }

    public function create()
    {
        return view('admin.partners.create');
    }

    public function store(AdminPartnerRequest $request)
    {
        $this->createFolder();
        $partner = $request->except(['_token', 'thumbnail']);
        $partner = $this->getFile($partner);
        Partner::create($partner);
        return redirect('admin/partners/show');
    }

    public function edit($slug)
    {
        $partner = $this->findPartner($slug);
        return view('admin.partners.edit', compact('partner'));
    }

    public function update(AdminPartnerRequest $request, $slug)
    {
        $partner = $this->findPartner($slug);
        $input = Input::except('_token', 'thumbnail');
        $this->updateFile($partner);
        $partner->update($input);
        return redirect()->back();
    }

    public function destroy($slug)
    {
        $partner = $this->findPartner($slug);
        File::delete(public_path(). $partner->thumbnail);
        $partner->delete();
        return redirect()->back();
    }

    // Partner Image
    public function getFile($sponsor)
    {
        $folder = '/assets/admin/images/partners/';
        if (Input::hasfile('thumbnail')) {
            $thumbnail = $this->inputFile($folder);
            $sponsor = array_merge($sponsor, $thumbnail);
            return $sponsor;
        }
        return $sponsor;
    }

    public function updateFile($sponsor)
    {
        $folder = '/assets/admin/images/partners/';
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

    /**
     * @param $slug
     * @return mixed
     */
    public function findPartner($slug)
    {
        $partner = Partner::whereSlug($slug)->first();
        return $partner;
    }

    public function createFolder()
    {
        $path = 'assets/admin/images/partners';
        if (!file_exists($path)) File::makeDirectory($path, 0775, true, true);
    }
}
