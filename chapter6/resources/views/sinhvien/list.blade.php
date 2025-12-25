@extends('layouts.app')
@section('content')
    <h2>DASHBOARD SINH VIÊN</h2>
    <table>
        <thead>
            <th>id</th>
            <th>Tên sinh viên</th>
            <th>Email</th>
            <th>Ngày tạo</th>
        </thead>
        <tbody>
            @foreach($danhSachSV as $sv)
            <tr>
                <td>{{ $sv->id }}</td>
                <td>{{ $sv->ten_sinh_vien }}</td>
                <td>{{ $sv->email }}</td>
                <td>{{ $sv->created_at->format('d/m/Y') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <h2>FORM SINH VIÊN</h2>
    <form action="{{ route('sinhvien.store') }}" method="POST">
        @csrf
        Tên sinh viên: <input type="text" name="ten_sinh_vien" required>
        Email: <input type="email" name="email" required>
        <button type="submit">Thêm</button>
    </form>
@endsection