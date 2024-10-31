<div class="row">
       <div class="col-lg-12">
           <div class="form-group">
            <label for="birth_name">{{__('Description')}}</label>
            <input type="text" placeholder="Description" name="birth_name" id="birth_name" class="form-control" @if(isset($birthcountry)) value="{{$birthcountry['birth_name']}}" @endif required>
           </div>
        </div>
    
     
     
</div>
