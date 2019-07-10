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
                            <form class="btn-action" method="post" action="/notice/{{ $notice->id }}"> 
                                @csrf
                                @method('DELETE')
                                <a class="btn btn-primary pull-right" href="/notice/{{ $notice->id }}/edit">Edit</a>
                                <button type="submit" class="btn btn-danger pull-right">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        window.onload = function() {
            $(".btn-action").on("submit", function(){
                return confirm("Are you sure?");
            });
        };
    </script>
