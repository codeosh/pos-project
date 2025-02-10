{{-- resources\views\pages\item_category.blade.php --}}
@extends('layouts.main_layout')

@section('title', 'Item-Category - POS')

@section('content')
<div class="flex gap-5 p-3">
    <x-bladewind::input placeholder="Code" size="small" />
    <x-bladewind::input placeholder="Description" size="small" />
</div>
@endsection