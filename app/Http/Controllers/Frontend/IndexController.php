<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\News;
use App\Models\Page;
use App\Models\Link;
use App\Models\User;
use App\Models\Video;
use App\Models\President;
use App\Models\Leader;
use App\Models\Document;
use App\Models\Setting;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;


class IndexController extends Controller
{

	// Добавьте эти методы в ваш IndexController

	public function allNews()
	{
	    $news = News::where('status', 1)->where('category_id', 1)->orderBy('publish_date', 'DESC')->paginate(9);
	    return view('frontend.pages.all_news', compact('news'));
	}

	public function newsDetails($id)
	{
	    // Находим новость с дополнительными изображениями
	    $news = News::with('images')->findOrFail($id);

	    // Получаем категорию
	    $cat_id = $news->category_id;

	    // Последние новости
	    $latestNews = News::where('status', 1)->orderBy('publish_date', 'DESC')->limit(5)->get();

	    // Похожие новости (из той же категории)
	    $related_news = News::where('status', 1)->where('category_id', $cat_id)->where('id', '!=', $id)->orderBy('publish_date', 'DESC')->limit(6)->get();

	    // Счетчик просмотров (увеличиваем только один раз за сессию)
	    $newsKey = 'news_' . $news->id;
	    if (!Session::has($newsKey)) {
	        $news->increment('views');
	        Session::put($newsKey, 1);
	    }

	    // Хлебные крошки (категория новости)
	    $breadcat = $news->category;
	    return view('frontend.pages.news_detail', compact(
	        'news',
	        'related_news',
	        'breadcat',
	        'latestNews',

	    ));
	}

	public function allGalleries()
	{
		$galleries = Gallery::orderBy('id', 'DESC')->paginate(3);
		return view('frontend.pages.all_gallery', compact('galleries'));
	}

	  public function galleryDetails($id) {
        $gallery = Gallery::with('images')->where('id',$id)->findOrFail($id);
        return view('frontend.pages.gallery_detail',compact('gallery'));
    }// END METHOD



	public function allLeader()
	{
	    $allLeaders = Leader::where('status', 1)->orderBy('created_at', 'ASC')->paginate(10);
	    return view('frontend.pages.all_leaders', compact('allLeaders'));
	}


	public function leaderDetail($id)
	{
	    $leader = Leader::findOrFail($id);
	    return view('frontend.pages.leader_detail', compact('leader'));
	}

	public function prezidentDetail($id)
	{
	    $prizent = President::findOrFail($id);
	    return view('frontend.pages.prezident_detail', compact('prizent'));
	}

	/**
	 * Страница "О нас" — контент из БД (About), команда из Leaders.
	 */
	public function aboutPage()
	{
		$about = About::getContent();
		$leaders = Leader::where('status', 1)->limit(3)->get();
		return view('frontend.pages.about_page', compact('about', 'leaders'));
	}

	/**
	 * Страница "Афиша" — список событий с пагинацией
	 */
	public function afishaPage()
	{
		$news = News::with('category')
			->where('status', 1)
			->where('category_id', 3)
			->orderByDesc('publish_date')
			->paginate(10);

		return view('frontend.pages.afisha_page', compact('news'));
	}

	/**
	 * Детальная страница события афиши (новость категории «Афиша»).
	 */
	public function afishaDetail($id)
	{
		$news = News::with('images')->where('category_id', 3)->where('status', 1)->findOrFail($id);

		$newsKey = 'news_' . $news->id;
		if (!Session::has($newsKey)) {
			$news->increment('views');
			Session::put($newsKey, 1);
		}

		$related_news = News::where('status', 1)->where('category_id', 3)
			->where('id', '!=', $id)
			->orderByDesc('publish_date')
			->limit(6)
			->get();

		return view('frontend.pages.afisha_page_detail', compact('news', 'related_news'));
	}

	// ID категории "События" — поменяй при необходимости
	private const EVENTS_CATEGORY_ID = 4;

	/**
	 * Страница "События" — список
	 */
	public function eventsPage()
	{
		$news = News::with('category')
			->where('status', 1)
			->where('category_id', self::EVENTS_CATEGORY_ID)
			->orderByDesc('publish_date')
			->paginate(12);

		return view('frontend.pages.events_page', compact('news'));
	}

