@extends('master')

@section("main_master")
<div class="container">
    <div class="row">
        <div class="col-8 m-auto">
            <div class="card">
                <div class="card-header bg-info text-center">
                     <h2>Contact Massege List</h2>
                     <h3>Total Masseges :{{ count($contacts) }}</h3>
                </div>
                <div class="card-body">
                    @if (session('message'))
                         <div class="alert alert-info">
                             {{session('message')}}
                    </div>
                    @endif

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Guest_Name</th>
                                {{-- <th>Guest_Email</th>
                                <th>Guest_Message</th> --}}
                                <th>Message Sent Time</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($contacts as $contact)
                            <tr class="{{ ($contact->status=='unread')?'bg-secondary':'' }}">
                                <td>{{ $contact->id }}</td>
                                <td>{{ $contact->guest_name }}</td>
                                {{-- <td>{{ $contact->guest_email}}</td>
                                <td>{{ $contact->guest_message }}</td> --}}
                                <td>{{ $contact->created_at->format('d/m/Y(h:i:s A)')}}</td>
                                <td>{{ $contact->status}}</td>
                                <td>
                                    <a href="{{ route('contact.delete',$contact->id) }}" class="btn btn-danger btn-sm">Delete</a>
                                    <a href="{{ route('contact.details',$contact->id) }}" class="btn btn-success btn-sm">Details</a>
                                </td>
                            </tr>
                            @empty
                            <tr class="text-center text-danger">
                                <td colspan="50">No Message show now</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card mt-4">
                <div class="card-header bg-danger text-center">
                     <h2>Deleted Contact Massege List</h2>
                     <h3>Total Masseges :{{ count(  $contacts_delete) }}</h3>
                </div>
                <div class="card-body">


                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Guest_Name</th>
                                <th>Guest_Email</th>
                                <th>Guest_Message</th>
                                <th>Message Sent Time</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse(  $contacts_delete as  $contacts_deletes)
                            <tr>
                                <td>{{ $contacts_deletes->id }}</td>
                                <td>{{ $contacts_deletes->guest_name }}</td>
                                <td>{{ $contacts_deletes->guest_email}}</td>
                                <td>{{ $contacts_deletes->guest_message }}</td>
                                <td>{{ $contacts_deletes->created_at->format('d/m/Y(h:i:s A)')}}</td>
                                <td>
                                    <a href="{{ route('contact.Forcedelete',$contacts_deletes->id) }}" class="btn btn-danger btn-sm">Force Delete</a>
                                    <a href="{{ route('contact.restore',$contacts_deletes->id) }}" class="btn btn-info btn-sm">Restore</a>
                                </td>
                            </tr>
                            @empty
                            <tr class="text-center text-danger">
                                <td colspan="50">No Message show now</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
