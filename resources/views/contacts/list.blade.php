@extends('layouts.master')
@section('content')
<div class="card">
    <div class="card-body">
        <a class="btn btn-success float-right btn-sm" href="{{ url('contacts/create')}}">+ Add Contacts</a>
        <table id="example1" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>Salutation</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Date of Birth</th>
                <th>Email</th>
                  <th>Type</th>
                <th>Number</th>
                <th>Photo</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($contacts as $key=>$contact)

                <tr>
                    <td>{{$contact->salutation}}</td>
                    <td>{{$contact->first_name}}</td>
                    <td>{{$contact->last_name}}</td>
                    <td>{{$contact->date_of_birth}}</td>
                    <td>{{$contact->email}}</td>

                    <td > @foreach($contact->contact_numbers as $type) <p>{{$type->type }}</p>
                        @endforeach</td>

                    <td > @foreach($contact->contact_numbers as $number) <p>{{$number->number }}</p>
                        @endforeach</td>

                    <td>
                      @if($contact->photo)
                        <img src="{{ asset('/upload/contact_images/'.$contact->photo)}}" height="100px" width="120px">
                      @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
          <nav aria-label="...">
            <ul class="pagination justify-content-center">
              <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
              </li>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item active" aria-current="page">
                <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
              </li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item">
                <a class="page-link" href="#">Next</a>
              </li>
            </ul>
          </nav>
    </div>
  </div>
@endsection
