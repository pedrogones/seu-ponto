@extends('layouts.template')

@section('content')

<head>
</head>
<div class=" px-5 py-2 lg:flex lg:items-center lg:justify-between">
    <div class=" flex justify-between min-w-0 flex-1">
        <h2 class="text-2xl font-bold leading-7 text-indigo-900 sm:truncate sm:text-3xl sm:tracking-tight">Posts</h2>
        <a href="{{ route('posts.index') }}" class="inline-flex items-center rounded-md bg-gray-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600">
            <svg style="margin-right: 15px" class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m15 19-7-7 7-7" />
            </svg>
            voltar
        </a>
    </div>
</div>
<style>
    .login-form input {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ddd;
        border-radius: 4px;
        box-sizing: border-box;
    }
</style>
<div class="p-4">
    @include('shared.message')
    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <div class="grid grid-cols-1 login-form">
            <div class="col-md-4">
                <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Título</label>
                <div class="mt-2">
                    <input style="align-content: center" type="text" name="title" id="title" autocomplete="given-title" class="block w-full rounded-md border-gray-300 focus:outline-none focus:ring focus:border-indigo-300 sm:text-sm">
                    @error('title')
                    <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-md-3">
                <label for="content" class="block text-sm font-medium leading-6 text-gray-900">Conteúdo</label>
                <div class="mt-2">
                    <input type="content" name="content" id="content" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    @error('content')
                    <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group col-md-6">
                <div class="mt-2">
                    <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Categoria</label>
                    <select id="category" class="bg-gray-40 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="category">
                        <option value="">Selecione</option>
                        @foreach($categories as $category)
                        <option value="{{ $category }}">{{ $category }}</option>
                        @endforeach
                    </select>
                    @error('category')
                    <div class="text-red-500">{{ $message }}</div>
                    @enderror

                </div>
                @if (auth()->user()->hasRole('Admin')||auth()->user()->hasRole('Super Admin'))
                @can('post_create')
                <div class="mt-2">
                    <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Autores</label>
                    <select id="user_id" class="bg-gray-40 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="user_id">
                        <option value="">Selecione</option>
                        @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                    @error('user_id')
                    <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                @endcan
                @endif
            </div>

        </div>
        <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Cadastrar</button>
        </div>
    </form>

</div>
@endsection
