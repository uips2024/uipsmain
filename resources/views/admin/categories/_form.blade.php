<div class="row">
       <div class="col-lg-12">
           <div class="form-group">
            <label for="cat_desc">{{__('Description')}}</label>
            <input type="text" placeholder="Description" name="cat_desc" id="cat_desc" class="form-control" @if(isset($category)) value="{{$category['cat_desc']}}" @endif required>
           </div>
        </div>
    
     
     
</div>
