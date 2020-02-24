<?php

namespace jwwisniewski\Jigsaw\News\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;
use jwwisniewski\Jigsaw\Core\Enum\SaveMode;
use jwwisniewski\Jigsaw\Core\Jigsaw;
use jwwisniewski\Jigsaw\News\News;
use jwwisniewski\Jigsaw\News\Requests\StoreNews;
use jwwisniewski\Jigsaw\News\Requests\UpdateNews;

class NewsController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        $news = News::all();

        return view('jigsaw-news::index', ['newsList' => $news]);
    }

    public function create(Jigsaw $jigsaw)
    {
        $instances = $jigsaw->getRunnableInstances(News::class);

        return view('jigsaw-news::create', compact('instances'));
    }

    public function store(StoreNews $request)
    {
        $validated = $request->validated();
        if ($validated['url'] === null) {
            $validated['url'] = $validated['title'];
        }
        $validated['url'] = Str::slug($validated['url']);

        $subpage = new News();
        $subpage->fill($validated);
        $subpage->save();

        if ($request->has(SaveMode::SAVE_AND_RETURN)) {
            return redirect()->to(base64_decode($request->get('returnPath')));
        }

        return redirect()->route('jigsaw-news::edit', [
            $subpage->id,
            'editLang' => $request->get('editLang'),
            'returnPath' => $request->get('returnPath'),
        ]);
    }

    public function edit(News $news, Jigsaw $jigsaw)
    {
        $instances = $jigsaw->getRunnableInstances(News::class);

        return view('jigsaw-news::edit', compact('news', 'instances'));
    }

    public function update(UpdateNews $request, News $news)
    {
        $validated = $request->validated();
        if ($validated['url'] === null) {
            $validated['url'] = $validated['title'];
        }
        $validated['url'] = Str::slug($validated['url']);

        $news->update($validated);

        if ($request->has(SaveMode::SAVE_AND_RETURN)) {
            return redirect()->to(base64_decode($request->get('returnPath')));
        }

        return redirect()->route('jigsaw-news::edit', [
            $news->id,
            'editLang' => $request->get('editLang'),
            'returnPath' => $request->get('returnPath'),
        ]);
    }

    public function destroy(News $news, Request $request)
    {
        $news->delete();

        return redirect()->to(base64_decode($request->get('returnPath')));
    }
}
