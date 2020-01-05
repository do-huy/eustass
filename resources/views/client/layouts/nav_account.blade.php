<h2 style="margin-top:20px" class="title text-center"><br></h2>
<div class="profile-user">
    <div class="upload-avatars">
        <img src="/upload/avatars/{{ $user->avatar}}" class="online-avatar">
        <h4>Tài khoản {{$user->name}}</h4>
    </div>
    <div class="gach-account"></div>
    <div class="nav-menu-account">
        <ul>
            <li>
                <a class="active" href="{{route('profile.index')}}">
                    <i class="fa fa-user" aria-hidden="true" id="color-icon"></i>
                    <span class="width-icon-account">Tài khoản của tôi</span>
                </a>
            </li>

            <li>
                <a href="{{route('change.password')}}">
                    <i class="fa fa-unlock-alt" aria-hidden="true" id="color-icon"></i>
                    <span class="width-icon-password">Đổi mật khẩu</span>
                </a>
            </li>

            <li>
                <a href="{{route('address.index')}}">
                    <i class="fa fa-map-marker" aria-hidden="true" id="color-icon"></i>
                    <span class="width-icon-address">Thêm mới địa chỉ</span>
                </a>
            </li>

            <li>
                <a href="#contact">
                    <i class="fa fa-bell" aria-hidden="true" id="color-icon"></i>
                    <span class="width-icon">Thông báo</span>
                </a>
            </li>

            <li>
                <a href="{{route('order.index')}}">
                    <i class="fa fa-book" aria-hidden="true" id="color-icon"></i>
                    <span class="width-icon"> Đơn hàng đã mua</span>
                </a>
            </li>
        </ul>
    </div>
</div>
