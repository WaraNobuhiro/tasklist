<ul class="media-list">
@foreach ($tasks as $tasks)
    <?php $user = $task->user; ?>
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
                     <td> {!! link_to_route('tasks.indx', $task->id, ['id' => $user->id]) !!}</td> 
                     <td> {{ $task->content }}</td>
                     <td> {{ $task->status}}</td>
                 </tr>
            @endforeach
        </tbody>
        </table>
    @endif
    
        {!! link_to_route('tasks.create', '新規タスクの投稿',null,['class'=>'btn btn-primary']) !!}
@endforeach
</ul>
{!! $tasks->render() !!}



 