<!DOCTYPE html>
<html lang="en">
<head>
    <title>Тестовое задание</title>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
    <!-- Theme CSS -->
    <link id="theme-style" rel="stylesheet" href="resources/css/css_test.css">

    <link href="{{asset('css_test.css')}}" rel="stylesheet" type="text/css"/>
</head>

<body>


<div class="main-wrapper">
    <div class="container px-3 px-lg-5">
        <article class="resume-wrapper mx-auto theme-bg-light p-5 mb-5 my-5 shadow-lg">
            <div class="resume-body">
                <div class="row">
                    <div class="resume-main col-12 col-lg-8 col-xl-9 pr-0 pr-lg-5">
                        <section class="work-section py-3">
                            <h3 class="text-uppercase  mb-4">Комментарии</h3>


                            @foreach ($comments as $comment)


                                <div class="item mb-3">
                                    <div class="item-heading row align-items-center mb-2">
                                        <h4 class="item-title col-12 col-md-6 col-lg-8 mb-2 mb-md-0">{{$comment->name}}</h4>
                                        <div
                                            class="item-meta col-12 col-md-6 col-lg-4 text-muted text-left text-md-right">
                                            {{$comment->time}}  {{$comment->day}}
                                        </div>

                                    </div>
                                    <div class="item-content">
                                        <p>{{Str::limit($comment->text, 200)}}</p>

                                    </div>
                                </div><!--//item-->
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


                        </section><!--//work-section-->


                    </div><!--//resume-main-->

                </div><!--//resume-body-->
                <hr>
                <div class="resume-footer text-center">
                    footer footer
                </div><!--//resume-footer-->
            </div>
        </article>

    </div><!--//container-->


</div><!--//main-wrapper-->


</body>
</html>
