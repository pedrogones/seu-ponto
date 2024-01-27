@extends('layouts.template')
@section('content')
<div class="bg-white py-24 sm:py-32">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
      <div class="mx-auto max-w-2xl lg:mx-0">
        <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Posts</h2>
        <p class="mt-2 text-lg leading-8 text-gray-600">Dashboard to view all posts createds</p>
      </div>
      <div style="border-radius: 20px" class="mt-10 grid max-w-2xl grid-cols-3 gap-x-8 gap-y-16 border-t border-gray-200 pt-10 sm:mt-16 sm:pt-16 lg:mx-0 lg:max-w-none lg:grid-cols-3">

           @foreach($posts as $post)
          <div class="bg-indigo-200" style="border-radius: 20px">
            <article style="margin-left:15px; margin-top:5px" class="flex max-w-xl flex-col items-start justify-between">
                <div class="flex items-center gap-x-4 text-xs">
                  <time datetime="2020-03-16" class="text-gray-500">{{ $post->created_at->diffForHumans() }}</time>
                  <p class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100">{{ $post->catergory ?? 'Categoria'}}</a>
                </div>
                <div class="group relative">
                  <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
                    <a href="#">
                      <span class="absolute inset-0"></span>
                    {{$post->title}}
                    </a>
                  </h3>
                  <p class="mt-5 line-clamp-3 text-sm leading-6 text-gray-600">Conteudo:<br>{{$post->content}}</p>
                </div>
                <div class="relative mt-8 flex items-center gap-x-4">
                  <img src="{{ $post->user->photoProfile }}" alt="" class="h-10 w-10 rounded-full bg-gray-50">
                  <div class="text-sm leading-6">
                    <p class="font-semibold text-gray-900">
                      <a href="#">
                        <span class="absolute inset-0"></span>
                      {{$post->user->name}}
                      </a>
                    </p>
                    <p class="text-gray-600">{{ $post->user->role}} <br> {{ $post->user->email}} </p>
                  </div>
                </div>
              </article>
          </div>
           @endforeach


        <!-- More posts... -->
      </div>
    </div>
  </div>

@endsection
