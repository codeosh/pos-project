{{-- resources\views\partials\product-list_table.blade.php --}}
@foreach ($productlists as $productlist)
  <tr>
    <td>{{ $productlist->pcode }}</td>
    <td>{{ $productlist->pcode }}</td>
    <td>{{ $productlist->pscode }}</td>
    <td>{{ $productlist->pbrand }}</td>
    <td>{{ $productlist->unit }}</td>
    <td>{{ $productlist->costing }}</td>
    <td>{{ $productlist->ptype }}</td>
    <td>{{ $productlist->maincategory }}</td>
    <td>{{ $productlist->subcategory }}</td>
    <td>{{ $productlist->subseller }}</td>
    <td>{{ $productlist->supplier }}</td>
    <td>{{ $productlist->level }}</td>
    <td>{{ $productlist->warrantyp }}</td>
    <td>{{ $productlist->retailmarkup }}</td>
    <td>{{ $productlist->retailprice }}</td>
    <td>{{ $productlist->specialmarkup }}</td>
    <td>{{ $productlist->specialprice }}</td>
    <td>{{ $productlist->prommarkup }}</td>
    <td>{{ $productlist->promprice }}</td>
  </tr>
@endforeach
