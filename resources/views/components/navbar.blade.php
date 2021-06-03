<nav>
    <a href="/"><img src="/images/icons/icon_home.svg" width="35px" alt="">Home</a>
    @if (Auth::user())
        <a href="/transactions"><img src="/images/icons/icon_transactions.svg" width="35px" alt="">Transacties</a>
        <a href="/offer"><img src="/images/icons/icon_offer.svg" width="35px" alt="">Aanbieden</a>
    @endif
    <a href="/profile"><img src="/images/icons/icon_profile.svg" width="35px" alt="">Profiel</a>
</nav>
{{-- <style>
    nav {
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
        background-color: red;
        color: white;
        text-align: center;
    }
</style> --}}
