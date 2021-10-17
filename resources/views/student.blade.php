<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <title>Student Management System</title>
  </head>
  <body>
    @include('navbar')
    <h3 class="text text-center my-3 font-title">Student Management System</h3>

    @if($layout == 'index')
      <div class="container-fluid mt-4">
        <section>
          @include('student-list')
        </section>
      </div>

    @elseif ($layout == 'create')
    <div class="container-fluid mt-4">
      <div class="row">
        <section class="col">
          @include('student-list')
        </section>
        <section class="col">
          <div class="card mb-3">
            <img src="https://cdn.pixabay.com/photo/2020/11/10/21/00/boy-5731001_960_720.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Enter the informations of the new student</h5>
            </div>
            <div class="card-body">
              <form action="{{ route('student.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">CNE</label>
                  <input type="text" name="cne" class="form-control" id="exampleFormControlInput1" placeholder="Enter cne">
                </div>
                <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">First Name</label>
                  <input type="text" name="firstName" class="form-control" id="exampleFormControlInput1" placeholder="Enter First Name">
                </div>
                <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">Last Name</label>
                  <input type="text" name="lastName" class="form-control" id="exampleFormControlInput1" placeholder="Enter Last Name">
                </div>
                <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">Age</label>
                  <input type="text" name="age" class="form-control" id="exampleFormControlInput1" placeholder="Enter your age">
                </div>
                <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">Speciality</label>
                  <select name="speciality" class="form-select" aria-label="Default select example">
                    <option selected>Open this select menu</option>
                    <option value="Programming">Programming</option>
                    <option value="Information System">Information System</option>
                    <option value="Math">Math</option>
                  </select>
                </div>
                <div class="mb-3">
                  <button type="submit" class="btn btn-info">Save</button>
                  <input type="reset" value="Reset" class="btn btn-danger" />
                </div>
              </form>
            </div>
          </div>
        </section>
      </div>
    </div>

    @elseif($layout == 'show')
    <div class="container-fluid mt-4">
      <div class="row">
        <section class="col">
          @include('student-list')
        </section>
        <section class="col">
          <div class="card mb-3">
            <img src="https://cdn.pixabay.com/photo/2015/07/11/19/23/book-841171_960_720.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title text-center">Student Detail</h5>
              <div class="card" style="width: 100%;">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">CNE : {{ $student->cne }}</li>
                  <li class="list-group-item">First Name : {{ $student->firstName }}</li>
                  <li class="list-group-item">Last Name : {{ $student->lastName }}</li>
                  <li class="list-group-item">Age : {{ $student->age }}</li>
                  <li class="list-group-item">Speciality : {{ $student->speciality }}</li>
                </ul>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>

    @elseif($layout == 'edit')
    <div class="container-fluid mt-4">
      <div class="row">
        <section class="col-md-7">
          @include('student-list')
        </section>
        <section class="col">
          <div class="card mb-3">
            <img src="https://cdn.pixabay.com/photo/2017/10/14/09/56/journal-2850091_960_720.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Update the informations of the student</h5>
            </div>
            <div class="card-body">
              <form action="{{ route('student.update', $student->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">CNE</label>
                  <input type="text" name="cne" class="form-control" id="exampleFormControlInput1" placeholder="Enter cne" value="{{ $student->cne }}">
                </div>
                <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">First Name</label>
                  <input type="text" name="firstName" class="form-control" id="exampleFormControlInput1" placeholder="Enter First Name" value="{{ $student->firstName }}">
                </div>
                <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">Last Name</label>
                  <input type="text" name="lastName" class="form-control" id="exampleFormControlInput1" placeholder="Enter Last Name" value="{{ $student->lastName }}">
                </div>
                <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">Age</label>
                  <input type="text" name="age" class="form-control" id="exampleFormControlInput1" placeholder="Enter your age" value="{{ $student->age }}">
                </div>
                <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">Speciality</label>
                  <select name="speciality" class="form-select" aria-label="Default select example">
                    <option>Open this select menu</option>
                    <option {{ ($student->speciality == 'Programming') ? 'selected' : '' }}  value="Programming">Programming</option>
                    <option {{ ($student->speciality == 'Information System') ? 'selected' : '' }} value="Information System">Information System</option>
                    <option {{ ($student->speciality == 'Math') ? 'selected' : '' }} value="Math">Math</option>
                  </select>
                </div>
                <div class="mb-3">
                  <button type="submit" class="btn btn-info">Update</button>
                  <input type="reset" value="Reset" class="btn btn-danger" />
                </div>
              </form>
            </div>
          </div>
        </section>
      </div>
    </div>
    @endif


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    -->
  </body>
</html>