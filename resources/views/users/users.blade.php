@if (count($users) > 0)
<ul class="media-list">
@foreach ($users as $user)
    <li class="media">
        <div class="media-body">
            <div>
                {{ $user->name }}
            </div>
            <div>
                <p>{!! link_to_route('users.show', 'View profile', ['id' => $user->id]) !!}</p>
            </div>
        </div>
    </li>
@endforeach
</ul>
@endif

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


