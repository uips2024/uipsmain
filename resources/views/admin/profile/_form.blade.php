<div class="row">

    <div class="col-lg-3">
        <div class="card card-primary">
            <div class="card-header">
                <h5 class="card-title" style="text-align: center!important;float: unset;">
                    {{ __('Profile Picture') }}
                </h5>
            </div>
            <div class="card-body p-3">
            <img class="img-thumbnail"
                    src="@if (!empty(auth()->guard('admin')->user()->pic_emp)) {{ url('uploads/signature/' . auth()->guard('admin')->user()->pic_emp) }} @else {{ url('img/no-image.png') }} @endif"
                    alt="{{ __('pic_emp') }}">
            </div>
            <div class="input-group form-group mb-2">
                <input type="file" accept = 'image/jpeg , image/jpg, image/gif, image/png' name="pic_emp">
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card card-primary">
            <div class="card-header">
                <h5 class="card-title" style="text-align: center!important;float: unset;">
                    {{ __('Signature') }}
                </h5>
            </div>
            <div class="card-body p-3">
                <img class="img-thumbnail"
                    src="@if (!empty(auth()->guard('admin')->user()->signature)) {{ url('uploads/signature/' . auth()->guard('admin')->user()->signature) }} @else {{ url('img/no-image.png') }} @endif"
                    alt="{{ __('signature') }}">
                <br>
            </div>
            <div class="input-group form-group mb-2">

                <input type="file" accept = 'image/jpeg , image/jpg, image/gif, image/png' name="signature">
            </div>
        </div>


    </div>

</div>



