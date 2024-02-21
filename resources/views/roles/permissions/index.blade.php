@extends('layouts.template')

@section('content')
<div class=" px-5 py-2 lg:flex lg:items-center lg:justify-between">
    <div class=" flex justify-between min-w-0 flex-1">
        <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">Permissões</h2>

    </div>
</div>

<div class=" px-4 flex flex-col mt-6">
    <div class="relative flex gap-x-3">
        <div class="flex h-6 items-center">
            <input id="comments" name="comments" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
        </div>
        <div class="text-sm leading-6">
            <label for="comments" class="font-medium text-gray-900">Comments</label>
            <p class="text-gray-500">Get notified when someones posts a comment on a posting.</p>
        </div>
    </div>
</div>
@endsection
