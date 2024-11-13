<div class="row">
    <div class="col-lg-12">

        <div class="row" >
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="stud_type_id">{{ __('Type of Student') }}</label>

                            <select class="form-control" name="stud_type_id" id="studenttype">
                                @if (isset($reservation) && isset($reservation['studenttype']))
                                    <option value="{{ $reservation['studenttype']['stud_type_id'] }}" selected>
                                        {{ $reservation['studenttype']['stud_type_desc'] }}
                                    </option>
                                @endif
                            </select>




                        </div>

                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="grd_id">{{ __('Grade / Level') }}</label>
                            <select class="form-control" name="grd_id" id="grade">
                                @if (isset($reservation) && isset($reservation['grade']))
                                    <option value="{{ $reservation['grade']['grd_id'] }}" selected>
                                        {{ $reservation['grade']['grd_desc'] }}
                                    </option>
                                @endif
                            </select>
                        </div>
                    </div>

                    @can('view_reservation_admin')
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="receiptno">{{ __('Receipt No.') }}</label>
                                <input type="text" class="form-control" name="receiptno"
                                    placeholder="{{ __('Receipt No.') }}" id="receiptno"
                                    @if (isset($reservation)) value="{{$reservation['receiptno']}}" @endif>
                            </div>

                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="regno">{{ __('Student No. / Registration No.') }}</label>
                                <input type="text" class="form-control" name="regno"
                                    placeholder="{{ __('Student No. / Registration No.') }}" id="regno"
                                    @if (isset($reservation)) value="{{$reservation['regno']}}" @endif>

                            </div>

                        </div>
                    @endcan
                </div>

            </div>

        </div>
    </div>



</div>

