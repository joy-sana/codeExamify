
<form id="update-form" method="POST">
    @csrf
    <div>
        <label>Full Name:</label>
        <input type="text" placeholder="Enter Your Name" value="{{ $userdata->name }}" name="fullName"
            required>
        <span class="text-danger">
            @error('fullName')
                {{ $message }}
            @enderror
        </span>
    </div>

    <div>
        <label>Username:</label>
        <input type="text" placeholder="Create Username" name="Username" value="{{ $userdata->username }}"
            required>
        <span class="text-danger">
            @error('Username')
                {{ $message }}
            @enderror
        </span>
    </div>

    <div>
        <label>Mobile Number:</label>
        <input type="text" placeholder="Enter Mobile number" name="phoneNumber"
            value="{{ $userdata->mobile }}" required>
        <span class="text-danger">
            @error('phoneNumber')
                {{ $message }}
            @enderror
        </span>
    </div>

    <div>
        <label>Email: </label>
        <input type="email" placeholder="Enter Email" name="Email_id" value="{{ $userdata->email }}"
            required>
        <span class="text-danger">
            @error('Email_id')
                {{ $message }}
            @enderror
        </span>
    </div>

    <div class="dob_gender">

        <label>Gender:</label>
        <div class="Gender">
            <div class="Gnd-type">
                <label for="">Male :</label>
                <span class="male">
                    <input type="radio" name="gender" value="m"
                        {{ $userdata->gender == 'm' ? 'checked' : '' }}>
                </span>
            </div>
            <div class="Gnd-type">
                <label for="">Female :</label>
                <span class="female"></span>
                <input type="radio" name="gender" value="f"
                    {{ $userdata->gender == 'f' ? 'checked' : '' }}>
                </span>
            </div>
            <div class="Gnd-type">
                <label for="">Others :</label><span class="other">
                    <input type="radio" name="gender" value="o"
                        {{ $userdata->gender == 'o' ? 'checked' : '' }}>
                </span>
            </div>

        </div>

        <div>
            <label class="dob">Date of Birth:</label>
            <input type="date" id="dob" name="dob" value="{{ $userdata->dob }}"
                date="{{ $userdata->dob }}">

        </div>
    </div>

    <div>
        <button class="btn-back close-button">back</button>
        <input class="close-button" type="submit" value="Update" name="update">
    </div>
</form>


{{--  --}}
{{--  --}}


<script>
    const modal = document.getElementById("modal");
    const openBtn = document.querySelector(".open-button");
    const updateForm = document.querySelector("#update-form");
    var closeModal = document.querySelector(".close-button");

    openBtn.addEventListener("click", function() {
        const url = "{{ url($UpdateUrl) }}";
        updateForm.action = url;
        modal.showModal();
    });

    updateForm.addEventListener("submit", function(event) {
        event.preventDefault();
        const formData = new FormData(updateForm);
        fetch(updateForm.action, {
                method: "POST",
                body: formData
            })
            .then(response => {
                if (response.ok) {
                    modal.close();
                    // Perform any necessary actions after successful form submission
                } else {
                    throw new Error("Something went wrong");
                }
            })
            .catch(error => {
                console.error(error);
                // Handle error
            });
    });
    closeModal.addEventListener('click', () => {
        modal.close();
    })
</script>