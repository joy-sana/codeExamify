<button class="btn btn-change open-buttonpassChange">Change Password</button>


<dialog class="modalChange" id="modalChange">

    {{-- <form id="passChange-form" action="{{$url}}" method="post"> --}}
    <form id="passChange-form" method="POST">
        @csrf
        <span id="passChange-error" class="text-danger"></span>

        <div>
            <label for="mypwd">Old Password:</label>
            <div class="password-input-container">
                <input type="password" placeholder="Enter Previos password" name='oldPassword' id="mypwd"
                    value="" required>
                <div class="show-password-container">
                    <input type="checkbox" onclick="myFunction('mypwd')" id="show-password-checkbox">
                    <label for="show-password-checkbox"><i class="fas fa-eye"></i></label>
                </div>
                <span class="text-danger">
                    @error('oldPassword')
                        {{ $message }}
                    @enderror
                </span>
            </div>
        </div>
        <div>
            <label for="conpwd">New Password:</label>
            <div class="password-input-container">
                <input type="password" placeholder="Enter A New Password" name='newPassword' id="conpwd" required>
                <span class="text-danger">
                    @error('newPassword')
                        {{ $message }}
                    @enderror
                </span>
                <div class="show-password-container">
                    <input type="checkbox" onclick="myFunction('conpwd')" id="show-password-checkbox-2">
                    <label for="show-password-checkbox-2"> <i class="fas fa-eye"></i></label>
                </div>
            </div>
        </div>

        <div>
            <label for="conpwd">Confirm New Password:</label>
            <div class="password-input-container">
                <input type="password" placeholder="Re-enter New Password" name='confirmNewPassword' id="con-new-pass"
                    required>
                <span class="text-danger">
                    @error('confirmNewPassword')
                        {{ $message }}
                    @enderror
                </span>
                <div class="show-password-container">
                    <input type="checkbox" onclick="myFunction('con-new-pass')" id="show-password-checkbox-3">
                    <label for="show-password-checkbox-3"> <i class="fas fa-eye"></i></label>
                </div>
            </div>
        </div>

        <div>
            <button class="btn-edit close-button-passChange">back</button>
            <input type="submit" value="Change Password" name='submit'>
        </div>

    </form>

</dialog>

<script>
const modalChange = document.querySelector('#modalChange');
const openButtonChange = document.querySelector('.open-buttonpassChange');
const closeButtonChange = document.querySelector('.close-button-passChange');
const changeForm = document.querySelector("#passChange-form");
const errorSpan = document.querySelector("#passChange-error");

openButtonChange.addEventListener('click', function()  {
    const url = "{{ url($ChangeUrl) }}";
    changeForm.action = url;
    modalChange.showModal();
});

closeButtonChange.addEventListener('click', () => {
    modalChange.close();
});

changeForm.addEventListener("submit", function(event) {
    event.preventDefault();
    const formData = new FormData(changeForm);
    fetch(changeForm.action, {
            method: "POST",
            body: formData
        })
        .then(response => {
            if (response.ok) {
                modalChange.close();
                // Perform any necessary actions after successful form submission
            } else {
                throw new Error("Something went wrong");
            }
        })
        .catch(error => {
            console.error(error);
            S.innerHTML = "Error: " + error.message;
            errorSpan.style.display = "block"; // add this line to show the error message
        });
});


</script>
