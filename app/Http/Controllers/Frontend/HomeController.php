<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Blog;
use App\Models\Hero;
use App\Models\About;
use App\Models\Service;
use App\Models\Category;
use App\Models\Feedback;
use App\Mail\ContactMail;
use App\Models\SkillItem;
use App\Models\Experience;
use App\Models\TyperTitle;
use Illuminate\Http\Request;
use App\Models\PortfolioItem;
use App\Models\BlogSectionSetting;
use App\Models\SkillSectionSetting;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Models\ContactSectionSetting;
use App\Models\FeedbackSectionSetting;
use App\Models\PortfolioSectionSetting;
use App\Models\ServiceSectionSetting;
use App\Models\Quote;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index()
    {
        $hero = Hero::first();
        $typerTitles = TyperTitle::all();
        $services = Service::all();
        $serviceTitle = ServiceSectionSetting::first();
        $about = About::first();
        $portfolioTitle = PortfolioSectionSetting::first();
        $portfolioCategories = Category::all();
        $portfolioItems = PortfolioItem::all();
        $skill = SkillSectionSetting::first();
        $skillItems = SkillItem::all();
        $experience = Experience::first();
        $feedbacks = Feedback::all();
        $feedbackTitle = FeedbackSectionSetting::first();
        $blogs = Blog::latest()->take(5)->get();
        $blogTitle = BlogSectionSetting::first();
        $contactTitle = ContactSectionSetting::first();
        $quote = Quote::first();
        return view('frontend.pages.home' , compact('hero', 'typerTitles', 'services', 'serviceTitle', 'about', 'portfolioTitle', 'portfolioCategories', 'portfolioItems', 'skill', 'skillItems', 'experience', 'feedbacks', 'feedbackTitle', 'blogs', 'blogTitle', 'contactTitle', 'quote') );
    }

    public function showPortfolio($id){
        $portfolio = PortfolioItem::findOrFail($id);
        $quote = Quote::first();
        return view('frontend.pages.portfolio-details', compact('portfolio', 'quote'));
    }

    public function showBlog($id)
    {
        $blog = Blog::findOrFail($id);
        $previousPost = Blog::where('id', '<', $blog->id)->orderBy('id', 'desc')->first();
        $nextPost = Blog::where('id', '>', $blog->id)->orderBy('id', 'asc')->first();
        $quote = Quote::first();
        return view('frontend.pages.blog-details', compact('blog', 'previousPost', 'nextPost', 'quote'));
    }

    public function blog()
    {
        $blogs = Blog::latest()->paginate(9);
        $quote = Quote::first();
        return view('frontend.pages.blog', compact('blogs', 'quote'));
    }

    public function portfolio()
    {
        $portfolioCategories = Category::all();
        $portfolioItems = PortfolioItem::latest()->get();
        $quote = Quote::first();
        return view('frontend.pages.portfolio', compact('portfolioCategories', 'portfolioItems', 'quote'));
    }


    public function contact(Request $request)
    {
        $request->validate([
                'name' => ['required', 'max:200'],
                'subject' => ['required', 'max:300'],
                'email' => ['required', 'email'],
                'message' => ['required', 'max:2000'],
        ]);

        // Get visitor IP
        $ip = $request->ip();

        // Fetch location info
        $location = Http::get("http://ip-api.com/json/{$ip}")->json();

        $mailData = [
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,

            'ip' => $ip,
            'userAgent' => $request->userAgent(),
            'device'    => $this->detectDevice($request->userAgent()),
            'country'   => $location['country'] ?? 'Unknown',
            'region'    => $location['regionName'] ?? 'Unknown',
            'city'      => $location['city'] ?? 'Unknown',
        ];

        Mail::send(new ContactMail($mailData));

        return response(['status' => 'success', 'message' => 'Mail Sended Successfully!']);
    }

    private function detectDevice($ua)
    {
        if (preg_match('/mobile/i', $ua)) return "Mobile";
        if (preg_match('/tablet/i', $ua)) return "Tablet";
        if (preg_match('/iPad|Android|Touch/i', $ua)) return "Tablet";
        if (preg_match('/Windows NT|Macintosh|Linux/i', $ua)) return "Desktop";
        return "Unknown";
    }
}
