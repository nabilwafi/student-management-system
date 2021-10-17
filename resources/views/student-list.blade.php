<div class="card mb-3">
  <img src="https://cdn.pixabay.com/photo/2016/01/19/17/53/writing-1149962_960_720.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">List of students</h5>
    <p class="card-text">You can find here all the informations about students in the system</p>
  </div>
  <div class="card-body">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">CNE</th>
          <th scope="col">First Name</th>
          <th scope="col">Last Name</th>
          <th scope="col">Age</th>
          <th scope="col">Speciality</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($students as $student)
        <tr>
          <th scope="row">{{ $student->cne }}</th>
          <td>{{ $student->firstName }}</td>
          <td>{{ $student->lastName }}</td>
          <td>{{ $student->age }}</td>
          <td>{{ $student->speciality }}</td>
          <td>
            <a href="{{ route('student.show', $student->id) }}" class="btn btn-sm btn-info">Show</a>
            <a href="{{ route('student.edit', $student->id) }}" class="btn btn-sm btn-warning">Edit</a>
            <a href="{{ route('student.delete', $student->id) }}" class="btn btn-sm btn-danger">Delete</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

