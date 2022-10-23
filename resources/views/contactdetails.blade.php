@extends('master')

@section("main_master")
<div class="container">
    <div class="row">
        <div class="col-8 m-auto">
            <div class="card">
                <div class="card-header bg-info text-center">
                          <h2>Contact Details</h2>
                </div>
                <div class="card-body">
                   <table class="table table-bordered">
                       <tr >
                            <td>Guest Name</td>
                            <td>{{  $contact->guest_name }}</td>

                       </tr>
                       <tr>
                        <td>Guest Email</td>
                        <td>{{  $contact->guest_email }}</td>
                   </tr>
                   <tr>
                    <td>Guest Message</td>
                    <td>{{  $contact->guest_message }}</td>
               </tr>
               <tr>
                <td>Message Sent</td>
                <td>{{ $contact->created_at->diffForHumans() }}</td>
           </tr>
                   </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
