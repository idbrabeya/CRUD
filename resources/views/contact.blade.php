@extends('master')
@section('main_master')
<div class="container">
    <div class="row">
        <div class="col-8 m-auto">
            <div class="card">
                <div class="card-header bg-info text-center">
                     <h2>Contact Form</h2>

                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('contact.insert') }}">
                        @csrf
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Name</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" name="guest_name" value="{{  old('guest_name') }}">
                          @error('guest_name')
                               <span class='text-danger'>{{ $message }}</span>
                          @enderror
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputPassword1" class="form-label">email address</label>
                          <input type="text" class="form-control" id="exampleInputPassword1" name="guest_email" value="{{ old('guest_email') }}">
                          @error('guest_email')
                               <span class='text-danger'>{{ $message }}</span>
                          @enderror
                        </div>
                        <div class="mb-3 form-check">
                          <label class="form-check-label" for="exampleCheck1">Message</label>
                          <textarea name="guest_message" id="" class="form-control" rows="6">
                              {{ old('guest_message') }}
                          </textarea>
                          @error('guest_message')
                               <span class='text-danger'>{{ $message }}</span>
                          @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                      @if (session('message'))
                      <div class="alert alert-success mt-3">
                        {{ session('message') }}
                  </div>
                      @endif

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