	/**
	 * Детальная страница события.
	 */
	public function eventsDetail($id)
	{
		$news = News::with('images')->where('category_id', self::EVENTS_CATEGORY_ID)->where('status', 1)->findOrFail($id);

		$newsKey = 'news_' . $news->id;
		if (!Session::has($newsKey)) {
			$news->increment('views');
			Session::put($newsKey, 1);
		}

		$related_news = News::where('status', 1)->where('category_id', self::EVENTS_CATEGORY_ID)
			->where('id', '!=', $id)
			->orderByDesc('publish_date')
			->limit(6)
			->get();

		return view('frontend.pages.events_page_detail', compact('news', 'related_news'));
	}

	/**
	 * Страница "Галерея"
	 */
	public function galleryPage()
	{
		$galleries = Gallery::orderByDesc('id')->paginate(12);
		$videos = Video::where('status', 1)->orderByDesc('id')->limit(4)->get();
		return view('frontend.pages.gallery_page', compact('galleries', 'videos'));
	}

	/**
	 * Страница "Контакты" — только блоки: адрес, телефон, email, режим работы.
	 * Форма "Напишите нам" и блок "Как нас найти" не выводятся (есть на других страницах).
	 */
	public function contactsPage()
	{
		$settings = Setting::first();
		return view('frontend.pages.contacts_page', compact('settings'));
	}

	/**
	 * Главная страница
	 */
	public function index()
	{
		$safeQuery = function ($callback, $default = null) {
			try {
				return $callback();
			} catch (\Throwable $e) {
				\Log::error('IndexController query failed: ' . $e->getMessage(), [
					'trace' => $e->getTraceAsString()
				]);
				return $default ?? collect([]);
			}
		};

		$linksData = $safeQuery(fn() => Link::where('status', 1)->orderBy('sort')->limit(4)->get());
		$homePageNews = $safeQuery(fn() => News::with('images')->published()->where('home_page', 1)->orderByDesc('publish_date')->limit(1)->get());

		$data = [
			'news' => $safeQuery(fn() => News::with('images')->published()->where('category_id', 3)->orderByDesc('publish_date')->get()),
			'sliders' => $safeQuery(fn() => News::published()->where('top_slider', 1)->orderByDesc('publish_date')->limit(5)->get()),
			'home_page' => $homePageNews,
			'home_page2' => $homePageNews->first(),

			'galleries' => $safeQuery(fn() => Gallery::limit(3)->get()),
			'videos' => $safeQuery(fn() => Video::where('status', 1)->orderByDesc('id')->limit(4)->get()),
			'links' => $linksData,
			'partners' => $linksData,
			'prezident' => $safeQuery(fn() => President::where('status', 1)->limit(1)->get()),
			'leaders' => $safeQuery(fn() => Leader::where('status', 1)->limit(4)->get()),
			'about' => $safeQuery(fn() => About::getContent()),
		];

		return view('frontend.index', $data);
	}



	public function pageDetails($url, $id,)
	{
		if ($pages = Page::where('status', '1')->findOrFail($id)) {
			return view('frontend.pages.page_details', compact('pages'));
		}
		return view('frontend.errors.404');
	}


	public function catWiseNews($id, $slug)
	{
		$latestNews = News::orderBy('id', 'desc')->limit(5)->get();
		$popularNews = News::orderBy('views', 'DESC')->limit(5)->get();

		$news = News::where('status', '1')->where('category_id', $id)->orderBy('id', 'DESC')->paginate(8);
		$breadcat = Category::where('id', $id)->first();
		$related_news = News::where('category_id', $id)->where('id', '!=', $id)->orderBy('id', 'DESC')->limit(6)->get();
		return view('frontend.pages.category_news', compact('news', 'breadcat', 'related_news', 'latestNews', 'popularNews'));
	} // END METHOD

	public function subCatWiseNews($id, $slug)
	{
		$news = News::where('status', '1')->where('subcategory_id', $id)->orderBy('id', 'DESC')->get();
		$breadcat = Subcategory::where('id', $id)->first();
		return view('frontend.pages.sub_category_news', compact('news', 'breadcat'));
	} // END METHOD


