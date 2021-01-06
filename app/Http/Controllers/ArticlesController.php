<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ArticlesRequest;
use App\Events\ArticleCreated;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return __METHOD__ . '은(는) Article 컬렉션을 조회합니다.';
        //$articles = \App\Article::get();
        //$article = \App\Article::with('user')->get();
        //$articles->load('user');
        $articles = \App\Article::latest()->paginate(3);
        return view('articles.index',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return __METHOD__ . '은(는) Article 컬렉션을 만들기 위한 폼을 담은 뷰를 반환합니다.';
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /*
    public function store(Request $request)
    {
        //return __METHOD__ . '은(는) 사용자의 입력한 폼 데이터로 새로운 Article 컬렉션을 만듭니다.';
        $rules = [
          'title' => ['required'],
          'content' => ['required','min:10']
        ];

        $messages = [
          'title.required' => '제목은 필수 입력 항목입니다.',
          'content.required' => '본문은 필수 입력 항목입니다.',
          'content.min' => '본문의 최소 :min 글자 이상이 필요합니다.'
        ];

        $this->validate($request, $rules, $messages);

        //$validator = \Validator::make($request->all(),$rules, $messages);

        //if($validator->fails())
        //{
        //  return back()->withErrors($validator)->withInput();
        //}

        $article = \App\User::find(1)->articles()->create($request->all());

        if(!$article)
        {
            return back()->with('flash_message','글이 저장되지 않았습니다.')->withInput();
        }

        return redirect(route('articles.index'))->with('flash_massage','작성하신 글이 저장되었습니다.');
    }

    public function store(ArticlesRequest $request)
    {
      $article = \App\User::find(1)->articles()->create($request->all());

      if(!$article)
      {
          return back()->with('flash_message','글이 저장되지 않았습니다.')->withInput();
      }

      return redirect(route('articles.index'))->with('flash_massage','작성하신 글이 저장되었습니다.');
    }
    */
    /*
    public function store(ArticlesRequest $request)
    {

      $article = \App\User::find(1)->articles()->create($request->all());
      if(!$article)
      {
        return back()->with('flash_message','글이 저장되지 않았습니다.')->withInput();
      }

      var_dump('이벤트를 던집니다.');
      event('article.created',[$article]);
      var_dump('이벤트를 던집니다.');
    }
    */
    /*
    public function store(ArticlesRequest $request)
    {
      $article = \App\User::find(1)->articles()->create($request->all());
      if(!$article)
      {
        return back()->with('flash_message','글이 저장되지 않았습니다.')->withInput();
      }

      var_dump('이벤트를 던집니다.');
      event(new ArticleCreated($article));
      var_dump('이벤트를 던졌습니다.');
    }
    */
    public function store(ArticlesRequest $request)
    {
      $article = \App\User::find(1)->articles()->create($request->all());
      if(!$article)
      {
        return back()->with('flash_message','글이 저장되지 않았습니다.')->withInput();
      }

      event(new \App\Events\ArticlesEvent($article));

      return redirect(route('articles.index'))->with('flash_massage','작성하신 글이 저장되었습니다.');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return __METHOD__ . '은(는) 다음 기본 키를 가진 Article 모델을 조회합니다.' . $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return __METHOD__ . '은(는) 다음 기본 키를 가진 Article 모델을 수정하기 위한 폼을 담은 뷰를 반환합니다.' . $id;
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
        return __METHOD__ . '은(는) 사용자의 입력한 폼 데이터로 다음 기본 키를 가진 Article 모델을 수정합니다.' . $id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return __METHOD__ . '은(는) 다음 기본키를 가진 Article 모델을 삭제합니다.' . $id;
    }
}
