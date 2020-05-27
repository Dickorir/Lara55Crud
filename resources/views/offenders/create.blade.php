@extends('layout')

{{-- Page title --}}
@section('title')
    Offenders
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <!-- put styling here -->
@stop
{{-- Page content --}}
@section('content')
    <h1 class="text-center">Offenders Create</h1>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    @include('notifications')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <form class="m-t" role="form"  method="POST" action="{{ route('offender.store') }}">
        {{ csrf_field() }}
        <div class="form-row">

            <div class="form-group col-md-3">
                <label for="doc_no">Document no</label>
                <input type="text" class="form-control" name="doc_no" value="{{ old('doc_no') }}" placeholder="doc_no">
            </div>

            <div class="form-group col-md-3">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="name">
            </div>
            <div class="form-group col-md-3">
                <label for="gender">Gender</label>
                <select class="custom-select form-control" name="gender" required>
                    <option value="">Select Gender</option>
                    <option value="Male" @if (old('gender') == 'Male') selected="selected" @endif>Male</option>
                    <option value="Female" @if (old('gender') == 'Female') selected="selected" @endif>Female</option>
                    <option value="Other" @if (old('gender') == 'Other') selected="selected" @endif>Other</option>
                </select>
            </div>
            <div class="form-group col-md-3">
                <label for="citizenship">Citizenship</label>
                <select class="custom-select form-control" name="citizenship" required>
                    <option value="">Select citizenship</option>
                    <option value="Kenya" @if (old('citizenship') == 'Kenya') selected="selected" @endif>Kenya</option>
                    <option value="Uganda" @if (old('citizenship') == 'Uganda') selected="selected" @endif>Uganda</option>
                    <option value="Tanzania" @if (old('citizenship') == 'Tanzania') selected="selected" @endif>Tanzania</option>
                    <option value="Other" @if (old('citizenship') == 'Other') selected="selected" @endif>Other</option>
                </select>
            </div>
            <div class="form-group col-md-3">
                <label for="race">Race</label>
                <select class="custom-select form-control" name="race" required>
                    <option value="">Select race</option>
                    <option value="Black" @if (old('race') == 'Black') selected="selected" @endif>Black</option>
                    <option value="White" @if (old('race') == 'White') selected="selected" @endif>White</option>
                    <option value="Other" @if (old('race') == 'Other') selected="selected" @endif>Other</option>
                </select>
            </div>
            <div class="form-group col-md-3">
                <label for="race">Age Variance</label>
                <select class="custom-select form-control" name="age_variance" required>
                    <option value="">Select age_variance</option>
                    <option value="0 - 10"  @if (old('age_variance') == '0 - 10') selected="selected" @endif>0 - 10</option>
                    <option value="11 - 20"  @if (old('age_variance') == '11 - 20') selected="selected" @endif>11 - 20</option>
                    <option value="21 - 30"  @if (old('age_variance') == '21 - 30') selected="selected" @endif>21 - 30</option>
                    <option value="31 - 40"  @if (old('age_variance') == '31 - 40') selected="selected" @endif>31 - 40</option>
                </select>
            </div>
            <div class="form-group col-md-3">
                <label for="dob">D.O.B</label>
                <input type="text" class="form-control" id="dob"  value="{{ old('dob') }}"  name="dob" />
            </div>
            <div class="form-group col-md-3">
                <label for="marital_status">Marital Status</label>

                <select class="custom-select form-control" name="marital_status" required>
                    <option value="">Select Status</option>
                    <option value="Married" @if (old('marital_status') == 'Married') selected="selected" @endif>Married</option>
                    <option value="Single" @if (old('marital_status') == 'Single') selected="selected" @endif>Single</option>
                    <option value="Other" @if (old('marital_status') == 'Other') selected="selected" @endif>Other</option>

                </select>
            </div>
            <div class="form-group col-md-3">
                <label for="hair_color">Hair Color</label>
                <select class="custom-select form-control" name="hair_color" required>
                    <option value="">Select Color</option>
                    <option value="Black" @if (old('hair_color') == 'Black') selected="selected" @endif>Black</option>
                    <option value="Blonde" @if (old('hair_color') == 'Blonde') selected="selected" @endif>Blonde</option>
                    <option value="Grey" @if (old('hair_color') == 'Grey') selected="selected" @endif>Grey</option>
                    <option value="Other" @if (old('hair_color') == 'Other') selected="selected" @endif>Other</option>
                </select>
            </div>
            <div class="form-group col-md-3">
                <label for="eye_color">Eye Color</label>
                <select class="custom-select form-control" name="eye_color" required>
                    <option value="">Select Color</option>
                    <option value="Black" @if (old('eye_color') == 'Black') selected="selected" @endif>Black</option>
                    <option value="Brown" @if (old('eye_color') == 'Brown') selected="selected" @endif>Brown</option>
                    <option value="Blue" @if (old('eye_color') == 'Blue') selected="selected" @endif>Blue</option>
                    <option value="Other" @if (old('eye_color') == 'Other') selected="selected" @endif>Other</option>
                </select>
            </div>
            <div class="form-group col-md-3">
                <label for="height">Height</label>
                <input type="number" class="form-control" name="height" value="{{ old('height') }}" placeholder="height">
            </div>
            <div class="form-group col-md-3">
                <label for="weight">Weight</label>
                <input type="number" class="form-control" name="weight" value="{{ old('weight') }}" placeholder="weight">
            </div>
            <div class="form-group col-md-3">
                <label for="religion">Religion</label>
                <input type="text" class="form-control" name="religion" value="{{ old('religion') }}" placeholder="religion">
            </div>
            <div class="form-group col-md-3">
                <label for="education">Education</label>
                <input type="text" class="form-control" name="education" value="{{ old('education') }}" placeholder="education">
            </div>
            <div class="form-group col-md-3">
                <label for="residence">Residence</label>
                <input type="text" class="form-control" name="residence" value="{{ old('residence') }}" placeholder="residence">
            </div>
            <div class="form-group col-md-3">
                <label for="cluster">Cluster</label>
                <input type="text" class="form-control" name="cluster" value="{{ old('cluster') }}" placeholder="cluster">
            </div>
            <div class="form-group col-md-3">
                <label for="special_need">Special need</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="special_need" id="special_no" value="No" {{ old('special_need')=="No" ? 'checked=' : '' }}>
                    <label class="form-check-label" for="special_no">No</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="special_need" id="special_yes" value="Yes" {{ old('special_need')=="Yes" ? 'checked=' : '' }}>
                    <label class="form-check-label" for="special_yes">Yes</label>
                </div>
            </div>
            <div class="form-group col-md-3" id="sp_ct">
                <label for="special_need_category">Special need category</label>
                <input type="text" class="form-control" name="special_need_category" value="{{ old('special_need_category') }}" placeholder="special_need_category">
            </div>
            <div class="form-group col-md-3" id="sp_dt">
                <label for="special_need_details">Special need details</label>
                <input type="text" class="form-control" name="special_need_details" value="{{ old('special_need_details') }}" placeholder="special_need_details">
            </div>
            <div class="form-group col-md-12">
                <button type="submit" class="btn btn-primary m-b">Submit</button>
            </div>
        </div>
    </form>

    <script>
        $(function() {
            $('input[name="dob"]').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                locale: {
                    format: 'DD-MM-YYYY'
                }
            });
        });
    </script>


@stop
