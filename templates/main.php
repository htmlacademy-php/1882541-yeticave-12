                   <main class="container">
                         <section class="promo">
                             <h2 class="promo__title">Нужен стафф для катки?</h2>
                             <p class="promo__text">На нашем интернет-аукционе ты найдёшь самое эксклюзивное сноубордическое и горнолыжное снаряжение.</p>
                             <ul class="promo__list">
                                 <?php foreach ($categories_arr as $val): ?>
                                 <li class="promo__item promo__item--boards">
                                     <a class="promo__link" href="pages/all-lots.html"><?=$val; ?></a>
                                 </li>
                                 <?php endforeach; ?>
                             </ul>
                         </section>
                         <section class="lots">
                             <div class="lots__header">
                                 <h2>Открытые лоты</h2>
                             </div>
                             <ul class="lots__list">
                                 <?php foreach ($announcements_arr as $key => $value): ?>
                                 <li class="lots__item lot">
                                     <div class="lot__image">
                                         <img src="<?=$value['image']; ?>" width="350" height="260" alt="">
                                     </div>
                                     <div class="lot__info">
                                         <span class="lot__category"><?=$value['category']; ?></span>
                                         <h3 class="lot__title"><a class="text-link" href="pages/lot.html"><?=$value['name']; ?></a></h3>
                                         <div class="lot__state">
                                             <div class="lot__rate">
                                                 <span class="lot__amount"><?=convert_price($value['price']); ?></span>
                                                 <span class="lot__cost">цена<b class="rub">р</b></span>
                                             </div>
                                             <?php
                                                $h_left = get_time_range($value['date'])[0];
                                                $m_left = get_time_range($value['date'])[1];
                                                $div_class = "lot__timer timer";
                                                 if (intval($h_left)<1) { $div_class = "lot__timer timer timer--finishing"; }
                                                ?>
                                             <div class="<?=$div_class; ?>">
                                                 <?=$h_left ." : " . $m_left; ?>
                                             </div>
                                     </div>
                                 </li>
                             <?php endforeach; ?>
                             </ul>
                         </section>
                     </main>
