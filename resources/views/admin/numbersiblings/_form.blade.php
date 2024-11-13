<div class="row">
       <div class="col-lg-12">
           <div class="form-group">
            <label for="sib_desc">{{__('Description')}}</label>
            <input type="text" placeholder="Description" name="sib_desc" id="sib_desc" class="form-control" @if(isset($numbersibling)) value="{{$numbersibling['sib_desc']}}" @endif required>
           </div>
        </div>
    
     
     
</div>
