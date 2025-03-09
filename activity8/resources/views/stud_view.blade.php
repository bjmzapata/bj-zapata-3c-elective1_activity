<div>
    <a href="/insert/">add new</a>
    <table border="1">
        <tr>
            <td>id</td>
            <td>name</td>

        </tr>
        @foreach($users as $user)

        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td><a href={{"delete/".$user->id}}>delete</a></td>
            <td><a href='update/{{$user->id}}'>edit</a></td>

        </tr>
        @endforeach
    </table>
</div>