<div class="row">
    <div class="col-lg-12">
        <div class="card card-primary">
            <div class="card-header">
                <h5 class="card-title">
                    {{ __('Personal Information') }}
                </h5>

            </div>
        </div>

        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="id_number">{{ __('ID Number') }}</label>
                    <div class="input-group form-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                            </span>
                        </div>
                        <input type="text" class="form-control" name="id_number" placeholder="{{ __('ID Number') }}"
                            id="id_number" @if (isset($user)) value="{{ $user->id_number }}" @endif
                            required>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="user_id">{{ __('User ID') }}</label>
                    <div class="input-group form-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                            </span>
                        </div>
                        <input type="text" class="form-control" name="user_id" placeholder="{{ __('User ID') }}"
                            id="user_id" @if (isset($user)) value="{{ $user->user_id }}" @endif
                            required>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="username">{{ __('Username') }}</label>
                    <div class="input-group form-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                            </span>
                        </div>
                        <input type="text" class="form-control" name="username" placeholder="{{ __('Username') }}"
                            id="username" @if (isset($user)) value="{{ $user->username }}" @endif
                            required>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="first_name">{{ __('First Name') }}</label>
                    <div class="input-group form-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                            </span>
                        </div>
                        <input type="text" class="form-control" name="first_name"
                            placeholder="{{ __('First Name') }}" id="first_name"
                            @if (isset($user)) value="{{ $user->first_name }}" @endif required>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="middle_name">{{ __('Middle Name') }}</label>
                    <div class="input-group form-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                            </span>
                        </div>
                        <input type="text" class="form-control" name="middle_name"
                            placeholder="{{ __('Middle Name') }}" id="middle_name"
                            @if (isset($user)) value="{{ $user->middle_name }}" @endif required>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="last_name">{{ __('Last Name') }}</label>
                    <div class="input-group form-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                            </span>
                        </div>
                        <input type="text" class="form-control" name="last_name" placeholder="{{ __('Last Name') }}"
                            id="last_name" @if (isset($user)) value="{{ $user->last_name }}" @endif
                            required>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="dob">{{ __('Date of Birth') }}</label>
                    <div class="input-group form-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                            </span>
                        </div>
                        <input type="text" class="form-control datepicker" name="dob"
                            placeholder="{{ __('Date of Birth') }}" id="dob"
                            @if (isset($user)) value="{{ $user->dob }}" @endif required>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="gender">{{ __('Gender') }}</label>
                    <div class="input-group form-group mb-3">

                        <select class="form-control" name="gen_id" id="gender">
                            @if (isset($user) && isset($user['gender']))
                                <option value="{{ $user['gender']['gen_id'] }}" selected>
                                    {{ $user['gender']['gen_desc'] }}
                                </option>
                            @endif
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="nat_id">{{ __('Nationality') }}</label>
                    <div class="input-group form-group mb-3">

                        <select class="form-control" name="nat_id" id="nationality">
                            @if (isset($user) && isset($user['nationality']))
                                <option value="{{ $user['nationality']['nat_id'] }}" selected>
                                    {{ $user['nationality']['nat_desc'] }}
                                </option>
                            @endif
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="birth_id">{{ __('Birth Country') }}</label>
                    <div class="input-group form-group mb-3">

                        <select class="form-control" name="birth_id" id="birthcountry">
                            @if (isset($user) && isset($user['birthcountry']))
                                <option value="{{ $user['birthcountry']['birth_id'] }}" selected>
                                    {{ $user['birthcountry']['birth_name'] }}
                                </option>
                            @endif
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="rel_id">{{ __('Religion') }}</label>
                    <div class="input-group form-group mb-3">


                        <select class="form-control" name="rel_id" id="religion">
                            @if (isset($user) && isset($user['religion']))
                                <option value="{{ $user['religion']['rel_id'] }}" selected>
                                    {{ $user['religion']['rel_desc'] }}
                                </option>
                            @endif
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="cat_id">{{ __('Category') }}</label>
                    <div class="input-group form-group mb-3">

                        <select class="form-control" name="cat_id" id="category">
                            @if (isset($user) && isset($user['category']))
                                <option value="{{ $user['category']['cat_id'] }}" selected>
                                    {{ $user['category']['cat_desc'] }}
                                </option>
                            @endif
                        </select>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="form-group">
                    <label for="lrn">{{ __('L.R.N') }}</label>
                    <div class="input-group form-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                            </span>
                        </div>
                        <input type="text" class="form-control" name="lrn" placeholder="{{ __('L.R.N') }}"
                            id="lrn" @if (isset($user)) value="{{ $user->lrn }}" @endif
                            required>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="form-group">
                    <label for="stat_id">{{ __('Status') }}</label>
                    <div class="input-group form-group mb-3">

                        <select class="form-control" name="stat_id" id="status">
                            @if (isset($user) && isset($user['status']))
                                <option value="{{ $user['status']['stat_id'] }}" selected>
                                    {{ $user['status']['stat_desc'] }}
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
    <div class="col-lg-6">
        <div class="card card-primary">
            <div class="card-header">
                <h5 class="card-title">
                    {{ __('Account Information') }}
                </h5>

            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group">
                <label for="email">{{ __('Email Address') }}</label>
                <div class="input-group form-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>
                    <input type="email" class="form-control" placeholder="{{ __('Email Address') }}"
                        name="email" id="email"
                        @if (isset($user)) value="{{ $user->email }}" @endif required>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group">
                <label for="password">{{ __('Password') }}</label>
                <div class="input-group form-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fa fa-key" aria-hidden="true"></i>
                        </span>
                    </div>
                    <input type="password" class="form-control" placeholder="{{ __('Password') }}" name="password"
                        id="password">

                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group">
                <label for="password">{{ __('Password Confirmation') }}</label>
                <div class="input-group form-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fa fa-key" aria-hidden="true"></i>
                        </span>
                    </div>
                    <input type="password" class="form-control" placeholder="{{ __('Password Confirmation') }}"
                        name="password_confirmation" id="password_confirmation">

                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card card-primary">
            <div class="card-header">
                <h5 class="card-title">
                    {{ __('Contact Details') }}
                </h5>

            </div>
        </div>


        <div class="col-lg-12">
            <div class="form-group">
                <label for="cont_address">{{ __('Address') }}</label>
                <div class="input-group form-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fa fa-map" aria-hidden="true"></i>
                        </span>
                    </div>
                    <input type="text" class="form-control" placeholder="{{ __('Address') }}"
                        name="cont_address" id="cont_address"
                        @if (isset($user)) value="{{ $user->cont_address }}" @endif required>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group">
                <label for="cont_email_address">{{ __('Email Address') }}</label>
                <div class="input-group form-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>
                    <input type="email" class="form-control" placeholder="{{ __('Email Address') }}"
                        name="cont_email_address" id="cont_email_address"
                        @if (isset($user)) value="{{ $user->cont_email_address }}" @endif required>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group">
                <label for="cont_additional_email_address">{{ __('Additional Email') }}</label>
                <div class="input-group form-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>
                    <input type="email" class="form-control" placeholder="{{ __('Additional Email') }}"
                        name="cont_additional_email_address" id="cont_additional_email_address"
                        @if (isset($user)) value="{{ $user->cont_additional_email_address }}" @endif
                        required>
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
                    {{ __('Parent Contact') }}
                </h5>

            </div>
        </div>

        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="parent_name">{{ __('Name') }}</label>
                    <div class="input-group form-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                            </span>
                        </div>
                        <input type="text" class="form-control" name="parent_name"
                            placeholder="{{ __('Name') }}" id="parent_name"
                            @if (isset($user)) value="{{ $user->parent_name }}" @endif required>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="form-group">
                    <label for="parent_address">{{ __('Address') }}</label>
                    <div class="input-group form-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                            </span>
                        </div>
                        <input type="text" class="form-control" name="parent_address"
                            placeholder="{{ __('Address') }}" id="parent_address"
                            @if (isset($user)) value="{{ $user->parent_address }}" @endif required>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="parent_email">{{ __('Email Address') }}</label>
                    <div class="input-group form-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">

                            </span>
                        </div>
                        <input type="email" class="form-control" placeholder="{{ __('Email Address') }}"
                            name="parent_email" id="parent_email"
                            @if (isset($user)) value="{{ $user->parent_email }}" @endif required>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="parent_additional_email">{{ __('Additional Email Address') }}</label>
                    <div class="input-group form-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">

                            </span>
                        </div>
                        <input type="email" class="form-control" placeholder="{{ __('Email Address') }}"
                            name="parent_additional_email" id="parent_additional_email"
                            @if (isset($user)) value="{{ $user->parent_additional_email }}" @endif
                            required>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="parent_phone">{{ __('Phone') }}</label>
                    <div class="input-group form-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                            </span>
                        </div>
                        <input type="text" class="form-control" name="parent_phone"
                            placeholder="{{ __('Phone') }}" id="parent_phone"
                            @if (isset($user)) value="{{ $user->parent_phone }}" @endif required>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="parent_additional_phone">{{ __('Additional Phone') }}</label>
                    <div class="input-group form-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                            </span>
                        </div>
                        <input type="text" class="form-control" name="parent_additional_phone"
                            placeholder="{{ __('Additional Phone') }}" id="parent_additional_phone"
                            @if (isset($user)) value="{{ $user->parent_additional_phone }}" @endif
                            required>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
