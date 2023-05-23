@extends('layouts.studentLayout')

@section('page title')
    {{ $course->course_name }} | Students
@endsection

@section('content')
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Data Table</strong>
                            <button onclick="downloadTableAsPdf('{{ $course->course_name }}')" class="btn btn-success ml-3"
                                style="border-radius: 15px">Export PDF</button>
                        </div>

                        <div class="card-body">
                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Username</th>
                                        <th>Phone number</th>
                                        <td>Degree</td>
                                        <td></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($students as $student)
                                        <tr>
                                            <td>2300{{ $student->id }}</td>
                                            <td>{{ $student->user->first_name }} {{ $student->user->last_name }}</td>
                                            <td>{{ $student->user->email }}</td>
                                            <td>{{ $student->user->username }}</td>
                                            <td>{{ $student->user->phone_number }}</td>
                                            <td>
                                                @php
                                                    $done = false;
                                                    $mark = 0.00;
                                                @endphp
                                                @foreach ($student->degrees as $degree)
                                                    @if ($degree->course_id == $course->id)
                                                        {{ $degree->degree }}
                                                        @php
                                                            $done = true;
                                                            $mark = $degree->degree;
                                                        @endphp
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>
                                                <button style="border: none; cursor:pointer"
                                                    onclick="alert('edit button')"
                                                    class="text text-success"
                                                    @if ($done) disabled @endif>Mark</button>
                                                    |
                                                    <button style="border: none; cursor:pointer"
                                                    onclick="Edit('{{ $course->id }}', '{{ $student->id }}', {{$mark}})"
                                                    class="text text-info"
                                                    @if(!$done)
                                                    disabled
                                                    @endif
                                                    >Edit</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <script>
        function downloadTableAsPdf(courseName) {

            // Retrieve the table element
            var originalTable = document.getElementById("bootstrap-data-table-export");

            // Clone the table element
            var clonedTable = originalTable.cloneNode(true);

            // Exclude the last column in the cloned table
            var lastColumnIndex = clonedTable.rows[0].cells.length - 1;
            for (var i = 0; i < clonedTable.rows.length; i++) {
                clonedTable.rows[i].deleteCell(lastColumnIndex);
            }
            var options = {
                filename: courseName + ' - students.pdf',
                image: {
                    type: 'jpeg',
                    quality: 0.98
                },
                html2canvas: {
                    scale: 2
                },
                jsPDF: {
                    unit: 'in',
                    format: 'letter',
                    orientation: 'portrait'
                }
            };


            html2pdf().from(clonedTable).set(options).save();
        }

        function mark(courseId, studentId) {
            var degree = prompt('Please enter the mark:');

            $.ajax({
                url: '/professor/courses/student/mark',
                type: 'POST',
                dataType: 'json',
                data: {
                    degree: degree,
                    courseID: courseId,
                    studentID: studentId,
                },
                success: function(response) {
                    location.reload();
                },
                error: function(xhr, status, error) {
                    var statusCode = xhr.status; // Get the status code
                    var responseText = xhr.responseText; // Get the response text

                    alert('Error adding mark. Status Code: ' + statusCode + ', Response: ' + responseText);
                }
            });
        }

        function Edit(courseId, studentId, mark) {
            var degree = prompt('Please enter the mark:', mark);

            $.ajax({
                url: '/professor/courses/student/edit-mark',
                type: 'POST',
                dataType: 'json',
                data: {
                    degree: degree,
                    courseID: courseId,
                    studentID: studentId,
                    _token: '{{ csrf_token() }}',
                },
                success: function(response) {
                    location.reload();
                },
                error: function(xhr, status, error) {
                    var statusCode = xhr.status; // Get the status code
                    var responseText = xhr.responseText; // Get the response text

                    alert('Error adding mark. Status Code: ' + statusCode + ', Response: ' + responseText);
                
                }
            });
        }
    </script>
@endsection
