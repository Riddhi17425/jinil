<?php
namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Industry;
use App\Models\Product;

class SitemapController extends Controller
{
    protected function xmlResponse(string $xml)
    {
        return response($xml, 200)->header('Content-Type', 'application/xml');
    }

    public function index()
    {
        $sitemaps = [
            url('/blog-sitemap.xml'),
            url('/category-sitemap.xml'),
            url('/product-sitemap.xml'),
            url('/industry-sitemap.xml'),
            url('/page-sitemap.xml'),
        ];

        $xml  = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
        foreach ($sitemaps as $loc) {
            $xml .= "<sitemap><loc>{$loc}</loc><lastmod>" . now()->toAtomString() . "</lastmod></sitemap>\n";
        }
        $xml .= '</sitemapindex>';

        return $this->xmlResponse($xml);
    }

    public function blogs()
    {
        $blogs = Blog::where('status', 1)->get();

        $xml  = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
        foreach ($blogs as $blog) {
            $loc      = route('blogdetail', $blog->url);
            $lastmod  = optional($blog->updated_at)->toAtomString();
            $xml     .= "<url><loc>{$loc}</loc><lastmod>{$lastmod}</lastmod></url>\n";
        }
        $xml .= '</urlset>';

        return $this->xmlResponse($xml);
    }

    public function categories()
    {
        $categories = Category::all();

        $xml  = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
        foreach ($categories as $category) {
            $loc      = route('productlist', $category->url);
            $lastmod  = optional($category->updated_at)->toAtomString();
            $xml     .= "<url><loc>{$loc}</loc><lastmod>{$lastmod}</lastmod></url>\n";
        }
        $xml .= '</urlset>';

        return $this->xmlResponse($xml);
    }

    public function products()
    {
        $products = Product::all();

        $xml  = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
        foreach ($products as $product) {
            $loc      = route('productdetials', $product->url);
            $lastmod  = optional($product->updated_at)->toAtomString();
            $xml     .= "<url><loc>{$loc}</loc><lastmod>{$lastmod}</lastmod></url>\n";
        }
        $xml .= '</urlset>';

        return $this->xmlResponse($xml);
    }

    public function industries()
    {
        $industries = Industry::all();

        $xml  = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
        foreach ($industries as $industry) {
            $loc      = route('industry', $industry->url);
            $lastmod  = optional($industry->updated_at)->toAtomString();
            $xml     .= "<url><loc>{$loc}</loc><lastmod>{$lastmod}</lastmod></url>\n";
        }
        $xml .= '</urlset>';

        return $this->xmlResponse($xml);
    }

    public function pages()
    {
        $staticRoutes = [
            'about', 'contact', 'blogs', 'downloads', 'faqs',
            'installation', 'aftersales', 'annualmaintenance',
            'machineupgrades', 'spareparts', 'privacypolicy', 'termsengineer',
        ];

        $xml  = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
        $xml .= '<url><loc>' . url('/') . '</loc></url>' . "\n";
        foreach ($staticRoutes as $name) {
            $loc  = route($name);
            $xml .= "<url><loc>{$loc}</loc></url>\n";
        }
        $xml .= '</urlset>';

        return $this->xmlResponse($xml);
    }
}
