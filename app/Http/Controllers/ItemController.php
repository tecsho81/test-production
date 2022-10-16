<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Models\Post;

class ItemController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * 商品一覧
     */
    public function index()
    {
        // 商品一覧取得
        $items = Item::all();
        $type = Item::TYPE;
        return view('item.index', compact('items', 'type'));
    }

    /**
     * 商品登録
     */
    public function add(Request $request)
    {
        $type = Item::TYPE;
        // POSTリクエストのとき
        if ($request->isMethod('post')) {
            // バリデーション
            $this->validate($request, [
                'name' => 'required|max:100',
            ]);

            // 商品登録
            Item::create([
                'user_id' => Auth::user()->id,
                'name' => $request->name,
                'type' => $request->type,
                'detail' => $request->detail,
            ]);

            return redirect('/items');
        }

        return view('item.add', compact('type'));

        
    }

    /**
     * 編集画面表示
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Item::find($id);
        $type = Item::TYPE;
        return view('item.edit', compact('item', 'type'));
    }


    /**
     * 更新機能
     *
     * @param  int  $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // バリデーション
        $request->validate(
            [
                'name' => 'required|max:100',
                'type' => 'required',
                'detail' => 'required|max:500'
            ],
            [
                'name.required' => '*商品名を入力してください',
                'name.max' => '*商品名は100文字以下で入力してください',
                'type.required' => '*種別を選択してください',
                'detail.required' => '*詳細を入力してください',
                'detail.max' => '*商品名は500文字以下で入力してください'
            ]
        );

        $update = [
            'user_id' => 1, //auth::id()
            'name' => $request->name,
            'status' => $request->status ?? "",
            'type' => $request->type,
            'detail' => $request->detail
        ];
        Item::where('id', $id)->update($update);
        return redirect('/item');
    }

    /**
     * 削除機能
     *
     * @param  int  $id
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Item::where('id', $id)->delete();
        return redirect('/item');
    }
}
