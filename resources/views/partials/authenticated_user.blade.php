<div id="user_profile_photo">
  <img src="{{ asset('img/profile_photo.jpg') }}" alt="" onclick="toggleMenu()">
  <div id="profile_menu" style="display:none">
    <a href="#">Profil</a>
    <form method="POST" action="{{ route('logout') }}">
    @csrf
      <input type="submit" value="Wyloguj">
    </form>
  </div>
</div>

<script>
  function toggleMenu() {
    var menu = document.getElementById('profile_menu');
    menu.style.display = menu.style.display === 'none' ? 'block' : 'none';
  }
  
  // Ukryj menu po kliknięciu poza obszar
  document.addEventListener('click', function(event) {
    console.log("cyce")
    var profilePhoto = document.getElementById('user_profile_photo');
    var menu = document.getElementById('profile_menu');
    if (!profilePhoto.contains(event.target)) {
      menu.style.display = 'none';
    }
  });
</script>