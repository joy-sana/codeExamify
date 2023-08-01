<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <script src="{{ asset('js/showpass.js')}}"></script>
</head>

<body>
@include('header')
    <h1>Update form</h1>
    <div>
        <form action="{{$url}}" method="POST">
            @csrf
            <div>
                <label>Full Name:</label>

                <input type="text" placeholder="Enter Your Name" value="{{$userdata->name}}" name='fullName' required>
                <span class="text-danger">
                    @error ('fullName')
                    {{$message}}
                    @enderror
                </span>
            </div>

            <div>
                <label>Username:</label>

                <input type="text" placeholder="Create Username" name="Username" value="{{$userdata->username}}"required>
                <span class="text-danger">
                    @error ('Username')
                    {{$message}}
                    @enderror
                </span>
            </div>

            <div>
                <label>Mobile Number:</label>

                <input type="text" placeholder="Enter Mobile number" name='phoneNumber' value="{{$userdata->mobile}}"required>
                <span class="text-danger">
                    @error ('phoneNumber')
                    {{$message}}
                    @enderror
                </span>
            </div>

            <div>
                <label>Email: </label>

                <input type="email" placeholder="Enter Email" name='Email_id' value="{{$userdata->email}}"required>
                <span class="text-danger">
                    @error ('Email_id')
                    {{$message}}
                    @enderror
                </span>
            </div>

            <div class="dob_gender">
                <div class="">
                    <label>Gender:</label>
                    <div class="Gender">
                        <div class="G">
                            <label for="">Male :</label>
                            <input type="radio" name="gender" value="m" {{$userdata->gender=='m' ? "checked" : ""}} >
                        </div>
                        <div class="G">
                            <label for="">Female :</label>
                            <input type="radio" name="gender" value="f" {{$userdata->gender=='f' ? "checked" : ""}}>
                        </div>
                        <div class="G">
                            <label for="">Others :</label>
                            <input type="radio" name="gender" value="o" {{$userdata->gender=='o' ? "checked" : ""}}>
                        </div>
                    </div>
                </div>

                <div>
                    <label class="dob">Date of Birth:</label>
                    <input type="date" id="dob" name="dob" value="{{ $userdata->dob }}" date="{{ $userdata->dob }}">
                    {{-- {{var_dump($userdata->dob)}} --}}
                </div>
            </div>


            <div>
                <input type="submit" value="Update" name='update'>
            </div>

        </form>

    </div>

</body>

</html>
@php
    function formatdate ($value){
        if (!empty($value)) {
            $timestamp = strtotime($value);
            if ($timestamp !== false) {
                return date('Y-m-d', $timestamp);
            }
        }
        return '';
    }
@endphp