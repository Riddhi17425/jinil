<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AuthorController extends Controller
{
    /**
     * Display authors listing.
     */
    public function index()
    {
        $authors = Author::latest()->get();
        return view('admin.author.author-list', compact('authors'));
    }

    /**
     * Show create author form.
     */
    public function create()
    {
        return view('admin.author.author-add');
    }

    /**
     * Store a new author.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'nullable|string|max:255',
            'years_of_experience' => 'nullable|string|max:255',
            'social_media_name' => 'nullable|string|max:255',
            'social_media' => 'nullable|string|max:255',
            'description' => 'nullable|string',

            'main_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'social_media_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'thumbnail_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',

            'is_active' => 'nullable|boolean',
        ], [
            'name.required' => 'Please Enter the Author name.',

            'years_of_experience.integer' =>
                'Years of experience must be a valid number.',

            'main_image.image' =>
                'Main image must be a valid image.',

            'social_media_image.image' =>
                'Social media image must be a valid image.',

            'thumbnail_image.image' =>
                'Thumbnail image must be a valid image.',
        ]);

        $author = new Author();

        $author->name = $request->name;

        // Generate slug automatically from author name
        $author->slug = Str::slug($request->name);

        $author->designation = $request->designation;
        $author->years_of_experience = $request->years_of_experience;
        $author->social_media_name = $request->social_media_name;
        $author->social_media = $request->social_media;
        $author->description = $request->description;
        $author->is_active = $request->has('is_active') ? 1 : 0;

        /*
        |--------------------------------------------------------------------------
        | Main Image
        |--------------------------------------------------------------------------
        */
        if ($request->hasFile('main_image')) {

            $file = $request->file('main_image');

            $filename = time() . '_' . $file->getClientOriginalName();

            $path = public_path('Authors/main_image');

            if (!file_exists($path)) {
                mkdir($path, 0755, true);
            }

            $file->move($path, $filename);

            $author->main_image = $filename;
        }

        /*
        |--------------------------------------------------------------------------
        | Social Media Image
        |--------------------------------------------------------------------------
        */
        if ($request->hasFile('social_media_image')) {

            $file = $request->file('social_media_image');

            $filename = time() . '_' . $file->getClientOriginalName();

            $path = public_path('Authors/social_media_image');

            if (!file_exists($path)) {
                mkdir($path, 0755, true);
            }

            $file->move($path, $filename);

            $author->social_media_image = $filename;
        }

        /*
        |--------------------------------------------------------------------------
        | Thumbnail Image
        |--------------------------------------------------------------------------
        */
        if ($request->hasFile('thumbnail_image')) {

            $file = $request->file('thumbnail_image');

            $filename = time() . '_' . $file->getClientOriginalName();

            $path = public_path('Authors/thumbnail_image');

            if (!file_exists($path)) {
                mkdir($path, 0755, true);
            }

            $file->move($path, $filename);

            $author->thumbnail_image = $filename;
        }

        $author->save();

        return redirect()
            ->route('author.index')
            ->with('success', 'Author created successfully');
    }

    /**
     * Show edit author form.
     */
    public function edit($id)
    {
        $data = Author::findOrFail($id);
        return view('admin.author.author-edit', compact('data'));
    }

    /**
     * Update author.
     */
    public function update(Request $request, $id)
    {
        $author = Author::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'nullable|string|max:255',
            'years_of_experience' => 'nullable|string|max:255',
            'social_media_name' => 'nullable|string|max:255',
            'social_media' => 'nullable|string|max:255',
            'description' => 'nullable|string',

            'main_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'social_media_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'thumbnail_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',

            'is_active' => 'nullable|boolean',
        ], [
            'name.required' => 'Please Enter the Author name.',

            'main_image.image' =>
                'Main image must be a valid image.',

            'social_media_image.image' =>
                'Social media image must be a valid image.',

            'thumbnail_image.image' =>
                'Thumbnail image must be a valid image.',
        ]);

        $author->name = $request->name;

        // Update slug
        $author->slug = Str::slug($request->name);

        $author->designation = $request->designation;
        $author->years_of_experience = $request->years_of_experience;
        $author->social_media_name = $request->social_media_name;
        $author->social_media = $request->social_media;
        $author->description = $request->description;
        $author->is_active = $request->has('is_active') ? 1 : 0;

        /*
        |--------------------------------------------------------------------------
        | Main Image
        |--------------------------------------------------------------------------
        */
        if ($request->hasFile('main_image')) {

            $file = $request->file('main_image');

            $filename = time() . '_' . $file->getClientOriginalName();

            $path = public_path('Authors/main_image');

            if (!file_exists($path)) {
                mkdir($path, 0755, true);
            }

            $file->move($path, $filename);

            $author->main_image = $filename;
        }

        /*
        |--------------------------------------------------------------------------
        | Social Media Image
        |--------------------------------------------------------------------------
        */
        if ($request->hasFile('social_media_image')) {

            $file = $request->file('social_media_image');

            $filename = time() . '_' . $file->getClientOriginalName();

            $path = public_path('Authors/social_media_image');

            if (!file_exists($path)) {
                mkdir($path, 0755, true);
            }

            $file->move($path, $filename);

            $author->social_media_image = $filename;
        }

        /*
        |--------------------------------------------------------------------------
        | Thumbnail Image
        |--------------------------------------------------------------------------
        */
        if ($request->hasFile('thumbnail_image')) {

            $file = $request->file('thumbnail_image');

            $filename = time() . '_' . $file->getClientOriginalName();

            $path = public_path('Authors/thumbnail_image');

            if (!file_exists($path)) {
                mkdir($path, 0755, true);
            }

            $file->move($path, $filename);

            $author->thumbnail_image = $filename;
        }

        $author->save();

        return redirect()
            ->route('author.index')
            ->with('success', 'Author updated successfully');
    }

    /**
     * Delete author.
     */
    public function destroy($id)
    {
        $author = Author::findOrFail($id);

        $author->delete();

        return redirect()
            ->route('author.index')
            ->with('success', 'Author deleted successfully');
    }
}