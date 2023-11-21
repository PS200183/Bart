      <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu">
                <div class="slimscroll-menu" id="remove-scroll">

                  
                    <div id="sidebar-menu">

                     
                        <ul class="metismenu" id="side-menu">
                            <li class="menu-title"></li>
                            


                            <li>
                            <a href="/employeeschedules" class="waves-effect {{ request()->is("employeeschedules") || request()->is("/employeeschedules/*") ? "mm active" : "" }}"><i class="ti-user"></i><span> 
                            Medewerkers rooster</span></a>    
                            
                            </li>
							
                            <li class="">
                                <a href="/shift" class="waves-effect {{ request()->is("shift") || request()->is("shift/*") ? "mm active" : "" }}">
                                    <i class="ti-time"></i> <span> Werktijden </span>
                                </a>
                            </li>
                            

                        </ul>
					
                    </div>
                 
                    <div class="clearfix"></div>

                </div>
               

            </div>
           
