<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ 'backend/assets/images/ctp.png' }}" style="width: 80px" class="logo-icon"
                alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">C.T.P</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{ url('/dashboard') }}">
                <div class="parent-icon"><i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>

        <li>

            <a  class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Category & Products </div>
            </a>
            <ul>
                <li> <a href="{{ route('all.brand') }}"><i class="bx bx-right-arrow-alt"></i>All Brands</a>
                </li>
                <li> <a href="{{ route('all.category') }}"><i class="bx bx-right-arrow-alt"></i>All Category</a>
                </li>

                <li> <a href="{{ route('all.subcategory') }}"><i class="bx bx-right-arrow-alt"></i>All SubCategory</a>
                </li>

                <li> <a href="{{ route('all.product') }}"><i class="bx bx-right-arrow-alt"></i>All Product</a>
                </li>

            </ul>
        </li>



        <li class="menu-label">Sliders</li>
        <li>
            <a class="has-arrow" href="{{ route('all.slider') }}">
                <div class="parent-icon"><i class='bx bx-message-square-edit'></i>
                </div>
                <div class="menu-title">Sliders</div>
            </a>

        </li>

        <li class="menu-label">Notifications</li>
        <li>

            <a  class="has-arrow">
                <div class="parent-icon"><i class="bx bx-bell"></i>
                </div>
                <div class="menu-title">Notifications </div>
            </a>
            <ul>
                <li> <a href="{{ route('all.notifications') }}"><i class="bx bx-right-arrow-alt"></i>All Notifications</a>
                </li>
            </ul>
        </li>

        <li class="menu-label">Messages</li>
        <li>
            <a class="has-arrow">
                <div class="parent-icon"><i class="bx bx-lock"></i>
                </div>
                <div class="menu-title">Messages</div>
            </a>
            <ul>
                <li>
                    <a href="{{ route('contact.message') }}">
                        <div class="parent-icon"><i class="bx bx-donate-blood"></i>
                        </div>
                        <div class="menu-title">Contact Message</div>
                    </a>
                </li>

                <li>
                    <a href="{{ route('all.review') }}">
                        <div class="parent-icon"><i class="bx bx-donate-blood"></i>
                        </div>
                        <div class="menu-title">Review</div>
                    </a>
                </li>


            </ul>
        </li>




        <li class="menu-label">Site info </li>

        <li>
            <a href="{{ route('getsite.info') }}">
                <div class="parent-icon"><i class="bx bx-user-circle"></i>
                </div>
                <div class="menu-title">Site Info</div>
            </a>
        </li>


        <li class="menu-label">Manage Site </li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bx bx-line-chart"></i>
                </div>

                <div class="menu-title">Manage Order</div>
            </a>
            <ul>
                <li> <a href="{{ route('pending.order') }}"><i class="bx bx-right-arrow-alt"></i>Pending Order </a>
                </li>
                <li> <a href="{{ route('processing.order') }}"><i class="bx bx-right-arrow-alt"></i>Processing
                        Order</a>
                </li>

                <li> <a href="{{ route('complete.order') }}"><i class="bx bx-right-arrow-alt"></i>Complete Order</a>
                </li>
            </ul>
        </li>

    </ul>
    <!--end navigation-->
</div>
