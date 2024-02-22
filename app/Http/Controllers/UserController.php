<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

    public function __construct()
    {
        $this->user = new User();
    }
    //
        //会員一覧を取得
        public function index(Request $request){
            $users = User::orderBy('id','asc')->get();
            return view('books.index',['users'=>$users]);
        }
         //会員登録
         //表示
         public function Insert(Request $request,User $user){
            return view('books.insert');
         }
         //処理
         public function Ins(Request $request,User $user){
            $user->create([
                'name' => $request->name,
                'phone'=> $request->phone,
                'email'=> $request->email
            ]);
            return redirect('/users');
         }
         //会員編集

/**
 * IDから一件のデータを取得する
 */
public function selectUserFindById($id)
{
    // 「SELECT id, name, email WHERE id = ?」を発行する
    $query = $this->select([
        'id',
        'name',
        'email',
        'phone'
    ])->where([
        'id' => $id
    ]);
    // first()は1件のみ取得する関数
    return $query->first();
}
/**
 * 画面表示件データ一件取得用
 */
public function getEdit($id)
{
    $user = User::find($id); 
   /*$user = $this->user->selectUserFindById($id);*/
    return view('books.edit', ['user'=>$user]);
}
public function upd(Request $request,$id)    
{
    $user=User::find($id);
    $result = $user->fill($request->all())->save();/*->fill([
        'name'=> $request->name,
        'phone'=> $request->phone,
        'email'=>$request->email
    ])->save();*/
    return redirect('/users');
}    
public function UserDEL($id){
   /* $this->authorize('destory',$user);*/
   $user=User::find($id);
   $user->delete();
    return redirect('/users');
}
         
}
