@php

$uri_fullpath = $_SERVER['REQUEST_URI'];
$uri_parts = explode('/', $uri_fullpath);
$nav_location = $uri_parts[1];

@endphp

<nav>
<<<<<<< HEAD
    <a href="/home/Gerief"><img src="/images/icons/icon_home.svg" width="35px" alt="" class="nav-active"><p>Home</p></a>
=======
    <a href="/home/Gerief">
        <svg width="31" height="29" viewBox="0 0 31 29" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd"
                d="M12.4 29V18.7647H18.6V29H26.35V15.3529H31L15.5 0L0 15.3529H4.65V29H12.4Z" fill="#DADADA" class="@if($nav_location == 'home')active-nav @endif"/>
        </svg>
        <p class="@if($nav_location == 'home')active-nav @endif">Home</p>
    </a>
>>>>>>> notifications
    @if (Auth::user())
        <a href="/transactions/Actief">
            <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M27.9665 6.71669H25.0666V19.7667H6.21655V22.6667C6.21655 23.4642 6.86905 24.1167 7.66655 24.1167H23.6166L29.4165 29.9167V8.16669C29.4165 7.36919 28.764 6.71669 27.9665 6.71669ZM22.1667 15.4167V2.36665C22.1667 1.56915 21.5142 0.916655 20.7167 0.916655H1.86675C1.06925 0.916655 0.416748 1.56915 0.416748 2.36665V22.6667L6.21675 16.8667H20.7167C21.5142 16.8667 22.1667 16.2142 22.1667 15.4167Z"
                    fill="#DADADA" class="@if($nav_location == 'transactions')active-nav @endif"/>
            </svg>

            <p class="@if($nav_location == 'transactions')active-nav @endif">Transacties</p>
        </a>
        <a href="/offer">
            <svg width="29" height="29" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M14.5 0C6.49263 0 0 6.49263 0 14.5C0 22.5074 6.49263 29 14.5 29C22.5074 29 29 22.5074 29 14.5C29 6.49263 22.5074 0 14.5 0ZM20.7143 15.2768C20.7143 15.4192 20.5978 15.5357 20.4554 15.5357H15.5357V20.4554C15.5357 20.5978 15.4192 20.7143 15.2768 20.7143H13.7232C13.5808 20.7143 13.4643 20.5978 13.4643 20.4554V15.5357H8.54464C8.40223 15.5357 8.28571 15.4192 8.28571 15.2768V13.7232C8.28571 13.5808 8.40223 13.4643 8.54464 13.4643H13.4643V8.54464C13.4643 8.40223 13.5808 8.28571 13.7232 8.28571H15.2768C15.4192 8.28571 15.5357 8.40223 15.5357 8.54464V13.4643H20.4554C20.5978 13.4643 20.7143 13.5808 20.7143 13.7232V15.2768Z"
                    fill="#DADADA" class="@if($nav_location == 'offer')active-nav @endif"/>
            </svg>

            <p class="@if($nav_location == 'offer')active-nav @endif">Aanbieden</p>
        </a>
    @endif
    <a href="/profile">
        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd"
                d="M10.3125 14.4089C9.32063 14.4089 8.51562 15.2192 8.51562 16.2176C8.51562 17.216 9.32063 18.0263 10.3125 18.0263C11.3044 18.0263 12.1094 17.216 12.1094 16.2176C12.1094 15.2192 11.3044 14.4089 10.3125 14.4089ZM18.9375 14.4089C17.9456 14.4089 17.1406 15.2192 17.1406 16.2176C17.1406 17.216 17.9456 18.0263 18.9375 18.0263C19.9294 18.0263 20.7344 17.216 20.7344 16.2176C20.7344 15.2192 19.9294 14.4089 18.9375 14.4089ZM14.75 0.301197C6.746 0.301197 0.25 6.7972 0.25 14.8012C0.25 22.8052 6.746 29.3012 14.75 29.3012C22.754 29.3012 29.25 22.8052 29.25 14.8012C29.25 6.7972 22.754 0.301197 14.75 0.301197ZM14.625 26.3463C8.28563 26.3463 3.125 21.1517 3.125 14.7707C3.125 14.3511 3.15375 13.9315 3.19688 13.5263C6.58938 12.007 9.2775 9.21442 10.6863 5.75621C13.2881 9.4604 17.5719 11.8768 22.4163 11.8768C23.5375 11.8768 24.6156 11.7466 25.6506 11.5006C25.9525 12.5279 26.125 13.6276 26.125 14.7707C26.125 21.1517 20.9644 26.3463 14.625 26.3463Z"
                fill="#DADADA" class="@if($nav_location == 'profile')active-nav @endif"/>
        </svg>

        <p class="@if($nav_location == 'profile')active-nav @endif">Profiel</p>
    </a>
</nav>
