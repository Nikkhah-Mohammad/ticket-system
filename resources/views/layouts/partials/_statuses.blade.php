<div class="form-group">
        <label for="status">Status</label>
          <select class="form-control" id="status"  name="status" value="{{ !empty($ticket) ? $ticket->status  : '' }}">


  
            @foreach($statuses as $status)
              <option value="{{ $status->name }}" {{ !empty($ticket) && $ticket->status ==$status->name ? "selected" :"" }} >{{ $status->name }}</option>

            @endforeach

        </select>
      </div>