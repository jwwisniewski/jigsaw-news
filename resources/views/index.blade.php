<h1>
    news
</h1>

@include('jigsaw-core::common.errors')

<p>
    {!! link_to_route('news.create', __('ui.create'), ['returnPath' => base64_encode(request()->fullUrl())]) !!}
</p>

@foreach ($newsList as $news)
     {{ $news->id }}, {{ $news->title }}, {{ $news->instance->title }}
     - {!! link_to_route('news.edit', __('ui.edit'), [$news->id, 'returnPath' => base64_encode(request()->fullUrl())]) !!}
     - {!! link_to_route('news.destroy', __('ui.destroy'), [$news   ->id, 'returnPath' => base64_encode(request()->fullUrl())]) !!}
    <br>
@endforeach

