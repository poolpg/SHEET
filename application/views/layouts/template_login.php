<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo $this->layout->getTitle(); ?></title>    
	<meta name="description" content="<?php echo $this->layout->getDescripcion(); ?>">
	<meta name="keywords" content="<?php echo $this->layout->getKeywords(); ?>" />
	<?php echo $this->layout->css; ?> 

</head>
<body>
	template solo login
	<?php echo $content_for_layout; ?>
	<?php echo $this->layout->js; ?> 
</body>
</html>
