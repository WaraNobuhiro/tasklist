@extends('layouts.app')

@section('content')
    @include('users.users', ['users' => $users])


   <h1>タスク一覧</h1>
    @if(count($tasks) > 0)
        <table class="table table-striped">
        <thead>
            <tr>
                <th>id</th>
                <th>タスク</th>
                <th>ステータス</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tasks as $task)
                 <tr>
                     <td> {!! link_to_route('users.show', $task->id, ['id' => $user->id]) !!}</td> 
                     <td> {{ $task->content }}</td>
                     <td> {{ $task->status}}</td>

                 </tr>
            @endforeach
        </tbody>
        </table>
    @endif
    
@endsection