<div @if(isset($reservation)&&$reservation['is_proceed']== 1) selected display @else hidden @endif>

    <div class="row" >
        <div class="col-lg-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h5 class="card-title">
                        {{ __('Student Basic Information') }}
                    </h5>

                </div>
            </div>



            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="mod_id">{{ __('Mode of Learning') }}</label>
                        <label style="color:red">{{ '*' }}</label>
                        <div class="input-group form-group mb-3">

                            <select class="form-control" name="mod_id" id="mode" required>
                                @if (isset($reservation) && isset($reservation['mode']))
                                    <option value="{{ $reservation['mode']['mod_id'] }}" selected>
                                        {{ $reservation['mode']['mod_desc'] }}
                                    </option>
                                @endif
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="first_name">{{ __('First Name (in Passport)') }}</label>
                        <label style="color:red">{{ '*' }}</label>
                        <div class="input-group form-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                </span>
                            </div>
                            <input type="text" class="form-control" name="first_name"
                                placeholder="{{ __('First Name') }}" id="first_name"
                                @if (isset($reservation)) value="{{$reservation['remarks2']}}" @endif required>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="middle_name">{{ __('Middle Name (in Passport)') }}</label>
                        <div class="input-group form-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                </span>
                            </div>
                            <input type="text" class="form-control" name="middle_name"
                                placeholder="{{ __('Middle Name') }}" id="middle_name"
                                @if (isset($reservation)) value="{{$reservation['remarks2']}}" @endif required>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="last_name">{{ __('Last Name (in Passport)') }}</label>
                        <label style="color:red">{{ '*' }}</label>
                        <div class="input-group form-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                </span>
                            </div>
                            <input type="text" class="form-control" name="last_name" placeholder="{{ __('Last Name') }}"
                                id="last_name" @if (isset($reservation)) value="{{$reservation['remarks2']}}" @endif required>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="last_name">{{ __('Suffix: (ex. Jr., I, II)') }}</label>
                        <div class="input-group form-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                </span>
                            </div>
                            <input type="text" class="form-control" name="last_name" placeholder="{{ __('Last Name') }}"
                                id="last_name" @if (isset($reservation)) value="{{$reservation['remarks2']}}" @endif>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="gender">{{ __('Gender') }}</label>
                        <label style="color:red">{{ '*' }}</label>
                        <div class="input-group form-group mb-3">
                            <select class="form-control" name="gen_id" id="gender" required>
                                @if (isset($reservation) && isset($reservation['gender']))
                                    <option value="{{ $reservation['gender']['gen_id'] }}" selected>
                                        {{ $reservation['gender']['gen_desc'] }}
                                    </option>
                                @endif
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="dob">{{ __('Date of Birth') }}</label>
                        <label style="color:red">{{ '*' }}</label>
                        <div class="input-group form-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                </span>
                            </div>
                            <input type="text" class="form-control datepicker" name="dob"
                                placeholder="{{ __('Date of Birth') }}" id="dob"
                                @if (isset($reservation)) value="{{$reservation['remarks2']}}" @endif required>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="lrn">{{ __('Birth Place') }}</label>
                        <label style="color:red">{{ '*' }}</label>
                        <div class="input-group form-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                </span>
                            </div>
                            <input type="text" class="form-control" name="lrn"
                                placeholder="{{ __('Birth Place') }}" id="lrn"
                                @if (isset($reservation)) value="{{ $reservation->lrn }}" @endif required>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="nat_id">{{ __('Nationality') }}</label>
                        <label style="color:red">{{ '*' }}</label>
                        <div class="input-group form-group mb-3">

                            <select class="form-control" name="nat_id" id="nationality" required>
                                @if (isset($reservation) && isset($reservation['nationality']))
                                    <option value="{{ $reservation['nationality']['nat_id'] }}" selected>
                                        {{ $reservation['nationality']['nat_desc'] }}
                                    </option>
                                @endif
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="birth_id">{{ __('Mother Tongue / Native Language:') }}</label>
                        <label style="color:red">{{ '*' }}</label>
                        <div class="input-group form-group mb-3">

                            <select class="form-control" name="lang_id" id="motherlanguages" required>
                                @if (isset($reservation) && isset($reservation['motherlanguages']))
                                    <option value="{{ $reservation['motherlanguages']['lang_id'] }}" selected>
                                        {{ $reservation['motherlanguages']['lang_desc'] }}
                                    </option>
                                @endif
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="form-group">
                        <label for="cont_address">{{ __('Address') }}</label>
                        <label style="color:red">{{ '*' }}</label>
                        <div class="input-group form-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">

                                </span>
                            </div>
                            <input type="text" class="form-control" placeholder="{{ __('Address') }}"
                                name="cont_address" id="cont_address"
                                @if (isset($reservation)) value="{{ $reservation->cont_address }}" @endif required>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="rel_id">{{ __('Religion') }}</label>
                        <label style="color:red">{{ '*' }}</label>
                        <div class="input-group form-group mb-3">
                            <select class="form-control" name="rel_id" id="religion" required>
                                @if (isset($reservation) && isset($reservation['religion']))
                                    <option value="{{ $reservation['religion']['rel_id'] }}" selected>
                                        {{ $reservation['religion']['rel_desc'] }}
                                    </option>
                                @endif
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="rel_id">{{ __('Location / Area') }}</label>
                        <label style="color:red">{{ '*' }}</label>
                        <div class="input-group form-group mb-3">
                            <select class="form-control" name="loc_id" id="location" required>
                                @if (isset($reservation) && isset($reservation['location']))
                                    <option value="{{ $reservation['location']['loc_id'] }}" selected>
                                        {{ $reservation['location']['loc_desc'] }}
                                    </option>
                                @endif
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="cont_address">{{ __('P.O Box') }}</label>
                        <div class="input-group form-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">

                                </span>
                            </div>
                            <input type="text" class="form-control" placeholder="{{ __('Address') }}"
                                name="cont_address" id="cont_address"
                                @if (isset($reservation)) value="{{ $reservation->cont_address }}" @endif>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="cont_address">{{ __('Makani No. (For Dubai www.makani.ae) / Location:') }}</label>
                        <div class="input-group form-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">

                                </span>
                            </div>
                            <input type="text" class="form-control"
                                placeholder="{{ __('Makani No. (For Dubai www.makani.ae) / Location:') }}"
                                name="cont_address" id="cont_address"
                                @if (isset($reservation)) value="{{ $reservation->cont_address }}" @endif>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="sib_id">{{ __('Number of Siblings Currently Enrolled in UIPS') }}</label>
                        <div class="input-group form-group mb-3">

                            <select class="form-control" name="sib_id" id="numbersibling">
                                @if (isset($reservation) && isset($reservation['numbersibling']))
                                    <option value="{{ $reservation['numbersibling']['sib_id'] }}" selected>
                                        {{ $reservation['numbersibling']['sib_desc'] }}
                                    </option>
                                @endif
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <div class="row">
        <div class="col-lg-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h5 class="card-title">
                        {{ __('Parents Information') }}
                    </h5>

                </div>
            </div>





            <div class="row">

                <div class="col-lg-6">
                    <div class="card card-danger">
                        <div class="card-header">
                            <h5 class="card-title">
                                {{ __('Mother Details') }}
                            </h5>
                        </div>
                        <div class="card-body tests">
                            <div class="row">
                                <div class="col-lg-12">
                                    <label for="tin_num">{{ __('Fullname') }}</label>
                                    <label style="color:red">{{ '*' }}</label>
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">

                                                </span>
                                            </div>
                                            <input type="text" class="form-control"
                                                placeholder="{{ __('Fullname') }}" name="tin_num"
                                                @if (isset($reservation)) value="{{ $reservation['tin_num'] }}" @endif
                                                required>


                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <label for="pagibig_num">{{ __('Occupation') }}</label>
                                    <label style="color:red">{{ '*' }}</label>
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">

                                                </span>
                                            </div>
                                            <input type="text" class="form-control"
                                                placeholder="{{ __('Occupation') }}" name="pagibig_num"
                                                @if (isset($reservation)) value="{{ $reservation['pagibig_num'] }}" @endif
                                                required>


                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <label for="pagibig_num">{{ __('Employer') }}</label>
                                    <label style="color:red">{{ '*' }}</label>
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">

                                                </span>
                                            </div>
                                            <input type="text" class="form-control"
                                                placeholder="{{ __('Employer') }}" name="pagibig_num"
                                                @if (isset($reservation)) value="{{ $reservation['pagibig_num'] }}" @endif
                                                required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <label for="sss_num">{{ __('Mobile No. (e.g.: +971123456789)') }}</label>
                                    <label style="color:red">{{ '*' }}</label>
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">

                                                </span>
                                            </div>
                                            <input type="text" class="form-control"
                                                placeholder="{{ __('Mobile No. (e.g.: +971123456789)') }}" name="sss_num"
                                                @if (isset($reservation)) value="{{ $reservation['sss_num'] }}" @endif
                                                required>

                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <label for="gsis_num">{{ __('Want to receive SMS?') }}</label>
                                    <label style="color:red">{{ '*' }}</label>
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <select name="filter_status" id="filter_status"
                                                placeholder="{{ __('Want to receive SMS?') }}"
                                                class="form-control select2" required>
                                                <option value="" selected disabled>{{ __('Want to receive SMS?') }}
                                                </option>
                                                <option value="1">{{ __('Yes') }}</option>
                                                <option value="0">{{ __('No') }}</option>
                                            </select>

                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <label for="ph_num">{{ __('Email') }}</label>
                                    <label style="color:red">{{ '*' }}</label>
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">

                                                </span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="{{ __('Email') }}"
                                                name="ph_num"
                                                @if (isset($reservation)) value="{{ $reservation['ph_num'] }}" @endif
                                                required>


                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card card-danger">
                        <div class="card-header">
                            <h5 class="card-title">
                                {{ __('Father Details') }}
                            </h5>
                        </div>
                        <div class="card-body tests">
                            <div class="row">
                                <div class="col-lg-12">
                                    <label for="tin_num">{{ __('Fullname') }}</label>
                                    <label style="color:red">{{ '*' }}</label>
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">

                                                </span>
                                            </div>
                                            <input type="text" class="form-control"
                                                placeholder="{{ __('Fullname') }}" name="fb"
                                                @if (isset($reservation)) value="{{ $reservation['fb'] }}" @endif
                                                required>

                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <label for="gsis_num">{{ __('Occupation') }}</label>
                                    <label style="color:red">{{ '*' }}</label>
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">

                                                </span>
                                            </div>
                                            <input type="text" class="form-control"
                                                placeholder="{{ __('Occupation') }}" name="youtube"
                                                @if (isset($reservation)) value="{{ $reservation['youtube'] }}" @endif
                                                required>


                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <label for="gsis_num">{{ __('Employer') }}</label>
                                    <label style="color:red">{{ '*' }}</label>
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">
                                                </span>
                                            </div>
                                            <input type="text" class="form-control"
                                                placeholder="{{ __('Employer') }}" name="youtube"
                                                @if (isset($reservation)) value="{{ $reservation['youtube'] }}" @endif
                                                required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <label for="gsis_num">{{ __('Mobile No. (e.g.: +971123456789)') }}</label>
                                    <label style="color:red">{{ '*' }}</label>
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">
                                                </span>
                                            </div>
                                            <input type="text" class="form-control"
                                                placeholder="{{ __('Mobile No. (e.g.: +971123456789)') }}"
                                                name="youtube"
                                                @if (isset($reservation)) value="{{ $reservation['youtube'] }}" @endif
                                                required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <label for="gsis_num">{{ __('Want to receive SMS?') }}</label>
                                    <label style="color:red">{{ '*' }}</label>
                                    <div class="form-group">
                                        <div class="input-group mb-3">

                                            <select name="filter_status" id="filter_status"
                                                placeholder="{{ __('Want to receive SMS?') }}"
                                                class="form-control select2" required>
                                                <option value="" selected disabled>{{ __('Want to receive SMS?') }}
                                                </option>
                                                <option value="1">{{ __('Yes') }}</option>
                                                <option value="0">{{ __('No') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <label for="gsis_num">{{ __('Email') }}</label>
                                    <label style="color:red">{{ '*' }}</label>
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">

                                                </span>
                                            </div>
                                            <input type="text" class="form-control"
                                                placeholder="{{ __('Email') }}" name="youtube"
                                                @if (isset($reservation)) value="{{ $reservation['youtube'] }}" @endif
                                                required>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>




    <div class="row">
        <div class="col-lg-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h5 class="card-title">
                        {{ __('Information of the Last School Attended') }}
                    </h5>

                </div>
            </div>



            <div class="row">

                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="first_name">{{ __('Previous School Attended:') }}</label>
                        <div class="input-group form-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                </span>
                            </div>
                            <input type="text" class="form-control" name="first_name"
                                placeholder="{{ __('Previous School Attended') }}" id="first_name"
                                @if (isset($reservation)) value="" @endif>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="birth_id">{{ __('Curriculum:') }}</label>
                        <div class="input-group form-group mb-3">

                            <select class="form-control" name="cur_id" id="curriculum">
                                @if (isset($reservation) && isset($reservation['curriculum']))
                                    <option value="{{ $reservation['curriculum']['cur_id'] }}" selected>
                                        {{ $reservation['curriculum']['cur_desc'] }}
                                    </option>
                                @endif
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="middle_name">{{ __('General Average:') }}</label>
                        <div class="input-group form-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                </span>
                            </div>
                            <input type="text" class="form-control" name="middle_name"
                                placeholder="{{ __('General Average') }}" id="middle_name"
                                @if (isset($reservation)) value="" @endif>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="last_name">{{ __('Country/School Location:') }}</label>
                        <div class="input-group form-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                </span>
                            </div>
                            <input type="text" class="form-control" name="last_name"
                                placeholder="{{ __('Country/School Location') }}" id="last_name"
                                @if (isset($reservation)) value="" @endif>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="last_name">{{ __('Reason/s for Leaving/Transfer:') }}</label>
                        <div class="input-group form-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                </span>
                            </div>
                            <input type="text" class="form-control" name="last_name"
                                placeholder="{{ __('Reason/s for Leaving/Transfer') }}" id="last_name"
                                @if (isset($reservation)) value="" @endif>
                        </div>
                    </div>
                </div>


                <div class="col-lg-6">
                    <div class="form-group">
                        <label
                            for="cont_address">{{ __('KHDA No. (From Dubai)/ LRN (From Phil.)/ Student ID No. (From Sharjah):') }}</label>
                        <div class="input-group form-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">

                                </span>
                            </div>
                            <input type="text" class="form-control"
                                placeholder="{{ __('KHDA No. (From Dubai)/ LRN (From Phil.)/ Student ID No. (From Sharjah)') }}"
                                name="cont_address" id="cont_address"
                                @if (isset($reservation)) value="{{ $reservation->cont_address }}" @endif>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="row">
        <div class="col-lg-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h5 class="card-title">
                        {{ __('Declaration - Special Education Needs and Disablity') }}
                    </h5>

                </div>
            </div>



            <div class="row">
                <div class="col-lg-4">
                    <label for="gsis_num">{{ __('Does your child requires special education?') }}</label>
                    <label style="color:red">{{ '*' }}</label>
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <select name="filter_status" id="filter_status"
                                placeholder="{{ __('Want to receive SMS?') }}" class="form-control select2" required>
                                <option value="" selected disabled>
                                    {{ __('Does your child requires special education?') }}
                                </option>
                                <option value="1">{{ __('Yes') }}</option>
                                <option value="0">{{ __('No') }}</option>
                            </select>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="first_name">{{ __('Medical Diagnosis / Category:') }}</label>
                        <div class="input-group form-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                </span>
                            </div>
                            <input type="text" class="form-control" name="first_name"
                                placeholder="{{ __('Medical Diagnosis / Category:') }}" id="first_name"
                                @if (isset($reservation)) value="" @endif>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="dob">{{ __('Date of Assessment Report:') }}</label>
                        <div class="input-group form-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                </span>
                            </div>
                            <input type="text" class="form-control datepicker" name="dob"
                                placeholder="{{ __('Date of Assessment Report') }}" id="dob"
                                @if (isset($reservation)) value="" @endif>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>