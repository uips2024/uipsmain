<div class="row">
       <div class="col-lg-12">
           <div class="form-group">
            <label for="stat_desc">{{__('Description')}}</label>
            <input type="text" placeholder="Description" name="stat_desc" id="stat_desc" class="form-control" @if(isset($status)) value="{{$status['stat_desc']}}" @endif required>
           </div>
        </div>
    
     
     
</div>
