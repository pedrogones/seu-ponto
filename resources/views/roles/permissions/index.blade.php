@extends('layouts.template')
@section('content')
<div class=" px-5 py-2 lg:flex lg:items-center lg:justify-between">
    <div class=" flex justify-between min-w-0 flex-1">
        <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">Permissões</h2>
        <a href="{{ route('roles.index') }}" class="inline-flex items-center rounded-md bg-gray-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600">
                <svg style="margin-right: 15px" class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m15 19-7-7 7-7" />
            </svg>
            voltar
        </a>
    </div>
</div>

<div class=" px-4 flex flex-col mt-6">
    @include('shared.message')
<form action="{{route('roles.permissions.store', $role->id)}}" method="post">
    @csrf
@foreach($permissions as $permission)
<div class="relative flex gap-x-3">
        <div class="flex h-6 items-center">
            <input id="permission.{{$permission->id}}" name="permissions[{{$permission->id}}]" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600"
            @checked($role->permissions->contains($permission->id))
            >
        </div>
        <div class="text-sm leading-6">
            <label for="permission.{{$permission->id}}" class="font-medium text-gray-900">{{ $permission->label }}</label>
              </div>
    </div>
@endforeach
<div class="mt-6 flex items-center justify-start gap-x-6">
            <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Salvar</button>
        </div>
</form>
</div>
@endsection
