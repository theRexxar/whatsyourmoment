<section class="ac-container">
	<!-- submit qoute -->
	<div class="qoute">
		<label for="ac-1">share quote here</label>
		<article>
			<form action="<?php echo base_url();?>home/submit_quote" name="submit_qoute" id="submit-quote" class="validate-qoute" method="post">
				<em>max. 160 characters</em>
				<div class="row">
					<div class="columns sixteen"><textarea name="qoutes" id="" cols="30" rows="10" spellcheck="false" placeholder="Type your quote here"></textarea></div>
					<div class="columns eight">
						<select name="category" class="category">
							<optgroup label="quote category">
								<option value="">quote category</option>
								<option value="love">Love</option>
								<option value="friendship">Friendship</option>
								<option value="hobby">Hobby</option>
								<option value="trends">Trends</option>
								<option value="work">Work</option>
								<option value="family">Family</option>
								<option value="etc">Etc</option>
							</optgroup>
						</select>
					</div>
					<div class="columns eight">
						<input type="submit" value="Submit">
					</div>
				</div>
			</form>	
		</article>
	</div>
	
	<!-- submit photo -->
	<div class="photo">
		<label for="ac-2">share photo here</label>
		<article class="ac-medium">
			<form action="<?php echo base_url();?>home/submit_photo" name="submit_photo" id="submit-photo" class="validate-photo" method="post" enctype="multipart/form-data">
				<em>max. 2M (JPEG, PNG, GIF)</em>
				<div class="row">
					<div class="columns sixteen">
						<div class="custom_file_upload">
							<div class="file_upload">
								<input type="file" id="file_upload" name="userfile">
							</div>
						</div>
					</div>
					<div class="columns sixteen"><input type="text" name="caption" placeholder="photo caption"></div>
					<div class="columns eight">
						<select name="category" class="category">
							<optgroup label="quote category">
								<option value="">quote category</option>
								<option value="love">Love</option>
								<option value="friendship">Friendship</option>
								<option value="hobby">Hobby</option>
								<option value="trends">Trends</option>
								<option value="work">Work</option>
								<option value="family">Family</option>
								<option value="etc">Etc</option>
							</optgroup>
						</select>
					</div>
					<div class="columns eight">
						<input type="submit" value="Upload">
					</div>
				</div>
			</form>	
		</article>
	</div>
	
	<!-- submit video -->
	<div class="video">
		<label for="ac-3">share video here</label>
		<article class="ac-large">
			<form action="<?php echo base_url();?>home/submit_video" name="submit_url" id="submit-url" class="validate-url" method="post">
				<div class="row">
					<div class="columns sixteen"><input type="text" name="url" placeholder="insert URL / LINK"></div>
					<div class="columns eight">
						<select name="category" class="category">
							<optgroup label="quote category">
								<option value="">quote category</option>
								<option value="love">Love</option>
								<option value="friendship">Friendship</option>
								<option value="hobby">Hobby</option>
								<option value="trends">Trends</option>
								<option value="work">Work</option>
								<option value="family">Family</option>
								<option value="etc">Etc</option>
							</optgroup>
						</select>
					</div>
					<div class="columns eight">
						<input type="submit" value="Submit">
					</div>
				</div>
			</form>	
		</article>
	</div>

</section>