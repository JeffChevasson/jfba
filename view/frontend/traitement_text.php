<!DOCTYPE html>
<html>
<head>
	<script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
<script>
  tinymce.init({
  	 selector: '#content'
  });
  </script>
</head>

<body>
	<h1>Edition de l'article</h1>

	<form action="index.php?action=postEdition&id=<?=$_GET['id']?>"
		method="post">
		<div>
			<label for="title">titre</label><br /> <input type="text" id="title"
				name="title" value="<?= $currentPost['title'] ?>">
		</div>
		<div>
			<label for="content">article</label><br />
			<textarea id="content" name="content"> <?= $currentPost['content'] ?></textarea>
		</div>
		<div>
			<input type="submit" />
		</div>
	</form>

</body>
</html>