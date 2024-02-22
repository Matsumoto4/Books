@extends('layouts.app')

@section('content')

<div class="panel-body">
    <form action="/userE{{$user->id}}" method="POST" class="form-horizontal">
        {{ csrf_field() }}
        <h1>アカウントを編集</h1>
            <!--ニックネーム用のテキストボックスを作る（文字数：50文字まで、required:必須入力にする,autoforcus:ページが選択されたときに自動で選択された状態にする-->
            <input type="text" class="form-control" name="name" value={{ $user->name}} maxlength="50" required ><!--form-control はBootstrpのクラスでモダンなデザインになります-->
            <!--typeにemailを指定することで、アドレスの形式になっていない場合、リクエストを送らずエラーを発生させることができる。-->
            <input type="email" class="form-control" name="email" value={{ $user->email}} maxlength="254" required ><!--form-control はBootstrpのクラスでモダンなデザインになります-->
            <input type="phone" class="form-control" name="phone" value={{ $user->phone}} minlength="4" maxlength="128" required ><!--form-control はBootstrpのクラスでモダンなデザインになります-->
            <button class="w-100 btn btn-lg" type="submit">編集する</button><!--w-100 はBootstrapのクラス(Width:100) ,btn-lgもBootstrapのクラスで大きいサイズのボタンを指定しています。-->

    </form>
    <form action="/userD/{{ $user->id}}" method="POST">
        {{ csrf_field() }}
        <button class="w-100 btn btn-lg" type="submit">削除する</button><!--w-100 はBootstrapのクラス(Width:100) ,btn-lgもBootstrapのクラスで大きいサイズのボタンを指定しています。-->            
    </form> 
    <!--コピーライト-->
    <p class="mt-2 mb-3 text-muted">&copy;2021</p><!--text-muted:文字を灰色にします-->  
   
</div>