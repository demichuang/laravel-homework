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
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger pull-right" href="/notice/{{ $notice->id }}">DeleteNO</button>
                                <a class="btn btn-primary pull-right" href="/notice/{{ $notice->id }}/edit">Edit</a>
                                <!-- Trigger the modal with a button -->
                                <button type="button" class="btn btn-danger pull-right" data-toggle="modal" data-target="#myModal">Delete</button>

                                <!-- Modal -->
                                <div class="modal fade" id="myModal" role="dialog">
                                    <div class="modal-dialog">
                                    
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Hint</h4>
                                            </div>
                                            <div class="modal-body">
                                                <p>Are you sure to delete？</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-success" data-dismiss="modal">Sure</button>
                                            </div>
                                        </div>
                                    
                                    </div>
                                </div>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        window.onload = function() {
            $('[data-toggle="popover"]').popover();   
        };
        $("#myModal").bind( "submit", function() {
            $(this).trigger('submit');
        });
    </script>
