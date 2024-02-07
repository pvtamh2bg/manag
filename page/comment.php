<?php
session_status() === PHP_SESSION_ACTIVE ?: session_start();
$email_1 = "";
if (isset($_SESSION['email'])) {
    $email_1 = $_SESSION['email'];
}
?>
<style>
.Updates-module_subShowAllBottom_1qN-f {
  display:block;
  color:var(--color-red) !important;
  text-decoration:none;
  padding:15px;
  border:1px solid var(--color-red);
  margin:20px 10%;
  text-align:center;
  opacity:.6;
  -webkit-transition:all .3s ease;
  transition:all .3s ease;
  letter-spacing:.05rem;
  text-transform:uppercase;
  border-radius:10px
}
.Updates-module_subShowAllBottom_1qN-f:after {
  content:"";
  display:inline-block;
  width:10px;
  height:10px;
  color:var(--color-black);
  border-bottom:3px solid var(--color-red);
  border-left:3px solid var(--color-red);
  -webkit-transform:rotate(-135deg);
  transform:rotate(-135deg);
  position:relative;
  left:7px;
  -webkit-transition:all .3s ease;
  transition:all .3s ease
}
.Updates-module_subShowAllBottom_1qN-f:hover {
  color:var(--color-yellow) !important;
  border:1px solid var(--color-yellow);
  opacity:1;
  -webkit-transition:all .3s ease;
  transition:all .3s ease;
  margin:20px 8%;
  font-weight: 500;
}
.Updates-module_subShowAllBottom_1qN-f:hover:after {
  left:17px;
  border-bottom:3px solid var(--color-yellow);
  border-left:3px solid var(--color-yellow);
  -webkit-transition:all .3s ease;
  transition:all .3s ease
}
</style>
<input type="hidden" id="current_page" value="1">
<input type="hidden" id="id_textarea" value="content_comment">
<input type="hidden" id="id_textarea_s" value="content_comment_s">
<div class="comment-container">
    <span class="story-detail-title"><i class="fas fa-comments"></i>Comments (<span class="comment-count">
            <?= $countComment ?>
        </span>)</span>

    <div class="group01 comments-container">
        <div class="notify" style="padding: 10px; margin-bottom: 10px; color: var(--color-white);">
            Like <a rel="nofollow" href="https://www.facebook.com/larvatubafunny" target="_blank">Fanpage</a> or follow me on <a rel="nofollow" href="https://twitter.com/shueishatv" target="_blank">Twitter</a>  to support
            Shueisha.tv and stay updated with the latest information about the series.
            <div class="fb-like fb_iframe_widget" data-href="https://www.facebook.com/shueisha-tv" data-send="false"
                data-layout="button_count" data-action="like" data-show-faces="true" data-share="false"
                fb-xfbml-state="rendered"
                fb-iframe-plugin-query="action=like&amp;app_id=&amp;container_width=1090&amp;href=https%3A%2F%2Fwww.facebook.com%2Ffantruyenqq&amp;layout=button_count&amp;locale=en_US&amp;sdk=joey&amp;send=false&amp;share=false&amp;show_faces=true">
                <span style="vertical-align: bottom; width: 82px; height: 20px;"><iframe name="f2b77c7d6b38574"
                        width="1000px" height="1000px" data-testid="fb:like Facebook Social Plugin"
                        title="fb:like Facebook Social Plugin" frameborder="0" allowtransparency="true"
                        allowfullscreen="true" scrolling="no" allow="encrypted-media" src=""
                        style="border: none; visibility: visible; width: 82px; height: 20px;" class=""></iframe></span>
            </div>
        </div>


        <div class="form-comment main_comment">
            <div class="message-content">
                <div class="input-comment">
                    <span class="col-md-6 col-sm-6 col-xs-12 text-center"><input class="input" id="name_comment"
                            type="text" placeholder="Name" value="<?= $_SESSION['name_comment'] ?>" /></span>
                    <span class="col-md-6 col-sm-6 col-xs-12 text-center"><input class="input" id="email_comment"
                            type="email" placeholder="Email" value="<?= $email_1 ?>"></span>
                </div>
                <div class="mess-input">
                    <textarea class="textarea" placeholder="Comment content" id="content_comment"></textarea>
                    <!-- <button id="emoji_1" type="submit" class="click_emoji"></button> -->
                    <button type="submit" class="submit_comment " id="submit_comment-id"></button>
                </div>
            </div>
        </div>

        <!--commnets -->
        <div class="list-comment">
            <div id="tam-thoi"></div>


        </div>

        <!--commnets -->
    </div>



    <div class="load_more_comment" id="load_comments"><a class="Updates-module_subShowAllBottom_1qN-f">View more comments</a>
    </div>
</div>