            <!-- sidebarwidget -->
            <div class="col-md-4 col-md-pull-8">
               <div class="wrap-sidebar-left">
                  <!-- menu -->
                  <div class="sidebarwidget">
                     <div class="menu-left-show">
                     <?php foreach ($menu as $key => $val) {?>
                        <div class="mn-left-show-head">
                           <?php echo strtoupper($val['ind_name']);?>
                        </div>                        
                     <?php }?>
                        <ul>
                           <?php foreach ($submenu as $skey => $sval) { ?>
                              <?php if(isset($c3[$sval['id_menu']])){ ?>
                              <li class="menu-item-has-children">
                              <a href="<?=$sval['menu_link']?>"></a><span><?=strtoupper($sval['ind_name'])?></span>
                                 <ul>
                                    <?php foreach ($submenulv2 as $skey2 => $sval2) { ?>
                                       <?php if($sval2['parent_menu']==$sval['id_menu']) { ?>
                                          <?php if(isset($c4[$sval2['id_menu']])){ ?>
                                             <li class="menu-item-has-children">
                                                <a href="<?=$sval2['menu_link']?>"></a><span><?=strtoupper($sval2['ind_name'])?></span>
                                                   <ul>
                                                      <?php foreach ($submenulv3 as $skey3 => $sval3) { ?>
                                                         <?php if($sval3['parent_menu']==$sval2['id_menu']) { ?>
                                                            <li style="padding-left: 15px;"><a href="<?=$sval3['menu_link']?>"></a><span><?=strtoupper($sval3['ind_name'])?></span></li>
                                                         <?php }?>
                                                      <?php } ?>
                                                   </ul>
                                                </li>                                             
                                          <?php }else{ ?>
                                             <li><a href="<?=$sval2['menu_link']?>"></a><span><?=strtoupper($sval2['ind_name'])?></span></li>
                                          <?php }?>
                                       <?php } ?>
                                    <?php } ?>
                                 </ul>
                              </li>
                              <?php }else{ ?>
                              <li>
                                 <a href="<?=$sval['menu_link']?>"></a><span><?=strtoupper($sval['ind_name'])?></span>
                              </li>
                              <?php }?>
                           <?php }?>
                        </ul>
                     </div>
                  </div>
                  <div id="text-2" class="widget widget_text">
                     <div class="textwidget"><img src="<?php echo base_url('assets/img/hallo-bukopin.jpg')?>"></div>
                  </div>
                  <div id="text-3" class="widget widget_text">
                     <div class="textwidget"><img src="<?php echo base_url('assets/img/get-app.jpg')?>"></div>
                  </div>
                  <div id="text-4" class="widget widget_text">
                     <div class="textwidget"><img src="<?php echo base_url('assets/img/simulasi-kpr.jpg')?>"></div>
                  </div>
               </div>
            </div>
