<header>
    <div class="topbar d-flex align-items-center">
        <nav class="navbar navbar-expand">
            <div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
            </div>
            <div class="search-bar flex-grow-1">
                <div class="position-relative search-bar-box">
                    <input type="text" class="form-control search-control" placeholder="Type to search..."> <span
                        class="position-absolute top-50 search-show translate-middle-y"><i
                            class='bx bx-search'></i></span>
                    <span class="position-absolute top-50 search-close translate-middle-y"><i class='bx bx-x'></i></span>
                </div>
            </div>
            <div class="top-menu ms-auto">
                <ul class="navbar-nav align-items-center">
                    <li class="nav-item mobile-search-icon">
                        <a class="nav-link" href="#"> <i class='bx bx-search'></i>
                        </a>
                    </li>
                    <li class="nav-item dropdown dropdown-large">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false"> <i class='bx bx-category'></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <div class="row row-cols-3 g-3 p-3">
                                <div class="col text-center">
                                    <div class="app-box mx-auto bg-gradient-cosmic text-white"><i
                                            class='bx bx-group'></i>
                                    </div>
                                    <div class="app-title">Teams</div>
                                </div>
                                <div class="col text-center">
                                    <div class="app-box mx-auto bg-gradient-burning text-white"><i
                                            class='bx bx-atom'></i>
                                    </div>
                                    <div class="app-title">Projects</div>
                                </div>
                                <div class="col text-center">
                                    <div class="app-box mx-auto bg-gradient-lush text-white"><i
                                            class='bx bx-shield'></i>
                                    </div>
                                    <div class="app-title">Tasks</div>
                                </div>
                                <div class="col text-center">
                                    <div class="app-box mx-auto bg-gradient-kyoto text-dark"><i
                                            class='bx bx-notification'></i>
                                    </div>
                                    <div class="app-title">Feeds</div>
                                </div>
                                <div class="col text-center">
                                    <div class="app-box mx-auto bg-gradient-blues text-dark"><i class='bx bx-file'></i>
                                    </div>
                                    <div class="app-title">Files</div>
                                </div>
                                <div class="col text-center">
                                    <div class="app-box mx-auto bg-gradient-moonlit text-white"><i
                                            class='bx bx-filter-alt'></i>
                                    </div>
                                    <div class="app-title">Alerts</div>
                                </div>
                            </div>
                        </div>
                    </li>

                    @php

                        $notification = App\Models\Notification::latest()->get();

                    @endphp
                    <li class="nav-item dropdown dropdown-large ">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span
                                class="alert-count">{{ count($notification) }}</span>
                            <i class='bx bx-bell'></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="javascript:;">
                                <div class="msg-header">
                                    <p class="msg-header-title">Notifications</p>
                                    <p class="msg-header-clear ms-auto">Marks all as read</p>
                                </div>
                            </a>
                            <div class="header-notifications-list">
                                @foreach ($notification as $item)
                                    <tr>
                                        @php

                                            $noti = App\Models\Notification::find($item->id);

                                        @endphp

                                        <a class="dropdown-item editbtn  " data-toggle="modal" data-id="{{  $item->id }}"
                                            data-title="{{ $item->title }}" data-date="{{ $item->date }}" data-message="{{ $item->message }}">
                                            <input type="hidden" value="{{ $item->id }}" >
                                            <div class="d-flex align-items-center justify-content-center">
                                                <div class="notify bg-light-danger text-primary "><i
                                                        class="bx bx-message-detail"></i>
                                                </div>
                                                <div class="flex-grow-1 position-relative">
                                                        <h6 class="msg-name" id="title">{{ $item->title }}<span
                                                            class="msg-time float-end">{{ $item->date }}
                                                        </span>
                                                        </h6>

                                                        <p class="msg-info" id="message">
                                                            {{ Str::limit($item->message, 25, '..') }}
                                                            {{-- <span
                                                             class="msg-time float-end">
                                                              <i title="remove" class="fa fa-trash"
                                                                    style="font-size:22px;color:rgb(241, 8, 39);"></i>
                                                        </span> --}}

                                                        </p>

                                                </div>
                                                {{-- <a class="position-absolute  bottom-0 end-0" href="{{ route('notification.delete', $item->id) }}"
                                                    id="delete"> <i title="remove" class="fa fa-trash"
                                                        style="font-size:22px;color:rgb(241, 8, 39);"></i></a>
                                                --}}
                                            </div>
                                        </a>
                                    </tr>
                                @endforeach
                            </div>
                            <a href="{{ route('all.notifications') }}">
                                <div class="text-center msg-footer">View All Notifications</div>
                            </a>
                        </div>
                    </li>
                    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Notification
                                    </h5>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('notification.update') }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <input type="hidden" value="" id="id">
                                            <label for="title" class="col-form-label">Title </label>
                                            <input type="text" class="form-control" id="title" name="title"
                                                value="">
                                        </div>
                                        <div class="mb-3">

                                            <label for="message" class="col-form-label">Message </label>
                                            <textarea class="form-control" id="message"
                                                name="message"></textarea>
                                        </div>
                                        <div class="mb-3">

                                            <label for="date" class="col-form-label">Date </label>
                                            <input type="datetime-local" class="form-control" id="date" name="date"
                                                value="">
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-primary" type="submit">Update</button>
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Cancel</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>

                    <script>
                        $(document).ready(function() {
                            $('.editbtn').on('click', function() {
                                $('#exampleModal1').modal('show');
                                $('#id').val($(this).data('id'));
                               $('#title').val($(this).data('title'));
                                $('#message').val($(this).data('message'));
                                $('#date').val($(this).data('date'));
                                    //      $tr = $(this).closest('tr');
                                    //      var data = $tr.children("td").map(function() {
                                    //          return $(this).text();
                                    // }).get();
                                    //     // $('#id').val($id);
                                    //   $('#title').val(data[1]);
                                    //      $('#message').val(data[2]);
                                    //     $('#date').val(data[3]);
                            });
                        });
                    </script>





                    @php

                        $message = App\Models\Contact::latest()->get();

                    @endphp





                    <li class="nav-item dropdown dropdown-large">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span
                                class="alert-count">{{ count($message) }}</span>
                            <i class='bx bx-comment'></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="javascript:;">
                                <div class="msg-header">
                                    <p class="msg-header-title">Messages</p>
                                    <p class="msg-header-clear ms-auto">Marks all as read</p>
                                </div>
                            </a>
                            <div class="header-message-list">



                                @foreach ($message as $item)
                                    <tr>
                                        <a class="dropdown-item" href="{{ route('message.delete', $item->id) }}"
                                            id="delete">
                                            <div class="d-flex align-items-center">
                                                <div class="user-online">
                                                    <img src="{{ asset('backend/assets/images/avatars/avatar-1.png') }}"
                                                        class="msg-avatar" alt="user avatar">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">{{ $item->name }} <span
                                                            class="msg-time float-end">{{ $item->contact_date }}</span>
                                                    </h6>
                                                    <h6 class="msg-name">{{ $item->email }} <span
                                                            class="msg-time float-end">{{ $item->contact_time }}</span>
                                                    </h6>
                                                    <p class="msg-info">
                                                        {{ Str::limit($item->message, 25, '..') }}</p>

                                                </div>
                                            </div>
                                        </a>





                                    </tr>
                                @endforeach






                            </div>
                            <a href="{{ route('contact.message') }}">
                                <div class="text-center msg-footer">View All Messages</div>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="user-box dropdown">
                <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#"
                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    @php
                        $adminData = App\Models\User::find(Auth::user()->id);
                    @endphp

                    <img src="{{ !empty($adminData->profile_photo_path)? url('upload/admin_images/' . $adminData->profile_photo_path): url('upload/no_image.jpg') }}"
                        class="user-img" alt="user avatar">
                    <div class="user-info ps-3">
                        <p class="user-name mb-0"> {{ $adminData->name }} </p>
                        <p class="designattion mb-0">{{ $adminData->email }}</p>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="{{ route('user.profile') }}"><i
                                class="bx bx-user"></i><span>Profile</span></a>
                    <li><a class="dropdown-item" href="javascript:;"><i
                                class="bx bx-cog"></i><span>Settings</span></a>
                    </li>
                    <li><a class="dropdown-item" href="{{ route('change.password') }}"><i
                                class="bx bx-cog"></i><span>Change Password </span></a>
                    </li>
                    <li><a class="dropdown-item" href="javascript:;"><i
                                class='bx bx-home-circle'></i><span>Dashboard</span></a>
                    <li>
                        <div class="dropdown-divider mb-0"></div>
                    </li>
                    <li><a class="dropdown-item" href="{{ route('admin.logout') }}"><i
                                class='bx bx-log-out-circle'></i><span>Logout</span></a>
                </ul>
            </div>
        </nav>
    </div>
</header>
