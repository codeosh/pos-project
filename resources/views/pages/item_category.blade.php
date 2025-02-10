{{-- resources\views\pages\item_category.blade.php --}}
@extends('layouts.main_layout')

@section('title', 'Item-Category - POS')

@section('content')
<div class="inline-flex items-center p-3 space-x-2">
    <div class="w-auto">
        <x-bladewind::input type="text" placeholder="Code" style="width: 10rem;" />
    </div>
    <div class="w-auto">
        <x-bladewind::input type="text" placeholder="Description" style="width: 30rem;" />
    </div>
</div>
@endsection