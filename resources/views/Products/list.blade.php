
@extends('layouts.app') {{-- kế thừa cái giao diện app của layouts --}}

@section('content')
<h1>Product</h1>
<button id="addProductBtn" style="margin-bottom: 10px; border: none; background: blue; color: white; cursor: pointer;">Thêm Sản Phẩm</button>
<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Description</th>
        <th>Price</th>
        <th>Option</th>
    </tr>
    @foreach ($Items as $item)
    <tr>
        <th>{{ $item->id }}</th>

        <!-- Form để cập nhật sản phẩm -->
        <form action="{{ route('items.update', $item->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- Giả lập phương thức PUT -->

            <td>
                <input type="text" name="name" value="{{ $item->name }}" required style="border: none; outline: none;">
            </td>

            <td>
                <input type="text" name="description" value="{{ $item->description }}" required style="border: none; outline: none;">
            </td>

            <td>
                <input type="text" name="price" value="{{ $item->price }}" required style="border: none; outline: none;">
            </td>

            <td>
                <button type="submit" style="border: none; background: none; cursor: pointer;" title="Cập nhật">
                    <i class="fas fa-save" style="color: green;">Cập nhật</i>
                </button>
            </td>
        </form>

        <td>
            <form action="{{ route('items.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa?');">
                @csrf
                @method('DELETE')
                <button type="submit" style="border: none; background: none; cursor: pointer;" title="Xóa">
                    <i class="fas fa-trash" style="color: red;">Xóa</i>
                </button>
            </form>
        </td>
        <td>
        <a href="{{ route('items.detail', $item->id) }}">Detail</a>
        </td>
    </tr>
    @endforeach

    <!-- Hàng thêm sản phẩm mới -->
    <tr id="newProductRow" style="display: none;">
        <td>New</td>
        <form action="{{ route('items.store') }}" method="POST">
            @csrf
            <td>
                <input type="text" name="name" required style="border: none; outline: none;">
            </td>
            <td>
                <input type="text" name="description" required style="border: none; outline: none;">
            </td>
            <td>
                <input type="text" name="price" required style="border: none; outline: none;">
            </td>
            <td>
                <button type="submit" style="border: none; background: none; cursor: pointer;" title="Thêm">
                    <i class="fas fa-plus" style="color: blue;">Thêm</i>
                </button>
            </td>
        </form>
    </tr>
</table>

<script>
    document.getElementById('addProductBtn').addEventListener('click', function() {
        var newRow = document.getElementById('newProductRow');
        if (newRow.style.display === 'none') {
            newRow.style.display = 'table-row'; // Hiện hàng mới
        } else {
            newRow.style.display = 'none'; // Ẩn hàng mới nếu đã hiện
        }
    });
</script>
@endsection
