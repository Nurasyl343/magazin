@extends('admin.admin_panel')

@section('content')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Users Page</h1>
    </div>
    <div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">###</th>
            </tr>
            </thead>
            <tbody>
                @for($i=0; $i<count($users); $i++)
                    <tr>
                        <th scope="row">{{ $i+1 }}</th>
                        <td>{{ $users[$i]->name }}</td>
                        <td>{{ $users[$i]->email }}</td>
                        <td>{{ $users[$i]->role->name }}</td>
                        <td>
                            <form action="
                            @if($users[$i] -> role_id == 1)
                                {{route('admin.users.adminber',$users[$i]->id)}}
                            @else
                                {{route('admin.users.userber',$users[$i]->id)}}
                            @endif" method="post">
                                @csrf
                                @method('PUT')
                                @if($users[$i] -> role_id == 1)
                                    <button type="submit" class="btn btn-success">Сделать админом</button>
                                @else
                                    <button type="submit" class="btn btn-danger">Сделать пользователем</button>
                                @endif
                            </form>
                        </td>
                        <td></td>
                    </tr>
                @endfor
            </tbody>
        </table>
    </div>
@endsection
