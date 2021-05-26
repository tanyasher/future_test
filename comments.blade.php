<h1>Коментарии</h1>
@foreach ($comments as $comment)
    <h4>{{$comment->name}}</h4>
    <div>{{$comment->day}}</div>
    <div>{{$comment->time}}</div>

    <div>{{Str::limit($comment->text, 200)}}</div>
@endforeach
@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<h3>Оставить комментарий</h3>
{{ Form::model($comment_create, ['url' => route('comments.store')]  ) }}
{{ Form::label('name', 'Ваше имя') }}
{{ Form::text('name') }}<br>
{{ Form::label('text', 'Ваш комментарий') }}
{{ Form::textarea('text') }}<br>
{{ Form::submit('Отправить') }}
{{ Form::close() }}
