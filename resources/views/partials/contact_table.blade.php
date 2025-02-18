{{-- resources\views\partials\contact_table.blade.php --}}
@forelse($contacts as $contact)
<tr id="row-{{ $contact->unitcode }}">
    <td>{{ $contact->unitcode }}</td>
    <td>{{ $contact->customername }}</td>
    <td>
        <x-bladewind.button icon="eye" size="tiny" class="w-32 view-btn" data-id="{{ $contact->unitcode }}">View
        </x-bladewind.button>
        <x-bladewind.button icon="trash" size="tiny" class="w-32 delete-btn" color="red"
            data-id="{{ $contact->unitcode }}">
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