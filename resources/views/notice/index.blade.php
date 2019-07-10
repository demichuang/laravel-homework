@extends('notice.layout')

@section('content')
    <div class="container">
    <h2>Notice</h2>
    <a class="btn btn-success pull-right" href="/notice/create">Add</a>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>DateTime</th>
            <th>Content</th>
            <th>UpdatedTime</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($notices as $notice)
                <tr>
                    <td>{{ $notice->id }}</td>
                    <td>{{ $notice->name }}</td>
                    <td>{{ $notice->datetime }}</td>
                    <td>{{ $notice->content }}</td>
                    <td>{{ $notice->updated_at }}</td>
                    <td>
                        <form method="post" action="/notice/{{ $notice->id }}"> 
                            <a class="btn btn-primary pull-right" href="/notice/{{ $notice->id }}/edit">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger pull-right" href="/notice/{{ $notice->id }}">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
