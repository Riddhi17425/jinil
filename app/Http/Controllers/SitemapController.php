<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Industry;
use App\Models\Product;

class SitemapController extends Controller
{
    /**
     * Return XML response
     */
    protected function xmlResponse(string $xml)
    {
        return response($xml, 200)
            ->header('Content-Type', 'application/xml');
    }

    /**
     * Complete Dynamic Sitemap
     */
    public function index()
    {
        /*
         * Static time for homepage and static pages.
         *
         * Update this value whenever you want to record
         * a new update time for static pages.
         */
        $todayTime = "2026-08-12T15:30:00+05:30";

        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";

        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";


        // ============================================================
        // 1. HOMEPAGE
        // PRIORITY: 1.00
        // ============================================================

        $xml .= '<url>';

        $xml .= '<loc>'
            . htmlspecialchars(
                url('/'),
                ENT_XML1,
                'UTF-8'
            )
            . '</loc>';

        $xml .= '<lastmod>'
            . htmlspecialchars($todayTime, ENT_XML1, 'UTF-8')
            . '</lastmod>';

        $xml .= '<priority>1.00</priority>';

        $xml .= '</url>' . "\n";


        // ============================================================
        // 2. ALL CATEGORIES
        // PRIORITY: 0.80
        // ============================================================

        $categories = Category::whereNull('deleted_at')
            ->get();

        foreach ($categories as $category)
        {
            if (empty($category->url))
            {
                continue;
            }

            $loc = route('productlist', [
                'url' => $category->url
            ]);

            $lastmod = optional($category->updated_at)->toAtomString();

            $xml .= '<url>';

            $xml .= '<loc>'
                . htmlspecialchars($loc, ENT_XML1, 'UTF-8')
                . '</loc>';

            if ($lastmod)
            {
                $xml .= '<lastmod>'
                    . htmlspecialchars($lastmod, ENT_XML1, 'UTF-8')
                    . '</lastmod>';
            }

            $xml .= '<priority>0.80</priority>';

            $xml .= '</url>' . "\n";
        }


        // ============================================================
        // 3. ALL PRODUCTS
        // PRIORITY: 0.80
        // ============================================================

        $products = Product::whereNull('deleted_at')
            ->get();

        foreach ($products as $product)
        {
            if (empty($product->url))
            {
                continue;
            }

            $loc = route('productdetials', [
                'url' => $product->url
            ]);

            $lastmod = optional($product->updated_at)->toAtomString();

            $xml .= '<url>';

            $xml .= '<loc>'
                . htmlspecialchars($loc, ENT_XML1, 'UTF-8')
                . '</loc>';

            if ($lastmod)
            {
                $xml .= '<lastmod>'
                    . htmlspecialchars($lastmod, ENT_XML1, 'UTF-8')
                    . '</lastmod>';
            }

            $xml .= '<priority>0.80</priority>';

            $xml .= '</url>' . "\n";
        }


        // ============================================================
        // 4. ALL INDUSTRIES
        // PRIORITY: 0.60
        // ============================================================

        $industries = Industry::whereNull('deleted_at')
            ->get();

        foreach ($industries as $industry)
        {
            if (empty($industry->url))
            {
                continue;
            }

            $loc = route('industry', [
                'url' => $industry->url
            ]);

            $lastmod = optional($industry->updated_at)->toAtomString();

            $xml .= '<url>';

            $xml .= '<loc>'
                . htmlspecialchars($loc, ENT_XML1, 'UTF-8')
                . '</loc>';

            if ($lastmod)
            {
                $xml .= '<lastmod>'
                    . htmlspecialchars($lastmod, ENT_XML1, 'UTF-8')
                    . '</lastmod>';
            }

            $xml .= '<priority>0.60</priority>';

            $xml .= '</url>' . "\n";
        }


        // ============================================================
        // 5. ALL BLOGS
        // PRIORITY: 0.60
        // ============================================================

        $blogs = Blog::where('status', 1)
            ->whereNull('deleted_at')
            ->get();

        foreach ($blogs as $blog)
        {
            if (empty($blog->url))
            {
                continue;
            }

            $loc = route('blogdetail', [
                'url' => $blog->url
            ]);

            $lastmod = optional($blog->updated_at)->toAtomString();

            $xml .= '<url>';

            $xml .= '<loc>'
                . htmlspecialchars($loc, ENT_XML1, 'UTF-8')
                . '</loc>';

            if ($lastmod)
            {
                $xml .= '<lastmod>'
                    . htmlspecialchars($lastmod, ENT_XML1, 'UTF-8')
                    . '</lastmod>';
            }

            $xml .= '<priority>0.60</priority>';

            $xml .= '</url>' . "\n";
        }


        // ============================================================
        // 6. STATIC PAGES
        // PRIORITY: 0.60
        // ============================================================

        $staticRoutes = [
            'about',
            'contact',
            'blogs',
            'downloads',
            'faqs',
            'installation',
            'aftersales',
            'annualmaintenance',
            'machineupgrades',
            'spareparts',
            'privacypolicy',
            'termsengineer',
        ];

        foreach ($staticRoutes as $name)
        {
            $loc = route($name);

            $xml .= '<url>';

            $xml .= '<loc>'
                . htmlspecialchars($loc, ENT_XML1, 'UTF-8')
                . '</loc>';

            $xml .= '<lastmod>'
                . htmlspecialchars($todayTime, ENT_XML1, 'UTF-8')
                . '</lastmod>';

            $xml .= '<priority>0.60</priority>';

            $xml .= '</url>' . "\n";
        }


        // ============================================================
        // END SITEMAP
        // ============================================================

        $xml .= '</urlset>';

        return $this->xmlResponse($xml);
    }
}