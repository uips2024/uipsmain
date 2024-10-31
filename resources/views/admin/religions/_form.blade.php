<div class="row">
       <div class="col-lg-12">
           <div class="form-group">
            <label for="rel_desc">{{__('Description')}}</label>
            <input type="text" placeholder="Description" name="rel_desc" id="rel_desc" class="form-control" @if(isset($religion)) value="{{$religion['rel_desc']}}" @endif required>
           </div>
        </div>
    
     
     
</div>
