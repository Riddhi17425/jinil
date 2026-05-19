<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use Illuminate\Support\Facades\Mail;
use App\Models\SpareParts;
use App\Models\Category;

class SparePartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');

        $spareparts = SpareParts::whereNull('deleted_at')
            ->when($search, function ($query) use ($search) {
                $query->where('title', 'LIKE', "%$search%");
            })
            ->orderBy('id','DESC')
            ->paginate(10);

        return view('admin.spareparts.list', compact('spareparts', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.spareparts.add', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate(
            [
                'title' => 'required',
                'category_url' => 'required|exists:category,url',
            ],
            [
                'title.required' => 'Please enter a Title.',
                'category_url.required' => 'Please select a Category.',
                'category_url.exists' => 'The selected Category is invalid.',
            ]
        );
        
        $fileName = '';
        if(isset($request->image) && !empty($request->image)){
            if ($request->hasFile('image')) {
                $file = $request->file('image'); 
                $fileName = $file->getClientOriginalName();
                $file->move(public_path('spareparts'), $fileName);
                
            }
        }
        $spareparts = [
                    'title' => $request->title, 
                    'image'=>$fileName,
                    'status' => $request->status,
                    'category_url' => $request->category_url,
                ];
        SpareParts::create($spareparts);
        
        return redirect()->route('sparepart.index')
                        ->with('success','Spare Part created successfully');
    }

    
    public function edit($id)
    {
        $sparepart = SpareParts::find($id);
        $categories = Category::all();
        return view('admin.spareparts.edit',compact('sparepart' ,'categories'));
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
        $validatedData = $request->validate(
            [
                'title' => 'required',
                'category_url' => 'required|exists:category,url',
            ],
            [
                'title.required' => 'Please enter a Title.',
                'category_url.required' => 'Please select a Category.',
                'category_url.exists' => 'The selected Category is invalid.',
            ]
        );

        $sparepart = SpareParts::findOrFail($id);

        $sparepart->title = $request->title;
        $sparepart->status = $request->status;
        $sparepart->category_url = $request->category_url;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $file->move(public_path('spareparts'), $fileName);

            $sparepart->image = $fileName;
        }

        $sparepart->save();

        return redirect()
            ->route('sparepart.index')
            ->with('success', 'Spare Part updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sparepart = SpareParts::findOrFail($id);
        $sparepart->delete(); 
        return redirect()->route('sparepart.index')->with('success','Spare Part deleted successfully');
    }
}
