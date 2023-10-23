@extends('layouts.auth.app')

@section('container')
  <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

          <div class="card mb-3">

            <div class="card-body">

              <div class="pt-2 pb-2">
                <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
              </div>

              @if ($errors->any() || session()->has('alert'))
                <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert">
                  {{ $errors->first() ?? session('alert') }}
                  <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              @endif

              @if (session('success'))
                <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
                  {{ session('success') }}
                  <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              @elseif(session('warning'))
                <div class="alert alert-warning bg-warning border-0 alert-dismissible fade show" role="alert">
                  {{ session('warning') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              @elseif(session('danger'))
                <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert">
                  {{ session('danger') }}
                  <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              @endif

              <form class="row g-3" action="{{ route('login') }}" method="POST">
                @csrf
                <div class="col-12">
                  <label for="yourEmail" class="form-label">Your Email</label>
                  <input type="hidden" name="secret_token" value="{your session token value}">
                  <input type="email" name="email" class="form-control" id="yourEmail" required>
                </div>

                <div class="col-12">
                  <label for="yourPassword" class="form-label">Password</label>
                  <input type="password" name="password" class="form-control" id="yourPassword" required>
                </div>

                <div class="col-12">
                  <button class="btn btn-primary w-100" type="submit">Login</button>
                </div>
              </form>

            </div>
          </div>

        </div>
      </div>
    </div>

  </section>
@endsection