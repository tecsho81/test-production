<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Kyslik\ColumnSortable\Sortable;

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
     * 一覧画面表示
     */
    public function index()
    {
        // 一覧取得
        // $items = Item::all();
        $type = Item::TYPE;
        // 更新日時順・ページネーション
        $items = DB::table('items')->orderBy('updated_at', 'desc')->paginate(10);
        return view('item.index', compact('items', 'type'));
    }

    /**
     * 検索処理
     */
    public function searchindex(Request $request)
    {
        $nameword = $request->input('nameword');
        $typeword = $request->input('typeword');
        $statusword = $request->input('statusword');
        $type = Item::TYPE;
        $query = Item::query();
        if (!empty($nameword)) {
            $query->where('name', 'like', '%' . $nameword . '%');
        }
        if (!empty($typeword)) {
            $query->where('type', 'like', '%' . $typeword . '%');
        }
        if (!empty($statusword)) {
            $query->where('status', 'like', '%' . $statusword . '%');
        }
        $items = $query->sortable()->orderBy('updated_at', 'desc')->paginate(10);
        return view('item.index', compact('items', 'type'));
    }

    /**
     * 登録画面表示
     */
    public function add(Request $request)
    {
        $type = Item::TYPE;
        // POSTリクエストのとき
        if ($request->isMethod('post')) {
            // バリデーション
            $this->validate(
                $request,
                [
                    'name' => 'required|max:100',
                    'type' => 'required',
                    'detail' => 'max:500'
                ],
                [
                    'name.required' => '車名を入力してください',
                    'name.max' => '車名は100文字以下で入力してください',
                    'type.required' => 'タイプを選択してください',
                    'detail.max' => '詳細は500文字以下で入力してください'
                ]
            );
            // 登録処理
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
     * 詳細画面表示
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        $item = Item::find($id);
        $type = Item::TYPE;
        return view('item.detail', compact('item', 'type'));
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
     * 更新処理
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
                'detail' => 'max:500'
            ],
            [
                'name.required' => '車名を入力してください',
                'name.max' => '車名は100文字以下で入力してください',
                'type.required' => 'タイプを選択してください',
                'detail.max' => '詳細は500文字以下で入力してください'
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
        return redirect('/items');
    }

    /**
     * 削除処理
     *
     * @param  int  $id
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::findOrFail($id);
        $item->delete();
        return redirect('/items');
    }
}
