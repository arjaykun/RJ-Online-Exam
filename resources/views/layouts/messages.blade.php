@if ($errors->all())
 <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Whoops! </strong> Something went wrong, Please try again!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
 </div>
@elseif(session('class_added'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Congrats! </strong> {!! session('class_added') !!}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
@elseif(session('class_updated'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Congrats! </strong> {!! session('class_updated') !!}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
@elseif(session('class_deleted'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Congrats! </strong> {!! session('class_deleted') !!}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
@elseif(session('test_added'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Congrats! </strong> {!! session('test_added') !!}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
@elseif(session('test_updated'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Congrats! </strong> {!! session('test_updated') !!}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
@elseif(session('test_deleted'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Congrats! </strong> {!! session('test_deleted') !!}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
@elseif(session('test_activated'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Congrats! </strong> {!! session('test_activated') !!}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
@elseif(session('test_deactivated'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Congrats! </strong> {!! session('test_deactivated') !!}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
@elseif(session('question_added'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Congrats! </strong> {!! session('question_added') !!}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
@elseif(session('question_updated'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Congrats! </strong> {!! session('question_updated') !!}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
@elseif(session('question_deleted'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Congrats! </strong> {!! session('question_deleted') !!}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
@elseif(session('student_added'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Congrats! </strong> {!! session('student_added') !!}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
@elseif(session('student_updated'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Congrats! </strong> {!! session('student_updated') !!}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
@elseif(session('student_deleted'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Congrats! </strong> {!! session('student_deleted') !!}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
@elseif(session('student_enrolled'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Congrats! </strong> {!! session('student_enrolled') !!}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
@elseif(session('student_unenrolled'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Congrats! </strong> {!! session('student_unenrolled') !!}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
@elseif(session('user_added'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Congrats! </strong> {!! session('user_added') !!}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
@elseif(session('user_updated'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Congrats! </strong> {!! session('user_updated') !!}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
@elseif(session('user_deleted'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Congrats! </strong> {!! session('user_deleted') !!}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
@elseif(session('password_changed'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Congrats! </strong> {!! session('password_changed') !!}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif