<?php
// Do not delete these lines
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
    die ('Please do not load this page directly. Thanks!');
if ( post_password_required() ) { ?>
    <p class="nocomments">This post is password protected. Enter the password to view comments.</p>
    <?php
    return;
}
?>
    <!-- You can start editing here. -->
    <style>
        h3#reply-title, p.comment-notes {
            display: none;
        }
    </style>
    <div class="block b-comments">
<?php if ( have_comments() ) : ?>
    <div class="b-head">
        <h3 class="section-title"><i class="s-purple c-icon"><svg width="24" height="24"><use xlink:href="#i__coms"></use></svg></i><?php if(get_comments_number( )) { ?><?php comments_number('0', '1', '%'); ?><?php global $opt_themes; if($opt_themes['exthemes_comment_Comments']) { ?> <?php echo $opt_themes['exthemes_comment_Comments']; ?><?php } ?><?php } else { ?><?php } ?> </h3>
        <a href="#addcom-block" class="btn s-green btn-all anchor"><span><?php global $opt_themes; if($opt_themes['exthemes_comment_Comment_on']) { ?><?php echo $opt_themes['exthemes_comment_Comment_on']; ?><?php } ?></span><svg width="24" height="24"><use xlink:href="#i__keyright"></use></svg></a>
    </div>
    <div class="navigation">
        <div class="alignleft"><?php previous_comments_link() ?></div>
        <div class="alignright"><?php next_comments_link() ?></div>
    </div>
    <div class="b-cont">
        <div id="dle-comments-list">
            <div id="dle-ajax-comments"></div>
            <div id="comment"></div>
            <ol class="comments-tree-list">
                <?php wp_list_comments('callback=_5play_comment'); ?>
            </ol>
        </div></div>
    <div class="navigation">
        <div class="alignleft"><?php previous_comments_link() ?></div>
        <div class="alignright"><?php next_comments_link() ?></div>
    </div>
<?php else : // this is displayed if there are no comments so far ?>
    <?php if ('open' == $post->comment_status) : ?>
        <!-- If comments are open, but there are no comments. -->
    <?php else : // comments are closed ?>
        <!-- If comments are closed. -->
        <p class="nocomments">Comments are closed.</p>
    <?php endif; ?>
<?php endif; ?>
<?php if ('open' == $post->comment_status) : ?>
    <div class="anchor-line"><span id="addcom-block"></span></div>
    <div id="addcomment" class="block b-add-comments ignore-select">
    <div class="b-head"><h3 class="section-title"><i class="s-green c-icon"><svg width="24" height="24"><use xlink:href="#i__addcom"></use></svg></i><?php global $opt_themes; if($opt_themes['exthemes_Take_comment']) { ?><?php echo $opt_themes['exthemes_Take_comment']; ?><?php } ?></h3></div>
    <div class="cancel-comment-reply">
        <small><?php cancel_comment_reply_link(); ?></small>
    </div>
    <?php if ( get_option('comment_registration') && !$user_ID ) : ?>
	<div class="b-cont">
	<div class="info-line">
	<i class="info-line-icon c-yellow"><svg width="24" height="24"><use xlink:href="#i__info"></use></svg></i>	
	<span>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.</span>
	</div>
	</div>

    <?php else : ?>
        <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" name="dle-comments-form" id="dle-comments-form">
            <?php if ( $user_ID ) : ?>
                <p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out &raquo;</a></p>
            <?php else : ?>
            <div class="b-cont">
                <div class="form-combo">
                    <div class="form-group">
                        <label class="c-muted" for="name"><?php global $opt_themes; if($opt_themes['exthemes_comment_Name']) { ?><?php echo $opt_themes['exthemes_comment_Name']; ?><?php } ?></label>
                        <input class="form-control" type="text" name="author" id="author" required>
                    </div>
                    <div class="form-group">
                        <label class="c-muted" for="mail"><?php global $opt_themes; if($opt_themes['exthemes_comment_EMail']) { ?><?php echo $opt_themes['exthemes_comment_EMail']; ?><?php } ?></label>
                        <input class="form-control" type="email" name="email" id="email" required>
                    </div>
                </div>
                <div class="form-group" id="comment-editor">
                    <label class="c-muted" for="comments"><?php global $opt_themes; if($opt_themes['exthemes_comment_text']) { ?><?php echo $opt_themes['exthemes_comment_text']; ?><?php } ?></label>
                    <div class="bb-editor">
                        <textarea name="comment" id="comment" cols="70" rows="10"></textarea>
                    </div>
                </div>
                <?php endif; ?>
                <!--<p><small><strong>XHTML:</strong> You can use these tags: <code><?php echo allowed_tags(); ?></code></small></p>-->
                <div class="form-submit">
                    <button class="btn btn-block s-green" type="submit" id="submit"><?php global $opt_themes; if($opt_themes['exthemes_comment_Send']) { ?><?php echo $opt_themes['exthemes_comment_Send']; ?><?php } ?></button>
                    <?php comment_id_fields(); ?>
                </div>
                <?php do_action('comment_form', $post->ID); ?>
        </form>
    <?php endif; // If registration required and not logged in ?>
<?php endif; // if you delete this the sky will fall on your head ?>