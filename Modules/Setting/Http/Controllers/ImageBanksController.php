<?php

namespace Modules\Setting\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;
use Modules\Setting\Entities\Image;
use Modules\Setting\Entities\ImageBank;
use Symfony\Component\HttpFoundation\Response;

class ImageBanksController extends Controller
{
    protected $data = [];

    public function index($agency)
    {
        try {


            $users = User::where('agency_id', $agency)->orwhere([
                ['type', 'owner'],
                ['business_id', auth()->user()->business_id],
            ])->get();

            $user_id = request('user_id') != null ? request('user_id') : auth()->user()->id;

            return view('setting::image_bank.index', compact('users', 'agency', 'user_id'));
        } catch (\Exception $e) {
            return back()->withInput()->with(flash(trans('settings.something_went_wrong'), 'error'))->with('open-tab', 'yes');
        }
    }

    public function open_folder($agency, $id)
    {
        try {
            $folder = ImageBank::findorfail($id);

            $users = User::where('agency_id', $agency)->orwhere([
                ['type', 'owner'],
                ['business_id', auth()->user()->business_id],
            ])->get();

            $user_id = request('user_id') != null ? request('user_id') : auth()->user()->id;

            $this->get_parent($id);
            $bread_crumb = array_reverse($this->data, true);
            $bread_crumb[] = ['id' => $id, 'name' => $folder->name];
            $this->data = [];
            return view('setting::image_bank.index', compact('users', 'agency', 'id', 'folder', 'user_id', 'bread_crumb'));
        } catch (\Exception $e) {
            return back()->withInput()->with(flash(trans('settings.something_went_wrong'), 'error'))->with('open-tab', 'yes');
        }

    }

