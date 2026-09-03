<?php
namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Certificate;
use App\Models\Contact;
use App\Models\Faq;
use App\Models\HeaderForm;
use App\Models\IndCategory;
use App\Models\Industry;
use App\Models\IndustryEnquiry;
use App\Models\Product;
use App\Models\ProductEnquiry;
use App\Models\SpareParts;
use App\Models\WhatsappInquiry;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class dashboardController extends Controller
{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function login()
    {

        return view('auth.login');

    }

    public function admin()
    {

        return view('admin.admin');

    }

    public function index()
    {

        $productlist = Product::whereNull('deleted_at')

            ->where('feature_product', 'Yes')

            ->get();

        $industriesList = IndCategory::whereNull('deleted_at')

            ->where('status', 'Active')

            ->get();

        return view('front.dashboard', compact('productlist' , 'industriesList'));

    }

    public function about()
    {

        $metatitle = "About Jinil Shot Blast";

        $metadescription = "Learn about JINIL Shot Blast, a trusted manufacturer of shot blasting machines, delivering reliable surface preparation solutions and engineering expertise";

        return view('front.about', compact('metatitle', 'metadescription'));
    }

    public function spareparts()
    {

        $metatitle = "";

        $metadescription = "";

        $categories = Category::whereNull('deleted_at')->select('id', 'category', 'url')->get();

        $spareparts = SpareParts::with('category')

            ->where('status', 'Active')

            ->orderBy('id', 'desc')

            ->get();

        return view('front.spareparts', compact('metatitle', 'metadescription', 'spareparts', 'categories'));

    }

    // public function whatsaapinquiry(Request $request)
    // {
    //     WhatsappInquiry::create([

    //         'number'  => $request->number,
    //         'message' => $request->message,
    //     ]);
    //     // Google Apps Script URL
    //     $googleScriptUrl = "https://script.google.com/macros/s/AKfycbyR_q9NAXJ2ChXb39-kaC8E7BXx6h2l8PxcsOP9L25IL2yno2v2VpMTFQYsAYlc3b9gzw/exec";

    //     // Send data to Google Sheet
    //     Http::post($googleScriptUrl, [
    //         'form_type' => 'WhatsApp Inquiry',
    //         'contact'   => $request->number,
    //         'message'   => $request->message,
    //         'date'      => now()->format('Y-m-d H:i:s'),
    //     ]);

    //     $number = '9925601108';
    //     //$number = '918469000194'; // Change if needed
    //     $message     = 'Inquiry from the website.';
    //     $whatsappUrl = "https://api.whatsapp.com/send/?phone={$number}&text=" . urlencode($message);

    //     return redirect()->away($whatsappUrl);
    // }

    public function whatsaapinquiry(Request $request)
    {
        $validated = $request->validate([
            'number'  => ['required', 'regex:/^\+?[0-9]{10,15}$/'],
            'message' => ['nullable', 'string', 'max:1000'],
            'country' => ['nullable', 'string', 'max:100'],
        ], [
            'number.required' => 'Contact number is required.',
            'number.regex'    => 'Contact number must be 10 to 15 digits.',
        ]);

        WhatsappInquiry::create([
            'number'  => $validated['number'],
            'message' => $validated['message'] ?? null,
        ]);

        // Google Apps Script URL
        $googleScriptUrl = "https://script.google.com/macros/s/AKfycbyR_q9NAXJ2ChXb39-kaC8E7BXx6h2l8PxcsOP9L25IL2yno2v2VpMTFQYsAYlc3b9gzw/exec";

        // Send data to Google Sheet
        try {
            Http::timeout(30)->post($googleScriptUrl, [
                'form_type' => 'WhatsApp Inquiry',
                'contact'   => $validated['number'],
                'message'   => $validated['message'] ?? '',
                'date'      => now()->format('Y-m-d H:i:s'),
            ]);
        } catch (\Exception $e) {
            \Log::warning('WhatsApp Sheet push failed: ' . $e->getMessage());
        }

        $number = '9925601108';
        $message = 'Inquiry from the website.';
        $whatsappUrl = "https://api.whatsapp.com/send/?phone={$number}&text=" . urlencode($message);

        return redirect()->away($whatsappUrl);
    }
    
    public function contact()
    {

        $metatitle = "Contact JINIL Shot Blast | Get Expert Assistance";

        $metadescription = "Need a shot blasting machine or technical support? Contact JINIL for quotations, product information, spare parts, and expert assistance.";

        $countries = DB::table('countries')->select('id', 'name')->get();

        $states = DB::table('states')->select('id', 'name')->get();

        return view('front.contact', compact('metatitle', 'metadescription', 'countries', 'states'));

    }

    public function blogs()
    {
        $metatitle       = "Shot Blasting Machine Blog & Industry Insights | JINIL";
        $metadescription = "Explore JINIL blogs covering shot blasting machines, surface preparation, maintenance tips, industry applications, and abrasive blasting solutions";
        $blogs           = Blog::whereNull('deleted_at')
            ->where('status', 1)
            ->orderBy('id', 'desc')
            ->get();
        return view('front.blogs', compact('metatitle', 'metadescription', 'blogs'));
    }

    public function blogsdetail($url)
    {
        $blogs = Blog::whereNull('deleted_at')
            ->where('status', 1)
            ->orderBy('id', 'desc')
            ->get();

        $blogsdetail = Blog::whereNull('deleted_at')
            ->where('status', 1)
            ->where('url', $url)
            ->firstOrFail();

        $metatitle       = $blogsdetail->meta_title;
        $metadescription = $blogsdetail->meta_description;

        return view('front.blogdetail', compact('metatitle', 'metadescription', 'blogs', 'blogsdetail'));
    }

    public function privacypolicy()
    {

        $metatitle = "Privacy Policy | JINIL";

        $metadescription = "Review JINIL's Privacy Policy to understand how we collect, use, and protect your information when you visit our website or contact us";

        return view('front.privacypolicy', compact('metatitle', 'metadescription'));

    }

    public function termsengineer()
    {

        $metatitle = "Terms & Conditions | JINIL";

        $metadescription = "Read JINIL's terms and conditions regarding website usage, inquiries, services, intellectual property, and customer responsibilities";

        return view('front.terms-engineer', compact('metatitle', 'metadescription'));

    }

    public function productdetials($url = null)
    {
        $product           = Product::whereNull('deleted_at')->where('url', $url)->firstOrFail();
        $category          = Category::whereNull('deleted_at')->where('id', $product->category_id)->first();
        $productIndustries = IndCategory::select('id', 'indcategory', 'icon_image', 'url')->whereIn('id', $product->industries)->get();

        $metatitle       = $product->meta_title ?? $product->title;
        $metadescription = $product->meta_description ?? $product->short_description;

        return view('front.productdetials', compact('metatitle', 'metadescription', 'product', 'category', 'productIndustries'));
    }

    public function download()
    {

        $metatitle = "Download Product Catalogs of JINIL Shot Blasting Machine";

        $metadescription = "Download JINIL product catalogs, brochures, technical specifications, and machine details to find the right shot blasting solution for your industry";

        $certificate = Certificate::whereNull('deleted_at')

            ->orderBy('id', 'desc')

            ->get();

        $categories = Certificate::whereNull('deleted_at')

            ->select('cat_title')

            ->distinct()

            ->pluck('cat_title');

        return view('front.download', compact(

            'metatitle',

            'metadescription',

            'certificate',

            'categories'

        ));

    }

    public function faq()
    {

        $metatitle = "FAQs & Support | JINIL";

        $metadescription = "Get answers to common questions about shot blasting machines, maintenance, abrasives, applications, and surface preparation processes from JINIL";

        $faqs = Faq::whereNull('deleted_at')->get();

        return view('front.faqs', compact('metatitle', 'metadescription', 'faqs'));

    }

    public function installation()
    {

        $metatitle = "";

        $metadescription = "";

        $faqs = Faq::whereNull('deleted_at')->get();

        return view('front.installation', compact('metatitle', 'metadescription', 'faqs'));

    }

    public function machineupgrades()
    {

        $metatitle = "";

        $metadescription = "";

        return view('front.machine', compact('metatitle', 'metadescription'));

    }

    public function annualmaintenance()
    {

        $metatitle = "";

        $metadescription = "";

        return view('front.annual-maintenance-contracts', compact('metatitle', 'metadescription'));

    }

    public function aftersales()
    {

        $metatitle = "";

        $metadescription = "";

        $faqs = Faq::whereNull('deleted_at')->get();

        return view('front.after-sales', compact('metatitle', 'metadescription', 'faqs'));

    }

    // public function service($url)

    // {

    //     $service = Service::where('url', $url)->firstOrFail();

    //     $metatitle       = $service->meta_title       ?? $service->title;

    //     $metadescription = $service->meta_description ?? $service->short_description;

    //     return view('front.service-detail', compact(

    //         'service',

    //         'metatitle',

    //         'metadescription'

    //     ));

    // }

    public function industry($url)
{
    $category = IndCategory::whereNull('deleted_at')->where('url', $url)->firstOrFail();
    $industries = Industry::whereNull('deleted_at')->where('category_id', $category->id)->get();

    $relatedIndustries = IndCategory::whereNull('deleted_at')
        ->where('status', 'Active')
        ->where('id', '!=', $category->id)
        ->get();

    $metatitle = $category->meta_title;
    $metadescription = $category->meta_description;

    return view('front.industries', compact('category', 'industries', 'relatedIndustries', 'metatitle', 'metadescription'));
}

    public function product($url)
    {

        $category = Category::whereNull('deleted_at')

            ->where('url', $url)

            ->firstOrFail();

        $productlist = Product::whereNull('deleted_at')

            ->where('category_id', $category->id)

            ->get();

        $metatitle = $category->meta_title;

        $metadescription = $category->meta_description;

        return view('front.productlisting', compact(

            'category',

            'productlist',

            'metatitle',

            'metadescription'

        ));

    }

    public function contactstore(Request $request)
    {

        $validated = $request->validate([

            'name'           => 'required|string|max:255',

            'company_name'   => 'required|string|max:255',

            'full_phone'     => 'required|string',

            'email'          => 'required|email',

            'state'          => 'required|string',

            'city'           => 'required|string',

            'message'        => 'nullable|string',

            'simple_captcha' => 'required|integer',

            'captcha_sum'    => 'required|integer',

        ], [

            'name.required'           => 'The Name is required.',

            'company_name.required'   => 'The Company Name is required.',

            'full_phone.required'     => 'The Phone Number is required.',

            'email.required'          => 'The Email Address is required.',

            'email.email'             => 'Please enter a valid Email Address.',

            'state.required'          => 'The State is required.',

            'city.required'           => 'The City is required.',

            'simple_captcha.required' => 'The Captcha is required.',

            'simple_captcha.integer'  => 'The Captcha must be a number.',

        ]);

        if ($validated['simple_captcha'] != $validated['captcha_sum']) {

            return response()->json([

                'status' => 'error',

                'errors' => ['simple_captcha' => 'The Captcha answer is incorrect.'],

            ]);

        }

        // Catches empty input (only dial code like "+91" with no number after)

        if (! preg_match('/^\+\d{1,4}\d{7,}$/', $validated['full_phone'])) {

            return response()->json([

                'status' => 'error',

                'errors' => ['full_phone' => ! preg_match('/^\+\d/', $validated['full_phone'])

                        ? 'The Phone Number is required.'

                        : 'Please enter a valid Phone Number.',

                ],

            ]);

        }

        try {

            $contact = Contact::create([

                'name'         => $validated['name'],

                'company_name' => $validated['company_name'],

                'contact'      => $validated['full_phone'],

                'email'        => $validated['email'],

                'state'        => $validated['state'],

                'city'         => $validated['city'],

                'message'      => $validated['message'] ?? null,

            ]);

            $contactData = [

                'form_type'    => 'Contact Form',

                'name'         => $validated['name'],

                'company_name' => $validated['company_name'],

                'contact'      => $validated['full_phone'],

                'email'        => $validated['email'],

                'state'        => $validated['state'],

                'city'         => $validated['city'],

                'message'      => $validated['message'] ?? '',

                'date'         => now()->format('Y-m-d H:i:s'),

            ];

            // Google Apps Script URL

            $sheetUrl = 'https://script.google.com/macros/s/AKfycbzZUy--mLkKq9XvO3GNmxSBmCzmNnMB6IdrOhcIxbCLY7orzN6Ad19Xdh4Lz4ADO3x7kA/exec';

            Http::timeout(30)

                ->withHeaders(['Content-Type' => 'application/json'])

                ->post($sheetUrl, $contactData);

            // Mail::to($validated['email'])->send(new SendContactMailToUser($contactData));

            // Mail::to('webdeveloper10.intelliworkz@gmail.com')->send(new SendContactMailToAdmin($contactData));

            return response()->json([

                'status'   => 'success',

                'redirect' => route('thankyou'),

            ]);

        } catch (\Exception $e) {

            \Log::error('Contact form error: ' . $e->getMessage());

            return response()->json([

                'status'  => 'error',

                'message' => 'Something went wrong. Please try again later.',

            ]);

        }

    }

    public function headerstore(Request $request)
    {

        $validated = $request->validate([

            'name'           => 'required|string|max:255',

            'company_name'   => 'required|string|max:255',

            'full_phone'     => 'required|string',

            'email'          => 'required|email',

            'state'          => 'required|string',

            'city'           => 'required|string',

            'message'        => 'nullable|string',

            'simple_captcha' => 'required|integer',

            'captcha_sum'    => 'required|integer',

        ], [

            'name.required'           => 'The Name is required.',

            'company_name.required'   => 'The Company Name is required.',

            'full_phone.required'     => 'The Phone Number is required.',

            'email.required'          => 'The Email Address is required.',

            'email.email'             => 'Please enter a valid Email Address.',

            'state.required'          => 'The State is required.',

            'city.required'           => 'The City is required.',

            'simple_captcha.required' => 'The Captcha is required.',

            'simple_captcha.integer'  => 'The Captcha must be a number.',

        ]);

        if ($validated['simple_captcha'] != $validated['captcha_sum']) {

            return response()->json([

                'status' => 'error',

                'errors' => ['simple_captcha' => 'The Captcha answer is incorrect.'],

            ]);

        }

        // Catches empty input (only dial code like "+91" with no number after)

        if (! preg_match('/^\+\d{1,4}\d{7,}$/', $validated['full_phone'])) {

            return response()->json([

                'status' => 'error',

                'errors' => ['full_phone' => ! preg_match('/^\+\d/', $validated['full_phone'])

                        ? 'The Phone Number is required.'

                        : 'Please enter a valid Phone Number.',

                ],

            ]);

        }

        try {

            $contact = HeaderForm::create([

                'name'         => $validated['name'],

                'company_name' => $validated['company_name'],

                'contact'      => $validated['full_phone'],

                'email'        => $validated['email'],

                'state'        => $validated['state'],

                'city'         => $validated['city'],

                'message'      => $validated['message'] ?? null,

            ]);

            $contactData = [

                'form_type'    => 'Header Form',

                'name'         => $validated['name'],

                'company_name' => $validated['company_name'],

                'contact'      => $validated['full_phone'],

                'email'        => $validated['email'],

                'state'        => $validated['state'],

                'city'         => $validated['city'],

                'message'      => $validated['message'] ?? '',

                'date'         => now()->format('Y-m-d H:i:s'),

            ];

            $sheetUrl = 'https://script.google.com/macros/s/AKfycbzZUy--mLkKq9XvO3GNmxSBmCzmNnMB6IdrOhcIxbCLY7orzN6Ad19Xdh4Lz4ADO3x7kA/exec';

            // ✅ Google Sheet — skip if URL is empty

            if (! empty($sheetUrl)) {

                try {

                    Http::timeout(30)

                        ->withHeaders(['Content-Type' => 'application/json'])

                        ->post($sheetUrl, $contactData);

                } catch (\Exception $e) {

                    \Log::warning('Google Sheet push failed: ' . $e->getMessage());

                    // Non-fatal — continue

                }

            }

            // ✅ Mail — isolated so one failure doesn't block the other

            // try {

            //     Mail::to($validated['email'])->send(new SendContactMailToUser($contactData));

            // } catch (\Exception $e) {

            //     \Log::warning('User mail failed: ' . $e->getMessage());

            // }

            // try {

            //     Mail::to('webdeveloper10.intelliworkz@gmail.com')->send(new SendContactMailToAdmin($contactData));

            // } catch (\Exception $e) {

            //     \Log::warning('Admin mail failed: ' . $e->getMessage());

            // }

            return response()->json([

                'status'   => 'success',

                'redirect' => route('thankyou'),

            ]);

        } catch (\Exception $e) {

            \Log::error('Header form error: ' . $e->getMessage());

            return response()->json([

                'status'  => 'error',

                'message' => 'Something went wrong. Please try again later.',

            ]);

        }

    }

    public function installationstore(Request $request)
    {

        $validator = \Validator::make($request->all(), [

            'name'           => 'required|string|max:255',

            'company_name'   => 'required|string|max:255',

            'full_phone'     => 'required|string',

            'email'          => 'required|email',

            'state'          => 'required|string',

            'city'           => 'required|string',

            'message'        => 'nullable|string',

            'simple_captcha' => 'required|integer',

            'captcha_sum'    => 'required|integer',

        ]);

        if ($validator->fails()) {

            return response()->json([

                'status' => 'error',

                'errors' => $validator->errors(),

            ], 422);

        }

        $validated = $validator->validated();

        if ($validated['simple_captcha'] != $validated['captcha_sum']) {

            return response()->json([

                'status' => 'error',

                'errors' => ['simple_captcha' => ['Captcha answer is incorrect.']],

            ], 422);

        }

        if (! preg_match('/^\+\d{7,15}$/', $validated['full_phone'])) {

            return response()->json([

                'status' => 'error',

                'errors' => ['full_phone' => ['Please enter a valid phone number.']],

            ], 422);

        }

        try {

            \App\Models\ServiceRequest::create([

                'name'         => $validated['name'],

                'company_name' => $validated['company_name'],

                'contact'      => $validated['full_phone'],

                'email'        => $validated['email'],

                'state'        => $validated['state'],

                'city'         => $validated['city'],

                'message'      => $validated['message'] ?? null,

            ]);

            $contactData = [

                'form_type'    => 'Installation Form',

                'name'         => $validated['name'],

                'company_name' => $validated['company_name'],

                'contact'      => $validated['full_phone'],

                'email'        => $validated['email'],

                'state'        => $validated['state'],

                'city'         => $validated['city'],

                'message'      => $validated['message'] ?? '',

                'date'         => now()->format('Y-m-d H:i:s'),

            ];

            $sheetUrl = 'https://script.google.com/macros/s/AKfycbzZUy--mLkKq9XvO3GNmxSBmCzmNnMB6IdrOhcIxbCLY7orzN6Ad19Xdh4Lz4ADO3x7kA/exec'; // Replace with your sheet URL

            if (! empty($sheetUrl)) {

                try {

                    Http::timeout(30)

                        ->withHeaders(['Content-Type' => 'application/json'])

                        ->post($sheetUrl, $contactData);

                } catch (\Exception $e) {

                    \Log::warning('Google Sheet push failed: ' . $e->getMessage());

                }

            }

            // SEND MAIL TO USER

            //  try {

            //     Mail::to($validated['email'])

            //         ->send(new SendContactMailToUser($contactData));

            // } catch (\Exception $e) {

            //     \Log::warning('User mail failed: ' . $e->getMessage());

            // }

            // SEND MAIL TO ADMIN

            //  try {

            //     Mail::to('webdeveloper10.intelliworkz@gmail.com')

            //         ->send(new SendContactMailToAdmin($contactData));

            // } catch (\Exception $e) {

            //     \Log::warning('Admin mail failed: ' . $e->getMessage());

            // }

            return response()->json([

                'status'   => 'success',

                'redirect' => route('thankyou'),

            ]);

        } catch (\Exception $e) {

            \Log::error('Service form error: ' . $e->getMessage());

            return response()->json([

                'status'  => 'error',

                'message' => 'Something went wrong. Please try again later.',

            ]);

        }

    }

    public function productEnquiryStore(Request $request)
    {

        $validated = $request->validate([

            'product_name'   => 'required|string|max:255',

            'name'           => 'required|string|max:255',

            'company_name'   => 'required|string|max:255',

            'full_phone'     => 'required|string',

            'email'          => 'required|email',

            'state'          => 'required|string',

            'city'           => 'required|string',

            'message'        => 'nullable|string',

            'simple_captcha' => 'required|integer',

            'captcha_sum'    => 'required|integer',

        ]);

        if ($validated['simple_captcha'] != $validated['captcha_sum']) {

            return response()->json([

                'status' => 'error',

                'errors' => ['simple_captcha' => 'The Captcha answer is incorrect.'],

            ]);

        }

        if (! preg_match('/^\+\d{1,4}\d{7,}$/', $validated['full_phone'])) {

            return response()->json([

                'status' => 'error',

                'errors' => ['full_phone' => ! preg_match('/^\+\d/', $validated['full_phone'])

                        ? 'The Phone Number is required.'

                        : 'Please enter a valid Phone Number.',

                ],

            ]);

        }

        try {

            $contactData = [

                'form_type'    => 'Product Enquiry',

                'product_name' => $validated['product_name'],

                'name'         => $validated['name'],

                'company_name' => $validated['company_name'],

                'contact'      => $validated['full_phone'],

                'email'        => $validated['email'],

                'state'        => $validated['state'],

                'city'         => $validated['city'],

                'message'      => $validated['message'] ?? '',

                'date'         => now()->format('Y-m-d H:i:s'),

            ];

            ProductEnquiry::create([

                'product_name' => $validated['product_name'],

                'name'         => $validated['name'],

                'company_name' => $validated['company_name'],

                'contact'      => $validated['full_phone'],

                'email'        => $validated['email'],

                'state'        => $validated['state'],

                'city'         => $validated['city'],

                'message'      => $validated['message'] ?? null,

            ]);

            $sheetUrl = 'https://script.google.com/macros/s/AKfycbzZUy--mLkKq9XvO3GNmxSBmCzmNnMB6IdrOhcIxbCLY7orzN6Ad19Xdh4Lz4ADO3x7kA/exec';

            if (! empty($sheetUrl)) {

                try {

                    Http::timeout(30)

                        ->withHeaders(['Content-Type' => 'application/json'])

                        ->post($sheetUrl, $contactData);

                } catch (\Exception $e) {

                    \Log::warning('Sheet push failed: ' . $e->getMessage());

                }

            }

            // try {

            //     Mail::to($validated['email'])->send(new SendContactMailToUser($contactData));

            // } catch (\Exception $e) {

            //     \Log::warning('User mail failed: ' . $e->getMessage());

            // }

            // try {

            //     Mail::to('webdeveloper10.intelliworkz@gmail.com')->send(new SendContactMailToAdmin($contactData));

            // } catch (\Exception $e) {

            //     \Log::warning('Admin mail failed: ' . $e->getMessage());

            // }

            return response()->json([

                'status'   => 'success',

                'redirect' => route('thankyou'),

            ]);

        } catch (\Exception $e) {

            \Log::error('Product enquiry error: ' . $e->getMessage());

            return response()->json([

                'status'  => 'error',

                'message' => 'Something went wrong. Please try again later.',

            ]);

        }

    }

    public function industryEnquiryStore(Request $request)
    {

        $validated = $request->validate([

            'industry_name'  => 'required|string|max:255',

            'name'           => 'required|string|max:255',

            'company_name'   => 'required|string|max:255',

            'full_phone'     => 'required|string',

            'email'          => 'required|email',

            'state'          => 'required|string',

            'city'           => 'required|string',

            'message'        => 'nullable|string',

            'simple_captcha' => 'required|integer',

            'captcha_sum'    => 'required|integer',

        ], [

            'industry_name.required'  => 'The Industry Name is required.',

            'name.required'           => 'The Name is required.',

            'company_name.required'   => 'The Company Name is required.',

            'full_phone.required'     => 'The Phone Number is required.',

            'email.required'          => 'The Email Address is required.',

            'email.email'             => 'Please enter a valid Email Address.',

            'state.required'          => 'The State is required.',

            'city.required'           => 'The City is required.',

            'simple_captcha.required' => 'The Captcha is required.',

        ]);

        // Captcha Validation

        if ($validated['simple_captcha'] != $validated['captcha_sum']) {

            return response()->json([

                'status' => 'error',

                'errors' => ['simple_captcha' => 'The Captcha answer is incorrect.'],

            ]);

        }

        // Phone Validation

        if (! preg_match('/^\+\d{1,4}\d{7,}$/', $validated['full_phone'])) {

            return response()->json([

                'status' => 'error',

                'errors' => [

                    'full_phone' => ! preg_match('/^\+\d/', $validated['full_phone'])

                        ? 'The Phone Number is required.'

                        : 'Please enter a valid Phone Number.',

                ],

            ]);

        }

        try {

            /* -------------------------------

           STORE DATA IN DATABASE

        --------------------------------*/

            IndustryEnquiry::create([

                'industry_name' => $validated['industry_name'],

                'name'          => $validated['name'],

                'company_name'  => $validated['company_name'],

                'contact'       => $validated['full_phone'],

                'email'         => $validated['email'],

                'state'         => $validated['state'],

                'city'          => $validated['city'],

                'message'       => $validated['message'] ?? null,

            ]);

            /* -------------------------------

           PREPARE DATA FOR EMAIL / SHEET

        --------------------------------*/

            $contactData = [

                'form_type'     => 'Industry Enquiry',

                'industry_name' => $validated['industry_name'],

                'name'          => $validated['name'],

                'company_name'  => $validated['company_name'],

                'contact'       => $validated['full_phone'],

                'email'         => $validated['email'],

                'state'         => $validated['state'],

                'city'          => $validated['city'],

                'message'       => $validated['message'] ?? '',

                'date'          => now()->format('Y-m-d H:i:s'),

            ];

            /* -------------------------------

           GOOGLE SHEET API

        --------------------------------*/

            $sheetUrl = 'https://script.google.com/macros/s/AKfycbzZUy--mLkKq9XvO3GNmxSBmCzmNnMB6IdrOhcIxbCLY7orzN6Ad19Xdh4Lz4ADO3x7kA/exec'; // Add your Google Script URL here

            if (! empty($sheetUrl)) {

                try {

                    Http::timeout(30)

                        ->withHeaders(['Content-Type' => 'application/json'])

                        ->post($sheetUrl, $contactData);

                } catch (\Exception $e) {

                    \Log::warning('Sheet push failed: ' . $e->getMessage());

                }

            }

            /* -------------------------------

           SEND MAIL TO USER

        --------------------------------*/

            // try {

            //     Mail::to($validated['email'])

            //         ->send(new SendContactMailToUser($contactData));

            // } catch (\Exception $e) {

            //     \Log::warning('User mail failed: ' . $e->getMessage());

            // }

            // /* -------------------------------

            //   SEND MAIL TO ADMIN

            // --------------------------------*/

            // try {

            //     Mail::to('webdeveloper10.intelliworkz@gmail.com')

            //         ->send(new SendContactMailToAdmin($contactData));

            // } catch (\Exception $e) {

            //     \Log::warning('Admin mail failed: ' . $e->getMessage());

            // }

            /* -------------------------------

           SUCCESS RESPONSE

        --------------------------------*/

            return response()->json([

                'status'   => 'success',

                'redirect' => route('thankyou'),

            ]);

        } catch (\Exception $e) {

            \Log::error('Industry enquiry error: ' . $e->getMessage());

            return response()->json([

                'status'  => 'error',

                'message' => 'Something went wrong. Please try again later.',

            ]);

        }

    }

    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()
    {

        //

    }

    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function store(Request $request)
    {

        //

    }

    /**

     * Display the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function show($id)
    {

        //

    }

    /**

     * Show the form for editing the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function edit($id)
    {

        //

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

        //

    }

    /**

     * Remove the specified resource from storage.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function destroy($id)
    {

        //

    }

}
