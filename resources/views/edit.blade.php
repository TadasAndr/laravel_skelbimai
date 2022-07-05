@extends('layouts/navbar')

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
            <th scope="col">Veiksmas</th>
        </tr>
        </thead>

        <tbody>
        <tr>
            <form style="display: inline" method="POST" action="{{route('admin.update', ['admin' => $user->id])}}">
                @csrf
                @method('PUT')

                <th scope="row">{{$user->id}}</th>
                <td><input name="name" value="{{$user->name}}"/></td>
                <td><input name="email" value="{{$user->email}}"/></td>
                <td>
                    <input type='hidden' value='0' name='is_admin'>
                    <input type="checkbox" value="1" name="is_admin" @if($user->is_admin) checked @endif>
                </td>
                <td>{{$user->created_at}}</td>


            <td>
                    <button type="submit" class="btn btn-warning">Atnaujinti</button>
            </form>
            <form style="display: inline" method="POST" action="{{route('admin.destroy', ['admin' => $user->id])}}">
                @csrf
                @method('DELETE')


                <button class="btn btn-danger">Trinti</button>
            </form>

            </td>

        </tr>


        </tbody>
    </table>

@endsection
