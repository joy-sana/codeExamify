<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>

<body>
    @include('header')

    <main>
        {{-- @if (auth()->guard('admin_data')->check())
            <span> welcome back {{ auth()->guard('admin_data')->user()->Admin_name }} </span>
            <a href="{{ url('/admin/logout') }}"><button>logout</button></a>
        @endif --}}


        <div class="search-bar">
            <form action="">
                <input type="search" name="search" placeholder="search" value="{{ $search }}" id="">
                <button class="btn-search" type="submit"><img class="search-icon"
                        src="{{ asset('css/image/search-icon-new.png') }}" alt=""></button>
            </form>
            <div class="reset-button">
                @if ($search_count !== null)
                    <a href="{{ url('/Admin/management/user') }}">
                        <button class="btn-reset">reset</button></a>
                @endif
            </div>
        </div>


        <div class="counts">
            <div class="user-coutn">
                <span>Number of total User: {{ $user_count }}</span>
            </div>
            <div class="search-count">
                @if ($search_count !== null)
                    <span>Number of Result: {{ $search_count }}</span>
                @endif
            </div>
        </div>


        <div class="table-wrapper">
            <table>
                <caption>
                    Registered student's details!!
                </caption>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Email-Id</th>
                        <th>Mobile No.</th>
                        <th>Gender</th>
                        <th>Date of Birth</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($user_datas as $user_data)
                        <tr>
                            <td data-cell="Name">{{ $user_data->name }}</td>
                            <td data-cell="Username">{{ $user_data->username }}</td>
                            <td data-cell="Email">{{ $user_data->email }}</td>
                            <td data-cell="Phone no.">{{ $user_data->mobile }}</td>
                            <td data-cell="Gender">
                                @if ($user_data->gender == 'm')
                                    Male
                                @elseif($user_data->gender == 'f')
                                    Female
                                @else
                                    Others
                                @endif
                            </td>
                            {{-- <td>{{ $user_data->dob }}</td> --}}
                            <td data-cell="Date of Birth">{{ \App\helper::formatdate($user_data->dob, 'd/M/Y') }}</td>
                            <td data-cell="ACTION">
                                <a href="{{ url('/Admin/management/user/update') }}/{{ $user_data->student_id }}">
                                    <button class="btn-edit">Edit</button></a>
                                <button class="btn-delete open-button"
                                    data-modal-id="modal_{{ $user_data->student_id }}">Delete</button>
                            </td>
                        </tr>


                            <dialog class="modal" id="modal_{{ $user_data->student_id }}">
                                <div class="model-wrapper">
                                    <div class="delete-warning"><img
                                            src="{{ asset('css/image/warning-icon.webp') }}" alt=""></div>
                                    <div class="text-confirm">
                                        <h2>Are you absolutely certain you want to delete this field?</h2>
                                        <p>Please note that deleted data cannot be recovered!</p>
                                    </div>

                                    <button class="btn-goback close-button"
                                        data-modal-id="modal_{{ $user_data->student_id }}">Go
                                        Back</button>

                                    <a href="{{ url('/Admin/management/user/delete') }}/{{ $user_data->student_id }}">
                                        <button class="btn-con-delete delete-button">Delete</button></a>

                                </div>
                            </dialog>
                    @endforeach

                </tbody>
            </table>
            <div class='pagination '>
                {{ $user_datas->onEachSide(1)->links() }}
            </div>
        </div>

    </main>

</body>

</html>


<script>
    const openButtons = document.querySelectorAll('.open-button');
    const closeButtons = document.querySelectorAll('.close-button');

    openButtons.forEach(button => {
        const modalId = button.dataset.modalId;
        const modal = document.querySelector(`#${modalId}`);
        button.addEventListener('click', () => {
            modal.showModal();
        });
    });
    closeButtons.forEach(button => {
        const modalId = button.dataset.modalId;
        const modal = document.querySelector(`#${modalId}`);
        button.addEventListener('click', () => {
            modal.close();
        });
    });
</script>
