@extends('layouts.app')

@section('content')

@if(count($users) > 0)
<div class="panel panel-default">
        <div class="panel-heading">
            会員一覧画面
            <form action="/user" method="get">
                <a href="/user" style="position: absolute; left: 450px">登   録</a> 
            </form>
        </div>
    <p class="t"></p>
        <div class="panel-body align-items-center justify-content-center">
            
            <table border="1">
                <!--テーブルヘッダ-->
                    <thead>
                        <tr>
                            <th>名前</th>
                            <th>電話番号</th>
                            <th>メールアドレス</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <!--テーブル本体-->
                 
                    <tbody>
                        @foreach($users as $user)
                    
                        <tr>
                            <!--タスク名-->
                            <td class="table-text">
                                <div>{{ $user->name }}</div>
                            </td>
                            <td>
                                <div>{{ $user->phone }}</div>
                            </td>
                            <td>
                                <div>{{ $user->email }}</div>
                            </td>
                            <td>
                                <form action="/edit/{{$user->id}}" method="POST">
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-info">編集</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                </tbody>
                
            </table>
        </div>
    
    
    
       
    

                       
</div>
@endif
@endsection