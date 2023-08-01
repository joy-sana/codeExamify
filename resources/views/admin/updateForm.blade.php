<form id="update-form-admin" method="POST">
    @csrf
    <div>
        <label>Full Name:</label>
        <input type="text" placeholder="Enter Your Name" value="{{ $user_data->name }}" name="fullName" required>
        <span class="text-danger">
            @error('fullName')
                {{ $message }}
            @enderror
        </span>
    </div>

    <div>
        <label>Username:</label>
        <input type="text" placeholder="Create Username" name="username" value="{{ $user_data->username }}" required>
        <span class="text-danger">
            @error('username')
                {{ $message }}
            @enderror
        </span>
    </div>

    <div>
        <label>Mobile Number:</label>
        <input type="text" placeholder="Enter Mobile number" name="phoneNumber" value="{{ $user_data->mobile }}"
            required>
        <span class="text-danger">
            @error('phoneNumber')
                {{ $message }}
            @enderror
        </span>
    </div>

    <div>
        <label>Email: </label>
        <input type="email" placeholder="Enter Email" name="email" value="{{ $user_data->email }}" required>
        <span class="text-danger">
            @error('email')
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
                        {{ $user_data->gender == 'm' ? 'checked' : '' }}>
                </span>
            </div>
            <div class="Gnd-type">
                <label for="">Female :</label>
                <span class="female"></span>
                <input type="radio" name="gender" value="f" {{ $user_data->gender == 'f' ? 'checked' : '' }}>
                </span>
            </div>
            <div class="Gnd-type">
                <label for="">Others :</label><span class="other">
                    <input type="radio" name="gender" value="o"
                        {{ $user_data->gender == 'o' ? 'checked' : '' }}>
                </span>
            </div>

        </div>

        <div>
            <label class="dob">Date of Birth:</label>
            <input type="date" id="dob" name="dob" value="{{ $user_data->dob }}"
                date="{{ $user_data->dob }}">

        </div>
    </div>

    <div>
        <button class="btn-edit close-button-admin"
            data-modal-id="updateModal_{{ $user_data->student_id }}">back</button>
        <input class="close-button-admin" type="submit" value="Update" name="update">
    </div>
</form>


{{--  --}}
{{--  --}}


<script>
const modals = document.querySelectorAll(".modal");
const openButtons = document.querySelectorAll(".open-button");
const closeButtons = document.querySelectorAll(".close-button");

openButtons.forEach((button) => {
  button.addEventListener("click", () => {
    const modalId = button.dataset.modalId;
    const modal = document.querySelector(`#${modalId}`);
    modal.showModal();
  });
});

modals.forEach((modal) => {
  modal.addEventListener("click", (event) => {
    if (
      event.target === modal ||
      event.target.getAttribute("data-close") === ""
    ) {
      modal.close();
    }
  });
});

closeButtons.forEach((button) => {
  button.addEventListener("click", () => {
    const modal = button.closest(".modal");
    modal.close();
  });
});


</script>
