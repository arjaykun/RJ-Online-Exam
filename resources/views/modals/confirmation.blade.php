
<div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Are you sure you want to delete this {{ $title }}?</div>
      <div class="modal-footer">

        <form action="{{ $action }}" method="post" id="form">
          @csrf
          @method('DELETE')

          <button class="btn btn-primary" type="submit">Yes</button>
        </form>
        <button class="btn btn-secondary" type="button" data-dismiss="modal">No</button>
          
      </div>
    </div>
  </div>

</div>
