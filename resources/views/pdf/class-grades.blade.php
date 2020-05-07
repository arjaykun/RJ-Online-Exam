<html>
<head>
	
    <style>
        /** 
            Set the margins of the page to 0, so the footer and the header
            can be of the full height and width !
         **/
        @page {
            margin: 0cm 0cm;
        }

        /** Define now the real margins of every page in the PDF **/
        body {
            margin-top: 3cm;
            margin-left: 2cm;
            margin-right: 2cm;
            margin-bottom: 2cm;
            font-family: Arial, Helvetica, sans-serif !important;
            font-size: 12px;
        }

        /** Define the header rules **/
        header {
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 3cm;
            border-bottom: 1px solid #ccc;
            background-color: #4e73df;
            color: #f7f7f7;
        }

        /** Define the footer rules **/
        footer {
            position: fixed; 
            bottom: 0cm; 
            left: 0cm; 
            right: 0cm;
            height: 2cm;
            border-top: 1px solid #ccc;
            background-color: #4e73df;
            color: #f7f7f7;
        }

         .page-number:before {
          content: "Page - " counter(page);
        }

        .container {
        	width: 95%;
        	margin: auto;
        }

        th, td {
        	padding: 2px 8px;
        }

        .text-center {
        	text-align: center;
        }
        .bold	{
        	font-weight: bold;
        }
        .thead {
        	background-color: #4e73df;
        	color: #f7f7f7;
        }
        .summary {
        	margin-top: 10px;
        	background-color: #bbb;
        	padding: 8px 2px;

        }
        .red {
            background-color: #e74a3b;
        }
    </style>
</head>
<body>
    <!-- Define header and footer blocks before your content -->
    <header>
       <h1 class="text-center">
	      	<i class="fas fa-registered"></i>
	     		RJ-Online Exam</h1>
       <h4 class="text-center">
       	{{ $class->section }} - {{ $class->subject_full }} <br>
       	{{ now()->format('M d, Y') }}
       </h4>
    </header>

    <footer>
       <h5 class="text-center"><span class="page-number"></span></h5>
    </footer>

    <!-- Wrap the content of your PDF inside a main tag -->
    <main>
        <h4 class="text-center bold">
        	Grade List <br>
        	Prepared By: <i>{{ $class->user->full_name }}</i>
        </h4>
        <table class="container">
        	<tr class="thead">
        		<th>#</th>
        		<th>Student I.D.</th>
        		<th>Name</th>
                <th>Test Taken ({{ $class->tests_count }})</th>
                <th>Partial Grade</th>
        		<th>Total Grade</th>
        	</tr>
     			@php
     				$highest = 0;
     				$h_users = [];	
     			@endphp
        	@foreach ($class->student_profiles as $student)
             @php  
                $avg = round($student->user->grades->sum('grade')/ $class->tests_count, 2);
             @endphp
	          <tr class="@if($avg <= 50) red @endif">
	          	<td>{{ $loop->iteration }}</td>
				<td>{{ $student->student_id }}</td>
				<td>{{ $student->user->full_name_2 }}</td>
                <td>{{ $student->user->grades->count() }}</td>
                <td>{{ $student->user->grades->avg('grade') ?? 0}}%</td>
				@if ($student->user->grades->isEmpty())
					<td>0%</td>
				@else
                
				 <td>{{ $avg }}%</td>
				 @php
				    if ($avg >= $highest) {
                       if($avg == $highest) {      
                        array_push($h_users, $student->user->full_name_2);
                       } else {
                        array_splice($h_users, 0, count($h_users), $student->user->full_name_2);
                       }
                       $highest = $avg;
                    }
				 @endphp      
				@endif	 

	          </tr>
	        @endforeach


        </table>
			
        <div class="container summary">
        	<h3 class="text-center">Summary</h3>
	        <strong>Total Students:</strong> {{ $class->student_profiles->count() }} <br> 
            <strong>Total Test Available:</strong> {{ $class->tests_count }} <br>       
            <strong>Total Tests Taken:</strong> {{ $class->grades->count()}} <br>        
            <strong>Avg Grade (tests taken only):</strong> {{ round($class->avg_grade,2) }}% <br>
	        <strong>Highest Grade:</strong> {{ $highest }}% ( 
						@foreach ($h_users as $user)
							{{ $user }} @if(!$loop->last) | @endif
						@endforeach
	        )

        </div>
    </main>
</body>
</html>