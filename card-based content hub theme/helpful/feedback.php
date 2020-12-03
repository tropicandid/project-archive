<?php if ( isset( $feedback_text ) ) : ?>
<div class="feedback-note">
	<p><?php echo $feedback_text; ?></p>
</div>
<?php endif; ?>

<div class="group">
	<?php $label = get_option( 'helpful_feedback_label_message' ); ?>
		<div class="group feedback-message">
			<?php $label = get_option( 'helpful_feedback_label_message' ); ?>
			<label for="message"><?php echo $label; ?> <req>*</req></label>
			<div class="control">
				<textarea name="message" id="message"></textarea>
			</div>
		</div>
	<div class="control feedback">
		<div class="feedback-option">
		    <input type="radio" id="feedbackOption1"
		     name="fields[feedback]" value="I already knew about this topic.">
		    <label for="feedbackOption1">I already knew about this topic.</label>
		</div>
		<div class="feedback-option">
		    <input type="radio" id="feedbackOption2"
		     name="fields[feedback]" value="I thought it’d be about something else.">
		    <label for="feedbackOption2">I thought it’d be about something else.</label>
		</div>
		<div class="feedback-option">
		    <input type="radio" id="feedbackOption3"
		     name="fields[feedback]" value="The content was shallow.">
		    <label for="feedbackOption3">The content was shallow.</label>
		</div>
		<div class="feedback-option">
		    <input type="radio" id="feedbackOption4"
		     name="fields[feedback]" value="Other">
		    <label for="feedbackOption4">Other</label>
		</div>
	</div>
</div>

<?php if ( get_option( 'helpful_feedback_name' ) && ! is_user_logged_in() ) : ?>
<div class="group">
	<?php $label = get_option( 'helpful_feedback_label_name' ); ?>
	<label for="email"><?php echo $label; ?></label>
	<div class="control">
		<input type="text" name="fields[name]" id="name">
	</div>
</div>
<?php endif; ?>

<?php if ( get_option( 'helpful_feedback_email' ) && ! is_user_logged_in() ) : ?>
<div class="group">
	<?php $label = get_option( 'helpful_feedback_label_email' ); ?>
	<label for="email"><?php echo $label; ?></label>
	<div class="control">
		<input type="email" name="fields[email]" id="email">
	</div>
</div>
<?php endif; ?>

<?php if ( get_option( 'helpful_feedback_cancel' ) ) : ?>
<?php $cancel = get_option( 'helpful_feedback_label_cancel' ); ?>
<button class="helpful-button helpful-cancel" type="button" role="button"><?php echo $cancel; ?></button>
<?php endif; ?>

<?php $submit = get_option( 'helpful_feedback_label_submit' ); ?>
<button class="helpful-button helpful-submit" type="submit" role="button"><?php echo $submit; ?></button>
