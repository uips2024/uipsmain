<div class="row">
       <div class="col-lg-12">
           <div class="form-group">
            <label for="cur_desc">{{__('Description')}}</label>
            <input type="text" placeholder="Description" name="cur_desc" id="cur_desc" class="form-control" @if(isset($curriculum)) value="{{$curriculum['cur_desc']}}" @endif required>
           </div>
        </div>
    
     
     
</div>
