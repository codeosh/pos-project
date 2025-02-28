{{-- resources\views\partials\sub_category.blade.php --}}
@forelse ($subcategories as $subcategory )
<tr id="row-{{$subcategory->unitcode}}">
    <td>{{$subcategory->unitcode}}</td>
    <td>{{$subcategory->pname}}</td>
    <td>
        <x-bladewind.button icon="trash" size="tiny" class="w-32 delete-btn" color="red"
            data-id="{{ $subcategory->unitcode }}">
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