@extends('body.cuerpo')

@section('title', 'Login')

@section('content')
    
@if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <section class="vh-100" style="background-color: #508bfc;">
            <div class="container py-5 h-100">
              <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                  <div class="card shadow-2-strong" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                      <h3 class="mb-5">Sign in</h3>
          
                      <div data-mdb-input-init class="form-outline mb-4">
                   
                        <input type="email" name="email" class="form-control form-control-lg" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                        <label class="form-label" for="typeEmailX-2">Email</label>
                      </div>
          
                      <div data-mdb-input-init class="form-outline mb-4">
                        <input type="password" name="password" class="form-control form-control-lg" id="password" placeholder="Password"> 
              
                        <label class="form-label" for="typePasswordX-2">Password</label>
                      </div>
          
                      <!-- Checkbox -->
                      <div class="form-check d-flex justify-content-start mb-4">
                        <input class="form-check-input" type="checkbox" value="" id="form1Example3" />
                        <label class="form-check-label" for="form1Example3"> Remember password </label>
                      </div>
                      <button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
                      
          
                      <hr class="my-4">
          
                      <button data-mdb-button-init data-mdb-ripple-init class="btn btn-lg btn-block btn-primary" style="background-color: #dd4b39;"
                        type="submit"><i class="fab fa-google me-2"></i> Sign in with google</button>
                      <button data-mdb-button-init data-mdb-ripple-init class="btn btn-lg btn-block btn-primary mb-2" style="background-color: #3b5998;"
                        type="submit"><i class="fab fa-facebook-f me-2"></i>Sign in with facebook</button>
                    </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>


@endsection()