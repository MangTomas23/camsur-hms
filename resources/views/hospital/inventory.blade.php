@extends('layouts.app')

@section('title', 'Inventory')

@section('content')
<section>
  <h1 class="title is-1">Inventory</h1>
  <table class="table is-striped">
    <thead>
      <tr>
        <th>Item</th>
        <th>Category</th>
        <th>Quantity</th>
        <th>Amount</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Item 1</td>
        <td>Cat 1</td>
        <td>100</td>
        <td>100,000</td>
      </tr>
    </tbody>
  </table>
</section>
@endsection