	public function newsSearch(Request $request)
	{
		$request->validate(['search' => 'required']);
		$items = $request->search;
		$news_ru = News::where('title_ru', 'LIKE', "%$items%")->get();
		$news_tj = News::where('title_tj', 'LIKE', "%$items%")->get();
		$news_en = News::where('title_en', 'LIKE', "%$items%")->get();
		$latestNews = News::orderBy('id', 'desc')->limit(9)->get();
		$popularNews = News::orderBy('views', 'DESC')->limit(9)->get();
		$related_news = News::orderBy('id', 'DESC')->limit(6)->get();
		return view('frontend.pages.search', compact('news_ru', 'news_tj', 'news_en', 'latestNews', 'popularNews', 'related_news'));
	} // END METHOD


	public function reporterAllNews($id)
	{
		$reporter = User::findOrFail($id);
		$news = News::where('user_id', $id)->paginate(9);
		return view('frontend.pages.index', compact('news', 'reporter'));
	} // END METHOD


    public function allVideos()
    {
        $pages = Page::all();
        $videos = Video::orderBy('id', 'DESC')->paginate(8);
        return view('frontend.pages.all_video', compact('videos', 'pages'));
    }



	public function documents(Request $request)
	{
	    $query = Document::query()->where('is_active', 1);
	    if ($request->filled('q')) {
	        $q = $request->q;
	        $query->where(function ($sub) use ($q) {
	            $sub->where('title_ru', 'LIKE', "%$q%")
	                ->orWhere('title_tj', 'LIKE', "%$q%")
	                ->orWhere('title_en', 'LIKE', "%$q%")
	                ->orWhere('description_ru', 'LIKE', "%$q%")
	                ->orWhere('description_tj', 'LIKE', "%$q%")
	                ->orWhere('description_en', 'LIKE', "%$q%");
	        });
	    }

	    // Date filters
	    if ($request->filled('date_from')) {
	        $query->whereDate('published_at', '>=', $request->date_from);
	    }

	    if ($request->filled('date_to')) {
	        $query->whereDate('published_at', '<=', $request->date_to);
	    }

	    // Sorting
	    $sort = $request->get('sort', 'desc');
	    $query->orderBy('published_at', $sort);

	    $documents = $query->paginate(30)->appends($request->all());

	    return view('frontend.pages.document', compact('documents'));
	}


	public function documentDownload($id)
	{
	    $doc = Document::findOrFail($id);

	    if (!$doc->is_active) {
	        abort(404);
	    }

	    $filePath = $doc->file_path;
	    if (empty($filePath) || str_contains($filePath, '..')) {
	        abort(404);
	    }

	    $absolutePath = public_path($filePath);
	    $realPath = realpath($absolutePath);
	    if ($realPath === false || !str_starts_with($realPath, realpath(public_path()))) {
	        abort(404);
	    }

	    return response()->download($realPath);
	}


	public function filterNews(Request $request)
	{
	    $query = News::where('status', 1)->where('category_id', 1);

	    // Поиск по заголовкам и тексту
	    if ($request->filled('search')) {
	        $term = $request->search;
	        $query->where(function($q) use ($term) {
	            $q->where('title_ru', 'like', "%$term%")
	              ->orWhere('title_en', 'like', "%$term%")
	              ->orWhere('title_tj', 'like', "%$term%")
	              ->orWhere('news_details_ru', 'like', "%$term%")
	              ->orWhere('news_details_en', 'like', "%$term%")
	              ->orWhere('news_details_tj', 'like', "%$term%");
	        });
	    }

	    // Фильтр по дате
	    if ($request->filled('date_from')) {
	        $query->whereDate('publish_date', '>=', $request->date_from);
	    }
	    if ($request->filled('date_to')) {
	        $query->whereDate('publish_date', '<=', $request->date_to);
	    }

	    // Сортировка
	    $sort = $request->sort ?? 'desc';
	    $query->orderBy('publish_date', $sort);

	    $news = $query->paginate(12)->withQueryString();

	    if ($request->ajax()) {
	        return view('frontend.pages.partials.news_list', compact('news'))->render();
	    }

	    return view('frontend.pages.all_news', compact('news'));
	}








}
