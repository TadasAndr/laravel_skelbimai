@extends("layouts/navbar")

@section('content')

    @isset($message)
        <p style="font-weight: bold" class="text-uppercase text-success">{{$message}}</p>
    @endisset

    <table class="table">

        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Vardas/Pavardė</th>
            <th scope="col">El. paštas</th>
            <th scope="col">Ar admin?</th>
            <th scope="col">Sukurtas</th>
            <th scope="col">Atnaujintas</th>
            <th scope="col">Veiksmas</th>
        </tr>
        </thead>

        <tbody>

        @foreach($users as $user)

            <tr>
                <th scope="row">{{$user->id}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>
                    <input disabled type="checkbox" name="is_admin" @if($user->is_admin) checked @endif>
                </td>
                <td>{{$user->created_at}}</td>
                <td>{{$user->updated_at}}</td>
                <td>
                    <form method="GET" action="{{route('admin.edit', ['admin' => $user->id])}}">
                        <button class="btn btn-warning">Redaguoti</button>
                    </form>
                </td>
            </tr>

        @endforeach

        </tbody>
    </table>

    {{$users->links()}}
@endsection
