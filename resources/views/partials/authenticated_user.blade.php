<div id="user_profile_photo">
  <img src="{{ asset('img/profile_photo.jpg') }}" alt="" onclick="toggleMenu()">
  <div id="profile_menu" style="display:none">
    <ul id="profile_menu_items">
      <li class="profile_menu_item">
        <a href="#" class="">Zapisane</a>
      </li>
      <li class="profile_menu_item">
        <a href="#" class="">Polubione</a>
      </li>
      <li class="profile_menu_item">
        <a href="/profile-overview" class="">Profil</a>
      </li>
      <li class="profile_menu_item">
        <a href="#" class="">Jak dodawać lokacje</a>
      </li>
      <hr>
      <li class="profile_menu_item">
        <a href="#" class="">Regulamin</a>
      </li>
      <li class="profile_menu_item">
        <a href="#" class="">Pomoc</a>
      </li>
      <hr>
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" style="all: unset; cursor: pointer; color: #333333">Wyloguj</button>
      </form>
    </ul>
  </div>
</div>

<script>
  function toggleMenu() {
    var menu = document.getElementById('profile_menu');
    menu.style.display = menu.style.display === 'none' ? 'block' : 'none';
  }
  
  // Ukryj menu po kliknięciu poza obszar
  document.addEventListener('click', function(event) {
    var profilePhoto = document.getElementById('user_profile_photo');
    var menu = document.getElementById('profile_menu');
    if (!profilePhoto.contains(event.target)) {
      menu.style.display = 'none';
    }
  });
</script>