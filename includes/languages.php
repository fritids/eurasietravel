<ul id="bar">          
    
    <li id="lang"> 
    <label>Language:</label> 
    
    <div class="language" onmouseover="langMenu();" onmouseout="langMenu();" id="langTab"> 		
    
    <div class="centerSide"> 
    
        <p class="currentLang">
        <a href="<?php echo curPageURL(); ?>" title="" class="lang">English</a>
        <img src="<?php bloginfo('template_url'); ?>/images/flags/gb.png" width="16" height="16" alt="" />
        </p> 
                        
    <div id="langDropMenu" style="display:none;"> 
    
        <p class="gray first">
        <a href="http://google.com/translate?langpair=de%7Cfr&u=<?php echo curPageURL(); ?>" title="Deutch">Deutch</a>
        <img src="<?php bloginfo('template_url'); ?>/images/flags/de.png" width="16" height="16" alt="" />
        </p> 
    
        <p class="gray">
        <a href="http://google.com/translate?langpair=es%7Cru&u=<?php echo curPageURL(); ?>" title="Russian">Russian</a>
        <img src="<?php bloginfo('template_url'); ?>/images/flags/ru.png" width="16" height="16" alt="" />
        </p> 
    
        <p class="gray">
        <a href="http://google.com/translate?langpair=es%7Cfr&u=<?php echo curPageURL(); ?>" title="Spanish">Spanish</a>
        <img src="<?php bloginfo('template_url'); ?>/images/flags/es.png" width="16" height="16" alt="" />
        </p> 
    
    </div> <!-- langDropMenu -->
    
    </div> <!-- centerSide -->
    
    </div> <!-- headAccountCont -->
    
    </li>

</ul>