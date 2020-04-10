@extends('layouts.app')

@section('content')
<div class="head">
    <h1>მომხმარებლები</h1>
</div>

<table id="list">
    <thead>
        <tr>
            <th>ID</th>
            <th>სახელი</th>
            <th>თარიღი</th>
            <th>მოქმედება</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($list as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->created_at->format('d.m.Y') }}</td>
                <td class="action">
                    <a class="left" href="{{ route('user.edit', $item->id) }}">
                        <i class="far fa-edit"></i>
                    </a>
                    <form action="{{ route('user.destroy', $item->id) }}">
                        @csrf
                        <button type="submit" class="right">
                            <i class="far fa-trash-alt"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<div id="pagination">
    {{ $list->links() }}
</div>
@endsection