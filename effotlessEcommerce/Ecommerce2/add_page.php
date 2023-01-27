<?php
require_once('./includes/config.inc.php');
redirect_invalid_user('user_admin');
$page_title = 'Add a Site Content Page';
include('./includes/header.html');
require(MYSQL);

$add_page_errors = array();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	if(!empty($_POST['title'])){
		$t = mysqli_real_escape_string($conn, strip_tags($_POST['title']));
	}else{
		$add_page_errors['title'] = 'Please enter the title!';
	}
	if(filter_var($_POST['category'], FILTER_VALIDATE_INT, array('min_range'=>1))){
		$cat = $_POST['category'];
	}else{
		$add_page_errors['category'] = 'Please select a category!';
	}
	if(!empty($_POST['description'])){
		$d = mysqli_real_escape_string($conn, strip_tags($_POST['description']));
	}else{
		$add_page_errors['description'] = 'Please enter the description!';
	}
	if(!empty($_POST['content'])){
		$allowed = '<div><p><span><br><b><i><a><img><h1><h2><h3><h4><ul><ol><li><blockquote>';
		$c = mysqli_real_escape_string($conn, strip_tags($_POST['content'], $allowed));
	}else{
		$add_page_errors['content'] = 'Please enter the content!';
	}
	if(empty($add_page_errors)){
		$q = "INSERT INTO pages(category_id, title, description, content) VALUES 
		($cat, '$t', '$d', '$c')";
		$r = mysqli_query($conn, $q);
		if(mysqli_affected_rows($conn)==1){
			echo "<h4>The page has been added successfully!</h4>";
			$_POST = array();
		}else{
			trigger_error('The page could not be added due to a system error, We 
			apologize for the inconvenience.');
		}
	}
}

require('./includes/form_functions.inc.php');
?>

<h3>Add a Site Content Page</h3>
<form action = add_page.php" method = "post" accept-charset = "utf-8">
	<fieldset>
		<legend>Fill in the form below to add page content:</legend>
		<p><label for = "first_name"><strong>Title</strong></label><br />
		<?php create_form_input('title', 'text', $add_page_errors);?></p>
		
		<p><label for = "category"><strong>Category</strong></label><br />
		<select name = "category" <?php if(array_key_exists('category', $add_page_errors))
			echo 'class = "error"';?>>
			<option>Select One</option>
			<?php //retrieve all categories and add to the pull-down menu
			$q = "SELECT id, category FROM categories ORDER BY category ASC";
			$r = mysqli_query($conn, $q);
			while($row = mysqli_fetch_array($r, MYSQLI_NUM)){
				echo "<option value = \"$row[0]\"";
				//check for stickiness
				if(isset($_POST['category']) && ($_POST['category']==$row[0]))
					echo 'selected="selected"';
				echo '>$row[1]</option>\n';
			}
			?>
		</select>
		<?php if(array_key_exists('category', $add_page_errors))echo '<span class="error">'.$add_page_errors['category'].'</span>';?></p>
		
		<p><label for = "description"><strong>Description</strong></label><br />
		<textarea id = "content" name = "content" style = "width:400px;height:400px;">
		</textarea>
		
		<p><input type = "submit" name = "submit_button" value = "Add This page" 
		id = "submit_button" class = "formbutton" /></p>
	</fieldset>
</form>

<script type = "text/javascript" src = "./tinymce/tinymce.js"></script>
<script type = "text/javascript">
tinyMCE.init({
	mode:"exact",
	elements:"content",
	theme:"advanced",
	width:800,
	height:400,
	plugins:"advlink,advlist,autoresize,autosave,contextmenu,fullscreen,iespell,inlinepopups,media,paste,preview,safari,searchreplace,visualchars,wordcount,xhtmlxtras",
	theme_advanced_buttons1:"cut,copy,paste,pastetext,pasteword,|, undo,redo,removeformat,|,search,replace,|,cleanup,help,code,preview,visualaid,fullscreen",
	theme_advanced_buttons2:"bold,italic,underline,strikethrough,|, justifyleft,justifycenter,justifyright,justifyfull,|,formatselect,|,bullist,numlist,|,outdent,indent,blockquote,|,sub,sup,cite,abbr",
	theme_advanced_buttons3:"hr,|,link,unlink,anchor,image,|,charmap, emotions,iespell,media",
	theme_advanced_toolbar_location:"top",
	theme_advanced_toolbar_align:"left",
	theme_advanced_statusbar_location:"bottom",
	theme_advanced_resizing:true,
	content_css:"/css/style.css",
});
</script>
	
<?php
include('./includes/footer.html');
?>	