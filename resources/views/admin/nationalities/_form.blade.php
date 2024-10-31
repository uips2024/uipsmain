<div class="row">
       <div class="col-lg-12">
           <div class="form-group">
            <label for="nat_desc">{{__('Description')}}</label>
            <input type="text" placeholder="Description" name="nat_desc" id="nat_desc" class="form-control" @if(isset($nationality)) value="{{$nationality['nat_desc']}}" @endif required>
           </div>
        </div>
    
     
     
</div>
