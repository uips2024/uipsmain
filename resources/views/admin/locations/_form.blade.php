<div class="row">
       <div class="col-lg-12">
           <div class="form-group">
            <label for="loc_desc">{{__('Description')}}</label>
            <input type="text" placeholder="Description" name="loc_desc" id="loc_desc" class="form-control" @if(isset($location)) value="{{$location['loc_desc']}}" @endif required>
           </div>
        </div>
    
     
     
</div>