    public function delete_image($id)
    {
        try {
            $image = Image::findorfail($id);
            $images = Image::where('image', $image->image)->get();
            if (count($images) <= 1) {
                unlink(public_path('bank_images/' . $image->dir . '/' . $image->image));

            }
            $image->delete();
            return response()->json(Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return back()->withInput()->with(flash(trans('settings.something_went_wrong'), 'error'))->with('open-tab', 'yes');
        }

    }

    public function delete_folder($id)
    {
        try {
            $bank = ImageBank::findorfail($id);
            File::deleteDirectory(public_path('bank_images/' . $bank->dir));
            $bank->images()->delete();
            $bank->folders()->delete();
            $bank->delete();
            return response()->json(Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return response()->json(flash(trans('settings.something_went_wrong'), 'error'));
        }
    }

    public function store_image(Request $request)
    {
        try {
            $request->validate([
                'file' => 'required|array',
                "file.*" => "required|image|mimes:jpg,png,jpeg,gif",
                'agency_id' => 'required|integer|exists:agencies,id',
                'user_id' => 'required|integer|exists:users,id',
            ]);
            $user = $request->user_id;


            if (isset($request->id)) {

                $folder = ImageBank::findorfail($request->id);

                $user_path = public_path('bank_images/' . $folder->dir . '/' . $folder->name);
                $dir = $folder->dir . '/' . $folder->name;


                if (!File::isDirectory($user_path)) {
                    File::makeDirectory($user_path, 0777, true, true);
                }

                $image_bank = $folder;

                foreach ($request->file as $file) {

                    $image = upload_image($file, $user_path);
                    Image::create([
                        'image' => $image,
                        'dir' => $dir,
                        'bank_id' => $image_bank->id
                    ]);
                }
            } else {

                $agency_path = public_path('bank_images/' . $request->agency_id);
                $user_path = public_path('bank_images/' . $request->agency_id . '/' . $user);

                if (!File::isDirectory($agency_path)) {
                    File::makeDirectory($agency_path, 0777, true, true);
                }

                if (!File::isDirectory($user_path)) {
                    File::makeDirectory($user_path, 0777, true, true);
                }

                $image_bank = ImageBank::firstorcreate([
                    'name' => 'main',
                    'agency_id' => $request->agency_id,
                    'business_id' => auth()->user()->business_id,
                    'user_id' => $user,
                    'dir' => $request->agency_id . '/' . $user,
                ]);
                foreach ($request->file as $file) {

                    $image = upload_image($file, $user_path);
                    Image::create([
                        'image' => $image,
                        'dir' => $request->agency_id . '/' . $user,
                        'bank_id' => $image_bank->id
                    ]);
                }
            }


        } catch (\Exception $e) {
            return response()->json(flash(trans('settings.something_went_wrong'), 'error'));
        }

    }

    public function store_folder(Request $request)
    {
        try {
            $request->validate([
                'path_folder' => 'nullable|sometimes',
                'agency_id' => 'required|integer|exists:agencies,id',
                'user_id' => 'required|integer|exists:users,id',
            ]);
            $user = $request->user_id;

            if (isset($request->id)) {
                $folder = ImageBank::findorfail($request->id);


                $dir = $folder->dir . '/' . $folder->name;


                $folder_name = 'New Folder' . rand(1, 9999999999999);
                $user_path = public_path('bank_images/' . $dir . '/' . $folder_name);
            } else {

                $dir = $request->agency_id . '/' . $user;

                $folder = ImageBank::firstorcreate([
                    'name' => 'main',
                    'agency_id' => $request->agency_id,
                    'business_id' => auth()->user()->business_id,
                    'user_id' => $user,
                    'dir' => $request->agency_id . '/' . $user,
                ]);

                $folder_name = 'New Folder' . rand(1, 9999999999999);
                $user_path = public_path('bank_images/' . $dir . '/' . $folder_name);
            }

            if (!File::isDirectory($user_path)) {
                File::makeDirectory($user_path, 0777, true, true);
                ImageBank::firstorcreate([
                    'name' => $folder_name,
                    'agency_id' => $request->agency_id,
                    'business_id' => auth()->user()->business_id,
                    'user_id' => $user,
                    'folder_id' => $folder->id,
                    'dir' => $dir,
                ]);
            }

        } catch (\Exception $e) {
            return response()->json(flash(trans('settings.something_went_wrong'), 'error'));
        }


    }

    public function content($agency)
    {
        try {
            $user = request('user_id') != null ? request('user_id') : auth()->user()->id;


            $folders = ImageBank::firstorcreate([
                'name' => 'main',
                'agency_id' => $agency,
                'business_id' => auth()->user()->business_id,
                'user_id' => $user,
                'dir' => $agency . '/' . $user,
            ]);


            $content = view('setting::image_bank.content', compact('folders'))->render();

            return response()->json($content, Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return response()->json(flash(trans('settings.something_went_wrong'), 'error'));
        }

    }

    public function folder_content($agency, $folder)
    {
        try {

            $folders = ImageBank::findorfail($folder);


            $content = view('setting::image_bank.content', compact('folders'))->render();

            return response()->json($content, Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return response()->json(flash(trans('settings.something_went_wrong'), 'error'));
        }
    }

    public function rename_folder(Request $request)
    {
        try {

            $request->validate([
                'name' => 'required|string|min:2',
                'id' => 'required|integer|exists:image_banks,id',
                'agency_id' => 'required|integer|exists:agencies,id'

            ]);
            $bank = ImageBank::findorfail($request->id);

            rename(public_path('bank_images/' . $bank->dir . '/' . $bank->name), public_path('bank_images/' . $bank->dir . '/' . $request->name));


            $bank->update([
                'name' => $request->name
            ]);
            return response()->json(Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return response()->json(flash(trans('settings.something_went_wrong'), 'error'));
        }
    }

    public function get_parent($id = 0)
    {


        if ($id != 0) {

            $folder = ImageBank::findorfail($id);

            if ($folder->folder_id != null && $folder->parent) {

                $parent = $folder->parent;

                $this->data[] = ['id' => $parent->id, 'name' => $parent->name];

                $this->get_parent($parent->id ?? 0);
            } else {

                return true;
            }


        } else {

            return true;
        }


    }
}
