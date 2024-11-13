<div class="row">
       <div class="col-lg-12">
           <div class="form-group">
            <label for="mod_desc">{{__('Description')}}</label>
            <input type="text" placeholder="Description" name="mod_desc" id="mod_desc" class="form-control" @if(isset($mode)) value="{{$mode['mod_desc']}}" @endif required>
           </div>
        </div>
    
     
     
</div>
