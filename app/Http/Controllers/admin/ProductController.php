<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\IndCategory;
use App\Models\Industry;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class ProductController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');

        $product = Product::whereNull('deleted_at')
            ->when($search, function ($query) use ($search) {
                $query->where('title', 'LIKE', "%$search%");
            })
            ->orderBy('id','DESC')
            ->paginate(10);
        return view('admin.product.product-list', compact('product','search'));
    }

    public function create()
    {
        $categories = Category::whereNull('deleted_at')->get();
        $industriesCategories = IndCategory::whereNull('deleted_at')->orderBy('indcategory')->get();
        return view('admin.product.product-add', compact('categories', 'industriesCategories'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
        ], [
            'title.required' => 'Please Enter the Blog name.',
        ]);
        
        $post = new Product;
        $post->category_id = $request->category_id;
        $post->title = $request->get('title');
        $post->title_brief = $request->get('title_brief');
        $post->name = $request->get('name');
        $post->service_note = $request->get('service_note');
        $post->working_principle_desc = $request->get('working_principle_desc');
        $post->configuration_title = $request->get('configuration_title');
        $post->configuration_description = $request->get('configuration_description');
        $post->industries = $this->mapIntegerList($request->input('industries', []));
        $post->short_description = $request->get('short_description');
        $post->url = $request->get('url');
        $post->meta_title = $request->get('meta_title');
        $post->meta_description = $request->get('meta_description');

        // Content sections
        $post->application_desc = $request->input('application_desc');
        $post->advantages_desc = $request->input('advantages_desc');
        $post->design_features_desc = $request->input('design_features_desc');
        $post->selection_guidelines_desc = $request->input('selection_guidelines_desc');
        $post->operational_features_desc = $request->input('operational_features_desc');

        $post->blast_wheels = $this->mapTitleDescItems($request->input('blast_wheels', []));
        $post->main_components = $this->mapTitleDescItems($request->input('main_components', []));
        $post->tech_specifications = $this->mapTechSpecifications($request->input('tech_specifications', []));
        $post->applications = $this->mapSimpleList($request->input('applications', []));
        $post->advantages = $this->mapSimpleList($request->input('advantages', []));
        $post->design_features = $this->mapSimpleList($request->input('design_features', []));
        $post->selection_guidelines = $this->mapSimpleList($request->input('selection_guidelines', []));
        $post->operational_features = $this->mapSimpleList($request->input('operational_features', []));
        $post->operational_accessories = $this->mapTitleDescItems($request->input('operational_accessories', []));
        $post->faqs = $this->mapFaqs($request->input('faqs', []));
 
        if($request->hasFile('front_image')) {
            $file = $request->file('front_image');
            $filename = $file->getClientOriginalName();
            $path = public_path('Product/front_image');
            $file->move($path, $filename);
            $post->front_image = $filename;
        }  

        if($request->hasFile('blast_wheels_image')) {
            $file = $request->file('blast_wheels_image');
            $filename = time().'_'.Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)).'.'.$file->getClientOriginalExtension();
            $path = public_path('Product/blast_wheels_image');
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $file->move($path, $filename);
            $post->blast_wheels_image = $filename;
        }
        $post->save();
         return redirect()->route('product.index')
                        ->with('success','Product created successfully');
        
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::whereNull('deleted_at')->get();
        $industriesCategories = IndCategory::whereNull('deleted_at')->orderBy('indcategory')->get();

        return view('admin.product.product-edit', compact('product','categories', 'industriesCategories'));
    }
    public function update(Request $request, $id)
    { 
        // dd($request->all());
        $post = Product::find($id);
        
        $post->category_id = $request->category_id;
        $post->title = $request->get('title');
        $post->title_brief = $request->get('title_brief');
        $post->name = $request->get('name');
        $post->service_note = $request->get('service_note');
        $post->working_principle_desc = $request->get('working_principle_desc');
        $post->configuration_title = $request->get('configuration_title');
        $post->configuration_description = $request->get('configuration_description');
        $post->industries = $this->mapIntegerList($request->input('industries', []));
        $post->short_description = $request->get('short_description');
        $post->url = $request->get('url');
        $post->meta_title = $request->get('meta_title');
        $post->meta_description = $request->get('meta_description');

        // Content sections
        $post->application_desc = $request->input('application_desc');
        $post->advantages_desc = $request->input('advantages_desc');
        $post->design_features_desc = $request->input('design_features_desc');
        $post->selection_guidelines_desc = $request->input('selection_guidelines_desc');
        $post->operational_features_desc = $request->input('operational_features_desc');

        $post->blast_wheels = $this->mapTitleDescItems($request->input('blast_wheels', []));
        $post->main_components = $this->mapTitleDescItems($request->input('main_components', []));
        $post->tech_specifications = $this->mapTechSpecifications($request->input('tech_specifications', []));
        $post->applications = $this->mapSimpleList($request->input('applications', []));
        $post->advantages = $this->mapSimpleList($request->input('advantages', []));
        $post->design_features = $this->mapSimpleList($request->input('design_features', []));
        $post->selection_guidelines = $this->mapSimpleList($request->input('selection_guidelines', []));
        $post->operational_features = $this->mapSimpleList($request->input('operational_features', []));
        $post->operational_accessories = $this->mapTitleDescItems($request->input('operational_accessories', []));
        $post->faqs = $this->mapFaqs($request->input('faqs', []));

        if($request->hasFile('front_image')) {
            $file = $request->file('front_image');
            $filename = $file->getClientOriginalName();
            $path = public_path('Product/front_image');
            $file->move($path, $filename);
            $post->front_image = $filename;
        }  

        if($request->hasFile('blast_wheels_image')) {
            $file = $request->file('blast_wheels_image');
            $filename = time().'_'.Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)).'.'.$file->getClientOriginalExtension();
            $path = public_path('Product/blast_wheels_image');
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $file->move($path, $filename);
            $post->blast_wheels_image = $filename;
        }
       
        $post->save();
        return redirect()->route('product.index')->with('success','Product updated successfully');
        
    }

    

    public function destroy($id)
    {
        $product = Product::find($id);
        if ($product) {
        $product->delete();
        return redirect()->back()->with('success', 'Your Product Has Been Deleted Successfully!');
        }
    
        return redirect()->back()->with('error', 'Product not found!');
    }

    private function mapTitleDescItems($items)
    {
        return collect($items)
            ->map(function ($item) {
                $title = trim((string) ($item['title'] ?? ''));
                $desc = trim((string) ($item['desc'] ?? ''));

                if ($title === '' && $desc === '') {
                    return null;
                }

                return [
                    'title' => $title,
                    'desc' => $desc,
                ];
            })
            ->filter()
            ->values()
            ->all();
    }

    private function mapSimpleList($items)
    {
        return collect($items)
            ->map(function ($item) {
                return trim((string) $item);
            })
            ->filter()
            ->values()
            ->all();
    }

    private function mapIntegerList($items)
    {
        return collect($items)
            ->map(function ($item) {
                return (int) $item;
            })
            ->filter(function ($item) {
                return $item > 0;
            })
            ->values()
            ->all();
    }

    private function mapTechSpecifications($items)
    {
        return collect($items)
            ->map(function ($item) {
                $parameter = trim((string) ($item['parameter'] ?? ''));
                $specifications = collect($item['specifications'] ?? [])
                    ->map(fn ($specification) => trim((string) $specification))
                    ->filter()
                    ->values()
                    ->all();

                if ($parameter === '' && empty($specifications)) {
                    return null;
                }

                return [
                    'parameter' => $parameter,
                    'specifications' => $specifications,
                ];
            })
            ->filter()
            ->values()
            ->all();
    }

    private function mapFaqs($items)
    {
        return collect($items)
            ->map(function ($item) {
                $question = trim((string) ($item['question'] ?? ''));
                $answer = trim((string) ($item['answer'] ?? ''));

                if ($question === '' && $answer === '') {
                    return null;
                }

                return [
                    'question' => $question,
                    'answer' => $answer,
                ];
            })
            ->filter()
            ->values()
            ->all();
    }
}