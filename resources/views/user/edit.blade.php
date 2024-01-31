@extends('layouts.template')

@section('content')
<head>
    @include('shared.message')
</head>
<div class=" px-5 py-2 lg:flex lg:items-center lg:justify-between">
    <div class=" flex justify-between min-w-0 flex-1">
      <h2 class="text-2xl font-bold leading-7 text-indigo-900 sm:truncate sm:text-3xl sm:tracking-tight">Back End Developer</h2>
      <a href="{{ route('users.index') }}" class="inline-flex items-center rounded-md bg-gray-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600">
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
    <form action="{{ route('users.update', $user->id) }}"  method="POST">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-2 login-form">
            <div class="mb-3">
                <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Nome</label>
                <div class="mt-2">
                <input type="text" value="{{ $user->name }}" name="name" id="name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
                @error('name')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="block text-sm font-medium leading-6 text-gray-900">E-mail</label>
                <div class="mt-2">
                <input type="email" value="{{ $user->email }}" name="email" id="email"  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
                @error('email')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Sua senha:</label>
                <div class="mt-2">
                    <input type="password" name="password" id="password" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
                @error('password')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="block text-sm font-medium leading-6 text-gray-900">Confirme a senha:</label>
                <div class="mt-2">
                    <input type="password" name="password_confirmation" id="password_confirmation" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>
            <div class="mb-3">
                <label for="role_id">Permissões</label>
                <select name="role_id" id="role_id" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                @foreach ($roles as $role)
               <option value="{{ $role->id }}" selected>{{ $role->name }}</option>
               @endforeach
            </select>
            </div>
        </div>
        <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Salvar Alterações</button>
        </div>
  </form>

</div>
@endsection
