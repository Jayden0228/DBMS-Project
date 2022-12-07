<footer>
        <div class="Footer">
          <div class="container">
          <div class="row">
      
              <div class="footer-cols">
                  <h4>About Us</h4>
                  <ui>
                      <li> <a href="#">Owners</a> </li>
                      <li> <a href="#">Developers</a> </li>
                      <li> <a href="#">Partners</a> </li>
                      <li> <a href="#">Connections</a> </li>
                  </ui>
              </div>
      
              <div class="footer-cols">
                  <h4>Policy</h4>
                  <ui>
                      <li> <a href="#">Terms & Conditons</a></li>
                      <li> <a href="#">Privacy Policies</a></li>
                      <li> <a href="#">Purchase Policies</a></li>
                      <li> <a href="#">Return Policies</a></li>
                  </ui>
              </div>
      
              <div class="footer-cols">
                  <h4>Contact</h4>
                  <ui>
                      <li> <a href="#">enquiry@craftza.in</a></li>
                      <li> <a href="#">+91 9999999999</a></li>
                      <li> <a href="#">Farmagudi, Goa</a></li>
                  </ui> 
              </div>
      
              <div class="FootNewsletter">
                  <div id="NewletterLabel">Subscribe to our newsletter</div>
                  <input type="text" placeholder="Enter your email" id="footerInput" value="<?php if(isset($_SESSION['Email'])) {echo "{$_SESSION['Email']}";}else{echo "";}?>">
                  <input type="Button" value="Subscribe" id="footerSubmit">
              </div>
      
              <div class="FooterLogo"><img src="Images/footerImage.png" height="100%" width="100%"></div>
      
          </div>
        </div>
        </div>
      </footer>