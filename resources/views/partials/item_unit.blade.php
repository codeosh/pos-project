{{-- resources\views\partials\item_unit.blade.php --}}
@forelse ($itemunits as $itemunit )
<tr id="row-{{$itemunit->unitcode}}">
    <td>{{$itemunit->unitcode}}</td>
    <td>{{$itemunit->pname}}</td>
    <td>
        <x-bladewind.button icon="trash" size="tiny" class="w-32 delete-btn" color="red"
            data-id="{{ $itemunit->unitcode }}">
            Delete
        </x-bladewind.button>
    </td>
</tr>
@empty
<tr>
    <td colspan="3" class="px-4 py-3 text-center text-gray-500 italic">
        No item-units found.
    </td>
</tr>
@endforelse