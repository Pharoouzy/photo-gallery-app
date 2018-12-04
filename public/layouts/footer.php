<footer class="page-footer grey darken-1">
		<div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text center">About</h5>
                <p class="grey-text text-lighten-4">Download samples of Wedding pictures, Interior decorations, Office settings, Football player, Computer laboratories and more...</p>
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Categories</h5>
                <ul>
                  <li><a class="grey-text text-lighten-3" href="javascript:void(0)">Wedding Pictures</a></li>
                  <li><a class="grey-text text-lighten-3" href="javascript:void(0)">Football Players</a></li>
                  <li><a class="grey-text text-lighten-3" href="javascript:void(0)">Computer Lab</a></li>
                  <li><a class="grey-text text-lighten-3" href="javascript:void(0)">Office</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            Pharoouzy Inc. &copy; <?php echo date('Y', time()); ?> Copyright
            <a class="grey-text text-lighten-4 right" href="twitter.com/Pharoouzy">Twitter</a>
            </div>
          </div>
	</footer>
</body>
</html>

<?php if(isset($db)){ $db->close_connection(); } ?>