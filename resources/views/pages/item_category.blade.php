{{-- resources\views\pages\item_category.blade.php --}}
@extends('layouts.main_layout')

@section('title', 'Item-Category - POS')

<style>
    @media screen and (max-width: 768px) {
        .input-group {
            display: flex;
            flex-direction: column;
            gap: 0.3rem;
        }

        .button-group {
            display: flex;
            flex-wrap: nowrap;
            gap: 0.5rem;
        }
    }
</style>

@section('content')
<div class="flex justify-center items-center flex-wrap p-3 w-full gap-2">
    <div class="input-group">
        <input type="text" class="" placeholder="Code">
        <input type="text" class="" placeholder="Description">
    </div>
    <div class="button-group">
        <button class="addBtn" style="width: 6rem;">Add</button>
        <button class="resetBtn" style="width:6rem;">Reset</button>
    </div>
</div>
@endsection