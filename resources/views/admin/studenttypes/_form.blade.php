<div class="row">
       <div class="col-lg-12">
           <div class="form-group">
            <label for="stud_type_desc">{{__('Description')}}</label>
            <input type="text" placeholder="Description" name="stud_type_desc" id="stud_type_desc" class="form-control" @if(isset($studenttype)) value="{{$studenttype['stud_type_desc']}}" @endif required>
           </div>
        </div>
    
     
     
</div>
