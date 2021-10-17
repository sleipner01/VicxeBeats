<footer class="footer">
        <div class="container-fluid">
          <nav class="float-left">
            <ul>
              <li>
                <a target="_blank" href="https://www.facebook.com/profile.php?id=100008850009187">
                  Facebook
                </a>
              </li>
              <li>
                <a href="#">
                  TikTok
                </a>
              </li>
              <li>
                <a href="#">
                  Instagram
                </a>
              </li>
              <li>
                <a href="#">
                  Spotify
                </a>
              </li>
              <li>
                <a href="#">
                  Soundcloud
                </a>
              </li>
            </ul>
          </nav>
          <div class="copyright float-right" id="date">
            , made with <i class="material-icons">favorite</i> by
            <a href="#" target="_blank">Sleipner</a>
          </div>
        </div>
      </footer>
      <script>
        const x = new Date().getFullYear();
        let date = document.getElementById('date');
        date.innerHTML = '&copy; ' + x + date.innerHTML;
      </script>
    </div>
  </div>