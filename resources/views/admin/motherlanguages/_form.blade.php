<div class="row">
       <div class="col-lg-12">
           <div class="form-group">
            <label for="lang_desc">{{__('Description')}}</label>
            <input type="text" placeholder="Description" name="lang_desc" id="lang_desc" class="form-control" @if(isset($motherlanguage)) value="{{$motherlanguage['lang_desc']}}" @endif required>
           </div>
        </div>
    
     
     
</div>
