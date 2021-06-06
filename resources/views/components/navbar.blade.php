<nav>
    <a href="/"><img src="/images/icons/icon_home.svg" width="35px" alt=""><p>Home</p></a>
    @if (Auth::user())
        <a href="/transactions/Actief"><img src="/images/icons/icon_transactions.svg" width="35px" alt=""><p>Transacties</p></a>
        <a href="/offer"><img src="/images/icons/icon_offer.svg" width="35px" alt=""><p>Aanbieden</p></a>
    @endif
    <a href="/profile"><img src="/images/icons/icon_profile.svg" width="35px" alt=""><p>Profiel</p></a>
</nav>