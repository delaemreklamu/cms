<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use App\Article;
use Illuminate\Validation\Rule;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();
        return view('home.articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('home.articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $this->validate(
            request(),
            [
                'title' => 'required|string|max:191',
                'slug' => 'required|string|alpha_dash|max:191|unique:articles',
                'text' => 'required|string|max:65000',
            ]
        );
        
        $article = Article::create($input);

        return redirect()
            ->route('home.articles.edit', compact('article'))
            ->with('success', 'Статья была успешно добавлена');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('home.articles.edit', compact('article', 'id'));
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
        $article = Article::find($id);
        $this->validate(request(), [
            'title' => 'required|string|max:191',
            'slug' => ['required', 'string', 'alpha_dash', 'max:191', Rule::unique('articles')->ignore($article->id)],
            'text' => 'required|string|max:65000',
        ]);
        $article->title = $request->get('title');
        $article->slug = $request->get('slug');
        $article->text = $request->get('text');
        $article->save();

        return back()->with('success', 'Статья была успешно отредактирована');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();
        
        return redirect()
            ->route('home.articles.index')->with('success', 'Статья успешно удалена!');
    }
}
