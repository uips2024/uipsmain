<div class="row">
       <div class="col-lg-12">
           <div class="form-group">
            <label for="grd_desc">{{__('Description')}}</label>
            <input type="text" placeholder="Description" name="grd_desc" id="grd_desc" class="form-control" @if(isset($grade)) value="{{$grade['grd_desc']}}" @endif required>
           </div>
        </div>
    
     
     
</div>
