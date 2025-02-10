{{-- resources\views\pages\item_category.blade.php --}}
@extends('layouts.main_layout')

@section('title', 'Item-Category - POS')

@section('content')
<div class="inline-flex items-center p-3 space-x-2">
    <div class="w-auto">
        <x-bladewind::input placeholder="Code" size="small" class="!w-20" />
    </div>
    <div class="w-auto">
        <x-bladewind::input placeholder="Description" size="small" />
    </div>
</div>
@endsection