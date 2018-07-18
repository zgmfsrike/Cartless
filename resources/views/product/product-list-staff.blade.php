@extends('layouts.app')

@section('content')
<div class="uk-section">
  <div class="uk-container">

    <div class="uk-card uk-card-default uk-card-body">
      <div class="uk-card-title uk-width-1-1">
        {{ __('Product List') }}
        <button class="uk-button uk-button-primary uk-float-right">Add more product</button>
      </div>

      <div class="uk-overflow-auto uk-width-1-1">
        <table class="uk-table uk-table-small uk-table-divider">
          <thead>
            <tr>
              <th>Product ID</th>
              <th>Product name</th>
              <th>Description</th>
              <th>Price</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Table Data</td>
              <td>Table Data</td>
              <td>Table Data</td>
              <td>Table Data</td>
              <td>
                <button class="uk-button uk-button-primary uk-button-small">Edit</button>
                <button class="uk-button uk-button-link ">Delete</button>
              </td>
            </tr>
            <tr>
              <td>Table Data</td>
              <td>Table Data</td>
              <td>Table Data</td>
              <td>Table Data</td>
              <td>
                <button class="uk-button uk-button-primary uk-button-small">Edit</button>
                <button class="uk-button uk-button-link ">Delete</button>
              </td>
            </tr>
            <tr>
              <td>Table Data</td>
              <td>Table Data</td>
              <td>Table Data</td>
              <td>Table Data</td>
              <td>
                <button class="uk-button uk-button-primary uk-button-small">Edit</button>
                <button class="uk-button uk-button-link ">Delete</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

  </div>

</div>
@endsection
