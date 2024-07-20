@extends('client.layouts.master')

@section('title')
    Danh mục
@endsection
@section('content')
    <div class="container mt-5">
        <div class="row">

            <h2 class="h5 section-title mt-5"> </h2>
            @foreach ($posts as $item)
                <article class="card mb-4 mt-5">
                    <div class="post-slider">
                        <img src="{{ \Storage::url($item->img_thumb) }}" class="card-img-top" alt="post-thumb">

                    </div>
                    <div class="card-body">
                        <h3 class="mb-3"><a class="post-title" href="{{ route('post_showDetail', $item) }}">
                                {{ $item->title }} </a></h3>
                        <ul class="card-meta list-inline">
                            <li class="list-inline-item">
                                <a href="author-single.html" class="card-meta-author">
                                    <img src="/theme/clients/reader/images/john-doe.jpg" alt="John Doe">
                                    <span> {{ $item->author }} </span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <i class="ti-timer"></i>3 Min To Read
                            </li>
                            <li class="list-inline-item">
                                <i class="ti-calendar"></i> {{ $item->created_at }}
                            </li>
                            <li class="list-inline-item">
                                <ul class="card-meta-tag list-inline">
                                    <li class="list-inline-item"><a href="tags.html">Demo</a></li>
                                    <li class="list-inline-item"><a href="tags.html">Elements</a></li>
                                </ul>
                            </li>
                        </ul>
                        <p> {{ $item->sumary }} </p>
                        <a href="post-elements.html" class="btn btn-outline-primary">Read More</a>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
@endsection
