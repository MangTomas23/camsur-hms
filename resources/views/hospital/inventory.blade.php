@extends('layouts.app')

@section('title', 'Inventory')

@section('content')
<section>
  <h3 class="title is-3">Inventory</h3>
  <table class="table is-striped">
    <thead>
      <tr>
        <th>Item</th>
        <th>Category</th>
        <th>Quantity</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Item 1</td>
        <td>Cat 1</td>
        <td>100</td>
      </tr>
    </tbody>
  </table>
</section>
@endsection
