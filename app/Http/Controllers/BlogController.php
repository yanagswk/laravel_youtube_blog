<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Http\Requests\BlogRequest;

class BlogController extends Controller
{
    /**
     * ブログ一覧を表示
     *
     * @return view ブログの一覧画面を返す
     */
    public function showList()
    {
        // BlogモデルからDBの値を全て取得
        $blogs = Blog::all();

        // laravel用のdebug関数で処理もdd()で止めてくれる。
        // dd($blogs);

        // resources/views/blog/list.blade.phpを引数を渡して、読み込む
        return view('blog.list', [
            'blogs' => $blogs
        ]);
    }


    /**
     * ブログ詳細画面を表示
     *
     * @param int $id ブログID
     * @return view
     */
    public function showDetail($id)
    {
        // BlogモデルからDBの値を全て取得
        $blog = Blog::find($id);

        // 値が取得できなくてnullの場合は、一覧画面にリダイレクトする
        if (is_null($blog)) {
            // セッションを使いエラーメッセージを出力 : flash(変数名, メッセージ内容)
            \Session::flash('err_msg', 'データがありません。');
            return redirect(route('blogs'));
        }

        // resources/views/blog/list.blade.phpを引数を渡して、読み込む
        return view('blog.detail', [
            'blog' => $blog
        ]);
    }


    /**
     * ブログ登録画面を表示
     *
     * @return view
     */
    public function showCreate() {
        return view('blog.form');
    }


    /**
     * ブログを登録する
     * BlogRequestに画面からpostされたデータが格納されている。
     *
     * @param object $request 画面から送信されたオブジェクト
     * @return view
     */                     // BlogRequestオブジェクトを$request変数に入れる
    public function exeStore(BlogRequest $request) {
        // allメソッドで全てのデータを受け取る
        $inputs = $request->all();

        // トランザクション開始
        \DB::beginTransaction();

        try {
            // createメソッドでブログをDBに登録
            Blog::create($inputs);
            \DB::commit();  // コミット
        } catch(\Throwable $e) {
            \DB::rollback(); // ロールバック
            // 500エラー
            abort(500);
        }

        // セッションを使いメッセージを出力 : flash(変数名, メッセージ内容)
        \Session::flash('err_msg', 'ブログを登録しました');
        return redirect(route('blogs'));
    }




    /**
     * ブログ編集フォームを表示
     *
     * @param int $id ブログID
     * @return view
     */
    public function showEdit($id)
    {
        // BlogモデルからDBの値を全て取得
        $blog = Blog::find($id);

        // 値が取得できなくてnullの場合は、一覧画面にリダイレクトする
        if (is_null($blog)) {
            // セッションを使いエラーメッセージを出力 : flash(変数名, メッセージ内容)
            \Session::flash('err_msg', 'データがありません。');
            return redirect(route('blogs'));
        }

        // resources/views/blog/list.blade.phpを引数を渡して、読み込む
        return view('blog.edit', [
            'blog' => $blog
        ]);
    }



    /**
     * ブログを更新する
     * BlogRequestに画面からpostされたデータが格納されている。
     * 更新処理でsave()は差分を更新。update()の場合は、差分が避ければ日付が更新されない。
     *
     * @param object $request 画面から送信されたオブジェクト
     * @return view
     */                     // BlogRequestオブジェクトを$request変数に入れる
    public function exeUpdate(BlogRequest $request) {
        // allメソッドで全てのデータを受け取る
        $inputs = $request->all();

        // トランザクション開始
        \DB::beginTransaction();

        try {
            // createメソッドでブログをDBに登録
            $blog = Blog::find($inputs['id']);
            // DBの更新処理
            $blog->fill([
                'title' => $inputs['title'],
                'content' => $inputs['content']
            ]);
            $blog->save();
            \DB::commit();  // コミット
        } catch(\Throwable $e) {
            \DB::rollback(); // ロールバック
            // 500エラー
            abort(500);
        }

        // セッションを使いメッセージを出力 : flash(変数名, メッセージ内容)
        \Session::flash('err_msg', 'ブログを更新しました');
        return redirect(route('blogs'));
    }



    /**
     * ブログ削除
     *
     * @param int $id ブログID
     * @return view
     */
    public function exeDelete($id)
    {
        // idが空の場合
        if (empty($id)) {
            // セッションを使いエラーメッセージを出力 : flash(変数名, メッセージ内容)
            \Session::flash('err_msg', 'データがありません。');
            return redirect(route('blogs'));
        }

        try {
            // Blogモデルから指定されたidの項目を削除
            Blog::destroy($id);
        } catch(\Throwable $e) {
            abort(500);
        }

        \Session::flash('err_msg', '削除しました。');
            return redirect(route('blogs'));
    }
}
