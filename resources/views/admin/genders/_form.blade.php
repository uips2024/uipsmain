<div class="row">
       <div class="col-lg-12">
           <div class="form-group">
            <label for="gen_desc">{{__('Description')}}</label>
            <input type="text" placeholder="Description" name="gen_desc" id="gen_desc" class="form-control" @if(isset($gender)) value="{{$gender['gen_desc']}}" @endif required>
           </div>
        </div>
    
     
     
</div>
