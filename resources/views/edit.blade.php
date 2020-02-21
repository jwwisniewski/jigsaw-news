<html>
<head>
    <script src="https://cdn.ckeditor.com/ckeditor5/16.0.0/classic/ckeditor.js"></script>
</head>
<body>

<h1>
    edit news
</h1>

@include('jigsaw-core::errors')
@include('jigsaw-core::editLang')

{!! Form::model($news, ['route' => ['news.update', $news->id]]) !!}

    instance - {!! Form::select('instance_id', $instances, $news->instance_id, ['disabled']) !!} <br>
    title - {!! Form::text('title') !!} <br>
    url - {!! Form::text('url') !!} <br>
    kw - {!! Form::text('keywords') !!} <br>
    descr - {!! Form::textarea('description') !!} <br>
{!! Form::textarea('contents', null, ['id' => 'editor']) !!} <br>

    {!! Form::submit(__('ui.saveAndContinue'), ['name' => \jwwisniewski\Jigsaw\Core\Enum\SaveMode::SAVE_AND_CONTINUE]) !!}
    {!! Form::submit(__('ui.saveAndReturn'), ['name' => \jwwisniewski\Jigsaw\Core\Enum\SaveMode::SAVE_AND_RETURN]) !!}
    {!! Form::button(__('ui.cancel'), ['onclick' => new Illuminate\Support\HtmlString("window.location.href='" . base64_decode(request()->get('returnPath')) . "'")]) !!}

    {!! Form::hidden('editLang', request()->get('editLang', config('jigsaw.defaultClientLocale'))) !!}
    {!! Form::hidden('returnPath', request()->get('returnPath')) !!}
{!! Form::close() !!}


<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
</body>
</html>