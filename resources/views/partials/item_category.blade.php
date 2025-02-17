{{-- resources\views\partials\item_category.blade.php --}}
@forelse ($categories as $category )
<tr id="row-{{$category->unitcode}}">
    <td>{{$category->unitcode}}</td>
    <td>{{$category->pname}}</td>
    <td>
        <x-bladewind.button icon="trash" size="tiny" class="w-32 delete-btn" color="red"
            data-id="{{ $category->unitcode }}">
            Delete
        </x-bladewind.button>
    </td>
</tr>
@empty
<tr>
    <td colspan="3" class="px-4 py-3 text-center text-gray-500 italic">
        No contacts found.
    </td>
</tr>
@endforelse