@extends('layouts.manage')

@section('content')
  <div class="flex-container">
    <div class="columns m-t-10 m-b-0">
      <div class="column">
        <h1 class="title is-admin is-4">All participants in {{$event->title}} Show</h1>
      </div>
    </div>

    <hr class="m-t-0">

    <table class="table">
      <thead>
        <tr>
          <th>Breed</th>
          <th>Dog name</th>
          <th>Sex</th>
          <th>Owner</th>
          <th style="text-align:center;">Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($dogsInShow as $dogInShow)
          <tr>
            <td>{{$dogInShow->dogs->breeds->breed}}</td>
            <td>{{$dogInShow->dogs->dog_name}}</td>
            <td>{{$dogInShow->dogs->sex}}</td>
            <td>{{$dogInShow->dogs->owner}}</td>
            <td>
                @foreach($dogInShow->results as $result)
                  @if ($result->status_first_round)
                  <a class="button is-primary is-pulled-right backend-btn" disabled>
                    Judge
                  </a>
                  @else

                <a href="{{route('results.create', $dogInShow->id)}}" class="button is-primary is-pulled-right backend-btn">
                  Judge
                </a>
                @endif
              @endforeach
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>

  </div><!-- End of .flex-container -->
@endsection
