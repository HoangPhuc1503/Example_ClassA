@extends('layouts.app')  {{-- kế thừa cái giao diện app của layouts --}}

@section('content')
<h1>Produc</h1>
<table>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Description</th>
      <th>Price</th>
      <th>Option</th>
    </tr>
    <tr>
        <td>{{ $Items->id }}</td>
        <td>{{ $Items->name }}</td>
        <td>{{ $Items->description }}</td>
        <td>{{ $Items->price }}</td>
        <td>
            <form action="{{ route('items.destroy', $Items->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa?');">
                @csrf
                @method('DELETE')
                <button type="submit" style="border: none; background: none; cursor: pointer;" title="Xóa">
                    <i class="fas fa-trash" style="color: red;">Xóa</i>
                </button>
            </form>
        </td>
    </tr>
</table>
@endsection
