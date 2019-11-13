<!-- index.blade.php -->
@extends('forms.master')
@section('title', 'List objects')

@section('sidebar')
  @parent
  This is my test
@endsection
@section('maincontent')
  @parent
    <br />
@unless (Auth::check())
    You are not signed in.
@endunless
@guest
    The user is not authenticated...
@endguest
      @if (\Session::has('success'))
        <p>{{ \Session::get('success') }}</p>
      <br />
      @endif
    <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>CoinName</th>
        <th>CoinPrice</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($forms as $form)
      <tr>
        <td>{{$form['id']}}</td>
        <td>{{$form['coinname']}}</td>
        <td>{{$form['coinprice']}}</td>
        <td><a href="{{action('FormController@edit', $form['id'])}}" class="btn btn-warning">Edit</a></td>
        <td>
          <form action="{{action('FormController@destroy', $form['id'])}}" method="post">
            {{csrf_field()}}
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection