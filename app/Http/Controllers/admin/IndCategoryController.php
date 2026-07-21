<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\IndCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class IndCategoryController extends Controller
{

    public function index(Request $request)
    {

        $search = $request->get('search');

        $indcategory = IndCategory::whereNull('deleted_at')

            ->when($search, function ($query) use ($search) {

                $query->where('indcategory', 'LIKE', "%$search%");

            })

            ->orderBy('id', 'DESC')

            ->paginate(10);

        return view('admin.indcategory.indcategory-list', compact('indcategory', 'search'));

    }

    public function create()
    {

        return view('admin.indcategory.indcategory-add');

    }

    public function store(Request $request)
    {

        $request->validate([

            'indcategory' => 'required',

            'icon_image'  => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:2048',

        ], [

            'indcategory.required' => 'Please enter a indcategory.',

            'icon_image.image'     => 'Icon image must be an image file.',

            'icon_image.mimes'     => 'Icon image must be a file of type: jpg, jpeg, png, webp, svg.',

            'icon_image.max'       => 'Icon image must not be greater than 2MB.',

        ]);

        $iconImage = null;

        if ($request->hasFile('icon_image')) {

            $file = $request->file('icon_image');

            $filename = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();

            $path = public_path('indcategory/icon_image');

            if (! file_exists($path)) {

                mkdir($path, 0777, true);

            }

            $file->move($path, $filename);

            $iconImage = $filename;

        }

        IndCategory::create([
            'indcategory'      => $request->indcategory,
            'cat_description'  => $request->cat_description,
            'url'              => $request->url,
            'icon_image'       => $iconImage,
            'meta_title'       => $request->meta_title,
            'meta_description' => $request->meta_description,
        ]);

        return redirect()->route('indcategory.index')

            ->with('success', 'indcategory created successfully');

    }

    public function edit($id)
    {

        $indcategory = IndCategory::findOrFail($id);

        return view('admin.indcategory.indcategory-edit', compact('indcategory'));

    }

    public function update(Request $request, $id)
    {

        $request->validate([

            'indcategory' => 'required',

            'icon_image'  => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:2048',

        ], [

            'indcategory.required' => 'Please enter a indcategory.',

            'icon_image.image'     => 'Icon image must be an image file.',

            'icon_image.mimes'     => 'Icon image must be a file of type: jpg, jpeg, png, webp, svg.',

            'icon_image.max'       => 'Icon image must not be greater than 2MB.',

        ]);

        $indcategory = IndCategory::findOrFail($id);

        $data = [
            'indcategory'      => $request->indcategory,
            'cat_description'  => $request->cat_description,
            'url'              => $request->url,
            'meta_title'       => $request->meta_title,
            'meta_description' => $request->meta_description,
        ];

        if ($request->hasFile('icon_image')) {

            $file = $request->file('icon_image');

            $filename = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();

            $path = public_path('indcategory/icon_image');

            if (! file_exists($path)) {

                mkdir($path, 0777, true);

            }

            $file->move($path, $filename);

            $data['icon_image'] = $filename;

        }

        $indcategory->update($data);

        return redirect()->route('indcategory.index')

            ->with('success', 'indcategory updated successfully');

    }

    public function destroy($id)
    {

        $indcategory = IndCategory::findOrFail($id);

        $indcategory->delete();

        return redirect()->route('indcategory.index')

            ->with('success', 'indcategory deleted successfully');

    }

}
